<!--  

sending data using post method


<form action="/hi" method="post">
    @csrf
<input type="text" name="my_data">
<button type="submit">click</button>
</form>

Route::post('hi',function(Request $request){
    return $request;
});

output : it will return the submitted data (token+input data (request)) as a object
example:

{"_token":"xcNwcLx10WpRAz0rggakeX8N3KGbTz035WQsD","my_data":"moemen"} --}}

sending data using get method as parameter

//we can here specify the datatype using int,string.... before $name variable

Route::get('hi/{name}',function(int $name){   
    return $name;
});


--------------------------------------------------------------------------


Difference between using template engine (blade)  and native php on simple example:

Native php
<?php
/*
$name='moemen';
if($name === 'moemen'){
    echo 'You are an admin';
}
else{
    echo 'You are an user';
}

*?
?> 

using Template engine

@if ($name === 'moemen')
You are an admin
@else
You are an user
@endif


--------------------------------------------------------------------------


Layouts Using Template Inheritance

<!-- resources/views/layouts/app.blade.php -->
 
<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @endsection
 
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>

What @yield does ?
it is simply like a varible that has a custom name like sidebar here  @yield('content')

What @section does ?
when we want to modify the value or the content of @yield , we must use @section 

       @section('content')
            This is the master sidebar.
        @endsection


        output:
        This is the master sidebar.

Now if we want to show the content direcktly without needing to use @yield we can simply by using

      @section('content')
            This is the master sidebar.
        @show

         output:
        This is the master sidebar.

And if we want to use the current content and add others.. 
we can simply by adding @parent

    @section('content')
           @parent
           I love you
        @endsection

         output:
        This is the master sidebar.
         I love you



if we want to use the same above code and edit only in specific places

example:

<!-- resources/views/welcome.blade.php -->

we want to show app page in welcome page without writing the same code manually or repeating it

so we should extend it so how we can do that

@extends('layouts.app'); 



 -->
