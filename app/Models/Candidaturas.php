<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidaturas extends Model
{
    use HasFactory;
    protected $table = 'candidaturas';

    protected $fillable = [
        'Candidato',
        'Linkedin',
        'Telefone',
        'Foto',
        'IDVaga',
        'Curriculo'
    ];
}
