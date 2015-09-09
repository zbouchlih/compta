                    @if(in_array(23,Session::get('right_session')) )
                        <div class="row">
                            <div class="col-md-4">
                                @if($etat!=-1)
                                    <a href="{!! route('repartitions.editall', [$idAnnee]) !!}" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Modifier les répartitions
                                    </a>
                                @else
                                    Modification fermée
                                @endif
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



                    <br> <br> <br> <br>
                    <div>
                        Budget de fonctionnement, Actuel  : <b>{!!$actuelFon!!} Dh</b> Reste : {!!$restFon!!} dh<br>
                        Budget d'investissement , Actuel  : <b>{!!$actuelInv!!} Dh</b> Reste : {!!$restInv!!} dh
                        <br>
                    </div>

                    <table class="table table-hover" id="customers">

                        <thead>
                            <th>Profil</th>
                            <th>Type de budget</th>            
                            <th>Budget</th>
                            <th></th>
                        </thead>

                        <tbody>
                        @foreach($repartitions as $repartition)
                        <tr>
                            <td>{!! $repartition->profile->name !!}</td>
                            <td>{!! $repartition->budgett->typebudget->type !!}</td>
                            <td>{!! $repartition->budget!!}</td>
                            <!--td>
                                <div class="pull-right">
                                <a href="{!! route('repartitions.show', [$repartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>
                                @if($repartition->budgett->anneebudgetaire->etat!=-1)
                                    @if(in_array(23,Session::get('right_session')) )
                                       <a href="{!! route('repartitions.edit', [$repartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> Modifier</a>
                                    @endif
                                @else
                                Modification fermée
                                @endif
                                <a href="{!! route('repartitions.delete', [$repartition->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Repartition?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td-->
                        </tr>
                           <!--tr><td>prévisionnel : 10</td><td>initial: 40</td><td>modificatif: 50</td><td>prévisionnel : 10</td><td>initial: 40</td><td>modificatif: 50</td></tr-->
                        @endforeach
                        </tbody>
                    </table>
