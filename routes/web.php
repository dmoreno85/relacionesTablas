<?php

use Illuminate\Support\Facades\Route;

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
use App\Models\Post;
use App\Models\User;

Route::get('eloquent', function () {
    //  $posts = Post::all(); //accedemos a TODOS los registros de la bbdd
    //$posts = Post::where('id','>=','20')->get(); // Accedemos a la tabla posts de BBDD con un WHERE id >= '20'
    // $posts = Post::where('id','>=','20')->orderBy('id','desc')->get(); // Accedemos a la tabla posts de BBDD con un WHERE id >= '20' y orderBy id desc
    $posts = Post::where('id', '>=', '20')
        ->orderBy('id', 'desc')
        ->take(3)
        ->get(); // Accedemos a la tabla posts de BBDD con un WHERE id >= '20', orderBy id desc i cogemos 3
    foreach ($posts as $post) {
        echo "$post->id $post->title <br>";
    }
});

Route::get('posts', function () {
    $posts = Post::get(); //accedemos a TODOS los registros de la bbdd

    foreach ($posts as $post) {
        echo "
        $post->id 
        <strong>{$post->user->name }:  </strong>  
        $post->title
         <br>";
    }
});

Route::get('users', function () {
    $users = User::all(); //accedemos a TODOS los registros de la bbdd

    foreach ($users as $user) {    // posts por el la funcion configurada  public function posts() en User.php
        echo "
        $user->id 
        <strong>{$user->name }:  </strong>  
        tiene {$user->posts->count()} posts.     
         <br>";
    }
});

Route::get('collections', function () {
    $users = User::all(); //accedemos a TODOS los registros de la bbdd

    //dd($users);                        //dd(..),print_r(..) + die() y var_dump(00) parecido e console.log()
    //dd($users->contains(4));   //Dev los 4 primeros
    //dd($users->except([1,2,3])); //dev todo excepto 1,2,3
    //dd($users->only([4]));  //dev solo 4
    //dd($users->find([3]));  //busca el 3
    dd($users->load('posts'));  //Dev la relacion con posts // posts por el la funcion configurada  public function posts() en User.php
});

Route::get('serialization', function () { //Serializacion es la forma de presentar datos ya sea en array o json
    $users = User::all(); //accedemos a TODOS los registros de la bbdd
    //dd($users->toArray());  //Dev un array
    $user = $users->find(1); //Asignamos a la variable $user el resultado de envontrar ID 1
    //dd($user);             //Dev variable
    dd($user->toJson());     //Dev variable formato JSON
});