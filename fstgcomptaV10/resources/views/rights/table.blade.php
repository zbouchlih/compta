                    <table class="table table-hover">

                        <thead>
                        <th>Droit</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($rights as $right)
                        <tr>
                            <td>{!! $right->right !!}</td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('rights.show', [$right->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('rights.edit', [$right->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('rights.delete', [$right->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Right?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>