<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the admin control panel.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.admin');
    }

    public function artisan($action)
    {
        $message = "";

        switch ($action) {

            case "migrate":
                Artisan::call('migrate');
                $message = Artisan::output();
                break;

            case "cache":
                Artisan::call('cache:clear');
                Artisan::call('route:clear');
                Artisan::call('view:clear');
                Artisan::call('event:clear');
                Artisan::call('config:clear');
                Artisan::call('route:clear');
                $message = "Cache ottimizzata";
                break;

            case "queue":
                Artisan::call('queue:work', ['--stop-when-empty' => true]);
                $message = Artisan::output();
                break;

            case "refresh":
                Artisan::call('migrate:refresh', ['--seed' => true,]);
                $message = "Database reimpostato";
                break;

            case "populate":
                Artisan::call('db:seed', ['--class' => 'DataSeeder',]);
                $message = "Database popolato";
                break;

            case "symboliclink":
                Artisan::call('storage:link', ['--force' => true,]);
                $message = Artisan::output();
                break;

            case "disablenewuser":
                $name = 'adminlte';
                $path = base_path('config/' . $name . '.php');
                $body = file_get_contents($path);
                $newbody = str_replace("'register_url' => 'register'", "'register_url' => false", $body);
                if ($body != $newbody) {
                    file_put_contents($path, $newbody);
                    // clear config cache
                    Artisan::call('cache:clear');
                    $message = "Registrazione utente disabilitata";
                } else {
                    $message = "Registrazione utente già disabilitata";
                }

                break;

            case "enablenewuser":
                $name = 'adminlte';
                $path = base_path('config/' . $name . '.php');
                $body = file_get_contents($path);
                $newbody = str_replace("'register_url' => false", "'register_url' => 'register'", $body);
                if ($body != $newbody) {
                    file_put_contents($path, $newbody);
                    // clear config cache
                    Artisan::call('cache:clear');
                    $message = "Registrazione utente abilitata";
                } else {
                    $message = "Registrazione utente già abilitata";
                }
                break;
        }

        return redirect()->route('admin.acp')->with('alert-message', $message)->with('alert-type', 'success');
        //        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admin.admin.acp');
    }
}
