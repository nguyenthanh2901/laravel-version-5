<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table= 'articles';
    const HOT = 1;

    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => ''
        ],
        0 => [
            'name' => 'Private',
            'class' => ''
        ]
    ];

    protected $hot = [
        1 => [
            'name' => 'Hot',
            'class' => ''
        ],
        0 => [
            'name' => 'None',
            'class' => ''
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
