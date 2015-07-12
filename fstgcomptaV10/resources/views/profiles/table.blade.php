                    <table class="table table-hover">

                        <thead>
                        <th>Name</th>
			<th>Role</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($profiles as $profile)
                        <tr>
                            <td>{!! $profile->name !!}</td>
			<td>{!! $profile->role !!}</td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('profiles.show', [$profile->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>

                                <a href="{!! route('profiles.edit', [$profile->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                <a href="{!! route('profiles.delete', [$profile->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer profile?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>