<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function index(){
        return response()->json(Player::orderBy('wins', 'desc')->get());
    }
    public function store(Request $request){
        return response()->json(Player::create($request->all()), 201);
    }
    public function show($id){
        $player = Player::find($id);
        if (!$player) {
            return response()->json('Player not found', 404);
        }
        return response()->json($player, 200);
    }
    public function update(Request $request, $id) {
        $player = Player::find($id);
        if (!$player) {
            return response()->json('Player not found', 404);
        }
        $player->Wins = $request->Wins;
        $player->save();
    
        return response()->json($player, 200);
    }
    public function destroy($id){
        $player = Player::find($id);
        if (!$player) {
            return response()->json('Player not found', 404);
        }
        return response()->json($player->delete(), 201);
    }
    public function info() {
        $info = [
            '/info' => 'This info page',
            '/players' => 'GET request to fetch all players',
            '/player' => 'POST request to create a player',
            '/player/{id}' => 'GET, PUT, or DELETE request to fetch, update, or delete a player',
        ];
        return response()->json($info, 200, [], JSON_UNESCAPED_SLASHES);
    }
}

