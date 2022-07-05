<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer(
            'layout.navbar',
            function ($view) {
                $schedule = DB::table('schedule')->select('agenda_id')->get();
                $id = []; $arr = [];
                foreach($schedule as $value) {
                    $id[] = $value->agenda_id;
                }

                $agenda = DB::table('m-agenda')
                    ->select('m-agenda.*')
                    ->whereNotIn('id', $id)
                    ->orderBy('created_at', 'ASC')
                    ->get();

                $empatTahunYangLalu = date('Y-m-d', strtotime('-4 years'));
                $dosen = DB::table('m-dosen')
                    ->select('m-dosen.*')
                    ->where('m-dosen.mulai_aktif', '<', $empatTahunYangLalu)
                    ->orderBy('created_at', 'ASC')
                    ->get();

                $arr = [
                    'total' => count($agenda),
                    'tanggal' => Carbon::now()->diffForHumans($agenda[0]->tanggal),
                    'total_dosen' => count($dosen),
                    'tanggal_dosen' => Carbon::now()->diffForHumans(),
                ];

                $view->with('data', $arr);
            }
        );
    }
}
