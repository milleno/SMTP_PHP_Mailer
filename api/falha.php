<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Teste de API - SMTP Locaweb</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">		
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		
		<div class="page-header alert alert-danger smtplw-header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-1 text-center smtplw-banner">
						<i class="fa fa-server fa-5x"></i>
					</div>
					<div class="col-xs-4">
						<h1>SMTP Locaweb</h1>
						<p class="lead">API</p>
					</div>
				</div>
			</div>
		</div>
			
		<br />
		<br />
		<br />
		<div class="container-fluid">

			<!--div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<blockquote class="text-primary">O bounce não será exibido, pois para isso é necessário configurar o Webhook.</blockquote>
				</div>
				<div class="col-sm-2"></div>
			</div-->

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-6">
					<div class="jumbotron">
						<?php 
							echo '<h3><i class="fa fa-times fa-1x"></i>&nbsp;&nbsp;Ocorreu o seguinte erro na conexão:</h3><br />';
							echo '<span class="text-danger smtplw-error">' . $_SESSION['erroSMTP'] . '</span><br /><br />';
							echo '<span class="text-default">Veja o significado <a href="http://developer.locaweb.com.br/documentacoes/smtp/api-envio-de-mensagens/" target="_blank">clicando aqui.</a></span>';
							$_SESSION['erroSMTP'] = array();
							session_destroy();
						 ?>
					</div>
				</div>
				<div class="col-sm-2"></div>
			</div>
						
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">
					<a href="." class="text-default" onclick="history.go(-1);return false;"><button type="submit" class="btn btn-primary"><i class="fa fa-reply fa-1x"></i> Voltar</button></a>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>