var table = "";

$(document).ready(function(){
	
	table = $('#tblUsuarios').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
        "sScrollX": "true",
        "ajax": {
            "url": 'usuarios_controller/ListarUsuarios/',
           	"dataSrc":function(data){
            	
                	var return_data = new Array();
                	for (var i = 0; i < data.data.length; i++) {

                		return_data.push({
                			'idusuario':data.data[i].idusuario,
                			'nome':data.data[i].nome,
                			'email':data.data[i].email,
                			'telefone':data.data[i].telefone,
                			'nascimento':data.data[i].nascimento,
                			'cargo':data.data[i].cargo,
                			'salario':data.data[i].salario,
                			'foto':"<img src='./files/photos/"+data.data[i].foto+"' width='50' height='50'>",
                			'nome_perfil':data.data[i].nome_perfil,
                			'descricao':data.data[i].descricao,
                			'perfil':data.data[i].perfil
                		})

                	} 
                		return return_data;               	
                }  ,
        },
        "columnDefs": [
            {
                "targets": [],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 11,
                "data": null,
                "defaultContent": '<button class="btn btn-primary" id="btn-atualizar"><i class="far fa-edit"></i>Editar</button> '+'<button class="btn btn-danger" id="btn-deletar"><i class="fas fa-trash-alt"></i>Excluir</button>',                
            }
        ],
        "columns": [
	        {"data": "idusuario"}, 
	        {"data": "nome"}, 
	        {"data": "email"},
	        {"data": "telefone"},
	        {"data": "nascimento"},
	        {"data": "cargo"},
	        {"data": "salario"},
	      	{"data": "foto"},
	        {"data": "nome_perfil"},
	        {"data": "descricao"},
	        {"data": "perfil"}
        ]
                /* "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                var ano = aData['data_fim'].substring(6,10);
                 var mes = aData['data_fim'].substring(3,5);
                 var dia = aData['data_fim'].substring(0,2);
                 
                 var datah = new Date();
                 var datav = new Date(ano+"/"+mes+"/"+dia);
                 if ( aData['ativo']==0)
                 {
                        $('td', nRow).css('color', 'red');                        
                 }
                 else 
                 {                        
                        $('td', nRow).css('color', 'green');                        
                 }
                 }*/
    });

	$("#ad-btn-enviar").click(function(){
		var form = $("#ad-form").serialize();
		$.ajax({
            url: "usuarios_controller/CadastrarUsuario",
            type: "POST",
            data: form,		   
            success: function (data) {
               var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                	    var email = $("#ad-email").val();

                        var formData = new FormData(); 
                        formData.append('usuario',json.usuario);
                        formData.append('email',email);
                        formData.append('foto',$('#ad-foto')[0].files[0]);

                       	$.ajax({
				            url: "usuarios_controller/AdicionarFoto",
				            type: "POST",
				            data: formData,	
			   				processData: false,  
			   				contentType: false,	   
				            success: function (data) {
				               var json = $.parseJSON(data);
				                if (json.tipo == 'success') {                       				                        
				                    alert('Usuario adicionado com sucesso');
				                    table.ajax.reload();
				                } else if(json.tipo == "error"){        
				                	alert('Erro!');
				                }           
				       		}
			    		}) 

                } else if(json.tipo == "error_p"){          
					alert('Erro na Tabela dos perfis');
                }  else if(json.tipo == "error_u"){            
                    alert('Erro na Tabela dos usuarios');
                }            
        }
      })
	});

    $("#tblUsuarios tbody").on("click", "#btn-atualizar", function () {
    	$("#ModalEdit").modal();

		var data = table.row($(this).parents('tr')).data();
        $("#ed-id").val(data['idusuario']);
		$("#ed-nome").val(data['nome']);
		$("#ed-email").val(data['email']);
		$("#ed-telefone").val(data['telefone']);
		$("#ed-nascimento").val(data['nascimento']);
		$("#ed-cargo").val(data['cargo']);
		$("#ed-salario").val(data['salario']);
		$("#ed-perfil").val(data['perfil']);
		$("#ed-nome_perfil").val(data['nome_perfil']);
		$("#ed-descricao").text(data['descricao']);	
	

        $(".ed-foto").html('');
		$(".ed-foto").append(data['foto']);
	});

    $("#ed-btn-salvar").click(function(){
        var form = $("#ed-form").serialize();
        $.ajax({
            url: "usuarios_controller/EditarUsuario",
            type: "POST",
            data: form,        
            success: function (data) {
               var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                        var email = $("#ad-email").val();

                        var formData = new FormData(); 
                        formData.append('usuario',json.usuario);
                        formData.append('email',email);
                        formData.append('foto',$('#ed-foto')[0].files[0]);

                        $.ajax({
                            url: "usuarios_controller/AdicionarFoto",
                            type: "POST",
                            data: formData, 
                            processData: false,  
                            contentType: false,    
                            success: function (data) {
                               var json = $.parseJSON(data);
                                if (json.tipo == 'success') {                                                               
                                    alert('Usuario editado com sucesso');
                                    table.ajax.reload();
                                    $('.close').click();
                                } else if(json.tipo == "error"){        
                                    alert('Erro!');
                                }           
                            }
                        }) 

                } else if(json.tipo == "error_p"){          
                    alert('Erro na Tabela dos perfis');
                }  else if(json.tipo == "error_u"){            
                    alert('Erro na Tabela dos usuarios');
                }            
        }
      })
    });
    
    $("#tblUsuarios tbody").on("click", "#btn-deletar", function () {
        $("#ModalDelete").modal();
        var data = table.row($(this).parents('tr')).data();
        $("#del-id").val(data['idusuario']);     

    });

    $("#del-btn-deletar").click(function(){        
        var id = $("#del-id").val();
        
        $.ajax({
            url: "usuarios_controller/DeletarUsuario",
            type: "POST",
            data: {'id':id},        
            success: function (data) {
               var json = $.parseJSON(data);
                if (json.tipo == 'success') {                                                                                  
                    alert('Usuario deletado com sucesso');
                    table.ajax.reload();
                    $('.close').click();
                } else if(json.tipo == "error_p"){          
                    alert('Erro na Tabela dos perfis');
                }  else if(json.tipo == "error_u"){            
                    alert('Erro na Tabela dos usuarios');
                }            
        }
      })
    });


});