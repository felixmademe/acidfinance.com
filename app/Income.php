<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public function category()
    {
        return $this->belongsTo( 'Category' );
    }

    protected $table = 'incomes';
}
