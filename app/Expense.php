<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Expense extends Transaction
{
    public function category()
    {
        return $this->belongsTo( 'Category' );
    }

    protected $table = 'expenses';
}
