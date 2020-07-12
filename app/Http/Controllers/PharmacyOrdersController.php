<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\PharmacyOrder;
use App\Models\DoctorAppointment;

class PharmacyOrdersController extends Controller
{
    public function index()
    {
        $pendingOrders = patient()->pharmacy_orders()->where('status', '>', -1)->where('status', '<', 2)->orderBy('created_at', 'DESC')->get();
        $cancelledOrders = patient()->pharmacy_orders()->where('status',  -1)->orderBy('created_at', 'DESC')->get();
        $deliveredOrders = patient()->pharmacy_orders()->where('status', 2)->where('delivered', 1)->orderBy('created_at', 'DESC')->get();
        return view('pharmacies.orders.index', compact( 'cancelledOrders', 'pendingOrders', 'deliveredOrders'));
    }

    public function book(Pharmacy $pharmacy)
    {
        $items = [];
        $doctorName = '';
        $fileUrl = '';

        $appointment = null;
        if(request()->has('appointment_id')) {
            $appointment = DoctorAppointment::find(request('appointment_id'));
        }

        if($appointment) {
            foreach (json_decode($appointment->prescription_items, true) as $index => $meditem) {
                $item = [];
                $item['name'] = $meditem['medicine'];
                $item['qty'] = $meditem['qty'];
                $item['time'] = $meditem['timings'];
                $item['instructions'] = $meditem['instructions']; 
                $item['price'] = 0;
                $items[] = $item;
            }
           $doctorName = $appointment->doctor_name; 
        }  else {
            if (request()->hasFile('prescription')) {
                $path = request()->file('prescription')->store(
                    'prescriptions', 's3'
                );
    
                $fileUrl =  \Storage::disk('s3')->url($path);
            }
        }

        $postData = [
            'patient_id' => patient()->id,
            'patient_name' => patient()->name,
            'address' => patient()->full_address,
            'contact_no' => patient()->phone,
            'doctor_name' => $doctorName,
            'prescription_type' => count($items) ? 0 : 1,
            'order_items' => count($items) ? json_encode($items) : $fileUrl,
            'delivery_type' =>  request('delivery_type')
        ];

        $order = $pharmacy->orders()->create($postData);

        // Notify pharmacy
        $pharmacy->notify('New Order Received from ' . patient()->name, '/orders/' . $order->id);

        toastr()->success('Your order has been sent to ' . $pharmacy->name);

        return redirect('/orders');
    }

    public function show(PharmacyOrder $order)
    {
        return view('pharmacies.orders.show', compact('order'));
    }

}
