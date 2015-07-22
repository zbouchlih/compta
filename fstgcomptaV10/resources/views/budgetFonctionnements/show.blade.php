@extends('template')

@section('content')

<div class="panel panel-default panel-model">
    <div class="panel-heading">Détails</div>
        <div class="panel-body">
            <div class="resultat">
                @include('budgetFonctionnements.show_fields')
            </div>
                   
        </div>
</div>
<a href="javascript:history.back()" class="btn btn-standard btn-sm">
    			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
@endsection