<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Backend\Templates\TemplatesController;
use App\Models\AiChatCategory;
use Illuminate\Support\Facades\Artisan;
use DB;

class UpdateController extends Controller
{
    # init update 
    public function init()
    {
        return view('update.init');
    }

    # update complete
    public function complete()
    {
        #v1.1.0 
        try {
            if (env('APP_VERSION') == 'v1.0.0' || env('APP_VERSION') == '' || env('APP_VERSION') == null) {

                $sql_path = base_path('alterQueries/v110.sql');
                DB::unprepared(file_get_contents($sql_path));

                #v1.5.0
                $sql_path = base_path('alterQueries/v150.sql');
                DB::unprepared(file_get_contents($sql_path));


                #v2.0.0 
                $sql_path = base_path('alterQueries/v200.sql');
                DB::unprepared(file_get_contents($sql_path));
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        #v1.5.0 
        try {
            if (env('APP_VERSION') == 'v1.1.0') {

                $sql_path = base_path('alterQueries/v150.sql');
                DB::unprepared(file_get_contents($sql_path));

                #v2.0.0 
                $sql_path = base_path('alterQueries/v200.sql');
                DB::unprepared(file_get_contents($sql_path));
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        #v2.0.0 
        try {
            if (env('APP_VERSION') == 'v1.9.5') {
                $sql_path = base_path('alterQueries/v200.sql');
                DB::unprepared(file_get_contents($sql_path));
            }
        } catch (\Throwable $th) {
            //throw $th;
        }


        # add new data as required
        $this->__dbMigration();

        # latest version
        writeToEnvFile('APP_VERSION', 'v2.4.0');

        cacheClear();
        $oldRouteServiceProvider        = base_path('app/Providers/RouteServiceProvider.php');
        $setupRouteServiceProvider      = base_path('app/Providers/SetupServiceComplete.php');
        copy($setupRouteServiceProvider, $oldRouteServiceProvider);
        return view('update.complete');
    }

    # db migration
    private function __dbMigration()
    {
        try {
            # artisan cmd
            Artisan::call('migrate');
        } catch (\Throwable $th) {
            //throw $th;
        }

        try {
            # seeders
            Artisan::call('db:seed --class=PermissionsTableSeeder');

            if (AiChatCategory::withTrashed()->count() < 1) {
                Artisan::call('db:seed --class=AiChatCategoryTableSeeder');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        try {
            # import templates
            $templatesController = new TemplatesController();
            $templatesController->store();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
