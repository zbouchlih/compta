                    <table class="table table-hover">

                        <thead>
                        <th>Type</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($typebudgets as $typebudget)
                        <tr>
                            <td>{!! $typebudget->type !!}</td>
                            <td>
                                <div class="pull-right">
                             <!--   <a href="{!! route('typebudgets.show', [$typebudget->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a> -->

                                <a href="{!! route('typebudgets.edit', [$typebudget->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> Modifier</a>

                                <a href="{!! route('typebudgets.delete', [$typebudget->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer typebudget?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span> Supprimer</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>