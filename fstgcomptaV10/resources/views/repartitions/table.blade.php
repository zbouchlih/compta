                    <table class="table table-hover">

                        <thead>
                       
            <th>profil</th>
            <th>Budget de fonctionnement</th>
            <th>Budget d'investissement'</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($repartitions as $repartition)
                        <tr>
                           
            <td>{!! $repartition->name !!}</td>
            <td>{!! $repartition->budgetFonctionnement !!}</td>
            <td>{!! $repartition->budgetInvestissement !!}</td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('repartitions.show', [$repartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('repartitions.edit', [$repartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <!--a href="{!! route('repartitions.delete', [$repartition->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Repartition?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a-->
                                </div>
                            </td>
                        </tr>
                           <!--tr><td>prévisionnel : 10</td><td>initial: 40</td><td>modificatif: 50</td><td>prévisionnel : 10</td><td>initial: 40</td><td>modificatif: 50</td></tr-->
                           @endforeach
                           
                       
                        </tbody>
                    </table>
