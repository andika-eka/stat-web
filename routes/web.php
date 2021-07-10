<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\statController;


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

//ps. maaf di buat secara tergesa-gesa jadi tanpa comment
//tar tak benerin kalo ada niat


Route::get('/', [PagesController::class, 'index']);
// Route::get('/data', [PagesController::class, 'data']);
Route::get('/info', [PagesController::class, 'info']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/bergolong', [PagesController::class, 'DataBergolong']);

Route::resource('Data', DataController::class );

Route::get('/export', [PagesController::class, 'export']);
Route::get('/import', [PagesController::class, 'import']);

Route::get('/exportdata', [DataController::class, 'export']);
Route::get('/exportMoment', [statController::class, 'exportMoment']);
Route::get('/exportUjiT', [statController::class, 'exportUjiT']);
Route::get('/exportAnava', [statController::class, 'exportAnava']);

Route::get('/importdata', [DataController::class, 'import']);
Route::post('/importdata', [DataController::class, 'importFile']);
Route::post('/importMoment', [statController::class, 'importMoment']);
Route::post('/importUjit', [statController::class, 'importUjit']);
Route::post('/importAnava', [statController::class, 'importAnava']);

Route::get('/chi', [PagesController::class, 'chi']);
Route::get('/Lilliefors', [PagesController::class, 'Lilliefors']);


Route::get('/indexMoment', [statController::class, 'indexMoment']);
Route::get('/indedxUjit', [statController::class, 'indedxUjit']);
Route::get('/indexAnava', [statController::class, 'indexAnava']);

Route::delete('/data', [DataController::class, 'truncate']);
Route::delete('/moment', [statController::class, 'truncateMoment']);
Route::delete('/ujit', [statController::class, 'truncateUjit']);
Route::delete('/anava', [statController::class, 'truncateAnava']);

/*
+--------+-----------+------------------+--------------+---------------------------------------------+------------+
| Domain | Method    | URI              | Name         | Action                                      | Middleware |
+--------+-----------+------------------+--------------+---------------------------------------------+------------+
|        | GET|HEAD  | /                |              | App\Http\Controllers\PagesController@index  | web        |
|        | GET|HEAD  | Data             | Data.index   | App\Http\Controllers\DataController@index   | web        |
|        | POST      | Data             | Data.store   | App\Http\Controllers\DataController@store   | web        |
|        | GET|HEAD  | Data/create      | Data.create  | App\Http\Controllers\DataController@create  | web        |
|        | GET|HEAD  | Data/{Data}      | Data.show    | App\Http\Controllers\DataController@show    | web        |
|        | PUT|PATCH | Data/{Data}      | Data.update  | App\Http\Controllers\DataController@update  | web        |
|        | DELETE    | Data/{Data}      | Data.destroy | App\Http\Controllers\DataController@destroy | web        |
|        | GET|HEAD  | Data/{Data}/edit | Data.edit    | App\Http\Controllers\DataController@edit    | web        |
|        | GET|HEAD  | about            |              | App\Http\Controllers\PagesController@about  | web        |
|        | GET|HEAD  | api/user         |              | Closure                                     | api        |
|        |           |                  |              |                                             | auth:api   |
|        | GET|HEAD  | info             |              | App\Http\Controllers\PagesController@info   | web        |
+--------+-----------+------------------+--------------+---------------------------------------------+------------+
*/
