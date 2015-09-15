@extends('template')

@section('content')
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $(".select-annee").change(function () {
                var idAnnee=$('.select-annee option:selected').val();
                $(".ajax-table").html('<div class="ajax-image"><img src="{{ url('images/ajax3.GIF') }}" lt=""/><div>');
                $.ajax({
                    url:'{{URL::to("indexajaxTraitements")}}',
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

@include('flash::message')
<div class="panel panel-default panel-model">
                <div class="panel-heading">Liste des Traitements</div>
                <div class="panel-body">

                    <div class="row">



                    </div>
                    <div class="resultat">
                        <div class="row">
                            <div class="form-group col-md-2">
                                {!! Form::select('idAnnee',$annees,$annee, ['class' => 'form-control select-annee']) !!}
                            </div>
                        </div>
                        <div class="ajax-table">
                            @include('traitements.table')
                        </div>
                    </div>
                    <div class="align-center">{!! $links !!}</div>
                </div>
            </div>
@endsection
             