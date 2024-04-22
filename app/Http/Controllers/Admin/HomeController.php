<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Recupero l\'utente corrente autenticato
        $user = auth()->user();
        return view('admin.home', compact('user'));
    }
}
