$(function()
{

	/* MASCARAS CAMPOS INPUT	*/
	$("#cpf").mask("999.999.999-99");
	$("#data_nascimento").mask("99/99/9999");
	$("#data_cadastro").mask("99/99/9999");
	$("#telefone").mask("(99)9999-9999");
	$("#cep").mask("99999-999");

});

$(document).ready(function()
{
	    // bind form using ajaxForm 
	    $('#cadTelefone').submit(function()
	    {
	    	$("#erro_ddd").empty();
	    	$("#erro_numero").empty();
		    $('#cadTelefone').ajaxSubmit({

		        dataType:  'json',
		        success:   processJson,
		        error: erro


		        /*error : function(data)
		        {
		        	console.debug(data);
		        }*/
	    	});
	    	return false;
	    });

	function erro()
	{
		alert('error');
	}

	function processJson(data)
	{
    	if(data.mensagem != undefined)
    	{
    		bla();
    	}
    	$("#erro_ddd").append('<span class="label label-warning">' + data.erros.errors.messages.ddd[0] + '</span>');
    	$("#erro_numero").append('<span class="label label-warning">' + data.erros.errors.messages.numero[0] + '</span>');
	}

});
