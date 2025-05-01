<?php include __DIR__ . '/layouts/header_login.php'; ?>
<!-- Page Content -->
<div class="container-fluid min-vh-100">
  <div class="row min-vh-100">
    <!-- Left side with illustration -->
    <div class="col-lg-6 d-none d-lg-flex flex-column align-items-center justify-content-center p-5 text-white background-image">
      <div class="text-center max-w-md">
        <img src="../../public/assets/images/colegiobv_logo.png" alt="School Logo" class="img-fluid mb-4" style="max-width: 300px;">
        <h1 class="fw-medium fs-2 mb-3">U.E. Colegio Batalla de la Victoria</h2>
        <p class="text-white-80 mb-4">
          Formando líderes para el futuro a través de la educación de calidad y valores
        </p>
      </div>
    </div>

    <!-- Right side with login form -->
    <div class="col-12 col-lg-6 d-flex flex-column align-items-center justify-content-center p-4 p-md-5">
      <div class="login-container">
        <div class="text-center mb-4">
          <h2 class="school-name mb-3">Sistema Web de Gestión de Nómina</h1>
          <h2 class="fs-4 text-secondary">Iniciar Sesión</h2>
        </div>

        <div id="loginAlert" class="alert alert-danger d-none" role="alert">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          <span id="alertMessage">Error de autenticación</span>
        </div>

        <form id="loginForm" class="mt-5" novalidate>
          <div class="mb-4">
            <label for="username" class="form-label text-muted fw-medium">Cédula de identidad</label>
            <div class="input-group has-validation">
              <span class="input-group-text bg-light"><i class="bi bi-person-fill text-secondary"></i></span>
              <input type="text" class="form-control" id="username" placeholder="Ingrese su cédula" required>
              <div class="invalid-feedback">Por favor, ingrese una cédula válida.</div>
            </div>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label text-muted fw-medium">Contraseña</label>
            <div class="input-group">
              <span class="input-group-text bg-light"><i class="bi bi-lock-fill text-secondary"></i></span>
              <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña" required>
              <button class="input-group-text bg-light toggle-password" type="button" tabindex="-1" aria-label="Mostrar/ocultar contraseña"><i class="bi bi-eye-fill text-secondary"></i>
              </button>
              <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
            </div>
            <div class="text-end mt-2">
              <a href="#" class="forgot-password text-decoration-none text-muted small">¿Olvidó su contraseña?</a>
            </div>
          </div>

          <button type="submit" class="btn btn-secondary w-100 py-2 mt-4">
            <span class="spinner-border spinner-border-sm d-none me-2" id="loginSpinner" role="status" aria-hidden="true"></span>  
            Iniciar Sesión
          </button>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '/layouts/footer_login.php'; ?>