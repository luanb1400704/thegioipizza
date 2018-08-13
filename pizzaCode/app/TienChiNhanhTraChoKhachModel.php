<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TienChiNhanhTraChoKhachModel extends Model
{
    protected $table = 'tien_chi_nhanh_tra_cho_khach';
    protected $primaryKey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_chinhanh',
        'sotien'
    ];
}
