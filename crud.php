<?php
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'biblioteca2';
/* Tiene un orden especifico en php nativo */
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);
/* Primera consulta a la base de datos */
/*$consulta = 'SELECT * FROM paises';
    $resultado = $conexion -> query($consulta);
    if ($resultado) {
        echo 'Consulta realizada';
    }else{
        echo 'Hubo un problema';
    }
    echo json_encode($resultado -> fetch_all());*/
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MULTISTORE | Sistema de ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.html"><img src="https://tiendalotengo.com/media/logo/default/logo.png" width="120px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos-lista.html">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="proveedores-lista.html">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a href="clientes-lista.html" class="nav-link active">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="compras-lista.html">Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ventas-lista.html">Ventas</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg" width="40px" height="40px" class="rounded-circle" alt="">Vladimir</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="ver-perfil.html" class="dropdown-item">Ver perfil</a>
                            </li>
                            <li>
                                <a href="login.html" class="dropdown-item">Cerrar sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary-subtle">
                <h5 class="card-title">Clientes registrados</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-8 mt-3">
                        <input type="search" class="form-control" placeholder="Bucar...">
                    </div>
                    <div class="col-12 col-md-4 mt-3 text-center">
                        <nutton type='button' data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-primary">Agregar</nutton>
                    </div>
                    <div class="col-12 col-sm-12 mt-4">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Item</th>
                                        <th>Nombre(s)</th>
                                        <th>Apellido(s)</th>
                                        <th>Nro Identificacion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 1;
                                    $consulta = 'SELECT * FROM clientes';
                                    $resultado = $conexion->query($consulta);
                                    /* fila esta leyendo cada iteracion   $resultado -> fetch_assoc()*/
                                    while ($fila = $resultado->fetch_assoc()) {

                                        # code...
                                    ?>
                                        <tr>
                                            <td><?php echo $contador++ ?></td>
                                            <td><?php echo $fila['nombre'] ?></td>
                                            <td><?php echo $fila['apellido'] ?></td>
                                            <td><?php echo $fila['identificacion'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal">Editar</button>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalEliminar" class=" btn btn-danger btn-sm">
                                                        Eliminar
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example" class="mt-4">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary-subtle">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-input">
                                <label for="nombre" class="form-label">Nombre(s)</label>
                                <input type="text" class="form-control" value="Vladimir" name="nombre" id="nombre">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-input">
                                <label for="apellido" class="form-label">Apellido(s)</label>
                                <input type="text" class="form-control" value="Luna Magne" name="apellido" id="apellido">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-input">
                                <label for="identificacion" class="form-label">Identificacion</label>
                                <input type="text" class="form-control" value="12345678" name="identificacion" id="identificacion">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-danger-subtle">
                <div class="modal-body text-danger">
                    ¿Esta seguro de eliminar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Si, eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>