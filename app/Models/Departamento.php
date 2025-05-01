<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Funcionario;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $fillable = ['nome','descricao','responsavel'];

    public function funcionarios() {
        return $this->hasMany(Funcionario::class, 'departamento_id', 'id');
    }
}
