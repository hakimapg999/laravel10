<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Responses\Completions\CreateResponse;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');

    //$users = DB::select("select * from users where IDUser = ?", ['1']);
    //$users = DB::select("select * from users");
    //dd($users);

    //$users = DB::table('users')->where('IDUser', 1)->where('username', 'hakim')->get();
    //$users = DB::table('users')->get();
    /*
  $users = DB::table('users')->insert([
    'username' => 'a',
    'email' => 'b',
    'password' => '1234'
  ]);
*/
    /*
    $users = DB::table('users')
    ->where('IDUser', '4')
    ->update([
        'username' => 'abbc',
        'email' => 'bbc',
        'password' => '1234bbc'
    ]);
*/
    /*
    $users = DB::table('users')
        ->where('IDUser', '4')
        ->delete();*/



    /*
    $user = User::create([
        'username' => 'a',
        'email' => 'b',
        'password' => bcrypt('1234'),
    ]);
 */
    /* 
    $user = User::find(5);
    $user = $user->update([
        'email' => 'bbc' 
    ]);
*/
    /*
    $user = User::find(5);
    $user = $user->delete();
*/

    // $users = User::find(6);

    // dd($users->username);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


 
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
 dd($user);
    // $user->token
});