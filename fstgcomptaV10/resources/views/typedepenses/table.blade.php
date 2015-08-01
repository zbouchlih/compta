                    <table class="table table-hover">

                        <thead>
                        <th>Type</th>
			<th>Seuil</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($typedepenses as $typedepense)
                        <tr>
                            <td>{!! $typedepense->type !!}</td>
			<td>{!! $typedepense->seuil !!}</td>
                            <td>
                                <div class="pull-right">
                                <!--a href="{!! route('typedepenses.show', [$typedepense->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a-->

                                <a href="{!! route('typedepenses.edit', [$typedepense->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> Modifier</a>

                                <a href="{!! route('typedepenses.delete', [$typedepense->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer ce type?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span> Supprimer</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>