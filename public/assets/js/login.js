document.addEventListener('DOMContentLoaded', function() {
  // Obtener elementos del formulario
  const loginForm = document.querySelector('#loginForm');
  const usernameInput = document.querySelector('#username');
  const passwordInput = document.querySelector('#password');
  const loginAlert = document.querySelector('#loginAlert');
  const alertMessage = document.querySelector('#alertMessage');
  const loginSpinner = document.querySelector('#loginSpinner');
  const togglePasswordBtn = document.querySelector('.toggle-password');
  const submitButton = document.querySelector('button[type="submit"]');
  const regexCedula = /^(V-\d{7}|\d{7,8}(-\d)?)$/;
  const regexPassword = /^.{6,}$/;
  
  // Credenciales de demostración
  const validCredentials = [
    { username: '28354595', password: '123456' },
    { username: '12345678', password: '123456' },
    { username: 'V-1234567', password: '123456' }
  ];
  
  // Alternar visibilidad de la contraseña
  togglePasswordBtn.addEventListener('click', function() {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    
    // Alternar icono de ojo
    const eyeIcon = this.querySelector('i');
    eyeIcon.classList.toggle('bi-eye-fill');
    eyeIcon.classList.toggle('bi-eye-slash-fill');
    
    // Actualizar aria-label para accesibilidad
    const ariaLabel = type === 'password' ? 'Mostrar contraseña' : 'Ocultar contraseña';
    this.setAttribute('aria-label', ariaLabel);
  });

  // Validacion de campos en tiempo real
  usernameInput.addEventListener('input', function() {
    const usernamePattern = regexCedula;
    if (usernamePattern.test(this.value.trim())) {
      this.classList.remove('is-invalid');
      this.classList.add('is-valid');
      // Habilitar botón de enviar
      submitButton.disabled = false;
    } else {
      this.classList.remove('is-valid');
      this.classList.add('is-invalid');
      // Deshabilitar botón de enviar
      submitButton.disabled = true;
    }
  });

  passwordInput.addEventListener('input', function() {
    const passwordPattern = regexPassword;
    if (passwordPattern.test(this.value.trim())) {
      this.classList.remove('is-invalid');
      this.classList.add('is-valid');
      // Habilitar botón de enviar
      if(!usernameInput.classList.contains('is-invalid')){
        submitButton.disabled = false;
      }
    } else {
      this.classList.remove('is-valid');
      this.classList.add('is-invalid');
      // Deshabilitar botón de enviar
      submitButton.disabled = true;
    }
  });
  
  // Envío del formulario
  loginForm.addEventListener('submit', function(event) {
    event.preventDefault();

    // Obtener valores de entrada
    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    // Eliminar clases inválidas previas
    usernameInput.classList.remove('is-invalid');
    passwordInput.classList.remove('is-invalid');

    // Validar entradas
    if (!username) {
      usernameInput.classList.add('is-invalid');
      usernameInput.focus();
      return;
    } else if (!password) {
      passwordInput.classList.add('is-invalid');
      passwordInput.focus();
      return;
    }
    
    // Mostrar spinner de carga y deshabilitar botón
    loginSpinner.classList.remove('d-none');
    submitButton.disabled = true;
    submitButton.classList.add('opacity-75');
    
    // Simular llamada API con timeout
    setTimeout(() => {
      const isValid = authenticateUser(username, password);
      
      if (isValid) {
        // Redirigir al dashboard
        // alert('Iniciando sesión...');
        window.location.href = 'dashboard.php';
      } else {
        showAlert('Cédula o contraseña incorrectas. Por favor intente nuevamente.');
                
        loginSpinner.classList.add('d-none');
        submitButton.disabled = false;
        submitButton.classList.remove('opacity-75');
        
        // Efecto de sacudida para retroalimentación de error
        loginForm.classList.add('shake');
        setTimeout(() => {
          loginForm.classList.remove('shake');
        }, 650);
      }
    }, 1000);
  });
  
  // Verificar si las credenciales coinciden con algún usuario válido
  function authenticateUser(username, password) {
    return validCredentials.some(user => 
      user.username === username && user.password === password
    );
  }
  
  // Mostrar mensaje de alerta
  function showAlert(message) {
    alertMessage.textContent = message;
    loginAlert.classList.remove('d-none');

    // Ocultar automáticamente la alerta después de 3 segundos
    setTimeout(() => {
      hideAlert();
    }, 3000);
  }
  
  // Ocultar mensaje de alerta
  function hideAlert() {
    loginAlert.classList.add('fade-out');
    setTimeout(() => {
      loginAlert.classList.add('d-none');
      loginAlert.classList.remove('fade-out');
    }, 300);
  }
  
  // Manejar enlace "Olvidé mi contraseña"
  document.querySelector('.forgot-password').addEventListener('click', function(e) {
    e.preventDefault();
    alert('Enviando correo electrónico con instrucciones para restablecer la contraseña...');
  });
  
  // Agregar animación de sacudida para retroalimentación de error
  const style = document.createElement('style');
  style.textContent = `
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
      20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    .shake {
      animation: shake 0.6s cubic-bezier(.36,.07,.19,.97) both;
    }
  `;
  document.head.appendChild(style);
  
  // Agregar accesibilidad por teclado
  document.addEventListener('keydown', function(e) {
    // Permitir a los usuarios presionar Enter para enviar el formulario
    if (e.key === 'Enter' && !submitButton.disabled) {
      if (document.activeElement !== submitButton) {
        e.preventDefault();
        submitButton.click();
      }
    }
  });
});