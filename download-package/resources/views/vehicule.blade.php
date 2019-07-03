{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('immat_vehi', 'Immat_vehi:') !!}
			{!! Form::text('immat_vehi') !!}
		</li>
		<li>
			{!! Form::label('marque_vehi', 'Marque_vehi:') !!}
			{!! Form::text('marque_vehi') !!}
		</li>
		<li>
			{!! Form::label('model', 'Model:') !!}
			{!! Form::text('model') !!}
		</li>
		<li>
			{!! Form::label('nbrPlace_vehi', 'NbrPlace_vehi:') !!}
			{!! Form::text('nbrPlace_vehi') !!}
		</li>
		<li>
			{!! Form::label('vitesseMax', 'VitesseMax:') !!}
			{!! Form::text('vitesseMax') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}