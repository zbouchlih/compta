                    <table class="table table-hover">

                        <thead>
                            <th>Annee</th>
                            <th>Type Budget</th>
                        <th>Previsionnel</th>
			<th>Initial</th>
			<th>Modificatif</th>
			
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($budgets as $budget)
                        <tr>
                            <td>{!! $budget->annee !!}</td>
                            <td>{!! $budget->type !!}</td>
                            <td>{!! $budget->previsionnel !!}</td>
			<td>{!! $budget->initial !!}</td>
			<td>{!! $budget->modificatif !!}</td>
			
                            <td>
                                <div class="pull-right">
                                <!--<a href="{!! route('budgets.show', [$budget->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span> Voir</a> -->
                                @if( $budget->etat == 1)
                                <a href="{!! route('budgets.edit', [$budget->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> Modifier</a>
                                @endif
                                <!-- <a href="{!! route('budgets.delete', [$budget->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Budget?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span> Supprimer</a> -->
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>