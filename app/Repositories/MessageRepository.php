<?php

namespace App\Repositories;

use App\Interfaces\MessageRepositoryInterface;

use App\Models\User;
use App\Models\Message;

class MessageRepository implements MessageRepositoryInterface
{
    public function sendMeesage($id)
    {
        try {
            $user = User::findorfail($id);
            $users = User::where('id','!=',auth()->user()->id);
            return view('send', compact('user','users'));
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    public function StoreMessage($request, $id)
    {
        try {
            Message::create([
                'user_id' => $id,
                'text' => $request->text
            ]);

            return redirect()->route('Message.send', $id)->with('success', 'Message Send Succesfull');
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route('Message.send', $id)->with('danger', $e->getMessage());
        }
    }
}
