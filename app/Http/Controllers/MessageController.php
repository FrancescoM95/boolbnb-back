<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'nullable',
                'surname' => 'nullable',
                'email' => 'required|email',
                'text' => 'required | string',
                'apartment_id' => 'nullable'
            ],
            [
                'email.required' => 'La mail è obbligatoria',
                'email.email' => 'La mail non è valida',
                'text.required' => 'Il messaggio è obbligatorio',
            ]
        );

        

        $message = new Message();
        $message->fill($data);
        $message->save();


        return response()->json(['message' => 'Message stored successfully']);
    }
}
