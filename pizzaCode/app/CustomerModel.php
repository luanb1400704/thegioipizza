<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'user_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'user_id',
        'customer_birthday',
        'customer_cmnd',
        'customer_cmnd_ngaycap',
        'customer_gender',
        'customer_address',
        'customer_image',
        'customer_birthday',
        'customer_cmnd',
        'customer_cmnd_ngaycap',
        'id_employee'
    ];
}
