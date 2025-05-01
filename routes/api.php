<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Departamento;
use App\Models\Funcionario;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/departamentos', function (Request $request) {
    $departamento = new Departamento();
    $departamento->nome = $request->input('nome');
    $departamento->descricao = $request->input('descricao');
    $departamento->responsavel = $request->input('responsavel');
    $departamento->save();
    return response()->json($departamento);
});

Route::get('/departamentos/funcionarios', function () {
    $departamentos = Departamento::with('funcionarios')->get();
    return response()->json($departamentos);
});

Route::get('/departamentos', function () {
    $departamento = Departamento::all();
    return response()->json($departamento);
});

Route::get('/departamentos/{id}', function ($id) {
    $departamento = Departamento::find($id);
    return response()->json($departamento);
});

Route::patch('/departamentos/{id}', function (Request $request, $id) {
    $departamento = Departamento::find($id);

    if($request->input('nome') !== null) {
        $departamento->nome = $request->input('nome');
    }
    
    if($request->input('descricao') !== null) {
        $departamento->descricao = $request->input('descricao');
    }

    if($request->input('responsavel') !== null) {
        $departamento->responsavel = $request->input('responsavel');
    }

    $departamento->save();

    return response()->json($departamento);
});

Route::delete('/departamentos/{id}', function ($id) {
    $departamento = Departamento::find($id);
    $departamento->delete();
    return response()->json($departamento);
});

Route::post('/funcionarios', function (Request $request) {
    $funcionario = new Funcionario();
    $funcionario->nome = $request->input('nome');
    $funcionario->email = $request->input('email');
    $funcionario->cpf = $request->input('cpf');
    $funcionario->telefone = $request->input('telefone');
    $funcionario->data_admissao = $request->input('data_admissao');
    $funcionario->cargo = $request->input('cargo');
    $funcionario->salario = $request->input('salario');
    $funcionario->departamento_id = $request->input('departamento_id');
    $funcionario->save();
    return response()->json($funcionario);
});

Route::get('/funcionarios/departamentos', function () {
    $funcionario = Funcionario::with('departamentos')->get();
    return response()->json($funcionario);
});

Route::get('/funcionarios', function () {
    $funcionario = Funcionario::all();
    return response()->json($funcionario);
});

Route::get('/funcionarios/{id}', function ($id) {
    $funcionario = Funcionario::find($id);
    return response()->json($funcionario);
});

Route::patch('/funcionarios/{id}', function (Request $request, $id) {
    $funcionario = Funcionario::find($id);

    if($request->input('nome') !== null) {
        $funcionario->nome = $request->input('nome');
    }

    if($request->input('email') !== null) {
        $funcionario->email = $request->input('email');
    }

    if($request->input('cpf') !== null) {
        $funcionario->cpf = $request->input('cpf');
    }

    if($request->input('telefone') !== null) {
        $funcionario->telefone = $request->input('telefone');
    }

    if($request->input('data_admissao') !== null) {
        $funcionario->data_admissao = $request->input('data_admissao');
    }
    
    if($request->input('cargo') !== null) {
        $funcionario->cargo = $request->input('cargo');
    }

    if($request->input('salario') !== null) {
        $funcionario->salario = $request->input('salario');
    }

    if($request->input('departamento_id') !== null) {
        $funcionario->departamento_id = $request->input('departamento_id');
    }

    $funcionario->save();

    return response()->json($funcionario);
});

Route::delete('/funcionarios/{id}', function ($id) {
    $funcionario = Funcionario::find($id);
    $funcionario->delete();
    return response()->json($funcionario);
});

Route::get('/departamentos/funcionarios/{id}', function ($id) {
    $departamento = Departamento::find($id);
    $funcionario = $departamento->funcionarios;
    return response()->json($funcionario);
});

Route::get('/funcionarios/departamentos/{id}', function ($id) {
    $funcionario = Funcionario::find($id);
    $departamento = $funcionario->departamentos;
    return response()->json($departamento);
});