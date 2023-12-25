<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukutamu extends Model
{
    protected $fillable=['Nama','WhatsApp','Alamat'];
    protected $table ='Bukutamu';
}
