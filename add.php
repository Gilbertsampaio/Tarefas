<?php
ini_set('default_charset','UTF-8');
include "conexao.php";
session_start();
?>
<?php 
if(isset($_POST["cadastrar"])){
	
	$usuario = mysqli_real_escape_string($connect,$_POST["usuario"]);
	$prioridade = mysqli_real_escape_string($connect,$_POST["prioridade"]);
	$estado = mysqli_real_escape_string($connect,$_POST["estado"]);
	$tarefa = mysqli_real_escape_string($connect,$_POST["tarefa"]);
	$data = date('d/m/Y');

	$verifica="SELECT * FROM tarefas WHERE usuario='".$usuario."'"; 
	$resultado = mysqli_query($connect,$verifica)or die (mysqli_error());

	if(mysqli_num_rows($resultado) >= 3){

		$alerta = "<script> var segundos = 5; setTimeout(function(){ $('#add-ok').fadeOut();}, segundos*1000)</script><div id='add-ok' style='color:#e42c3e'><span style='font-weight:bold'> O Usuário</span> já atingiu o limite de tarefas. Por favor, selecione outro usuário.</div>";

	} else {

		$sql = mysqli_query($connect,"INSERT INTO tarefas (data, usuario, prioridade, estado, tarefa) VALUES ('$data', '$usuario', '$prioridade', '$estado', '$tarefa')");
		
		echo '<script language="JavaScript">window.location="'.$url.'/";</script>';
		$_SESSION['success_msg'] = "<script> var segundos = 5; setTimeout(function(){ $('#add-ok').fadeOut();}, segundos*1000)</script><div id='add-ok' style='color:#00e676'><span style='font-weight:bold'> As Informações da tarefa</span> foram cadastradas com sucesso!</div>";
	}
}
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
	<title>Cadastrar Tarefas - Sua Empresa</title>

</head>

<body class="stretched">
	<div id="wrapper" class="clearfix">
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div class="row clearfix">
						<div class="col-md-12">
							<div class="heading-block border-0">
								<h3>Cadastro de Tarefas</h3>
								<span>Você está adicionando uma tarefa.</span>
							</div>
							<div class="clear"></div>
							<div class="row clearfix">
								<div class="col-lg-12">
									<p class="alerta"><?php echo $alerta; ?></p>

									<form class="row" id="tarefaadm" method="post">
										
										<div class="col-4 form-group">
											<label id="label-usuario">Usuário <span></span></label>
											<select class="form-control" name="usuario" id="usuario">
<?php
$sql = mysqli_query($connect,"SELECT ID, nome FROM usuario ORDER BY nome ASC");
	echo '<option value="">Escolha o Usuário</option>';
while($ln = mysqli_fetch_object($sql)) {
	echo '<option value="'.$ln->ID.'">'.$ln->nome.'</option>';
}
?>
												
											</select>
										</div>
										<div class="col-4 form-group">
											<label id="label-prioridade">Prioridade <span></span></label>
											<select class="form-control" name="prioridade" id="prioridade">
												<option value="">Informe a prioridade</option>
												<option value="1">Baixa</option>
												<option value="2">Normal</option>
												<option value="3">Alta</option>
											</select>
										</div>
										<div class="col-4 form-group">
											<label id="label-estado">Estado</label>
											<select class="form-control" name="estado" id="estado">
												<option value="">Informe o estado <span></span></option>
												<option value="1">Pendente</option>
												<option value="2">Em andamento</option>
												<option value="3">Concluído</option>
											</select>
										</div>
										<div class="col-12">
											<div class="form-group">
												<label id="label-tarefa">Tarefa <span></span></label>
												<textarea name="tarefa" id="tarefa" class="form-control" cols="30" rows="3"></textarea>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" id="cadastrar" name="cadastrar" class="btn btn-secondary">Cadastrar</button>
											<a href="<?php echo $url; ?>/" class="btn btn-primary">Ver Tarefas</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<script src="js/jquery.js"></script>
<script src="js/valida.js"></script>

</body>
</html>