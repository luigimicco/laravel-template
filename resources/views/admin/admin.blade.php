@extends('layouts.lte')

@section('title', 'Pannello di controllo')

@section('content')

    <div class="mt-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Ottimizzazioni ed aggiornamenti</h3>
                </div>
            </div>

            <div class="card-body">
                <a class="btn btn-warning btn-big " href="artisan/migrate">
                    <i class="fas fa-database"></i>
                    <span class="caption">Migrate</span>
                </a>

                <a class="btn btn-warning btn-big " href="artisan/cache">
                    <i class="fas fa-trash-alt"></i>
                    <span class="caption">Clear cache</span>
                </a>

                <a class="btn btn-warning btn-big " href="artisan/queue">
                    <i class="fas fa-hourglass"></i>
                    <span class="caption">Queue work</span>
                </a>


            </div>

        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Configurazione di base</h3>
                </div>
            </div>

            <div class="card-body">
                <a class="btn btn-info btn-big " href="artisan/symboliclink">
                    <i class="fas fa-link"></i>
                    <span class="caption">Crea link simbolico</span>
                </a>
                @if (config('adminlte.register_url', false) === false)
                    <a class="btn btn-info btn-big " href="artisan/enablenewuser">
                        <i class="fas fa-user-plus"></i>
                        <span class="caption">Abilita registrazione</span>
                    </a>
                @else
                    <a class="btn btn-info btn-big " href="artisan/disablenewuser">
                        <i class="fas fa-user-slash"></i>
                        <span class="caption">Disabilita registrazione</span>
                    </a>
                @endif
                <a class="btn btn-info btn-big " href="artisan/refresh">
                    <i class="fas fa-database"></i>
                    <span class="caption">Ripristina database</span>
                </a>
                <a class="btn btn-info btn-big " href="artisan/populate">
                    <i class="fas fa-users"></i>
                    <span class="caption">Popola database</span>
                </a>
            </div>

        </div>
    </div>
@stop
