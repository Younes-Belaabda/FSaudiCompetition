<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        return view('admin.presence.index' , ['presences' => \App\Models\Presence::paginate(10)]);
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presence $presence)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presence $presence)
    {

    }

    public function destroy(Presence $presence){
        $presence->delete();
        return back();
    }
}
