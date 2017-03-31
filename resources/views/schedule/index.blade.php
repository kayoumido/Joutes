@extends('barebone')

@section('content')
    <div class="container-fluid">
        <h1>Upcomming matches</h1>

        {{-- {{ var_dump($schedule) }} --}}

        @foreach ($schedule as $game)
            <p>This is user {{ $game->id }}</p>
            <p>This is user {{ $game->date }}</p>
            <p>This is user {{ $game->start_time }}</p>
            <p>This is user {{ $game->court->name }}</p>
            <p>This is user {{ $game->court->sport->name }}</p>

            <br />
            <br />
            <br />
            <br />
        @endforeach

    </div>
@stop
