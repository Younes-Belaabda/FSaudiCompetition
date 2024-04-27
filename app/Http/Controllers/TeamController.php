<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Presence;
use App\Imports\TeamsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.team.index' , ['teams' => \App\Models\Team::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'eID' => 'required'
        ]);

        team::create($validated);

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
    public function edit(Team $team)
    {
        return view('admin.team.edit' , ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'eID' => 'required'
        ]);

        $team->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return back();
    }

    public function import(Request $request){
        $filename = $request->file('file')->store('files/' . time() . '.xlsx');
        Excel::import(new TeamsImport, storage_path('app/' . $filename));
    }

    public function scan(){
        return view('admin.team.scan');
    }

    public function presence(Team $team){
        try{
            Presence::create([
                'team_id' => $team->id,
                // 'user_id' => auth()->user()->id
                'user_id' => auth()->user()->id
            ]);
        }catch(\Exception $exception){
            abort(403 , 'الباركود لتسجبل الحضور خاص بالإدارة فقط شكرا .');
        }

        return json_encode([
            'message' => 'شكرا تم تسجيل حضور الفريق ' . $team->team_name,
        ]);

    }

    public function reset(){

    }
}
