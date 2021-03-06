@extends('template')

@section('content')

    @include('common.errors')

    <div class="panel panel-default panel-model">
                <div class="panel-heading">Ajouter un nouveau Fournisseur</div>
                <div class="panel-body">
   					{!! Form::open(['route' => 'fournisseurs.store']) !!}
     				   @include('fournisseurs.fields')
     				   <!--- Submit Field --->
                       <div class="col-md-12">
                           {!! Form::submit('Ajouter', ['class' => 'btn btn-standard']) !!}
                       </div>
    				{!! Form::close() !!}
				</div>
	</div>
	<a href="javascript:history.back()" class="btn btn-standard btn-sm">
    			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
@endsection