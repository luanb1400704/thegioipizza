<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanhModel extends Model
{
    protected $table = 'banh';
    protected $primaryKey = 'b_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'b_id',
        'b_ten',
        'b_mota',
        'b_anh',
        'b_bst',
    ];
}
