<?php

use App\Models\GameObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\InitRequest;
use App\Models\Map;
use App\Models\GameState;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/game/init/{map_id}/', function (int $map_id) {

    $requests = InitRequest::where('user_id', Auth::user()->id)
        ->where('active', true);
    if($requests->count() != 0){
        return 'You have an active request yet';
    }
        
    $initRequest = new InitRequest(
        [
            'map_id' => $map_id, 
            'active' => true
        ]
    );
    $initRequest->user()->associate(Auth::user());
    $initRequest->save();
    $playersCount = Map::find($map_id)->players_count;
    $activeRequests = InitRequest::where('map_id', $map_id)
        ->where('active', true);
    if ($playersCount == $activeRequests->count()){
        $users = [];
        foreach ($activeRequests->get() as $currentInitRequest){
            $currentInitRequest->active = false;
            $currentInitRequest->save();
            $users[] = $currentInitRequest->user;
        };
        $game = new GameState(['map_id' => $map_id, 'round' => 1, 'turn' => 1, 'active' => true]);
        $game->save();     
        $game->users()->saveMany($users);
        $game->save();
    };
    return $initRequest;

});

Route::get('/game/state/', function (Request $request) {
    return Auth::user()->gameStates->where('id', 1);
});
Route::get('/game/turn/{skill}', function (string $skill) {
    return Auth::user()->gameStates;
});