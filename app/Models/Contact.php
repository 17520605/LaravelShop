<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $guarded = ['*'];

    const STATUS_PUBLIC =1;
    const STATUS_PRIVATE =0;
    protected $status=[
        1=>[
            'name'      =>  'public',
            'class'     =>  'label-danger'
        ],
        0=>[
            'name'      =>  'private',
            'class'     =>  'label-default'
        ]
        ];

    public function getStatus()
    {
        return array_get($this->status,$this->c_active,'[N\A]');
    }
}
