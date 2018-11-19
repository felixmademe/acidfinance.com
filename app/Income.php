<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public function category()
    {
        return $this->belongsTo( 'Category' );
    }

    public function user()
    {
        return $this->belongsTo( 'User' );
    }

    protected $table = 'incomes';
}
