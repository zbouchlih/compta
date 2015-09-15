

                            @if($etat!=-1)
                                <a href="{!! route('compterepartitions.creer', [$annee]) !!}" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une répartition
                                </a>
                            @else
                                Année fermée
                            @endif

                        <div class="margin20">
                            Votre Budget accordé<br>
                            Budget d'investissement: <b>{!!$repartitions->first()->budget!!} dh</b>
                                    reste avant engagement <b>{!!$repartitions->first()->budget - $resteCoInv!!} dh</b>
                                    reste après engagement <b>{!!$repartitions->first()->budget - $resteEngInv!!} dh</b><br/>
                            Budget de fonctionnement: <b>{!!$repartitions->last()->budget!!} dh</b>
                                    reste avant engagement <b>{!!$repartitions->last()->budget - $resteCoFon!!} dh</b>
                                    reste après engagement <b>{!!$repartitions->last()->budget - $resteEngFon!!} dh</b>

                        </div>
                       <table class="table table-hover">
                        <thead>
                        <th>Type de Budget</th>
                        <th>Compte</th>
                        <th>crédit ouvert</th>
                        <th>engagement</th>
                        <th>paiement</th>

                            <th></th>

                        </thead>

                        <tbody>
                        @foreach($compterepartitions as $compterepartition)
                        <tr>
                            <td>{!! $compterepartition->repartitions->budgett->typebudget->type !!}</td>
                            <td>{!! $compterepartition->comptes->compte !!}</td>
                            <td>{!! $compterepartition->credit_ouvert !!}</td>
                            <td>{!! $compterepartition->engagement !!}</td>
                            <td>{!! $compterepartition->paiement !!}</td>
                            <td>
                                <div class="pull-right">
                                <!--a href="{!! route('compterepartitions.show', [$compterepartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a-->
                                    @if($etat!=-1)
                                        <a href="{!! route('compterepartitions.edit', [$compterepartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> Modifier</a>

                                        <a href="{!! route('compterepartitions.delete', [$compterepartition->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer cette répartition?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span> Supprimer</a>
                                    @else
                                        Modification fermée
                                    @endif


                                <a href="{!! route('depenses.index', [$compterepartition->id,$etat]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-plus"  aria-hidden="true"></span> Dépense</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>