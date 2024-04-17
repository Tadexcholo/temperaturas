<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/chart.js" charset="utf-8"></script>
    <script src="js/jquery-3.7.1.min.js" charset="utf-8"></script>
    <script src="js/jsencrypt.min.js" charset="utf-8"></script>
    <script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="js/dataTables.bootstrap5.min.js" charset="utf-8"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <title>BLE DEVICES</title>
</head>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c9a1745350483af9e80c', {
      cluster: 'us2'
    });

    var usernameValue = localStorage.getItem('username');

    var channel = pusher.subscribe("my-channel")
        channel.bind("my-event", function (data) {
          if (data.user === usernameValue) {
            $("#divMensajes").append(`
            <div class="py-2">
              <div class="row">
                <div class="col-1"></div>
                <div class="col">
                  <div class="card">
                    <div class="card-header">
                      <div><small class="text-muted">Enviado por: ${data.user} - Navegador: ${navigator.userAgent}</small></div>
                    </div>
                    <div class="card-body overflow-auto" style="max-height: 300px;">
                      ${data["txtMensaje"]}
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="bi bi-person-circle fs-3"></i>
                </div>
              </div>
            </div>
          `)
          } else {
            $("#divMensajes").append(`
            <div class="py-2">
            <div class="row">
              <div class="col-auto">
                <i class="bi bi-person-circle fs-3"></i>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <div><small class="text-muted">Enviado por: ${data.user} - Navegador: ${navigator.userAgent}</small></div>
                  </div>
                  <div class="card-body overflow-auto" style="max-height: 300px;">
                    ${data["txtMensaje"]}
                  </div>
                </div>
              </div>
              <div class="col-1"></div>
            </div>
          </div>
          `)
          }
            
        })
  </script>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="bledevices.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bluetooth" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="m8.543 3.948 1.316 1.316L8.543 6.58zm0 8.104 1.316-1.316L8.543 9.42zm-1.41-4.043L4.275 5.133l.827-.827L7.377 6.58V1.128l4.137 4.136L8.787 8.01l2.745 2.745-4.136 4.137V9.42l-2.294 2.274-.827-.827zM7.903 16c3.498 0 5.904-1.655 5.904-8.01 0-6.335-2.406-7.99-5.903-7.99S2 1.655 2 8.01C2 14.344 4.407 16 7.904 16Z"/>
                </svg>
                BLE DEVICES
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4" id="miLista">
                    <li class="nav-item"><a class="nav-link active" href="#" onclick="mapa()" id="nav1">Mapa</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="info()" id="nav2">Acerca de</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="devices()" id="nav3">Dispositivos</a></li>
                </ul>
                <?php if (isset($_SESSION["Correo"])) : ?>
                <button id="BotonUsuario" class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#modalUsuario" style=" border-radius: 25px;"><i class="bi bi-person-fill" style="font-size: 25px;"></i></button>
                <?php else : ?>
                <button id="BotonInicio" class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#modalIniciarSesion"><i class=""></i>Iniciar Sesión</button>
                <?php endif; ?>
                <?php include('components/lang.php') ?>
            </div>
        </div>
    </nav>

    <section class="py-5" id="mapa">
        <?php require 'components/mapa.php';?>
    </section>
    <section class="py-5" id="info" style="display: none">
        <?php require 'components/info.php';?>
    </section>
    <section class="py-5" id="devices" style="display: none">
        <?php require 'components/devices.php';?>
    </section>
    <?php require('components/modal.php'); ?>
    <?php require 'components/modo.php'; ?>
    <footer class="py-5 bg-primary" id="piedepagina">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; BLE DEVICES 2023</p></div>
    </footer>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            tablaBLE();
        });
    </script>
    <script src="js/modo.js" charset="utf-8"></script>
    <script src="Main.js" charset="utf-8"></script>
    <script src="js/temp1.js"></script>
    <script src="js/hume12.js"></script>
    <script src="js/locate1.js"></script>
    <script src="js/views.js"></script>
    <script src="js/lang.js"></script>
    <script>
    $("#frmMensaje").submit(function (event) {
        event.preventDefault()
        var username = document.getElementById("username").value;
        localStorage.setItem('username', username);
        $.post("pusher.php", $(this).serialize())
    })
</script>
</body>

</html>
