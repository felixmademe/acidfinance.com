<?php

namespace App;

use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Expense extends Transaction
{
    //

    protected $table = 'expenses';
}
