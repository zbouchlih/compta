@extends('template')

@section('content')

    @include('flash::message')

    <div class="panel panel-default panel-model">
        <div class="panel-heading">Liste des répartitons par compte</div>
        <div class="panel-body">
            <div class="resultat">


                    <div class="ajax-table">

                        <table class="table table-hover">
                            <thead>
                            <th>Type de Budget</th>
                            <th>Compte</th>
                            <th>crédit ouvert</th>
                            <th>engagement</th>
                            <th>paiement</th>

                            <th></th>

                            </thead>

                            <tbody>
                            @foreach($compterepartitions as $compterepartition)
                                <tr>
                                    <td>{!! $compterepartition->repartitions->budgett->typebudget->type !!}</td>
                                    <td>{!! $compterepartition->comptes->compte !!}</td>
                                    <td>{!! $compterepartition->credit_ouvert !!}</td>
                                    <td>{!! $compterepartition->engagement !!}</td>
                                    <td>{!! $compterepartition->paiement !!}</td>
                                    <td>
                                        <div class="pull-right">
                                            <!--a href="{!! route('compterepartitions.show', [$compterepartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open"  aria-hidden="true"></span></a-->
                                            @if(in_array(31,Session::get('right_session')) )
                                            @else

                                                <a href="{!! route('compterepartitions.edit', [$compterepartition->id]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> Modifier</a>

                                                <a href="{!! route('compterepartitions.delete', [$compterepartition->id]) !!}" onclick="return confirm('Etes-vous sur de vouloir supprimer cette répartition?')" class="btn btn-danger btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span> Supprimer</a>

                                            @endif

                                            <a href="{!! route('depenses.index', [$compterepartition->id,1]) !!}" class="btn btn-default btn-xs" aria-label="Left Align"><span class="glyphicon glyphicon-plus"  aria-hidden="true"></span> Dépense</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

            </div>
            {{--<div class="align-center">{!! $links !!}</div>--}}
        </div>
    </div>
@endsection
