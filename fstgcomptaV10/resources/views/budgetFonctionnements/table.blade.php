                    <table class="table table-hover">

                        <thead>
                            <th>Idannee</th>
                        <th>Previsionnel</th>
			<th>Initial</th>
			<th>Modificatif</th>
			
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($budgetFonctionnements as $budgetFonctionnement)
                        <tr>
                            <td>{!! $budgetFonctionnement->annee !!}</td>
                            <td>{!! $budgetFonctionnement->previsionnel !!}</td>
			<td>{!! $budgetFonctionnement->initial !!}</td>
			<td>{!! $budgetFonctionnement->modificatif !!}</td>
			
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('budgetFonctionnements.show', [$budgetFonctionnement->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('budgetFonctionnements.edit', [$budgetFonctionnement->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('budgetFonctionnements.delete', [$budgetFonctionnement->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer BudgetFonctionnement?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>