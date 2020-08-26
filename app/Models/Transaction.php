<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = ['*'];

    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;
    const TYPE_CART = 1;
    const TYPE_PAY  = 2;

    public function user()
    {
        return $this->belongsTo(User::class,'tr_user_id');
    }
}
