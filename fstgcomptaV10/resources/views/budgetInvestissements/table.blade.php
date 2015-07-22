                    <table class="table table-hover">

                        <thead>
                            <th>Idannee</th>
                        <th>Previsionnel</th>
			<th>Initial</th>
			<th>Modificatif</th>
            
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($budgetInvestissements as $budgetInvestissement)
                        <tr>
                              <td>{!! $budgetInvestissement->annee !!}</td>
                            <td>{!! $budgetInvestissement->previsionnel !!}</td>
			<td>{!! $budgetInvestissement->initial !!}</td>
			<td>{!! $budgetInvestissement->modificatif !!}</td>
          
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('budgetInvestissements.show', [$budgetInvestissement->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('budgetInvestissements.edit', [$budgetInvestissement->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('budgetInvestissements.delete', [$budgetInvestissement->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer BudgetInvestissement?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>