<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'profissional',
        'data',
        'hora',
        'servico',
        'forma de pagamento',
        'valor',
      ];
}
