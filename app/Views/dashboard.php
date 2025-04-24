<?php include __DIR__ . './layouts/header.php'; ?>
  <div class="wrapper">
    <!-- Sidebar -->
    <?php include __DIR__ . './layouts/sidebar.php'; ?>
    <!-- Page Content -->
    <div id="content" class="content">
      <!-- Header -->
      <header class="border-bottom bg-white">
        <div class="d-flex align-items-center justify-content-between p-3">
          <h1 class="h4 mb-0">Dashboard</h1>
          <div class="d-flex align-items-center gap-3">
            <div class="position-relative">
              <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
              <input type="search" class="form-control ps-5" placeholder="Buscar...">
            </div>
            <div class="dropdown">
              <button class="btn btn-outline-secondary position-relative" type="button">
                <i class="bi bi-bell"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  3
                </span>
              </button>
            </div>
            <div class="dropdown">
              <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" alt="Avatar" class="rounded-circle" width="32" height="32">
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <div class="dropdown-item-text">
                    <div class="fw-medium">Admin</div>
                    <div class="small text-muted">admin@colegiobv.edu</div>
                  </div>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Configuración</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Content -->
      <main class="p-3 p-md-4 bg-light">
        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
          <div class="col-md-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <div class="text-muted small">Total Personal</div>
                  <i class="bi bi-people text-muted"></i>
                </div>
                <div class="h3 mb-0">78</div>
                <div class="text-muted small">+2 desde el mes pasado</div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <div class="text-muted small">Tasa de Asistencia</div>
                  <i class="bi bi-clipboard-check text-muted"></i>
                </div>
                <div class="h3 mb-0">94.2%</div>
                <div class="text-muted small">+1.2% desde el mes pasado</div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <div class="text-muted small">Presupuesto Nómina</div>
                  <i class="bi bi-currency-dollar text-muted"></i>
                </div>
                <div class="h3 mb-0">$125,430</div>
                <div class="text-muted small">+$3,450 desde el mes pasado</div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <div class="text-muted small">Ausencias Pendientes</div>
                  <i class="bi bi-clock text-muted"></i>
                </div>
                <div class="h3 mb-0">12</div>
                <div class="text-muted small">-3 desde la semana pasada</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tabs and Content -->
        <div class="card mb-4">
          <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
              <ul class="nav nav-tabs card-header-tabs" id="dashboardTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="asistencia-tab" data-bs-toggle="tab" data-bs-target="#asistencia" type="button" role="tab" aria-controls="asistencia" aria-selected="true">Asistencia</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="nomina-tab" data-bs-toggle="tab" data-bs-target="#nomina" type="button" role="tab" aria-controls="nomina" aria-selected="false">Nómina</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="false">Personal</button>
                </li>
              </ul>
              <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center">
                  <i class="bi bi-funnel me-1"></i> Filtrar
                </button>
                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center">
                  <i class="bi bi-download me-1"></i> Exportar
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content" id="dashboardTabsContent">
              <!-- Asistencia Tab -->
              <div class="tab-pane fade show active" id="asistencia" role="tabpanel" aria-labelledby="asistencia-tab">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div>
                    <h5 class="card-title">Registro de Asistencia</h5>
                    <p class="card-text text-muted">Registro de asistencia de los últimos 7 días</p>
                  </div>
                  <select class="form-select form-select-sm" style="width: auto;">
                    <option value="hoy">Hoy</option>
                    <option value="esta-semana" selected>Esta semana</option>
                    <option value="este-mes">Este mes</option>
                    <option value="personalizado">Personalizado</option>
                  </select>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Empleado</th>
                        <th>Departamento</th>
                        <th>Fecha</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fw-medium">María González</td>
                        <td>Matemáticas</td>
                        <td>28/02/2025</td>
                        <td>07:45</td>
                        <td>15:30</td>
                        <td><span class="badge bg-success">Completo</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver detalles</a></li>
                              <li><a class="dropdown-item" href="#">Editar registro</a></li>
                              <li><a class="dropdown-item" href="#">Justificar</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium">Carlos Rodríguez</td>
                        <td>Ciencias</td>
                        <td>28/02/2025</td>
                        <td>08:10</td>
                        <td>16:00</td>
                        <td><span class="badge bg-warning text-dark">Tardanza</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver detalles</a></li>
                              <li><a class="dropdown-item" href="#">Editar registro</a></li>
                              <li><a class="dropdown-item" href="#">Justificar</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium">Ana Martínez</td>
                        <td>Historia</td>
                        <td>28/02/2025</td>
                        <td>07:50</td>
                        <td>15:45</td>
                        <td><span class="badge bg-success">Completo</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver detalles</a></li>
                              <li><a class="dropdown-item" href="#">Editar registro</a></li>
                              <li><a class="dropdown-item" href="#">Justificar</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium">José Pérez</td>
                        <td>Educación Física</td>
                        <td>28/02/2025</td>
                        <td>--:--</td>
                        <td>--:--</td>
                        <td><span class="badge bg-danger">Ausente</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver detalles</a></li>
                              <li><a class="dropdown-item" href="#">Editar registro</a></li>
                              <li><a class="dropdown-item" href="#">Justificar</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium">Laura Sánchez</td>
                        <td>Lengua</td>
                        <td>28/02/2025</td>
                        <td>07:55</td>
                        <td>15:40</td>
                        <td><span class="badge bg-success">Completo</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver detalles</a></li>
                              <li><a class="dropdown-item" href="#">Editar registro</a></li>
                              <li><a class="dropdown-item" href="#">Justificar</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <button class="btn btn-outline-secondary">Anterior</button>
                  <button class="btn btn-primary">Siguiente</button>
                </div>
              </div>

              <!-- Nómina Tab -->
              <div class="tab-pane fade" id="nomina" role="tabpanel" aria-labelledby="nomina-tab">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div>
                    <h5 class="card-title">Resumen de Nómina</h5>
                    <p class="card-text text-muted">Resumen de nómina del mes actual</p>
                  </div>
                  <select class="form-select form-select-sm" style="width: auto;">
                    <option value="febrero-2025" selected>Febrero 2025</option>
                    <option value="enero-2025">Enero 2025</option>
                    <option value="diciembre-2024">Diciembre 2024</option>
                    <option value="noviembre-2024">Noviembre 2024</option>
                  </select>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Empleado</th>
                        <th>Departamento</th>
                        <th>Salario Base</th>
                        <th>Bonificaciones</th>
                        <th>Deducciones</th>
                        <th>Total</th>
                        <th class="text-end">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fw-medium">María González</td>
                        <td>Matemáticas</td>
                        <td>$2,500</td>
                        <td>$200</td>
                        <td>$350</td>
                        <td class="fw-medium">$2,350</td>
                        <td class="text-end">
                          <button class="btn btn-sm btn-link">
                            <i class="bi bi-file-text"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium">Carlos Rodríguez</td>
                        <td>Ciencias</td>
                        <td>$2,400</td>
                        <td>$150</td>
                        <td>$320</td>
                        <td class="fw-medium">$2,230</td>
                        <td class="text-end">
                          <button class="btn btn-sm btn-link">
                            <i class="bi bi-file-text"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium">Ana Martínez</td>
                        <td>Historia</td>
                        <td>$2,300</td>
                        <td>$180</td>
                        <td>$310</td>
                        <td class="fw-medium">$2,170</td>
                        <td class="text-end">
                          <button class="btn btn-sm btn-link">
                            <i class="bi bi-file-text"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium">José Pérez</td>
                        <td>Educación Física</td>
                        <td>$2,200</td>
                        <td>$100</td>
                        <td>$290</td>
                        <td class="fw-medium">$2,010</td>
                        <td class="text-end">
                          <button class="btn btn-sm btn-link">
                            <i class="bi bi-file-text"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium">Laura Sánchez</td>
                        <td>Lengua</td>
                        <td>$2,350</td>
                        <td>$190</td>
                        <td>$330</td>
                        <td class="fw-medium">$2,210</td>
                        <td class="text-end">
                          <button class="btn btn-sm btn-link">
                            <i class="bi bi-file-text"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="text-muted small">Mostrando 5 de 78 empleados</div>
                  <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary">Anterior</button>
                    <button class="btn btn-primary">Siguiente</button>
                  </div>
                </div>
              </div>

              <!-- Personal Tab -->
              <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div>
                    <h5 class="card-title">Directorio de Personal</h5>
                    <p class="card-text text-muted">Lista completa del personal del colegio</p>
                  </div>
                  <div class="d-flex gap-2">
                    <select class="form-select form-select-sm">
                      <option value="todos" selected>Todos</option>
                      <option value="matematicas">Matemáticas</option>
                      <option value="ciencias">Ciencias</option>
                      <option value="historia">Historia</option>
                      <option value="lengua">Lengua</option>
                      <option value="educacion-fisica">Educación Física</option>
                      <option value="administrativo">Administrativo</option>
                    </select>
                    <button class="btn btn-outline-primary btn-sm d-flex align-items-center">
                      <i class="bi bi-plus me-1"></i> Añadir
                    </button>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>ID</th>
                        <th>Departamento</th>
                        <th>Cargo</th>
                        <th>Contacto</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center gap-2">
                            <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                              <span>MG</span>
                            </div>
                            <span class="fw-medium">María González</span>
                          </div>
                        </td>
                        <td>EMP001</td>
                        <td>Matemáticas</td>
                        <td>Profesora</td>
                        <td>maria.g@colegiobv.edu</td>
                        <td><span class="badge bg-primary">Activo</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver perfil</a></li>
                              <li><a class="dropdown-item" href="#">Editar</a></li>
                              <li><a class="dropdown-item" href="#">Ver asistencia</a></li>
                              <li><a class="dropdown-item" href="#">Ver nómina</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center gap-2">
                            <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                              <span>CR</span>
                            </div>
                            <span class="fw-medium">Carlos Rodríguez</span>
                          </div>
                        </td>
                        <td>EMP002</td>
                        <td>Ciencias</td>
                        <td>Profesor</td>
                        <td>carlos.r@colegiobv.edu</td>
                        <td><span class="badge bg-primary">Activo</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver perfil</a></li>
                              <li><a class="dropdown-item" href="#">Editar</a></li>
                              <li><a class="dropdown-item" href="#">Ver asistencia</a></li>
                              <li><a class="dropdown-item" href="#">Ver nómina</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center gap-2">
                            <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                              <span>AM</span>
                            </div>
                            <span class="fw-medium">Ana Martínez</span>
                          </div>
                        </td>
                        <td>EMP003</td>
                        <td>Historia</td>
                        <td>Profesora</td>
                        <td>ana.m@colegiobv.edu</td>
                        <td><span class="badge bg-primary">Activo</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver perfil</a></li>
                              <li><a class="dropdown-item" href="#">Editar</a></li>
                              <li><a class="dropdown-item" href="#">Ver asistencia</a></li>
                              <li><a class="dropdown-item" href="#">Ver nómina</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center gap-2">
                            <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                              <span>JP</span>
                            </div>
                            <span class="fw-medium">José Pérez</span>
                          </div>
                        </td>
                        <td>EMP004</td>
                        <td>Educación Física</td>
                        <td>Profesor</td>
                        <td>jose.p@colegiobv.edu</td>
                        <td><span class="badge bg-secondary">Permiso</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver perfil</a></li>
                              <li><a class="dropdown-item" href="#">Editar</a></li>
                              <li><a class="dropdown-item" href="#">Ver asistencia</a></li>
                              <li><a class="dropdown-item" href="#">Ver nómina</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center gap-2">
                            <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                              <span>LS</span>
                            </div>
                            <span class="fw-medium">Laura Sánchez</span>
                          </div>
                        </td>
                        <td>EMP005</td>
                        <td>Lengua</td>
                        <td>Profesora</td>
                        <td>laura.s@colegiobv.edu</td>
                        <td><span class="badge bg-primary">Activo</span></td>
                        <td class="text-end">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Ver perfil</a></li>
                              <li><a class="dropdown-item" href="#">Editar</a></li>
                              <li><a class="dropdown-item" href="#">Ver asistencia</a></li>
                              <li><a class="dropdown-item" href="#">Ver nómina</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="text-muted small">Mostrando 5 de 78 empleados</div>
                  <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary">Anterior</button>
                    <button class="btn btn-primary">Siguiente</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <?php include __DIR__ . './layouts/footer.php'; ?>