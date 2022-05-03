<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;
    protected $table = 'canciones';
    protected $guarded = [];

    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }

    public function albumes(){
        return $this->belongsToMany(Album::class);
    }
}
