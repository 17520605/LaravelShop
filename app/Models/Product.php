<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $guarded = [''];

    const STATUS_PUBLIC =1;
    const STATUS_PRIVATE =0;

    const HOT_ON =1;
    const HOT_OFF =0;
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
    protected $hot=[
        1=>[
            'name'      =>  'Nỗi bật',
            'class'     =>  'label-success'
        ],
        0=>[
            'name'      =>  'Không',
            'class'     =>  'label-warning'
        ]
        ];
    

    public function getStatus()
    {
        return array_get($this->status,$this->pro_active,'[N\A]');
    }

    public function getHot()
    {
        return array_get($this->hot,$this->pro_hot,'[N\A]');
    }

    public function category()
    {
        return $this->belongsTo(category::class,'pro_category_id');
    }
}
