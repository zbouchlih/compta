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

                                    @if(in_array(10,Session::get('right_session')) )
                                      <a href="{!! route('rights.show', [$right->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a>
                                    @endif
                                    @if(in_array(11,Session::get('right_session')) )
                                      <a href="{!! route('rights.edit', [$right->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>
                                    @endif
                                    @if(in_array(12,Session::get('right_session')) )
                                      <a href="{!! route('rights.delete', [$right->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Right?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>