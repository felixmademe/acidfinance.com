<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function category()
    {
        return $this->belongsTo( 'App\ExpenseCategory' );
    }

    public function user()
    {
        return $this->belongsTo( 'App\User' );
    }

    protected $table = 'expenses';
}
