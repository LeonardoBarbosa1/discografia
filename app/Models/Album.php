<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faixa;

class Album extends Model
{
    use HasFactory;

    //Especificando o nome da tabela no banco de dados
    protected $table = 'albuns';

    protected $fillable = [
        'nome',
        'ano'
    ];

    //A relação hasMany é usada para indicar que um modelo possui vários registros relacionados em outra tabela.
    public function faixa()
    {
        return $this->hasMany(Faixa::class,'album_id','id');
    }
}
