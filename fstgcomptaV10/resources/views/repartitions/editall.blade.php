@extends('template')

@section('content')
@if(in_array(23,Session::get('right_session')) )
    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier la répartition</div>
            <div class="panel-body">     
                      {!! Form::open(['route' => ['repartitions.updateall', $idAnnee]]) !!}

                    <div class="col-md-12">
                        {!! Form::submit('Modifier', ['class' => 'btn btn-standard']) !!}
                    </div>

     
               <table class="table table-hover">
                        <thead>
                            <th>Profil</th>
                            <th>Type de budget</th>            
                            <th>Budget</th>    
                            
                        </thead>

                        <tbody>
                        @foreach($repartitions as $repartition)
                        <tr>
                            <td class='hidden'> {!! Form::number('id[]', $repartition->id, ['class' => 'form-control']) !!}</td>
                            <td>{!! $repartition->profile->name !!}</td>
                            
                            <td>{!! $repartition->budgett->typebudget->type !!}</td>
                            <td>
                                {!! Form::number('budget[]', $repartition->budget, ['class' => 'form-control']) !!}
                            </td>
                        </tr>
                           <!--tr><td>prévisionnel : 10</td><td>initial: 40</td><td>modificatif: 50</td><td>prévisionnel : 10</td><td>initial: 40</td><td>modificatif: 50</td></tr-->
                        @endforeach
                        </tbody>
                    </table>
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