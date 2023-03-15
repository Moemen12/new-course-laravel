<?php

/*

what is controller in laravel

Instead of defining all of your request handling logic as closures in your route files, you may wish to organize this behavior using "controller" classes. Controllers can group related request handling logic into a single class. For example, a UserController class might handle all incoming requests related to users, including showing, creating, updating, and deleting users. By default, controllers are stored in the app/Http/Controllers directory.

create first controller using terminal
php artisan make:controller {controller_name}

convention name : it isnt neccessary to write it like that but the best and in general all programmer follow it .
it must be start with  capital letter. // Post or PostController

Now when we want to call the controller and using it in web file , we can use it like this

// Route::get('posts',[PostController::class,'showUsers']);
then in the controller itself we must do the function that route us to the wanted page inside
the controller


class PostController extends Controller
{

    public function showUsers(){
        return 'user';
    }

}

multiple controller examples?

Route::get('posts',[PostController::class,'showUsers']);
Route::get('posts/create',[PostController::class,'createPost']);
Route::get('posts/edit/{id}',[PostController::class,'editPost']);
Route::get('posts/update/{id}',[PostController::class,'updatePost']);
Route::get('posts/delete/{id}',[PostController::class,'deletePost']);


OR

we can group all route in one controller without needing to write the controller name more than one time

example:

Route::controller(PostController::class)->group(function(){
    Route::get('posts','showUsers');
    Route::get('posts/create','createPost');
    Route::get('posts/edit/{id}','editPost');
    Route::get('posts/update/{id}','updatePost');
    Route::get('posts/delete/{id}','deletePost');
});



Postcontroller file

class PostController extends Controller
{

    public function showUsers(){
        return 'user';
    }
    public function createPost(){
        return 'posts_create';
    }
    public function editPost(){
        return 'posts_edit';
    }
    public function updatePost(){
        return 'posts_update';
    }
    public function deletePost(){
        return 'posts_delete';
    }


    

}


now if we want to create the all functions we can do it by taping the command
php artisan make:controller {name} resource or-r 

now if we want to create the resource controller but i dont need to use a function of them 

how we can do that?

we can by using 2 methode except or only like this

Route::resource('users',UserController::class)->except([
    'show'
]);

All function route's will work except show function

Route::resource('users',UserController::class)->only([
    'show'
]);

All function route's willn't work only show function will work


Single action controllers (invokable)
if we have single action we can use it
php artisan make:controller {name} -i or --invokable

Route::get('user_profile',UserProfileController::class);


Notice : of course we can do normal controller and give it one action 

only the syntax will be changed

Route::get('posts',[PostController::class,'showUsers']);


what is migration

Laravel Migration is an essential feature in Laravel that allows you to create a table in your database. It allows you to modify and share the application's database schema. You can modify the table by adding a new column or deleting an existing column.


how to connect my project with database ?

1-open xampp server and turn on sql
2-open phpmyadmin and create database
3-open env file
4-change DB_DATABASE to  name of the current created database

then open terminal and tap the below command

php artisan make:migrate 

the 4 tables in migration folder will be in the database

how to know the tables that didnt make migration to it in database

php artisan migrate:status

















*?




?>
