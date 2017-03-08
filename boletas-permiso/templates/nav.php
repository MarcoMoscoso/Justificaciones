<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      
    
    
     <a class='navbar-brand'  href=<?php echo"'". PATH."'" ?>>Inicio</a>
    
       
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if($_SESSION[KEY.TIPO]<=2){?><li><a href="<?php echo PATH;?>pages/reportes" >Boletas de Permiso</a></li><?php } ?>
            <li><a href="#">reporte2</a></li>
            <li><a href="#">reporte3</a></li>
          </ul>
        </li>
      </ul>
    <?php if($_SESSION[KEY.TIPO]>=2)
          {
     ?>
        <ul class="nav navbar-nav">
          <li><a href="<?php echo PATH?>pages/relacionboleta" >Firmar Boletas</a></li>
        </ul>
     <?php } ?>

 


      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="glyphicon glyphicon-user text-success"></i>
        <?php echo $_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.apellidos]; ?>
        </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo PATH; ?>procesos/Logout">Salir</a></li>
        
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>