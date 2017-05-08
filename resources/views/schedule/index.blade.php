@extends('barebone')

@section('content')
    <div class="container-fluid">
        <div class="schedule" data-tournament="{{ $tournament->id }}">
            <div class="row">
                <div class="header col-md-12">
                    <div class="info time col-md-2">Heure</div>
                    <div class="info venue col-md-2">Terrain</div>
                    <div class="info contenders col-md-6">Equipes</div>
                    <div class="info sport col-md-2">{{ $tournament->sport->name }}</div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/class/schedule.js') }}"></script>
    <script src="{{ asset('js/schedule.js') }}"></script>
@endsection
