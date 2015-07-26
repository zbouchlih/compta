                    <table class="table table-hover">

                        <thead>
                        <th>Role</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{!! $role->role !!}</td>
                            <td>
                                <div class="pull-right">
                                @if(in_array(7,Session::get('right_session')) )
                                     <a href="{!! route('roles.show', [$role->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span> Voir</a>
                                @endif
                                @if(in_array(8,Session::get('right_session')) )
                                     <a href="{!! route('roles.edit', [$role->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> Modifier</a>
                                @endif
                                @if(in_array(9,Session::get('right_session')) )
                                     <a href="{!! route('roles.delete', [$role->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Role?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span> Supprimer</a>
                                @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>