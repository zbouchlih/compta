@extends('template')

@section('content')
@if(in_array(22,Session::get('right_session')) )
@include('flash::message')

<script type="text/javascript">
    $(document).ready(function(){
        $(".select-annee").change(function () {
            var idAnnee=$('.select-annee option:selected').val();
            $(".ajax-table").html('<div class="ajax-image"><img src="{{ url('images/ajax3.GIF') }}" lt=""/><div>');
            $.ajax({
                url:'{{URL::to("indexajaxRepartition")}}',
                dataType:'json',
                type:'get',
                data:{idAnnee:idAnnee},
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
                <div class="panel-heading">Liste des répartitions</div>
                <div class="panel-body">

                    <!--div class="row">
                        <div class="col-md-4">
                            <a href="{!! route('repartitions.create') !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Repartition
                            </a>
                        </div>

                        <div class="col-md-offset-4 col-md-4">

                            <form class="form-inline pull-right">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Recherche">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-standard btn-sm">OK</button>
                            </form>

                        </div>
                    </div-->

                    <div class="resultat">
                     @if($repartitions->isEmpty())
                        <div class="well text-center">Aucune répartition trouvée.</div>
                     @else
                            <div class="row">
                                <div class="form-group col-md-2">
                                    {!! Form::select('idAnnee',$annees, $idAnnee, ['class' => 'form-control select-annee']) !!}
                                </div>
                            </div>
                            <div class="ajax-table">
                                @include('repartitions.table')
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
             