<?php

use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return Inertia::render('Main');
});

Route::post('/feedback/create', [FeedbackController::class, 'create']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $feedbacks = Feedback::all();
    return Inertia::render('Dashboard', compact('feedbacks'));
})->name('dashboard');
