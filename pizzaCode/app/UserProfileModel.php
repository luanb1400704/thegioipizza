<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model
{
    protected $table = 'userprofile';
    protected $primaryKey = 'user_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'user_id',
        'user_cmnd',
        'user_ngaycap_cmnd',
        'user_gender',
        'user_address',
        'user_image',
        'user_at',
        'id_chinhanh',
    ];
}
