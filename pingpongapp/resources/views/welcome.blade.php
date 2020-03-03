@extends('plantilla')
@section('seccion')

<h1>Ping Pong Counter</h1>

<img src='{{ asset("pingpong.jpeg") }}' alt="Ping Pong" width="300" height="200">

<h4>Add new user</h4>


 <form action="{{route('crear')}}" method="POST">
  @csrf

  <input type="text" name="usuario" placeholder="New User" class="form-control mb-2" style="width: 200px;">
  <button class="btn btn-primary" type="submit">Add</button>
</form>
<h1></h1>
<h1></h1>
<h1></h1>
<h4>Start a game</h4>
<form action="{{route('game')}}" method="post">
    @csrf
    <select name="jugador1">
        @foreach($usuario as $item)
            <option name="jugador1" id="jugador1" value={{$item->id}}>{{ $item->usuario }}</option>
        @endforeach
    </select>

    <select name="jugador2">
        @foreach($usuario as $item)
            <option name="jugador2" id="jugador2" value={{$item->id}}>{{ $item->usuario }}</option>
        @endforeach
    </select>

    <button class="btn btn-success" type="submit">Start game</button>
</form>

@endsection
