
    llenaTablaClientes();

    $('#frmRegCli').submit(function( event ) {
        event.preventDefault();  // cancela el submit() para que no 
        //recargue la página
       //var datos = new FormData($("#frmRegCli")[0]);
       
       nom=$("#txtNom").val();
       dir=$("#txtDir").val();
       tel=$("#txtTel").val(); 
       
       datos='{"nombre":"'+ nom +  '","direccion":"' + dir +  '","telefono":"' + tel + '"}';

       $.ajax({            
         url: "http://localhost/barberia2/clientes1.php",            
         method: "POST",         
         processData:false,   
         data: datos,           
             success:function(msg){  
             //msg= res = m.substr(0, m.length-1);             
                alert(msg);                   
                $('#tblCli').DataTable().ajax.reload(); 
                $("#frmRegCli").trigger('reset');
                $("#txtNom").focus();
               /* $(".alert-message").alert();
                window.setTimeout(function() { $(".alert-message").alert('close'); }, 2000);*/
            }
        });
        });  
        //---------------------
 //botón EDITAR    
 $(document).on("click", ".btnEditar", function(){
    filadelboton = $(this).closest("tr");
    columnaCero=filadelboton.find('td:eq(0)');
    idCli = parseInt(columnaCero.text());
    $.ajax({            
      url: "http://localhost/barberia2/clientes1.php?id="+idCli,            
      method: "GET",              
      success:function(strcliente){    
        cliente=JSON.parse(strcliente);      
       $("#idClimod").val(cliente.id);
       $("#txtNommod").val(cliente.nombre);
       $("#txtDirmod").val(cliente.direccion);
       $("#txtTelmod").val(cliente.telefono);             
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Cliente");            
        $("#modalCliente").modal("show");  
  
      }
  });   
    
  });
  
  //botón BORRAR
  $(document).on("click", ".btnBorrar", function(){  
    boton=  $(this);  
    ren=boton.closest("tr");
    col=ren.find('td:eq(0)');
    idCli = parseInt(col.text());
    var respuesta = window.confirm("¿Está seguro de eliminar el registro: "+idCli+"?");
    if(respuesta){
      $.ajax({            
        url: "http://localhost/barberia2/clientes1.php?id="+idCli,            
        method: "DELETE",  
            success: function(msg){             
              $('#tblCli').DataTable().ajax.reload();           
              alert(msg);
            }
        });
    }   
  });

        
    });
    $('#btnModificar').click(function( event ) {
        event.preventDefault();  // cancela el submit() para que no recargue la página
       //var datos = new FormData($("#frmeditaCli")[0]);         
        idCli=$("#idClimod").val();
        nom=$("#txtNommod").val();
        dir=$("#txtDirmod").val();
        tel=$("#txtTelmod").val(); 
        datos='{"nombre":"'+ nom +  '","direccion":"' + dir +  '","telefono":"' + tel + '"}';        
          
        $.ajax({            
          url: "http://localhost/barberia2/clientes1.php?id="+idCli,            
          method: "PUT",          
          processData:false,   
          data: datos,           
              success:function(msg){                             
              alert(msg);
              $('#tblCli').DataTable().ajax.reload();
              $("#modalCliente").modal("hide");
            }
        });
        }); 
    // Llenar datatable
function llenaTablaClientes() {    
    $('#tblCli').dataTable({
      responsive: true,            
      ajax:{
        url: "http://localhost/barberia2/clientes1.php",            
        method: "GET"
      },
      columns:[
          {"data":"idCli"},
          {"data":"nomCli"},
          {"data":"dirCli"},
          {"data":"telCli"},
          {"defaultContent": "<div class='text-center'><button title='Editar' class='btn btn-warning btnEditar'><i class='fas fa-user-edit fa-lg'></i></button>&nbsp; <button title='Eliminar' class='btn btn-danger btnBorrar'><i class='fas fa-user-minus fa-lg'></i></button></div>" } 
        ],
  
    //Para cambiar el lenguaje a español
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sSearch": "Buscar:",
      "oPaginate": {
          "sFirst": "Primero",
          "sLast":"Último",
          "sNext":"Siguiente",
          "sPrevious": "Anterior"
       },
       "sProcessing":"Procesando...",
  }
  
  
      }    
    )
  }
  