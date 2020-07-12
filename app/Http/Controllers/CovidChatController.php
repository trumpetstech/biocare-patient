<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientCovid;
use Pusher\Pusher;

class CovidChatController extends Controller
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
    public function index()
    {
        $covid = PatientCovid::where('patient_id', patient()->id)->first();
        return view('covid.chat', compact('covid'));
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages(PatientCovid $covid)
    {
        return $covid->messages()->with('sender')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(PatientCovid $covid)
    {
        
        $message = $covid->messages()->create([
                'message' => request('message'),
                'by_doctor' => 0,
                'sender_id' => patient()->id
         ]);

         $message->load('sender');
         
         $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), array('cluster' => env('PUSHER_APP_CLUSTER')));
         $pusher->trigger('covid-chat-' . $covid->id, 'new-message', ['message' => $message->toArray()]);
         
         foreach($covid->group->members as $member) {
            $member->notify('You have a new message from ' . auth()->user()->name, '/covid-patients/' . $covid->id . '/chat'); 
         }
      
         return response()->json($message, 200);
     }
}
