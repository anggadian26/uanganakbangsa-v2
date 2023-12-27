<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoModel extends Model
{
    protected $table = 'saldo';
    protected $primaryKey = 'saldo_id';

    protected $guarded = [];
}
