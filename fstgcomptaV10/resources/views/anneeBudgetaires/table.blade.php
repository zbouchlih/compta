                    <table class="table table-hover">

                        <thead>
                        <th>Année</th>
			<th>Etat</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($anneebudgetaires as $anneebudgetaire)
                        <tr>
                            <td>{!! $anneebudgetaire->annee !!}</td>
			<td>

@if($anneebudgetaire->etat == 1)
En cours
@elseif($anneebudgetaire->etat == -1)
Année Fermée
@else
Prochaine année
@endif


            </td>
                            <td>
                                <div class="pull-right">
                                    @if(in_array(16,Session::get('right_session')) )
                                        <!--a href="{!! route('anneebudgetaires.show', [$anneebudgetaire->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span> Voir</a-->
                                    @endif
                                    @if(in_array(17,Session::get('right_session')) )
                                        <a href="{!! route('anneebudgetaires.edit', [$anneebudgetaire->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> Modifier</a>
                                    @endif
                                    @if(in_array(18,Session::get('right_session')) )
                                        <!--a href="{!! route('anneebudgetaires.delete', [$anneebudgetaire->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer cette année budgétaire?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span> Supprimer</a-->
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>