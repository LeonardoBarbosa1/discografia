<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Album;
class Faixa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'duracao',
        'album_id'
    ];

    //A relação belongsTo é para indicar que um modelo pertence a outro modelo em uma relação de um-para-muitos. 
    public function album()
    {
        return $this->belongsTo(Album::class,'album_id','id');
    }
}
