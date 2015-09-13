@extends('template')

@section('content')

@include('flash::message')
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $(".select-annee").change(function () {
            var idAnnee=$('.select-annee option:selected').val();
            $.ajax({
                url:'{{URL::to("indexajax")}}',
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
                <div class="panel-heading">Liste des répartitons par compte</div>
                <div class="panel-body">
                    <div class="resultat">
                         @if($compterepartitions->isEmpty())
                            <div class="well text-center">Pas de répartitions trouvé.</div>
                         @else
                             <div class="row">
                                <div class="form-group col-md-2">
                                    {!! Form::select('idAnnee',$annees, $idAnnee, ['class' => 'form-control select-annee']) !!}
                                </div>
                             </div>
                             <div class="ajax-table">
                                @include('compterepartitions.table')
                             </div>
                         @endif
                    </div>
                    <div class="align-center">{!! $links !!}</div>
                </div>
            </div>
@endsection
             