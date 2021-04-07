<?php
ini_set('default_charset','UTF-8');
include "conexao.php";
$sql = mysqli_query($connect,"SELECT * FROM tarefas ORDER BY prioridade, estado ASC");
?>
<?php 
if(mysqli_num_rows($sql) > 0){
while($ln = mysqli_fetch_object($sql)):
?>
<tr id="excluirlinha<?php echo $ln->ID; ?>">
  	<td><?php echo $ln->ID; ?></td>
    <td><?php echo $ln->data; ?></td>
  	<td>
  		<?php
		$user = mysqli_fetch_object(mysqli_query($connect,"SELECT * FROM usuario WHERE ID = $ln->usuario"));
			echo $user->nome;
		?>
	</td>
  	<td><?php if($ln->prioridade == '1'){ echo 'Baixa';} else if($ln->prioridade == '2'){ echo 'Média';} else if($ln->prioridade == '3'){ echo 'Alta';}?></td>
  	<td><?php if($ln->estado == '1'){ echo 'Pendente';} else if($ln->estado == '2'){ echo 'Em andamento';} else if($ln->estado == '3'){ echo 'Concluído';}?></td>
  	<td><?php echo $ln->tarefa; ?></td>
  	<td class="center"><a class="button button-blue" data-toggle="tooltip" data-original-title="Editar registro" href="editar/<?php echo $ln->ID; ?>"><i class="icon-edit"></i></a></td>
  	<td class="center"><button class="button button-red deletar" data-id="<?php echo $ln->ID; ?>" data-toggle="tooltip" data-original-title="Excluir registro"><i class="icon-trash"></i></button></td>
</tr>
<?php endwhile ?>  
<?php } else if(mysqli_num_rows($sql) == false){?>
<tr>
	<td colspan="8">Não há nenhum registro de Tarefas.</td>
</tr>
<?php } ?>