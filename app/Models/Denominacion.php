<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denominacion extends Model
{
    use HasFactory;
    protected $fillable = ['tipo','valor','image'];

    public function getImagenAttribute(){
        if(file_exists('storage/denominacion/' . $this->image))
          return $this->image;
        else
          return 'sinImagen.jpg';
  
  
      }
}
