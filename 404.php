<?php
ini_set('default_charset','UTF-8');
include "conexao.php";
session_start();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<?php include 'inc/ceo.php'; ?>

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="js/jquery.js"></script>
	<title>404 - Sua Empresa</title>

</head>

<body class="stretched">
	<div id="wrapper" class="clearfix">
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div class="row clearfix">
						<div class="col-md-12">
							<div class="heading-block border-0">
								<h3>404</h3>
								<span>Página inexistente.</span>
							</div>
							<div class="clear"></div>
							<div class="row clearfix">
								<div class="col-lg-12">

									<p class="alerta">A página que você está buscando não existe.</p>

									<a class="button button-blue button-small" data-toggle="tooltip" data-original-title="Página principal" href="<?php echo $url; ?>/"><i class="icon-wrench"></i> Ver Tarefas</a>
									<a class="button button-green button-small" data-toggle="tooltip" data-original-title="Adicionar registro" href="<?php echo $url; ?>/add"><i class="icon-plus"></i> Adicionar Tarefas</a>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<script src="js/jquery.js"></script>
<script src="js/functions.js"></script>

</body>
</html>