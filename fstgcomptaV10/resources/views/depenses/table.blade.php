                    <table class="table table-hover">

                        <thead>
                        
			<th>Type de dépense</th>
			<th>Détails</th>
            <th>Valeur</th>
            <th>Etat</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($depenses as $depense)
                        <tr>
                         
                            <td>{!! $depense->typedepense->type !!}</td>
                            <td>{!! $depense->details !!}</td>
                            <td>{!! $depense->valeur !!}</td>
                            <td>
                                @if($depense->etat == -1) refusée @endif
                                @if($depense->etat == 0) Pas encore consultée @endif
                                @if($depense->etat == 1) En cours de traitement @endif
                                @if($depense->etat == 2) Validée @endif
                            </td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('depenses.show', [$depense->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>
                                    @if($etat!=-1)
                                        <a href="{!! route('depenses.edit', [$depense->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                        <a href="{!! route('depenses.delete', [$depense->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Depense?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                    @else
                                        Modification fermée
                                    @endif

                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
