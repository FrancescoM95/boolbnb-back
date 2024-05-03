<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apartment\StoreApartmentRequest;
use App\Http\Requests\Apartment\UpdateApartmentRequest;
use App\Models\Apartment;
use App\Models\Message;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{

    public function index(Apartment $apartment)
    {
        $messages = $apartment->messages()->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.messages.index', compact('apartment', 'messages'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment, Message $message)
    {
        $message = Message::whereApartmentId($apartment->id)->whereId($message->id)->first();
        if (!$apartment || !$message || $apartment->user_id != Auth::user()->id) abort(404);
        return view('admin.messages.show', compact('apartment', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment, Message $message)
    {
        $message->delete();
        return to_route('admin.messages.index', compact('apartment'));
    }

    //* Rotta Visualizzato

    public function toggleRead(Message $message)
    {
        $message->is_read = !$message->is_read;
        $message->save();

        return back();
    }

    //# Soft deletes
    // Rotta cestino
    public function trash(Apartment $apartment)
    {
        $messages = Message::onlyTrashed()->whereApartmentId($apartment->id)->get();
        return view('admin.messages.trash', compact('messages', 'apartment'));
    }

    // restore singolo
    public function restore(Message $message)
    {
        $message->restore();
        return back();
    }

    // restore massivo
    public function massiveRestore(Apartment $apartment)
    {
        $apartment = Apartment::whereId('$apartment');
        // @dd($apartment);
        $messages = Message::onlyTrashed()->get();
        foreach ($messages as $message) {
            $message->restore();
        }
        return to_route('admin.messages.index', compact('apartment'));
    }
}
