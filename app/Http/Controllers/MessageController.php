<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable',
            'surname' => 'nullable',
            'email' => 'required|email',
            'text' => 'required',
            'apartment_id' => 'nullable'
        ]);

        $message = new Message();
        $message->fill($data);
        $message->save();

        return response()->json(['message' => 'Message stored successfully']);
    }
}
