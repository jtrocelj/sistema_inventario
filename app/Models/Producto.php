<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','barcode','costo','precio','stock','alerts','image','categoria_id'];


    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function getImagenAttribute(){
        if(file_exists('storage/producto/' . $this->image))
          return $this->image;
        else
          return 'sinImagen.jpg';
  
  
      }
}
