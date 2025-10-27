
<div class="container"> 
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"> 
        <a href="/inicio" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"> 
            <span class="fs-4">CRUD votaciones</span> 
        </a> 
        <ul class="nav nav-pills"> 
            <li class="nav-item">
                <a href="/inicio" class="nav-link" id="cabecera-inicio">Inicio</a>
            </li> 
            <li class="nav-item">
                <a href="/iniciarSesion" class="nav-link" id="cabecera-iniciarSesion">Iniciar sesion</a>
            </li> 
            <li class="nav-item">
                <a href="registrarse" class="nav-link" id="cabecera-registrarse">Registrarse</a>
            </li> 
            <li class="nav-item">
                <a href="<?=isset($_SESSION['uuid']) ? '/verUsuario?uuid=' . $_SESSION['uuid'] : '/iniciarSesion'?>" class="nav-link" id="cabecera-verUsuario">Ver mi usuario</a>
            </li> 
            <li class="nav-item">
                <a href="/crearEncuesta" class="nav-link" id="cabecera-crearEncuesta">Crear encuesta</a>
            </li>  
            <li class="nav-item">
                <a href="/informacion" class="nav-link" id="cabecera-informacion">Informacion</a>
            </li>
            <li class="nav-item">
                <a href="/pedirContrasegna" class="nav-link" id="cabecera-pedirContrasegna">Generador</a>
            </li>
            <li class="nav-item">
                <a href="/admin" class="nav-link" id="cabecera-admin">Administracion</a>
            </li>
        </ul> 
    </header> 
</div>
<script>document.getElementById("cabecera-" + window.location.pathname.replace("/", "")).classList.add("active");</script>
<div class="b-example-divider"></div>