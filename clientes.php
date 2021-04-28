<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
<!--  menú -->
<?php require_once "menu.php"  ?>

<!-- termina el menú -->

        <!-- Tabla de clientes -->
        <div class="container">
            <div class="row">
                <div class="col">
                <button type="button" class="btn btn-success my-3" data-toggle="modal" data-target="#modalRegCliente">
                   <i class="fas fa-user-plus fa-lg"></i> Registro de Clientes
                </button>
                </div>
            </div>
            <div class="row">
            <div class="col">
            <table id="tblCli" class="table table-striped table-bordered table-sm mt-4 ml-3">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>                    
                    <th>Acciones</th>                
                    </tr>
                </thead>
                <tbody></tbody>
                </table>
            </div>
        </div>  
    </div> 




  
<!--Modal Registrar clientes-->
<div class="modal fade" id="modalRegCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Registro de clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                
            </div>
          
            <div class="modal-body">
            <form id="frmRegCli">  
<div class="container">
    <div class="row">
        <div class="col">
            <!---Nombre  -->
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="txtNom" class="col-form-label">Nombre:</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-success"><i class="fas fa-user-circle fa-lg"
                            aria-hidden="true"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" id="txtNom" name="txtNom" required="required">
                    </div>
                </div>
                </div>        
            </div>
            <!---Dirección  -->
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="txtDir" class="col-form-label">Dirección:</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-success"><i class="fas fa-address-card fa-lg"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" id="txtDir" name="txtDir" required="required">
                    </div>
                </div>
                </div>        
            </div>
            <!---Teléfono  -->
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="txtTel" class="col-form-label">Teléfono:</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-success"><i class="fas fa-phone fa-lg"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" id="txtTel" name="txtTel">
                    </div>
                </div>
                </div>        
            </div>

            <div class="row">
                <div class="col text-center">
                    <button type="reset" class="btn btn-warning">Limpiar</button>
                    <button type="submit" class="btn btn-success" id="btnRegCli">Guardar</button> 
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                </div>        
            </div>

        </div>
                </div>
            </div>
        </div>
        </form>
            </div>
            
           
        </div>
    </div>
</div>  



<!--Modal Editar clientes-->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
          
            <div class="modal-body">
            <form id="frmeditaCli" method="POST">
    <div class="container">
    <div class="row">
        <div class="col">
            <!---Nombre  -->
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="txtNom" class="col-form-label">Nombre:</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-success"><i class="fas fa-user-circle fa-lg"
                            aria-hidden="true"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" id="txtNommod" name="txtNommod" required="required">
                    </div>
                </div>
                </div>        
            </div>
            <!---Dirección  -->
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="txtDir" class="col-form-label">Dirección:</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-success"><i class="fas fa-address-card fa-lg"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" id="txtDirmod" name="txtDirmod" required="required">
                    </div>
                </div>
                </div>        
            </div>
            <!---Teléfono  -->
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="txtTel" class="col-form-label">Teléfono:</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-success"><i class="fas fa-phone fa-lg"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" id="txtTelmod" name="txtTelmod">
                    </div>
                </div>
                </div>        
            </div>

        <div class="row">
            <div class="col"><input type="hidden"   id="idClimod" name="idClimod"> </div>
        </div>
        <div class="row">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnModificar" class="btn btn-outline-success">Modificar</button>
        </div>
        
    </div>
      </form>         
            </div>
            
           
        </div>
    </div>
</div>  

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/clientes.js"></script>
</body>
</html>