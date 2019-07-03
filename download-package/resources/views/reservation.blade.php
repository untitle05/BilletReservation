{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('date_reserv', 'Date_reserv:') !!}
			{!! Form::text('date_reserv') !!}
		</li>
		<li>
			{!! Form::label('nbrPlace_reserv', 'NbrPlace_reserv:') !!}
			{!! Form::text('nbrPlace_reserv') !!}
		</li>
		<li>
			{!! Form::label('etat_reserv', 'Etat_reserv:') !!}
			{!! Form::text('etat_reserv') !!}
		</li>
		<li>
			{!! Form::label('voyage_id', 'Voyage_id:') !!}
			{!! Form::text('voyage_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}