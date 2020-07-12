<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorAppointment;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DoctorAppointment $appointment)
    {
        $appointment->load('doctor');
        return view('doctors.appointments.chat', compact('appointment'));
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages(DoctorAppointment $appointment)
    {
        return $appointment->messages()->with('sender')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(DoctorAppointment $appointment)
    {
        
        $message = $appointment->messages()->create([
                'message' => request('message'),
                'by_doctor' => 0,
                'sender_id' => patient()->id
         ]);

         $message->load('sender');
         
         $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), array('cluster' => env('PUSHER_APP_CLUSTER')));
         $pusher->trigger('chat-' . $appointment->id, 'new-message', ['message' => $message->toArray()]);

         $appointment->doctor->notify('You have a new message from ' . $appointment->patient->name, '/appointments/' . $appointment->id . '/chat');

         return response()->json($message, 200);
     }
}
