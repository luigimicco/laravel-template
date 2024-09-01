@extends('adminlte::page')

@section('about')
    <x-adminlte-modal id="modalCustom" title="Info su .." size="lg" theme="teal" icon="fas fa-info" v-centered
        static-backdrop scrollable>
        <div>
            <h1>{{ config('app.name', 'Laravel') }} <small>(ver. {{ config('adminlte.version', '0.0.0') }})</small></h1>
            <p>Template for application.</p>
            <p>Autore: Luigi Micco</p>
        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button theme="success" label="Chiudi" data-dismiss="modal" />
        </x-slot>
    </x-adminlte-modal>
@stop

@section('footer')
    <div class="d-flex justify-content-between">
        <div class="flex-grow-1">
            Copyright © 2024 <strong>@yield('copyright', config('adminlte.copyright', ''))</strong>. All rights reserved.
        </div>
        <div>
            <strong>Version&nbsp;</strong>@yield('version', config('adminlte.version', '0.0.0'))
        </div>
    </div>
@stop

@section('js')
    <!-- script src="{{ asset('js/commons.js') }}"></script -->
@stop

@push('js')
    @vite('resources/js/app.js')
    <!-- script src="{{ asset('js/commons.js') }}"></script -->
@endpush

@section('adminlte_css')
    @vite('resources/sass/app.scss')
@stop
