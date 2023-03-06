<?php

use App\Http\Controllers\AvatarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravolt\Avatar\Facade as Avatar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('avatar', function (Request $request) {
    return Avatar::create($request->name)->toSvg();
});

Route::view('/{any}', 'app')->where('any', '.*');
