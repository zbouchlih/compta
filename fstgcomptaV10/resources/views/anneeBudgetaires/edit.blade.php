@extends('template')

@section('content')

    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier Annee Budgetaire</div>
            <div class="panel-body">
   				 {!! Form::model($anneeBudgetaire, ['route' => ['anneeBudgetaires.update', $anneeBudgetaire->id], 'method' => 'patch']) !!}

        @include('anneeBudgetaires.fields')

        <!--- Submit Field --->
        <div class="col-md-12">
            {!! Form::submit('Modifier', ['class' => 'btn btn-standard']) !!}
        </div>

    {!! Form::close() !!}
</div>
</div>
<a href="javascript:history.back()" class="btn btn-standard btn-sm">
    			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
@endsection