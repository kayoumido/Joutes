@extends('barebone')

@section('content')
    <div class="container-fluid">
        <h1>Upcomming matches</h1>

        {{-- {{ var_dump($schedule) }} --}}

        @foreach ($schedule as $game)
            <div class="col-md-4">
                <div class="match" data-id="{{ $game->id }}">
                    <div class="sport">{{ $game->court->sport->name }}</div>
                    <div class="contenders">
                        Team A VS Team B
                    </div>
                    <div class="venue">{{ $game->court->name }} at {{ $game->start_time }}</div>
                </div>
            </div>
        @endforeach

    </div>
@stop
