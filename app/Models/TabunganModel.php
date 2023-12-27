<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabunganModel extends Model
{
    protected $table = 'tabungan';
    protected $primaryKey = 'tabungan_id';

    protected $guarded = [];
}
