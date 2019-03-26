<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class MonthlyTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds monthly records to new month"';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();

        foreach( $users as $user )
        {
            $user->copyLastMonthsTransactions( $user );
        }

        $this->info( 'User transactions updated!' );
    }
}
