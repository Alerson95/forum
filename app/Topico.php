<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
    

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function comentarios (){

        return $this->hasMany('App\Comentario');

    }
}
