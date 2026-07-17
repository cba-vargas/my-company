<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('starter:about', function (): void {
    $this->info('hiroshima Laravel 12 + React 19 starter template.');
})->purpose('Display hiroshima project information');
