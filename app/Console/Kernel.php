<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');

        Artisan::command('remove:caches', function () {
            Artisan::call("cache:clear");
            Artisan::call("view:clear");
            Artisan::call("clear-compiled");
            Artisan::call("config:clear");
            Artisan::call("route:clear");
        })->purpose('To clear all caches');
    }
}
