<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
  use HasFactory;

  protected $fillable = [
    'cliente',
    'profissional_id',
    'data_hora',
    'servico_id',
    'forma_pagamento',
    'valor',
  ];
}
