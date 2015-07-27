@extends('template')

@section('content')
 @if(in_array(14,Session::get('right_session')) )
    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier type de budget</div>
            <div class="panel-body">
   				 {!! Form::model($typebudget, ['route' => ['typebudgets.update', $typebudget->id], 'method' => 'patch']) !!}

        @include('typebudgets.fields')

       
        <div class="col-md-12">
            {!! Form::submit('Modifier', ['class' => 'btn btn-standard']) !!}
        </div>

    {!! Form::close() !!}
</div>
</div>
<a href="javascript:history.back()" class="btn btn-standard btn-sm">
    			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
     @else
        <div style="margin-left: 300px">
            <img src="{{ url('images/acces-interdit.jpg')}}" alt="Acces interdit"/>
        </div>

    @endif
@endsection