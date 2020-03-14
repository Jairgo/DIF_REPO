<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <h2 style="color:white">Administrar perfil de <b>Becarios</b></h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a id="botup" href="addBecario.php" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Añadir nuevo becario">
                        <i class="fas fa-user-plus"></i>
                        Becario
                    </a>
                </li>
                <li class="nav-item active">
                    <a id="botup" href="registro.php?#" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nuevo administrador">
                        <i class="fas fa-users-cog"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="botup" href="../selectModule.php" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Cambiar de módulo">
                        <i class="fas fa-exchange-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <button id="botup" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Administrador actual: <?php echo($data['nombre_admin']." ".$data['apellidos_admin']); ?>">
                        <i class="fas fa-user"></i>
                    </button>
                </li>
                <li class="nav-item">
                    <a id="botup" href="php/salir.php" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Salir">
                        Salir
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>