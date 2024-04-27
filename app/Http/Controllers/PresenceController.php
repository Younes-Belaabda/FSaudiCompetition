<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        return view('admin.presence.index' , ['presences' => \App\Models\Presence::paginate(10)]);
    }
}
