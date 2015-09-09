@extends('template')

@section('content')
@if(in_array(22,Session::get('right_session')) )
@include('flash::message')

<script type="text/javascript">
    
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
                    @if(in_array(23,Session::get('right_session')) )
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{!! route('repartitions.editall', [$idAnnee]) !!}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Modifier les répartitions
                            </a>
                        </div>
                        <div class="col-md-offset-6 col-md-2">
                        <div class="btn-group">
                            <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i>Enregistrer en </button>
                            <ul class="dropdown-menu " role="menu">
                                <!--li><a href="#" onClick ="$('#customers').tableExport({type:'json',escape:'false'});"> <img src='images/icons/json.png' width='24px'> JSON</a></li>
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"> <img src='images/icons/json.png' width='24px'> JSON (ignoreColumn)</a></li>
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'json',escape:'true'});"> <img src='images/icons/json.png' width='24px'> JSON (with Escape)</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'xml',escape:'false'});"> <img src='images/icons/xml.png' width='24px'> XML</a></li>
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'sql'});"> <img src='images/icons/sql.png' width='24px'> SQL</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'csv',escape:'false'});"> <img src='images/icons/csv.png' width='24px'> CSV</a></li>
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'txt',escape:'false'});"> <img src='images/icons/txt.png' width='24px'> TXT</a></li>
                                <li class="divider"></li-->               
                                
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'excel',escape:'false'});"> <img src='images/icons/xls.png' width='24px'> Excel</a></li>
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'doc',escape:'false',tableName:'Repartitions-par-Profile'});"> <img src='images/icons/word.png' width='24px'> Word</a></li>
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src='images/icons/pdf.png' width='24px'> PDF</a></li> 
                                <!--li><a href="#" onClick ="$('#customers').tableExport({type:'powerpoint',escape:'false'});"> <img src='images/icons/ppt.png' width='24px'> PowerPoint</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onClick ="$('#customers').tableExport({type:'png',escape:'false'});"> <img src='images/icons/png.png' width='24px'> PNG</a></li-->
                                
                            </ul>
                         </div>  
                    </div>
                    </div>

                    @endif
                    <div class="resultat">
                     @if($repartitions->isEmpty())
                        <div class="well text-center">Aucune répartition trouvée.</div>
                     @else

                    <div class="form-group col-md-2 margine-div">

                         {!! Form::open(['route' => ['repartitions.index'], 'method' => 'get']) !!}
                            {!! Form::select('idAnnee',$annees, $idAnnee, ['class' => 'form-control']) !!}
                            {!! Form::submit('Afficher', ['class' => 'btn btn-standard']) !!}
                         {!! Form::close() !!} 
                
                    </div>
          
                    <br> <br> <br> <br>
                  <div>
                    @foreach($budgets as $budget)
                        {!! $budget->typebudget->type !!}, previsionnel  : {!! $budget->previsionnel !!}, initial : {!! $budget->initial !!}, modificatif : {!! $budget->modificatif !!}
                        <br>
                    @endforeach
                  </div>
                        @include('repartitions.table')
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
             