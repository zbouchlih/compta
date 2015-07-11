                    <table class="table table-hover">

                        <thead>
                        <th>Nom</th>
			<th>Rôle</th>
			<th>Email Principal</th>
			
		
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{!! $user->firstName !!} {!! $user->lastName !!}</td>
			                <td>{!! $user->name !!}</td>
			                <td>{!! $user->email !!}</td>

			
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('users.show', [$user->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('users.edit', [$user->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('users.delete', [$user->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer l\'utilisateur {!! $user->firstName !!} {!! $user->lastName !!}?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>