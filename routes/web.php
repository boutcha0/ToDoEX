<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login'); // or redirect to your frontend login
})->name('login');

Route::get('/test-pusher', function() {
    event(new App\Events\TaskCreated(App\Models\Task::first()));
    return "Event fired!";
});

