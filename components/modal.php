<!-- Modal: Iniciar Sesión -->
<div class="modal fade" id="modalIniciarSesion" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalU12">Iniciar sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">
                <form class="" action="bledevices.php" id="formInicio" method="post">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="txtEmail2" name="txtEmail2" placeholder="Ingrese El Nombre" required="" minlength="2" maxlength="50" autocomplete="off">
                        <label for="txtEmail2" id="modalU13">Correo:</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="txtTexto1" name="txtTexto1" placeholder="Ingrese Su Contraseña">
                        <label for="txtTexto1" id="modalU14">Contraseña:</label>
                    </div>                
                <p id="errorMessage" class="text-danger"></p> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalU15">Cerrar</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistrarse" id="modalU16">Registrarse</button>
                <button type="submit" name="btnTEXTO" class="btn btn-outline-primary" id="modalU17">Iniciar Sesion</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal: Registrarse -->
<div class="modal fade" id="modalRegistrarse" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalU18">Registrarse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">
                <form action="bledevices.php" method="post" id="frmEnviarTexto">
                    <input type="text" hidden name="txtToken" id="txtToken" value="<?php echo $_SESSION["token"]; ?>"/>
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="" required="" minlength="2" maxlength="50">
                        <label for="txtEmail" id="modalU19">Correo:</label>
                        <p id="emailError" class="text-danger h6" style="display: none">* Campo Obligatorio</p>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="txtTexto" name="txtTexto" placeholder="" required>
                        <label for="txtTexto" id="modalU20">Contraseña:</label>
                        <p id="passwordError" class="text-danger h6" style="display: none">* Campo Obligatorio</p>
                    </div>
                    <div id="captchaContainer" class="input-group mb-3 mt-3">
                        <img src="generar_captcha.php" id="captchaImage" alt="CAPTCHA Image" class="img-fluid">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="captchaInput" name="captchaInput" placeholder=" ">
                            <label for="captchaInput">CAPTCHA:</label>
                        </div>
                        
                        <button class="btn btn-outline-secondary" type="button" onclick="refreshCaptcha()" id="modalU21">Recargar CAPTCHA</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalU22">Cerrar</button>
                        <button type="submit" name="btnEnviarTexto" class="btn btn-outline-primary" id="modalU23">Registrarse</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalIniciarSesion" id="modalU24">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>      
    </div>
</div>


<!-- Modal: Usuario -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">
                <div class="row mb-3 p-3 border-bottom">
                    <div class="col">
                        <h6 id="modalU1">Información de Usuario</h6>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-primary" id="btneditar" name="btneditar" data-bs-toggle="modal" data-bs-target="#modalUsuarioModificar"><i class="bi bi-pencil-square"></i></button>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="modalU2">Correo:</span>
                    <input type="text" disabled class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $_SESSION["Correo"]; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="modalU3">Contraseña:</span>
                    <input type="text" disabled class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $_SESSION['Password']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalU4">Salir</button>
                    <button type="button" class="btn btn-outline-danger" id="BotonCerrarSesion" name="BotonCerrarSesion"><i class="" id="modalU5">Cerrar Sesión</i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Modificar Información de Usuario -->
<div class="modal fade" id="modalUsuarioModificar" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalU6">Modificar Información de usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">
                <form method="post" action="bd/modificar.php?page=clientes.php"> 
                    <input type="hidden" name="id" value="<?php echo $_SESSION['ID']; ?>">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="txtcorreo" placeholder="Ingrese su correo" max="50" min="2" required="" name="txtcorreo" list="correoelectronico" value="<?php echo $_SESSION['Correo']; ?>">
                        <label for="txtcorreo" id="modalU7">Correo electrónico:</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="txtcontraseña" placeholder="Ingrese una Contraseña" required="" minlength="2" maxlength="50" name="txtcontraseña" autocomplete="off" value="<?php echo $_SESSION['Password']; ?>">
                        <label for="txtcontraseña" id="modalU8">Contraseña:</label>
                    </div>                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalU9">Salir</button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="modalU10">Volver</button>
                        <button type="submit" class="btn btn-primary" name="guardarModificacion" id="modalU11">Guardar</button>
                    </form>
                    </div>
                </form>
            </div>
        </div>      
    </div>
</div>

<script>    
document.addEventListener("DOMContentLoaded", function() {
  const modal = document.getElementById("modalRegistrarse");
  const emailInput = document.getElementById("txtEmail");
  const passwordInput = document.getElementById("txtTexto");
  const registrarseButton = document.getElementById("btnRegistrarse");

  // Agregar eventos de escucha a los campos de entrada
  emailInput.addEventListener("input", validateEmail);
  passwordInput.addEventListener("input", validatePassword);

  // Funciones de validación
  function validateEmail() {
    if (emailInput.value === "") {
      showError("emailError", "Campo Obligatorio");
    } else {
      hideError("emailError");
    }
  }

  function validatePassword() {
    if (passwordInput.value === "") {
      showError("passwordError", "Campo Obligatorio");
    } else {
      hideError("passwordError");
    }
  }
  
  // Mostrar mensaje de error
  function showError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.textContent = `* ${message}`;
    errorElement.style.display = "block";
  }

  // Ocultar mensaje de error
  function hideError(elementId) {
    const errorElement = document.getElementById(elementId);
    errorElement.style.display = "none";
  }

  });
</script>
