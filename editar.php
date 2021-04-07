<?php
ini_set('default_charset','UTF-8');
include "conexao.php";
session_start();
?>
<?php 
$ID = mysqli_real_escape_string($connect,$_GET['ID']);
$lnEdit = mysqli_fetch_object(mysqli_query($connect,"SELECT * FROM tarefas WHERE ID = '$ID'"));
?>
<?php 
if(isset($_POST["salvar"])){
	
	$user = mysqli_real_escape_string($connect,$_POST["user"]);
	$usuario = mysqli_real_escape_string($connect,$_POST["usuario"]);
	$prioridade = mysqli_real_escape_string($connect,$_POST["prioridade"]);
	$estado = mysqli_real_escape_string($connect,$_POST["estado"]);
	$tarefa = mysqli_real_escape_string($connect,$_POST["tarefa"]);

	$verifica="SELECT * FROM tarefas WHERE usuario='".$usuario."'"; 
	$resultado = mysqli_query($connect,$verifica) or die (mysqli_error());
	$res = mysqli_fetch_array($resultado); 

	if(mysqli_num_rows($resultado) >= 3 && $user != $usuario){

		$alerta = "<script> var segundos = 5; setTimeout(function(){ $('#add-ok').fadeOut();}, segundos*1000)</script><div id='add-ok' style='color:#e42c3e'><span style='font-weight:bold'> O Usuário</span> já atingiu o limite de tarefas. Por favor, selecione outro usuário.</div>";

	} else {

		mysqli_query($connect,"UPDATE tarefas SET usuario = '$usuario', prioridade = '$prioridade', estado = '$estado', tarefa = '$tarefa' WHERE ID = '$ID'");
		
		echo '<script language="JavaScript">window.location="'.$url.'/";</script>';
		$_SESSION['success_msg'] = "<script> var segundos = 5; setTimeout(function(){ $('#add-ok').fadeOut();}, segundos*1000)</script><div id='add-ok' style='color:#00e676'><span style='font-weight:bold'> As Informações</span> foram alteradas com sucesso!</div>";
	}
}
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
	<title>Editar Tarefas - Sua Empresa</title>

</head>

<body class="stretched">
	<div id="wrapper" class="clearfix">
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div class="row clearfix">
						<div class="col-md-12">
							<div class="heading-block border-0">
								<h3>Edição de Tarefas</h3>
								<span>Você está alterando uma tarefa.</span>
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
$sql = mysqli_query($connect,"SELECT ID, nome FROM usuario WHERE ID = $lnEdit->usuario");
while($ln = mysqli_fetch_object($sql)) {
	echo '<option value="'.$ln->ID.'">'.$ln->nome.'</option>';
}
?>
<?php
$sql = mysqli_query($connect,"SELECT ID, nome FROM usuario WHERE ID != $lnEdit->usuario");
while($ln = mysqli_fetch_object($sql)) {
	echo '<option value="'.$ln->ID.'">'.$ln->nome.'</option>';
}
?>
												
											</select>
										</div>
										<div class="col-4 form-group">
											<label id="label-prioridade">Prioridade <span></span></label>
											<select class="form-control" name="prioridade" id="prioridade">
												<option value="<?php echo $lnEdit->prioridade; ?>"><?php if($lnEdit->prioridade == '1'){ echo 'Baixa';} else if($lnEdit->prioridade == '2'){ echo 'Média';} else if($lnEdit->prioridade == '3'){ echo 'Alta';} ?></option>
												<?php if($lnEdit->prioridade != '1'){ echo '<option value="1">Baixa</option>';} ?>
												
												<?php if($lnEdit->prioridade != '2'){ echo '<option value="2">Média</option>';} ?>

												<?php if($lnEdit->prioridade != '3'){ echo '<option value="3">Alta</option>';} ?>

											</select>
										</div>
										<div class="col-4 form-group">
											<label id="label-estado">Estado</label>
											<select class="form-control" name="estado" id="estado">
												<option value="<?php echo $lnEdit->estado; ?>"><?php if($lnEdit->estado == '1'){ echo 'Pendente';} else if($lnEdit->estado == '2'){ echo 'Em andamento';} else if($lnEdit->estado == '3'){ echo 'Concluído';} ?></option>
												<?php if($lnEdit->estado != '1'){ echo '<option value="1">Pendente</option>';} ?>
												
												<?php if($lnEdit->estado != '2'){ echo '<option value="2">Em andamento</option>';} ?>

												<?php if($lnEdit->estado != '3'){ echo '<option value="3">Concluído</option>';} ?>
											</select>
										</div>
										<div class="col-12">
											<div class="form-group">
												<label id="label-tarefa">Tarefa <span></span></label>
												<textarea name="tarefa" id="tarefa" class="form-control" cols="30" rows="3"><?php echo $lnEdit->tarefa; ?></textarea>
											</div>
										</div>
										<input type="hidden" id="user" name="user" value="<?php echo $lnEdit->usuario; ?>">
										<div class="col-12">
											<button type="submit" id="salvar" name="salvar" class="btn btn-secondary">Editar</button>
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

<script src="<?php echo $url; ?>/js/jquery.js"></script>
<script src="<?php echo $url; ?>/js/valida.js"></script>

</body>
</html>