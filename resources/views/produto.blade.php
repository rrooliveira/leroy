<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">

    <title>Teste de Importa&ccedil;&atilde;o - Leroy Merlyn</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
        padding: 5%
    }
</style>
</head>
<body>
    <div class="container">
    	<div class="row">
        	<div class="col-12">
        		<h2><strong>Dados Desenvolvedor</strong></h2>
        		<h5><strong>Rodrigo Ruy Oliveira</strong></h5>
        		<h5><strong>(11) 98209-5120</strong></h5>
        		<h5><strong><a href="mailto:rro.oliveira@gmail.com">rro.oliveira@gmail.com</a></strong></h5>   		
        	</div>
        </div>
 
        <h2 class="text-center">
            <strong>Teste de Importa&ccedil;&atilde;o - Leroy Merlyn</strong>
        </h2>

        @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
          	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            	<span aria-hidden="true">×</span>
            	<span class="sr-only">Close</span>
        	</button>
        	<strong>{{ Session::get('success') }}</strong>
    	</div>
		@endif

	    @if ( Session::has('error') )
	    <div class="alert alert-danger alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">×</span>
	            <span class="sr-only">Close</span>
	        </button>
	        <strong>{{ Session::get('error') }}</strong>
	    </div>
	    @endif

	    @if (count($errors) > 0)
	    <div class="alert alert-danger">
	      	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	      	<div>
		        @foreach ($errors->all() as $error)
		        <p>{{ $error }}</p>
		        @endforeach
	    	</div>
		</div>
		@endif

		<form action="{{ route('importar') }}" method="POST" enctype="multipart/form-data">
		    {{ csrf_field() }}
		    Selecione o arquivo (xlsx, xls ou csv) : <input type="file" name="file" class="form-control">
		
		    <input type="submit" value="Importar Arquivo" class="btn btn-primary btn-lg" style="margin-top: 3%">
		    <a class="btn btn-primary btn-lg" style="margin-top: 3%" href="/listar" role="button">Listar Produtos</a>
		</form>
	</div>
</body>
</html>