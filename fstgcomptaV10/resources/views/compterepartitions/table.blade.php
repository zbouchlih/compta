                    <table class="table table-hover">

                        <thead>
                        <th>Type de Budget</th>
			<th>Compte</th>
			<th>Valeur</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($compterepartitions as $compterepartition)
                        <tr>
                            <td>{!! $compterepartition->repartitions->budgett->typebudget->type !!}</td>
			<td>{!! $compterepartition->comptes->compte !!}</td>
			<td>{!! $compterepartition->valeur !!}</td>
                            <td>
                                <div class="pull-right">
                                <!--a href="{!! route('compterepartitions.show', [$compterepartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a-->

                                <a href="{!! route('compterepartitions.edit', [$compterepartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('compterepartitions.delete', [$compterepartition->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Compterepartition?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>