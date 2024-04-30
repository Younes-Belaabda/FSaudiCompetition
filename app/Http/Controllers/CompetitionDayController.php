<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetitionDay;

class CompetitionDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions_day  = CompetitionDay::paginate(10);
        return view('admin.competition.index' , ['competitions_day' => $competitions_day]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.competition.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'day' => 'required'
        ]);

        CompetitionDay::create($validated);

        return back();
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
    public function edit(CompetitionDay $competition_day)
    {
        return view('admin.competition.edit' , ['competition_day' => $competition_day]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompetitionDay $competition_day)
    {
        $validated = $request->validate([
            'name' => 'required',
            'day' => 'required'
        ]);

        $competition_day->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompetitionDay $competition_day)
    {
        $competition_day->delete();
        return back();
    }
}
