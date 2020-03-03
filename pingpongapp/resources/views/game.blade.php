@extends('plantilla')
@section('seccion')
<h1>Ping Pong Counter</h1>


<h3>Leaderboard</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Player</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody>
    @foreach($leader as $item)
    <tr>
    	<th scope="row">
    		{{ $item->id }}
  		</th>
      <td>
        <a>
          {{$item->usuario}}
        </a>
      </td>
      <td>
      <a>
        {{$item->puntaje_global}}
      </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<h3>Game</h3>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Player 1</th>
      <th scope="col">Player 2</th>
      <th scope="col">Score Player1</th>
      <th scope="col">Score Player2</th>
    </tr>
  </thead>
  <tbody>

    @if($serve==1)
    <th class="alert">
      {{$player1->usuario}} Serving
    </th>
    <th>
        {{$player2->usuario}}
    </th>
    @endif

    @if($serve==2)
    <th>
      {{$player1->usuario}}
    </th>
    <th class="alert">
        {{$player2->usuario}} Serving
    </th>
    @endif


      <td>
        {{$player1->puntaje_match}}
        <form action="{{route('pointup')}}" method="POST">
          @csrf
          <input type="hidden" name="player[0]" value={{$player1->id}}>
          <input type="hidden" name="player[1]" value={{$player2->id}}>
          <input type="hidden" name="player[2]" value=1>
        <button class="btn btn-warning btn-sm">Subir Punto</button>
        </form>
      </td>
      <td>
        {{$player2->puntaje_match}}
        <form action="{{route('pointup')}}" method="POST">
          @csrf
         <input type="hidden" name="player[0]" value={{$player1->id}}>
         <input type="hidden" name="player[1]" value={{$player2->id}}>
         <input type="hidden" name="player[2]" value=2>
        <button class="btn btn-warning btn-sm">Subir Punto</button>
      </form>
      </td>
  </tbody>
</table>

<form action="{{route('endgame')}}" method="POST">
  @csrf
  <input type="hidden" name="player[0]" value={{$player2->id}}>
  <input type="hidden" name="player[1]" value={{$player1->id}}>
  <button class="btn btn-warning btn-sm">End game</button>
</form>


@endsection