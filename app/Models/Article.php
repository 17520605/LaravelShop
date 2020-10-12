<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [''];
    
    const STATUS_PUBLIC =1;
    const STATUS_PRIVATE =0;
    const HOT =1;
    protected $status=[
        1=>[
            'name'      =>  'public',
            'class'     =>  'label-danger'
        ],
        0=>[
            'name'      =>  'private',
            'class'     =>  'label-warning'
        ]
        ];
    protected $hot=[
        1=>[
            'name'      =>  'Hot',
            'class'     =>  'label-danger'
        ],
        0=>[
            'name'      =>  'None',
            'class'     =>  'label-warning'
        ]
        ];

    public function getStatus()
    {
        return array_get($this->status,$this->a_active,'[N\A]');
    }
    public function getHot()
    {
        return array_get($this->hot,$this->a_hot,'[N\A]');
    }
}
