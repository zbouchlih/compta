@extends('template')

@section('content')
@if(in_array(25,Session::get('right_session')) )
@include('flash::message')
<script type="text/javascript">
    $(document).ready(function(){

        $(".select-type").change(function () {
            var idTypebudget=$('.select-type option:selected').val();
            $(".ajax-table").html('<div class="ajax-image"><img src="{{ url('images/ajax3.GIF') }}" lt=""/><div>');
            $.ajax({
                url:'{{URL::to("indexajaxcomptes")}}',
                dataType:'json',
                type:'get',
                data:{idTypebudget:idTypebudget},
                beforeSend: function(){

                },success: function(data)
                {
                    $(".ajax-table").html(data);
                },error: function(data)
                {
                    alert("Probleme serveur FSTG!!");
                }
            });
        });

    })
</script>
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des comptes</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4">

                            @if(in_array(26,Session::get('right_session')) )
                                <a href="{!! route('comptes.create') !!}" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un compte
                                </a>
                            @endif
                        </div>

                        <!--div class="col-md-offset-4 col-md-4">

                            <form class="form-inline pull-right">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Recherche">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-standard btn-sm">OK</button>
                            </form>

                        </div-->
                    </div>
                    <div class="resultat">
                     @if($comptes->isEmpty())

                        <div class="well text-center">Aucun compte trouvé.</div>

                     @else
                        </br>
                        <div >
                            {!! Form::select('idTypebudget',$typebudgets, $idTypebudget, ['class' => 'form-control select-type']) !!}
                        </div>
                        <div class="ajax-table">
                            @include('comptes.table')
                        </div>

                     @endif
                   
                    </div>
                    <div class="align-center">{!! $links !!}</div>
                </div>
            </div>
@else
    <div style="margin-left: 300px">
        <img src="{{ url('images/acces-interdit.jpg')}}" alt="Acces interdit"/>
    </div>

@endif
@endsection
             