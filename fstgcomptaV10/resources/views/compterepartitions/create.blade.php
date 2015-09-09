@extends('template')

@section('content')

    @include('common.errors')
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $(".Type_budget").change(function () {
                var id_type=$('.Type_budget option:selected').val();
                $.ajax({
                    url:'{{URL::to("compterepartitions/storeAjax")}}',
                    dataType:'json',
                    type:'post',
                    data:{id_type:id_type,_token:'{!! csrf_token() !!}',compte_id:0,credit_ouvert:0},
                    beforeSend: function(){
                        $(".type_Compte").find('option').remove();
                        $(".type_Compte").append('<option>loading...</option>');
                    },success: function(data)
                    {
//                        $('.Compte11 option[value!="0"]').remove();
                        $(".type_Compte").find('option').remove();
                        $.each(data,function(key, value)
                        {
                            $(".type_Compte").append('<option value=' + key + '>' + value + '</option>');
                        });
                    },error: function(data)
                    {
                        alert(data);
                    }
                });
            });

        })
    </script>
    </select>

    <div class="panel panel-default panel-model">
                <div class="panel-heading">Ajouter une nouvelle répartition par compte</div>
                <div class="panel-body">
   					{!! Form::open(['route' => 'compterepartitions.store']) !!}
     				   @include('compterepartitions.fields')
                       <div class="col-md-12">
                           {!! Form::submit('Ajouter', ['class' => 'btn btn-standard']) !!}
                       </div>
    				{!! Form::close() !!}
				</div>
	</div>
	<a href="javascript:history.back()" class="btn btn-standard btn-sm">
    			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
@endsection