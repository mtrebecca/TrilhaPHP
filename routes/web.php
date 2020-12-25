<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CadClientesController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovimentacoesController;
use App\Http\Controllers\PagarController;
use App\Http\Controllers\PainelProdutoController;
use App\Http\Controllers\ReceberController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RelController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');
Route::post('painel', [UsuarioController::class, 'login'])->name('usuarios.login');


Route::get('clientes', [CadClientesController::class, 'index'])->name('clientes.index');
Route::post('clientes', [CadClientesController::class, 'insert'])->name('clientes.insert');
Route::get('clientes/inserir', [CadClientesController::class, 'create'])->name('clientes.inserir');
Route::get('clientes/{item}/edit', [CadClientesController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{item}', [CadClientesController::class, 'editar'])->name('clientes.editar');
Route::delete('clientes/{item}', [CadClientesController::class, 'delete'])->name('clientes.delete');
Route::get('clientes/{item}/delete', [CadClientesController::class, 'modal'])->name('clientes.modal');
Route::get('clientes/{item}/modal-cobrar', [ClientesController::class, 'modal_cobrar'])->name('clientes.modal-cobrar');
Route::post('clientes-cobrar', [ClientesController::class, 'cobrar'])->name('clientes.cobrar');


Route::get('produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::post('produto', [ProdutoController::class, 'insert'])->name('produto.insert');
Route::get('produto/inserir', [ProdutoController::class, 'create'])->name('produto.inserir');
Route::get('produto/{item}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('produto/{item}', [ProdutoController::class, 'editar'])->name('produto.editar');
Route::delete('produto/{item}', [ProdutoController::class, 'delete'])->name('produto.delete');
Route::get('produto/{item}/delete', [ProdutoController::class, 'modal'])->name('produto.modal');

Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::delete('usuarios/{item}', [UsuarioController::class, 'delete'])->name('usuarios.delete');
Route::get('usuarios/{item}/delete', [UsuarioController::class, 'modal'])->name('usuarios.modal');


Route::get('vendas', [VendasController::class, 'index'])->name('vendas.index');
Route::post('vendas', [VendasController::class, 'insert'])->name('vendas.insert');
Route::get('vendas/inserir', [VendasController::class, 'create'])->name('vendas.inserir');
Route::get('vendas/{item}/edit', [VendasController::class, 'edit'])->name('vendas.edit');
Route::put('vendas/{item}', [VendasController::class, 'editar'])->name('vendas.editar');
Route::delete('vendas/{item}', [VendasController::class, 'delete'])->name('vendas.delete');
Route::get('vendas/{item}/delete', [VendasController::class, 'modal'])->name('vendas.modal');



Route::get('receber', [ReceberController::class, 'index'])->name('receber.index');
Route::delete('receber/{item}', [ReceberController::class, 'delete'])->name('receber.delete');
Route::get('receber/{item}/delete', [ReceberController::class, 'modal'])->name('receber.modal');
Route::get('receber/{item}/modal-baixa', [ReceberController::class, 'modal_baixa'])->name('receber.modal-baixa');
Route::put('receber-baixa/{item}', [ReceberController::class, 'baixa'])->name('receber.baixa');


Route::get('pagar', [PagarController::class, 'index'])->name('pagar.index');
Route::post('pagar', [PagarController::class, 'insert'])->name('pagar.insert');
Route::get('pagar/inserir', [PagarController::class, 'create'])->name('pagar.inserir');
Route::delete('pagar/{item}', [PagarController::class, 'delete'])->name('pagar.delete');
Route::get('pagar/{item}/delete', [PagarController::class, 'modal'])->name('pagar.modal');
Route::get('pagar/{item}/modal-baixa', [PagarController::class, 'modal_baixa'])->name('pagar.modal-baixa');
Route::put('pagar-baixa/{item}', [PagarController::class, 'baixa'])->name('pagar.baixa');


Route::get('movimentacoes', [MovimentacoesController::class, 'index'])->name('movimentacoes.index');





Route::get('home-admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/', [UsuarioController::class, 'logout'])->name('usuarios.logout');
Route::put('admin/{usuario}', [AdminController::class, 'editar'])->name('admin.editar');

Route::get('home-produto', [PainelProdutoController::class, 'index'])->name('painel-produto.index');
Route::put('painel-produto/{usuario}', [PainelProdutoController::class, 'editar'])->name('painel-produto.editar');


Route::get('relatorios/movimentacoes', [RelController::class, 'movimentacoes'])->name('rel.movimentacoes');



