<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'post_id'];

    //Relacion uno a muchos inversa con usuario

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function post(){
        return $this->hasMany(Post::class);
    }

    /* Hacer que los comentarios en body siempre regresen en minusculas */
    protected function body(): Attribute
    {
        return new Attribute(
            set: function($value){
                return strtolower($value);
            }
        );
    }
}
