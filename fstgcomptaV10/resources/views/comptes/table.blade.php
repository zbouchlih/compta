                    <table class="table table-hover">

                        <thead>
                        <th>Numero</th>
			<th>Compte</th>
			
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($comptes as $compte)
                        <tr>
                            <td>{!! $compte->numero !!}</td>
			<td>{!! $compte->compte !!}</td>
			
                            <td>
                                <div class="pull-right">
                                <!--a href="{!! route('comptes.show', [$compte->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a-->

                                @if(in_array(26,Session::get('right_session')) )
                                  <a href="{!! route('comptes.edit', [$compte->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>
                                @endif
                                @if(in_array(27,Session::get('right_session')) )
                                <a href="{!! route('comptes.delete', [$compte->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Compte?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>