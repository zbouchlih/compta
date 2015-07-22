                    <table class="table table-hover">

                        <thead>
                        <th>Année</th>
			<th>Etat</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($anneeBudgetaires as $anneeBudgetaire)
                        <tr>
                            <td>{!! $anneeBudgetaire->annee !!}</td>
			<td>

@if($anneeBudgetaire->etat == 1)
En cours
@else

@endif


            </td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('anneeBudgetaires.show', [$anneeBudgetaire->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('anneeBudgetaires.edit', [$anneeBudgetaire->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('anneeBudgetaires.delete', [$anneeBudgetaire->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer AnneeBudgetaire?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>