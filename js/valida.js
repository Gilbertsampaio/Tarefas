jQuery(document).ready(function() {

	$('form#tarefaadm').submit(function(){
			
		if( $('select#usuario').val() == '' ){
			$('#label-usuario > span').html('- Escolha uma opção');
			$('#label-usuario').css('color','#e42c3e');
			$('select#usuario').val("").removeClass('success').addClass('error');
			$('select#usuario').focus();
			return false;
		}else{
			$('#label-usuario > span').html('');
			$('#label-usuario').css('color','#00e676');
			$('select#usuario').removeClass('error').addClass('success');
		}

		if( $('select#prioridade').val() == '' ){
			$('#label-prioridade > span').html('- Escolha uma opção');
			$('#label-prioridade').css('color','#e42c3e');
			$('select#prioridade').val("").removeClass('success').addClass('error');
			$('select#prioridade').focus();
			return false;
		}else{
			$('#label-prioridade > span').html('');
			$('#label-prioridade').css('color','#00e676');
			$('#label-prioridade').removeClass('erro-foto-label').addClass('success-foto-label');
			$('select#prioridade').removeClass('error').addClass('success');
		}

		if( $('select#estado').val() == '' ){
			$('#label-estado > span').html('- Escolha uma opção');
			$('#label-estado').css('color','#e42c3e');
			$('select#estado').val("").removeClass('success').addClass('error');
			$('select#estado').focus();
			return false;
		}else{
			$('#label-estado > span').html('');
			$('#label-estado').css('color','#00e676');
			$('#label-estado').removeClass('erro-foto-label').addClass('success-foto-label');
			$('select#estado').removeClass('error').addClass('success');
		}	
		
		if( $('textarea#tarefa').val() == ''){

			$('#label-tarefa > span').html('- Informe a descrição');
			$('#label-tarefa').css('color','#e42c3e');
			$('textarea#tarefa').val("").removeClass('success').addClass('error');
			$('textarea#tarefa').focus();
			return false;
		}else{
			$('#label-tarefa > span').html('');
			$('#label-tarefa').css('color','#00e676');
			$('textarea#tarefa').removeClass('error').addClass('success');
		} 
						
		return true;
	});
});