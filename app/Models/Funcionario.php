<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $fillable = ['nome','email','cpf','telefone','data_admissao','cargo','salario','departamento_id'];

    public function departamentos() {
        return $this->belongsTo(Departamento::class, 'departamento_id','id');
    }
}
