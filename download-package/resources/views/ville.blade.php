{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
	<li>
		{!! Form::label('destination_name', 'Nom_destination:') !!}
		{!! Form::text('destination_name') !!}
	</li>
	<li>
		{!! Form::submit() !!}
	</li>
</ul>
{!! Form::close() !!}