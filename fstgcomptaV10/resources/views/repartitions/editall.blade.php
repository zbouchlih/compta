@extends('template')

@section('content')
@if(in_array(23,Session::get('right_session')) )
    <script type="text/javascript">
        $(document).ready(function(){


            /*******************************test ?**previsionnel initial modificatif******/
            if({!!$budgets->where('idTypebudget',1)->first()->modificatif!!}!=0)
            {
              var totaleFon={!!$budgets->where('idTypebudget',1)->first()->modificatif!!};
              var totaleInv={!!$budgets->where('idTypebudget',2)->first()->modificatif!!};
            }
            else if({!!$budgets->where('idTypebudget',1)->first()->initial!!}!=0)
            {
              var totaleFon={!!$budgets->where('idTypebudget',1)->first()->initial!!};
              var totaleInv={!!$budgets->where('idTypebudget',2)->first()->initial!!};


            }
            else{
                var totaleFon={!!$budgets->where('idTypebudget',1)->first()->previsionnel!!};
                var totaleInv={!!$budgets->where('idTypebudget',2)->first()->previsionnel!!};
            }

            /******************************************************************************/

        $(".budget").keyup(function(){
                 var sommeInv=0;
                 var sommeFon=0;
                 $(".erreur-budget").empty();
                 $(".modifier").removeAttr("disabled");
                 $(".budget").each(function(){
                    var typebudget=parseInt($(this).attr('id'));
                    var budget=parseFloat($(this).val());
                    if(typebudget==1){
                        sommeFon+=budget;
                    }
                    else{
                        sommeInv+=budget;  
                    }
                 });

                var typebudget=parseInt($(this).attr('id'));
                  if(typebudget==1)
                  {
                    if(sommeFon>totaleFon){
                          $(this).after("<p class='erreur-budget'>Attention vous avez dépassé la valeur de Budget de fonctionnement.<br>Il rest seulement  <b>"+ (parseFloat($(this).val())+totaleFon-sommeFon)+" Dh </b></p>");
                          $(".modifier").attr("disabled","disabled");
                          $(".budget").not(this).attr("disabled","disabled");
                      }
                      else{
                        $(".budget").removeAttr("disabled");
                      }
                  }
                  if(typebudget==2)
                  {
                    if(sommeInv>totaleInv){
                       $(this).after("<p class='erreur-budget'>Attention vous avez dépassé la valeur de Budget d'investissement.<br>Il rest seulement  <b>"+ (parseFloat($(this).val())+totaleInv-sommeInv)+" Dh </b></p>");
                       $(".modifier").attr("disabled","disabled");
                       $(".budget").not(this).attr("disabled","disabled");
                    }
                    else{
                    $(".budget").removeAttr("disabled");
                    }
                  }
                 
           });
        });

    </script>

    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier la répartition</div>
            <div class="panel-body">     
                      {!! Form::open(['route' => ['repartitions.updateall', $idAnnee]]) !!}

                    <div class="col-md-12">
                        {!! Form::submit('Modifier', ['class' => 'btn btn-standard modifier']) !!}
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
                                <div class="h">
                                {!! Form::number('budget[]', $repartition->budget, ['class' => 'form-control budget','id'=>$repartition->budgett->typebudget->id]) !!}
                                </div>
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