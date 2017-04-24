@extends('barebone')

@section('content')
    <div class="container-fluid">
        <div class="schedule">
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/schedule.js') }}"></script>
@endsection
