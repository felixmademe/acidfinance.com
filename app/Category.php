<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function incomes()
    {
        return $this->hasMany('App\Income');
    }

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }

    protected $table = 'catergories';
}
