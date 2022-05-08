<?php

namespace App\Console;

use App\Models\Auction;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB as FacadesDB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            
        //find the corresponding records and update the status field.
            // $currentDateTime = Carbon::now();

            // $auctions = FacadesDB::table('auctions')
            //                     ->where('status','=','approved');

            // foreach($auctions as $auction){

            //     $endingDateTime = $auction->ending_at;

            //     if($currentDateTime->gte($endingDateTime)){

            //         $auction->status = "ended";
            //     }
            // }

            dd('hai');
            return redirect('/');
        })->everyMinute();
     }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
