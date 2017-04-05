@extends('barebone')

@section('content')
    <div class="container-fluid">
        <div class="schedule">
            @foreach ($schedule as $game)
                <div class="row">
                    <div class="match col-md-12" data-id="{{ $game->id }}">
                        <div class="info time col-md-3">{{ $game->start_time }}</div>
                        <div class="info venue col-md-1">A</div>
                        <div class="contenders col-md-6">
                            <div class="team-name">Team A</div>
                            <div class="team-name">Team B</div>
                        </div>
                        <div class="info sport col-md-2 text-right">
                            <i class="fa fa-apple" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/schedule.js') }}"></script>
@endsection
