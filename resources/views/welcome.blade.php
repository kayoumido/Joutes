@extends('layout')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
				<a href="{{ route('sports.index') }}" title="Voir tous les sports">
					<div class="tile">
						Sports
					</div>
				</a>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
				<a href="{{ route('teams.index') }}" title="Voir toutes les équipes">
					<div class="tile">
						Équipes
					</div>
				</a>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
				<a href="{{ route('courts.index') }}" title="Voir toutes les équipes">
					<div class="tile">
						Terrains
					</div>
				</a>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
				<div class="tile">
					Some text
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
				<div class="tile">
					Some text
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
				<div class="tile">
					Some text
				</div>
			</div>
		</div>
	</div>

@stop