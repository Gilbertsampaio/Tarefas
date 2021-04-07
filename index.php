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
	<link rel="stylesheet" href="<?php echo $url; ?>/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $url; ?>/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $url; ?>/css/font-icons.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="<?php echo $url; ?>/css/perfect-scrollbar.css" rel="stylesheet">
    <script src="<?php echo $url; ?>/js/jquery.min.js" type="text/javascript" ></script>
    <script src="<?php echo $url; ?>/js/perfect-scrollbar.js"></script>
	<title>Sistema de Tarefas - Sua Empresa</title>

</head>

<body class="stretched">
	<div id="wrapper" class="clearfix">
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div class="row clearfix">
						<div class="col-md-12">
							<div class="heading-block border-0">
								<h3>Gerenciador de Tarefas</h3>
								<span>Administre todas as informações sobre as tarefas.</span>
							</div>
							<div class="clear"></div>
							<div class="row clearfix">
								<div class="col-lg-12">

<?php if(!empty($_SESSION['success_msg'])){?>
<?php echo $_SESSION['success_msg']; ?>											
<?php unset($_SESSION['success_msg']); } ?> 

									<p class="alerta">Esse sistema visa administrar todas as informações sobre as tarefas da empresa, podemos inserir, visualizar, editar e excluir tarefas.</p>
									<div id="container">
										<table class="table table-bordered table-striped">
										  <thead>
										  	<tr>
											  <th colspan="8">
											  	<a class="button button-green button-small" href="add"><i class="icon-plus"></i> Adicionar Tarefa</a>
											  </th>
											</tr>
											<tr>
											  <th>ID</th>
											  <th>Data</th>
											  <th>Usuário</th>
											  <th>Prioridade</th>
											  <th>Estado</th>
											  <th>Tarefa</th>
											  <th class="center">Editar</th>
											  <th class="center">Excluir</th>
											</tr>
										  </thead>
										  <tbody id="tabela"></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<script>
	var $ = document.querySelector.bind(document);
    var ps = new PerfectScrollbar('#container');

    function updateSize() {
      var width = parseInt($('#width').value, 10);
      var height = parseInt($('#height').value, 10);

      $('#container').style.width = width + 'px';
      $('#container').style.height = height + 'px';

      ps.update();
    }
</script>
<script src="js/jquery.js"></script>
<script src="js/functions.js"></script>
<script>
	var pagina = "tabela.php";
	$('#tabela').load(pagina);

	$(document).on('click', '.deletar', function(){

		var linha = $(this).attr('data-id');
		var url = "excluir.php?ID="+linha;
		$.post(url, function(result) {	
	  
	  		var pagina = "tabela.php";
			$('#tabela').load(pagina);
			//$('#excluirlinha'+linha).remove();

			$('.alerta').html('<span style="font-weight:bold"> A Tarefa</span> foi apagada com sucesso.</div>').css('color','#00e676');

			setTimeout(function(){

				$('.alerta').html('Esse sistema visa administrar todas as informações sobre as tarefas da empresa, podemos inserir, visualizar, editar e excluir tarefas.').css('color','#555');
			},5000);
  		});
	})
   	
</script>

</body>
</html>