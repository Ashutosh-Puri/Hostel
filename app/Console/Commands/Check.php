<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Check extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Sheduled Cammands';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('check-night-out');
        Artisan::call('check-local-register');
        Artisan::call('check-come-from-home');
    }
}
