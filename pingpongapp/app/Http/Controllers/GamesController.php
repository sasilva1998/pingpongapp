<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class GamesController extends Controller
{
        public function game(Request $request){

		$player1=App\Usuarios::findOrFail($request->jugador1);
		$player2=App\Usuarios::findOrFail($request->jugador2);

		$player1->puntaje_match=0;
		$player2->puntaje_match=0;
		$player1->save();
		$player2->save();
		$leader=App\Usuarios::all();
		$serve=1;
		$count=App\Counter::findOrFail(1);
		$count->counter=0;
		$count->save();
		return view('game',compact('leader','player1','player2','serve'));
	}

	public function pointup(Request $request){

		$count=App\Counter::findOrFail(1);
		$count->counter++;

		if($count->counter>=0 and $count->counter<=1){
			$serve=1;
			$count->save();
		}
		
		if($count->counter>=2){
			$serve=2;
			$count->save();
		}

		if($count->counter>3){
			$serve=1;
			$count->counter=0;
			$count->save();
		}

		$player1=App\Usuarios::findOrFail($request->player[0]);
		$player2=App\Usuarios::findOrFail($request->player[1]);
		$leader=App\Usuarios::all();

		if($request->player[2]==1){
			$player1->puntaje_match++;
		}
		else{
			$player2->puntaje_match++;
		}
		

		if(($player1->puntaje_match>($player2->puntaje_match+1) or $player1->puntaje_match<($player2->puntaje_match-1)) and ($player1->puntaje_match>9 or $player2->puntaje_match>9)){

			if($player1->puntaje_match>$player2->puntaje_match){
				$player1->puntaje_global++;
			}
			else{
				$player2->puntaje_global++;
			}
			
			$player1->puntaje_match=0;
			$player2->puntaje_match=0;
			$player2->save();
			$player1->save();
			return view('game',compact('leader','player2','player1','serve'));
		}

		$player1->save();
		$player2->save();
		return view('game',compact('leader','player2','player1','serve'));
	}

	public function endgame(Request $request){
		$usuario=App\Usuarios::all();
		$player1=App\Usuarios::findOrFail($request->player[0]);
		$player2=App\Usuarios::findOrFail($request->player[1]);
		$player1->puntaje_match=0;
		$player2->puntaje_match=0;
		$player1->save();
		$player2->save();
		return view('welcome',compact('usuario'));

	}
}
