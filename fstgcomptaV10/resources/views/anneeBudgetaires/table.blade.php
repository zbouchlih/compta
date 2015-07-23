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
@else

@endif


            </td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('anneebudgetaires.show', [$anneebudgetaire->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('anneebudgetaires.edit', [$anneebudgetaire->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('anneebudgetaires.delete', [$anneebudgetaire->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Anneebudgetaire?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>