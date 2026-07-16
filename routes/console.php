<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('starter:about', function (): void {
    $this->info('Laravel 12 + React 19 reusable starter template.');
})->purpose('Display starter template information');
