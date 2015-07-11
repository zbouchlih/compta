                    <table class="table table-hover">

                        <thead>
                        <th>Name</th>
			<th>Access</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{!! $role->name !!}</td>
			<td>
 @if($role->access==0)
                        Administrateur
                     @elseif($role->access==1)
                        Administrateur-adjoint
                         @elseif($role->access==2)
                            Responsable

                          @elseif($role->access==3)
                          Consultant

                          @else
                          Aucun

                     @endif

               




            </td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('roles.show', [$role->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('roles.edit', [$role->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('roles.delete', [$role->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Role?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>