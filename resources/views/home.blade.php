@extends('layout')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
				<a href="{{ route('sports.index') }}" title="Voir tous les sports">
					<div class="tile">
						Sports
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
				<a href="{{ route('courts.index') }}" title="Voir tous les terrains">
					<div class="tile">
						Terrains
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
				<a href="{{ route('tournaments.index') }}" title="Voir tous les tournois">
					<div class="tile">
						Tournois
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
				<a href="{{ route('teams.index') }}" title="Voir toutes les équipes">
					<div class="tile">
						Équipes
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
				<a href="{{ route('participants.index') }}" title="Voir toutes les participants">
					<div class="tile">
						Participants
					</div>
				</a>
			</div>
		</div>
	</div>

@stop