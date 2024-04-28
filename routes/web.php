<?php

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresenceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->as('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('team/scan' , [TeamController::class , 'scan'])->name('team.scan');
    Route::post('team/import' , [TeamController::class , 'import'])->name('team.import');
    Route::get('team/{team:uuid}/presence' ,[TeamController::class , 'presence'])
    ->name('team.presence');
    Route::post('team/reset' , [TeamController::class , 'reset'])->name('team.reset');
    Route::resource('team', TeamController::class);

    Route::resource('presence', PresenceController::class);
});

// Team Page
Route::get('team/check' , function(){
    return view('guest.team.check');
})->name('team.check');

Route::post('team/check' , function(Request $request){

    $validate = $request->validate([
        'coach_eID' => 'required'
    ]);

    $team = Team::where('coach_eID' , $request->coach_eID)->first();

    return redirect()->route('team.info' , ['team' => $team]);
})->name('team.check');

Route::get('team/{team:uuid}/info' , function(\App\Models\Team $team){
    $qrcode = QrCode::size(150)->generate(route('admin.team.presence' , ['team' => $team]));
    return view('guest.team.info' , ['team' => $team , 'qrcode' => $qrcode]);
})->name('team.info');

