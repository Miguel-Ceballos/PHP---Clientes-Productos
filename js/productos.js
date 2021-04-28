$(document).ready(function() {   
  $('#fotUsu').change(function() {    
    var archivo = this.files[0];
    console.log(archivo);
    if (archivo.size > 5242880) {
      alert('El tamaño maximo es de 5Mb');
      $('#fotUsu').val("");
    }
    else if (archivo.type!="image/png" && archivo.type!="image/jpeg"){
        alert('Se aceptan imagenes png o jpg');
        $('#fotUsu').val("");
    }        
  });

  $('#frmAgregaUsu').submit(function( event ) {    
    event.preventDefault();  // cancela el submit() para que no recargue la página
   var datos = new FormData($("#frmAgregaUsu")[0]);  
   $.ajax({            
        url: "agregaUsuario.php",
        data: datos,
        type: "POST",
        contentType:false,
        processData:false,
        success: function(msg){  
            alert(msg);
            $("#frmAgregaUsu").trigger('reset');
            $('#nomUsu').focus();
        }
    });
    });
 

  llenaTablaProductos();

  $('#frmRegPro').submit(function( event ) {
    event.preventDefault();  // cancela el submit() para que no 
    //recargue la página
   //var datos = new FormData($("#frmRegCli")[0]);
   
   nom=$("#txtNom").val();
   pre=$("#txtPre").val();
   exi=$("#txtExis").val(); 
   
   datos='{"nombre":"'+ nom +  '","precio":"' + pre +  '","existencia":"' + exi + '"}';

   $.ajax({            
     url: "http://localhost/barberia2/productos1.php",            
     method: "POST",         
     processData:false,   
     data: datos,           
         success:function(msg){  
         //msg= res = m.substr(0, m.length-1);             
            alert(msg);                   
            $('#tblPro').DataTable().ajax.reload(); 
            $("#frmRegPro").trigger('reset');
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
idPro = parseInt(columnaCero.text());
$.ajax({            
  url: "http://localhost/barberia2/productos1.php?id="+idPro,            
  method: "GET",              
  success:function(strproducto){    
    producto=JSON.parse(strproducto);      
   $("#idPromod").val(producto.id);
   $("#txtNommod").val(producto.nombre);
   $("#txtPremod").val(producto.precio);
   $("#txtExismod").val(producto.existencia);             
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Producto");            
    $("#modalProducto").modal("show");  

  }
});   

});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){  
  boton=  $(this);  
  ren=boton.closest("tr");
  col=ren.find('td:eq(0)');
  idPro = parseInt(col.text());
  var respuesta = window.confirm("¿Está seguro de eliminar el registro: "+idPro+"?");
  if(respuesta){
    $.ajax({            
      url: "http://localhost/barberia2/productos1.php?id="+idPro,            
      method: "DELETE",  
          success: function(msg){             
            $('#tblPro').DataTable().ajax.reload();           
            alert(msg);
          }
      });
  }   
});

      
  });
  $('#btnModificar').click(function( event ) {
    event.preventDefault();  // cancela el submit() para que no recargue la página
   //var datos = new FormData($("#frmeditaCli")[0]);         
    idPro=$("#idPromod").val();
    nom=$("#txtNommod").val();
    pre=$("#txtPremod").val();
    exi=$("#txtExismod").val(); 
    datos='{"nombre":"'+ nom +  '","precio":"' + pre +  '","existencia":"' + exi + '"}';        
      
    $.ajax({            
      url: "http://localhost/barberia2/productos1.php?id="+idPro,            
      method: "PUT",          
      processData:false,   
      data: datos,           
          success:function(msg){                             
          alert(msg);
          $('#tblPro').DataTable().ajax.reload();
          $("#modalProducto").modal("hide");
        }
    });
    });  
  // Llenar datatable
  function llenaTablaProductos() {    
    $('#tblPro').dataTable({
      responsive: true,            
      ajax:{
        url: "http://localhost/barberia2/productos1.php",            
        method: "GET"
      },
      columns:[
          {"data":"idPro"},
          {"data":"nomPro"},
          {"data":"prePro"},
          {"data":"exiPro"},
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