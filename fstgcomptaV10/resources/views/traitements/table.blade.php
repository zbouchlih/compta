                    <table class="table table-hover">

                        <thead>
                        <th>Profils</th>
                        
                            <th></th>
                        
                        </thead>

                        <tbody>
                        @foreach($profiles as $profile)
                        <tr>
                            <td>{!! $profile->name !!}</td>
                            <td>
                                <div class="pull-right">
                                <a href="{!! route('traitements.edit', [$profile->id,$annee]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>

                                {{--<a href="{!! route('traitements.edit', [$traitement->id]) !!}" class="btn btn-default btn-xs" aria-l{abel="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span></a>--}}

                                {{--<a href="{!! route('traitements.delete', [$traitement->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer Traitement?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a>--}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>