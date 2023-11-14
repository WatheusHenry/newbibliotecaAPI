<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = ['titulo', 'autor', 'disponivel'];
    public function bibliotecaria()
    {
        return $this->belongsTo(Bibliotecaria::class);
    }
}
