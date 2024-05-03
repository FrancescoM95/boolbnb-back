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
        $messages = $apartment->messages()->paginate(10);
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
    // public function destroy(Apartment $apartment)
    // {
    //     $apartment->delete();
    //     return to_route('admin.apartments.index');
    // }

    //# ROTTA PUBBLICAZIONE

    // public function togglePublication(Apartment $apartment)
    // {
    //     $apartment->is_visible = !$apartment->is_visible;
    //     $apartment->save();

    //     return back();
    // }

}
