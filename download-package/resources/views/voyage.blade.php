{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('dateDep_voy', 'DateDep_voy:') !!}
			{!! Form::text('dateDep_voy') !!}
		</li>
		<li>
			{!! Form::label('dateArrv_voy', 'DateArrv_voy:') !!}
			{!! Form::text('dateArrv_voy') !!}
		</li>
		<li>
			{!! Form::label('frais', 'Frais:') !!}
			{!! Form::text('frais') !!}
		</li>
		<li>
			{!! Form::label('nbrPlace_voy', 'NbrPlace_voy:') !!}
			{!! Form::text('nbrPlace_voy') !!}
		</li>
		<li>
			{!! Form::label('id_vehicule', 'Id_vehicule:') !!}
			{!! Form::text('id_vehicule') !!}
		</li>
		<li>
			{!! Form::label('id_destination', 'Id_destination:') !!}
			{!! Form::text('id_destination') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}