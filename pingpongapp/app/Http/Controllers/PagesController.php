<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class PagesController extends Controller
{

	public function home(){
		$usuario=App\Usuarios::all();
		return view('welcome',compact('usuario'));
	}

    public function crear(Request $request){
    	$request->validate([
            'usuario'=>'required'
        ]);

        $newUser = new App\Usuarios;
        $newUser->usuario=$request->usuario;
        $newUser->puntaje_match=0;
        $newUser->puntaje_global=0;
        $newUser->save();

        return back();
    }


}
