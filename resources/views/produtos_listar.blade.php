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
 		<div class="row">
        	<div class="col-12">
		        <h2 class="text-center">
		            <strong>Teste de Importa&ccedil;&atilde;o - Leroy Merlyn</strong>
		        </h2>
	        </div>
        </div>
        <div class="row">
        	<div class="col-12 text-center">
		        <table class="table table-striped">
		        	<thead>
		        		<tr>
		        			<th>C&oacute;digo</th>
		        			<th>Produto</th>
		        			<th>Frete Gr&aacute;tis</th>
		        			<th>Descri&ccedil;&atilde;o</th>
		        			<th>Pre&ccedil;o</th>
		        			<th>A&ccedil;&otilde;es</th>
		        		</tr>
		        	</thead>
		        	<tbody>
			        @foreach ($produtos as $produto)
			        	<tr>
			        		<td>{{ $produto->lm }}</td>
			        		<td>{{ $produto->name }}</td>
			        		<td>{{ $produto->free_shipping == 1 ? 'SIM' : utf8_encode('NÃO') }}</td>
			        		<td>{{ $produto->description }}</td>
			        		<td>R$ {{ number_format($produto->price,2,',','.') }}</td>
			        		<td>Editar | Excluir</td>
			        	</tr>
			        @endforeach
		        	</tbody>
		      	</table>
	      	</div>
      	</div>
	</div>
</body>
</html>