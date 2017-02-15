@extends('layout')

@section('content')
    <div class="container">
        <a href="/"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>
        <h1>Import data</h1>

        {{ Form::open(array('url' => route('import.store'), 'method' => 'post', 'id' => 'formSport')) }}

			{{-- {{ Form::label('xml-file', 'Fichier XML :') }}
			{{ Form::file('xml', array('class' => 'form-control')) }} --}}

			{{ Form::button('Import', array('class' => 'btn btn-success formSend')) }}

		{{ Form::close() }}

    </div>
@stop
