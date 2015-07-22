                    <table class="table table-hover">

                        <thead>
                        <th>Budget</th>
            <th>type de budget</th>
                        
                        <th>Valeur</th>
                            <th></th>
                        
                        </thead>

                        <tbody>
                     @foreach($budgetFonctionnements as $budgetFonctionnement)

                        <tr>
                            <td rowspan="3">Budget de Fonctionnement</td>
            <td>prévisionnel</td>
            <td>{!! $budgetFonctionnement->previsionnel !!}</td>
                            <td rowspan="3">
                                <div class="pull-right">
                                <a href="{!! route('budgetFonctionnements.show', [$budgetFonctionnement->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('budgetFonctionnements.edit', [$budgetFonctionnement->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                
                                </div>
                            </td>
                        </tr>
                        <tr>
                            
            <td>initial</td>
            <td>{!! $budgetFonctionnement->initial !!}</td>

                        </tr>
                        <tr>
                            
            <td>modificatif</td>
            <td>{!! $budgetFonctionnement->modificatif !!}</td>
                        </tr>
             @endForeach
                            <tr>

                      @foreach($budgetInvestissements as $budgetInvestissement)
                  
                    
                            <td rowspan="3">Budget d'investissement</td>
            <td>prévisionnel</td>
            <td>{!! $budgetInvestissement->previsionnel !!}</td>
                            <td rowspan="3">
                                <div class="pull-right">
                                <a href="{!! route('budgetInvestissements.show', [$budgetInvestissement->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('budgetInvestissements.edit', [$budgetInvestissement->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                
                                </div>
                            </td>
                        </tr>
                        <tr>
                            
            <td>initial</td>
            <td>{!! $budgetInvestissement->initial !!}</td>
                        </tr>
                        <tr>
                            
            <td>modificatif</td>
            <td>{!! $budgetInvestissement->modificatif !!}</td>
                        </tr>
                   @endForeach
                        </tbody>
                    </table> 

                    <!--table class="table table-hover">

                        <thead>
                        <th>Budget</th>
			<th>Idannee</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($budgetInitials as $budgetInitial)
                        <tr>
                            <td>{!! $budgetInitial->budget !!}</td>
			<td>{!! $budgetInitial->idAnnee !!}</td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('budgetInitials.show', [$budgetInitial->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('budgetInitials.edit', [$budgetInitial->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('budgetInitials.delete', [$budgetInitial->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer BudgetInitial?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table-->