<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBanhModel extends Model
{
    protected $table = 'loaibanh';
    protected $primaryKey = 'l_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'l_id',
        'l_ten',
        'l_kichthuoc',
    ];
}
