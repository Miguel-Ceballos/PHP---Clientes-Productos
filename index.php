<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/redes.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    
</head>
<body>
<!--  menú -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="img/compu.jpg" width="70"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="inicio.php"><i class="fas fa-home"></i> Inicio </a>
      </li>
      <li class="nav-item">
        <a class="nav-link fuerte" href="clientes.php"><i class="fas fa-user-tie"></i> Clientes</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link fuerte" href="usuarios.php"><i class="fas fa-user-tie"></i> Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link fuerte" href="ventas.php"><i class="fas fa-shopping-cart"></i> Listas dependientes</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link fuerte" href="index.php"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link fuerte" href="cerrar.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
      </li>
    </ul>
    
  </div>
</nav>
<div class="container">
<div class="row">
<div class="col">

			<!--=====================================
			INGRESO DIRECTO
			======================================-->

                <form method="post" id="frmUsuIng">
                <div class="row">
            <div class="col-6 facebook">
                <p>
              <i class="fa fa-facebook"></i>
              Ingreso con Facebook
            </p>
            </div>
            <div class="col-6 google">
            <p>
					  <i class="fa fa-google"></i>
						Ingreso con Google
					</p>
            </div>
          </div>
                <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="emaUsu" class="col-form-label">Email:</label>
                <div class="input-group mb-3">
                    
                    <div class="input-group-prepend">
                      <button class="btn btn-primary"><i class="fas fa-envelope"
                            aria-hidden="true"></i>
                      </button>
                  </div>    
                  <input type="email" class="form-control" id="emaUsu" name="emaUsu" required="required">          
                </div>
              </div>
            </div>        
          </div>
        <div class="row">
            <div class="col">
            <div class="form-group">
            <label for="pasUsu" class="col-form-label">Password:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
              <button class="btn btn-primary">
                  <i class="fas fa-key" aria-hidden="true"></i>
              </button>
              </div>
              <input type="password" class="form-control" id="pasUsu" name="pasUsu" required="required" maxLength="10"
                minLength="10">
            </div>
          </div>
            </div>        
        </div>
        <div class="row">
            <div class="col">
        <input type="submit" class="btn btn-primary backColor btn-block" value="ENVIAR">	
        </div>
                </div>
                </form>

        
                </div>
                </div>
                </div>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    
</body>
</html>