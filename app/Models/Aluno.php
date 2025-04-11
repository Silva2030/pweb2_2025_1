<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = "alunos";

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'categoria_id',
    ];
    public function categoria(){
        return $this->belongsTo(CategoriaAaluno::class,'categoria_id');
    }
}
