@extends('template')

@section('content')

    @include('common.errors')
    <div class="panel panel-default panel-model">
        <div class="panel-heading">Modifier rôle</div>
            <div class="panel-body">
   				 {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}

       <div class="form-group col-md-1">
    {!! Form::label('role', 'Role:') !!}
    {!! Form::text('role', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-11">
     <?php var_dump($role->getRightListAttribute()->toArray()); ?>

     @foreach($rights as $right)
      <?php $checked = in_array($right->id, $role->getRightListAttribute()->toArray()) ?1:0;?>
      <?php 

      if ( is_null($checked) ) 
        {$checked = $this->checkable('checkbox','rights', $right->id, $checked,$option);}
    
    echo $checked;
    ?>
        {!! Form::label('droit', $right->right) !!} 
        {!! Form::checkbox('rights[]', $right->id,$checked) !!}
     @endforeach
</div>

        
        <div class="col-md-12">
            {!! Form::submit('Modifier', ['class' => 'btn btn-standard']) !!}
        </div>

    {!! Form::close() !!}
</div>
</div>
<a href="javascript:history.back()" class="btn btn-standard btn-sm">
    			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
@endsection