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
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-6">
					<form class="form-horizontal" method="post" action="api.php">
					  <fieldset>

					    <legend>Insira os dados nos campos abaixo</legend>

					    <div class="form-group">
					      <label for="remetente" class="col-lg-3 control-label">Email</label>
					      <div class="col-lg-9">
					        <input type="text" class="form-control" id="remetente" name="remetente" placeholder="Email de remetente SMTP LW" required>
							<small>
								<span class="text-default">Veja como cadastrar o remetente <a href="http://wiki.locaweb.com.br/pt-br/Configurando_endere%C3%A7o_de_remetente_SMTP_Locaweb" target="blank">clicando aqui</a>.</span>
							</small>
					      </div>
					    </div>

					    <div class="form-group">
					     	<label for="token" class="col-lg-3 control-label">Token da API</label>
					    	<div class="col-lg-9">
					        <input type="text" class="form-control" id="token" name="token" placeholder="Insira do Token da API" required>
					      </div>
						    </div>

					    <div class="form-group">
					      <label for="destinatario" class="col-lg-3 control-label">Destinatário</label>
					      <div class="col-lg-9">
					        <input type="text" class="form-control" id="destinatario" name="destinatario" placeholder="Email do destinatário em CCo (opcional)" >
					      </div>
					    </div>

					    <div class="form-group">
					      <label for="destinatario2" class="col-lg-3 control-label">Destinatario 2</label>
					      <div class="col-lg-9">
					        <input type="text" class="form-control" id="destinatario2" name="destinatario2" placeholder="Segundo destinatário em CCo (opcional)">
					      </div>
					    </div>

					    <div class="form-group">
					      <label for="xsmtplw" class="col-lg-3 control-label">X-SMTPLW (Webhook)</label>
					      <div class="col-lg-9">
					        <input type="text" class="form-control" id="xsmtplw" name="xsmtplw" placeholder="Informação que aparecerá no campo x-smtplw do Webhook e do cabeçalho">
					      </div>
					    </div>

					    <div class="form-group">
					      <label for="mensagem" class="col-lg-3 control-label">Mensagem</label>
					      <div class="col-lg-9">
					      	<span class="text-info">Você pode usar HTML ou texto simples no campo abaixo.</span>
					        <textarea class="form-control" rows="3" id="mensagem" name="mensagem" required>Se você está lendo essa mensagem, o envio foi feito através da API do SMTP Locaweb com sucesso!</textarea>
					        <span class="text-danger">Não escape o HTML com barras invertidas "\" como via Poster.</span><br />
					        <span class="text-primary">O email smtp@lwsuporte.com.br está em cópia.</span>
					      </div>
					    </div>

					    <div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button type="reset" class="btn btn-default"><i class="fa fa-times fa-1x"></i> Limpar</button>
					        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o fa-1x"></i> Enviar</button>
					      </div>
					    </div>

					  </fieldset>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
