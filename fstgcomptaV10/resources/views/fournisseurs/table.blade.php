                    <table class="table table-hover">

                        <thead>
                        <th>Nom</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($fournisseurs as $fournisseur)
                        <tr>
                            <td>{!! $fournisseur->nom !!}</td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('fournisseurs.show', [$fournisseur->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('fournisseurs.edit', [$fournisseur->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('fournisseurs.delete', [$fournisseur->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Fournisseur?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>