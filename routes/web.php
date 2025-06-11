<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('guest.show');
});

require __DIR__.'/guest.php';
