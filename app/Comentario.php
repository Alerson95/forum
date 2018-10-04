<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function topico(){
        return $this->belongsTo('App\Topico');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
