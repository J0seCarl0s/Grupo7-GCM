<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

//protected routes
Route::group(['middleware' => 'auth:api'], function() {
    Route::post('usuario', 'Auth\LoginController@obtenerUsuario');
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::post('insumos/registrar', 'App\Http\Controllers\Insumos\InsumosController@registrarInsumo');
Route::post('insumos/editar', 'App\Http\Controllers\Insumos\InsumosController@editarInsumo');
Route::get('insumos', 'App\Http\Controllers\Insumos\InsumosController@verInsumos');
Route::get('insumos/mostrar/{id}', 'App\Http\Controllers\Insumos\InsumosController@obtenerInsumo');
Route::post('insumos/eliminar','App\Http\Controllers\Insumos\InsumosController@eliminarInsumo');

Route::get('roles/getAll','App\Http\Controllers\Roles\RolesController@getAll');
Route::post('roles/insert','App\Http\Controllers\Roles\RolesController@insert');


// PROVEEDORES
Route::get('proveedores','App\Http\Controllers\Proveedores\ProveedoresController@verProveedores');
Route::post('proveedores/registrar','App\Http\Controllers\Proveedores\ProveedoresController@registrarProveedor');
Route::post('proveedores/editar','App\Http\Controllers\Proveedores\ProveedoresController@editarProveedor');
Route::post('proveedores/eliminar','App\Http\Controllers\Proveedores\ProveedoresController@eliminarProveedor');
Route::get('proveedores/mostrar/{id}','App\Http\Controllers\Proveedores\ProveedoresController@obtenerProveedor');
Route::get('proveedores/mostrar/insumos/{id}', 'App\Http\Controllers\Proveedores\ProveedoresController@listarProveedor_Insumos');
Route::post('proveedores/agregar/insumo/{id}', 'App\Http\Controllers\Proveedores\ProveedoresController@agregarInsumoProveedor');



//PLATOS
Route::post('platos/registrar', 'App\Http\Controllers\Platos\PlatosController@registrarPlato');
Route::get('platos', 'App\Http\Controllers\Platos\PlatosController@listarPlatos');
Route::get('platos/mostrar/insumos/{id}', 'App\Http\Controllers\Platos\PlatosController@listarPlatos_Insumos');
Route::get('platos/insumos/agregar/{id}', 'App\Http\Controllers\Platos\PlatosController@listarInsumos');

Route::get('/usuarios', 'App\Http\Controllers\User\UserController@verUsuarios');
Route::post('/usuarios/registrar', 'App\Http\Controllers\User\UserController@registrarUsuario');
Route::post('/usuarios/eliminar', 'App\Http\Controllers\User\UserController@elminarUsuario');
Route::post('/usuarios/desactivar', 'App\Http\Controllers\User\UserController@desactivarUsuario');

Route::get('/pedidos/mesa/{num_mesa?}', 'App\Http\Controllers\Pedidos\PedidosController@verPedidosDeMesa');
Route::post('/pedidos/registrar', 'App\Http\Controllers\Pedidos\PedidosController@registrarPedido');
Route::post('/pedidos/pasarpedidoaentregado', 'App\Http\Controllers\Pedidos\PedidosController@pasarPedidoAEntregado');

Route::get('/almacen/entradas', 'App\Http\Controllers\EntradasAlmacen\EntradasAlmacenController@verEntradas');
Route::post('/almacen/entradas/registrar', 'App\Http\Controllers\EntradasAlmacen\EntradasAlmacenController@registrarEntrada');
Route::post('/almacen/salidas/eliminar', 'App\Http\Controllers\SalidasAlmacen\SalidasAlmacenController@eliminarSalida');


Route::post('/caja/abrir', 'App\Http\Controllers\Caja\CajaController@abrirCaja');
Route::post('/caja/cerrar', 'App\Http\Controllers\Caja\CajaController@cerrarCaja');
Route::get('/caja', 'App\Http\Controllers\Caja\CajaController@obtenerEstadoCaja');

Route::post('/caja/operaciones/registrar', 'App\Http\Controllers\Caja\CajaController@registrarOperacion');
Route::get('/caja/operaciones', 'App\Http\Controllers\Caja\CajaController@verOperacionesCajaActual');
Route::post('/caja/pagos/registrar', 'App\Http\Controllers\Caja\CajaController@registrarPagoDeMesa');

Route::post('platos/eliminar','App\Http\Controllers\Platos\PlatosController@eliminarPlato');
Route::post('platos/editar', 'App\Http\Controllers\Platos\PlatosController@editarPlato');
Route::get('platos/mostrar/{id}', 'App\Http\Controllers\Platos\PlatosController@obtenerPlato');
Route::post('platos/habilitar', 'App\Http\Controllers\Platos\PlatosController@habilitarPlato');
Route::post('platos/deshabilitar', 'App\Http\Controllers\Platos\PlatosController@deshabilitarPlato');
Route::post('platos/insumos/registrar/{id}', 'App\Http\Controllers\Platos\PlatosController@registrarPlato_Insumo');
Route::post('platos/insumos/eliminar/{id}','App\Http\Controllers\Platos\PlatosController@eliminarPlatoInsumo');


Route::get('pedidos/obtenerpedidossp', 'App\Http\Controllers\Pedidos\PedidosController@listarPedidosSinPreparacion');
Route::get('pedidos/obtenerpedidoscp', 'App\Http\Controllers\Pedidos\PedidosController@listarPedidosNecesitanPreparacion');
Route::get('pedidos/obtenerpedidosep', 'App\Http\Controllers\Pedidos\PedidosController@listarPedidosEnPreparacion');
Route::get('pedidos/obtenerpedidoslistos', 'App\Http\Controllers\Pedidos\PedidosController@listarPedidoslistos');
Route::post('pedidos/pasarpedidoaenpreparacion', 'App\Http\Controllers\Pedidos\PedidosController@pasarPedidoaEnPreracion');
Route::post('pedidos/pasarpedidoalisto', 'App\Http\Controllers\Pedidos\PedidosController@pasarPedidoaListo');
Route::get('pedidos/mostrar/{id}', 'App\Http\Controllers\Pedidos\PedidosController@obtenerPedido');
Route::post('pedidos/editar', 'App\Http\Controllers\Pedidos\PedidosController@editarPedido');
Route::post('pedidos/eliminar','App\Http\Controllers\Pedidos\PedidosController@eliminarPedido');

Route::get('/almacen/salidas', 'SalidasAlmacen\SalidasAlmacenController@verSalidas');
Route::post('/almacen/salidas/registrar', 'SalidasAlmacen\SalidasAlmacenController@registrarSalida');

Route::get('reporte/ventas', 'App\Http\Controllers\Reportes\ReportesController@verReporteVentas');
Route::get('reporte/platos', 'App\Http\Controllers\Reportes\ReportesController@verReportePlatos');

Route::get('mesas','App\Http\Controllers\Mesas\MesasController@verMesas');
Route::post('mesas/registrar','App\Http\Controllers\Mesas\MesasController@registrarMesa');

Route::get('almacenControl','App\Http\Controllers\Almacen\AlmacenController@verExistencias');
Route::get('almacen/ajuste/mostrar/{id}', 'App\Http\Controllers\Almacen\AlmacenController@verExistencia');
Route::post('almacen/ajustar/{id}', 'App\Http\Controllers\Almacen\AlmacenController@ajustarCantidad');
Route::get('entrada/mostrar/{id}', 'App\Http\Controllers\EntradasAlmacen\EntradasAlmacenController@verEntrada');
Route::post('/entrada/editar/{id}', 'App\Http\Controllers\Almacen\AlmacenController@editarEntrada');
Route::post('/entradas/eliminar', 'App\Http\Controllers\Almacen\AlmacenController@eliminarEntrada');

Route::get('/estadistica/{Fecha}', 'App\Http\Controllers\User\DashboardAdminController@obtenerEstadisticas');

Route::get('reporte/cierrecaja', 'App\Http\Controllers\Reportes\ReportesController@verReporteCierreCaja');

Route::post('/proveedores/insumo/eliminar/{id}', 'App\Http\Controllers\Proveedores\ProveedoresController@eliminarInsumoProveedor');

Route::post('usuarios/edit','App\Http\Controllers\User\UserController@editarUsuario');
Route::post('usuarios/activar','App\Http\Controllers\User\UserController@activarUsuario');
Route::get('usuarios/mostrar/{id}','App\Http\Controllers\User\UserController@obtenerDatosUsuario');
