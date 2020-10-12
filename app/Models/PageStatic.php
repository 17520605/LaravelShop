<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageStatic extends Model
{
    protected $table = 'page_statics';
    protected $guarded = [''];
    const TYPE_ABOUT =1;
    const TYPE_INFO_SHOPPING =2;
    const TYPE_SECURITY =3;
    const TYPE_POLICY =4;
}
