document.addEventListener('DOMContentLoaded', function() {
  // Elementos principales
  const sidebar = document.getElementById('sidebar');
  const sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');
  const mobileOverlay = document.createElement('div');
  mobileOverlay.classList.add('mobile-overlay');
  document.body.appendChild(mobileOverlay);

  // Verificar que existan los elementos necesarios
  if (!sidebar || !sidebarCollapseBtn) {
    console.error('Elementos de la barra lateral no encontrados');
    return;
  }

  // Función que actualiza el icono del botón según el estado actual
  function actualizarIcono() {
    const icon = sidebarCollapseBtn.querySelector('i');
    if (!icon) return;
    if (sidebar.classList.contains('collapsed')) {
      icon.classList.replace('bi-chevron-left', 'bi-chevron-right');
    } else {
      icon.classList.replace('bi-chevron-right', 'bi-chevron-left');
    }
  }

  // Función para alternar la barra lateral
  function toggleSidebar() {
    sidebar.classList.toggle('collapsed');
    const estado = sidebar.classList.contains('collapsed') ? 'collapsed' : 'expanded';
    localStorage.setItem('sidebarState', estado);
    actualizarIcono();
  }

  sidebarCollapseBtn.addEventListener('click', toggleSidebar);

  // Restaurar estado guardado de la barra lateral al cargar la página
  const savedSidebarState = localStorage.getItem('sidebarState');
  if (savedSidebarState === 'collapsed') {
    sidebar.classList.add('collapsed');
  } else {
    sidebar.classList.remove('collapsed');
  }
  actualizarIcono();

  // --- Configuración del botón de menú móvil ---
  const mobileToggle = document.createElement('button');
  mobileToggle.classList.add('btn', 'btn-primary', 'd-md-none', 'position-fixed');
  Object.assign(mobileToggle.style, {
    bottom: '20px',
    right: '20px',
    zIndex: '1050',
    borderRadius: '50%',
    width: '50px',
    height: '50px',
    boxShadow: '0 2px 10px rgba(0, 0, 0, 0.2)'
  });
  mobileToggle.innerHTML = '<i class="bi bi-list"></i>';
  document.body.appendChild(mobileToggle);

  // Función para alternar la barra lateral en móvil
  function toggleMobileSidebar() {
    sidebar.classList.toggle('active');
    mobileOverlay.classList.toggle('active');
  }

  mobileToggle.addEventListener('click', toggleMobileSidebar);

  // Cerrar barra lateral al hacer clic en el overlay
  mobileOverlay.addEventListener('click', function() {
    sidebar.classList.remove('active');
    mobileOverlay.classList.remove('active');
  });

  // Al cambiar el tamaño de la ventana, asegurar que la barra móvil se cierre
  window.addEventListener('resize', function() {
    if (window.innerWidth >= 768) {
      sidebar.classList.remove('active');
      mobileOverlay.classList.remove('active');
    }
  });

  // Inicializar tooltips de Bootstrap (si está disponible)
  if (typeof bootstrap !== 'undefined') {
    const triggers = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    triggers.forEach(el => new bootstrap.Tooltip(el));
  } else {
    console.error('Bootstrap no está definido. Asegúrate de que esté cargado correctamente.');
  }

  // Agregar clase activa al enlace de menú actual
  const navLinks = document.querySelectorAll('.sidebar .nav-link');
  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      navLinks.forEach(item => item.classList.remove('active'));
      this.classList.add('active');
      // Cerrar menú móvil después de seleccionar
      if (window.innerWidth < 768) {
        sidebar.classList.remove('active');
        mobileOverlay.classList.remove('active');
      }
    });
  });

  // Funcionalidad de demostración para botones de paginación
  const paginationButtons = document.querySelectorAll('.btn-primary, .btn-outline-secondary');
  paginationButtons.forEach(button => {
    if (button === sidebarCollapseBtn) return;
    button.addEventListener('click', function(e) {
      e.preventDefault();
      const texto = this.textContent.trim();
      if (texto === 'Siguiente') {
        alert('Navegando a la siguiente página...');
      } else if (texto === 'Anterior') {
        alert('Navegando a la página anterior...');
      }
    });
  });

  // Funcionalidad de demostración para elementos de dropdown
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  dropdownItems.forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      alert(`Acción seleccionada: ${this.textContent}`);
    });
  });

  // Funcionalidad de demostración para botones de filtrar y exportar
  const actionButtons = document.querySelectorAll('.btn-outline-secondary');
  actionButtons.forEach(button => {
    const texto = button.textContent;
    if (texto.includes('Filtrar')) {
      button.addEventListener('click', function() {
        alert('Abriendo panel de filtros...');
      });
    } else if (texto.includes('Exportar')) {
      button.addEventListener('click', function() {
        alert('Exportando datos...');
      });
    }
  });

  // Funcionalidad de demostración para el botón de añadir
  const addButton = document.querySelector('.btn-outline-primary');
  if (addButton) {
    addButton.addEventListener('click', function() {
      alert('Abriendo formulario para añadir nuevo empleado...');
    });
  }
});
