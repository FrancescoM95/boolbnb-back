<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'text' => 'required',
            'apartment_id' => 'required|exists:apartments,id'
        ]);

        $message = Message::create($validatedData);

        return response()->json(['message' => 'Message sent successfully', 'data' => $message], 201);
    }
}
