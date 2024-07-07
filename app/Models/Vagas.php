<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
    use HasFactory;
    protected $table = 'vagas';

    protected $fillable = [
        'NMVaga',
        'DSVaga',
        'TPVaga',
        'TPContrato',
        'Salario',
        'Local',
        'IDCategoria',
        'QTVagas',
        'IDEmpresa',
        'STVaga'
    ];
}
