@extends('template')

@section('content')

    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier la répartition</div>
            <div class="panel-body">
   				 {!! Form::model($repartition, ['route' => ['repartitions.update', $repartition->id], 'method' => 'patch']) !!}




<div class="form-group col-md-6">
    {!! Form::label('budget', 'Budget:') !!}
    {!! Form::number('budget', null, ['class' => 'form-control']) !!}
</div>


        
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