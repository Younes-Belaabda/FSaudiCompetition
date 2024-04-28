<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Team;
use App\Models\Presence;
use App\Imports\TeamsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Schema;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teams = Team::paginate(10);
        $team_categories = Team::groupBy('team_category')->pluck('team_category');

        if($request->all() != []){
            $teams = Team::where([
                ['team_name' , 'like' , "%" . $request->input('team_name') . "%"],
                ['team_category' , 'like' , "%" . $request->input('team_category') . "%"],
            ])->paginate(10);
        }

        return view('admin.team.index' , ['teams' => $teams , 'team_categories' => $team_categories]);
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
        return back();
    }

    public function scan(){
        return view('admin.team.scan');
    }

    public function presence(Team $team){
        if(Presence::whereDate('created_at' , Carbon::today())
        ->where('team_id' , $team->id)
        ->get()){
            return json_encode([
                'message' => "الفريق سجل {$team->team_name} حضوره اليوم مسبقا"
            ]);
        }

        Presence::create([
            'team_id' => $team->id,
            'user_id' => auth()->user()->id
        ]);

        return json_encode([
            'message' => 'شكرا تم تسجيل حضور الفريق ' . $team->team_name,
        ]);
    }

    public function reset(){
        Schema::disableForeignKeyConstraints();
        Presence::truncate();
        Team::truncate();
        Schema::enableForeignKeyConstraints();
        return back();
    }
}
