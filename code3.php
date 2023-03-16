<?php

/* 

how to create database    

php artisan make:migration create_{tableName plural}_table 

how to add new column in table?
open  created table then go to the schema::create , inside it we have id column and timestamps column by default

now how to add new column ? like that
$table->typeofcolumn(columnname,length by default 255)

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('check')->default(0);
            $table->timestamps();
        });
    }

    we can set boolean column to default value using default() function


    rolling back migration

    php artisan migrate:rollback 
    go back to the last step u did in migration and cancel it  
    
    if i want to cancel a specific number of step , how we can do that?

    php artisan migrate:rollback --step={number of step to go back}

     php artisan migrate:reset  cancel all the last app that u do on database

php artisan migrate:refresh : rollback + migrate but !! if there is data in table it will delete it all.

php artisan migrate:fresh : drop all table + migrate 


if ww migrate a table then we forgot that we dont add a specific column , how to add it without
needing to delete the table then add it then migrate it ....

php artisan make:migration add_{column}_to_{tableName}

then write ur column then if we want to add it after specific column we can by using after() fucntion

     public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('body')->after('title');
        });
    }

    up function is like insert into database

    
    if we want to remove the added table we cant remove it by using roll back command
    we must use down function that delete the inserted column

        public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('body');
        });
    }
};

then run php artisan migrate:rollback 


how to connect column in table with other column in another table


    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();             
            $table->boolean('check')->default(0);
            $table->timestamps();
        });
    }

       $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();  

       here we have added user_id before in our table with id in users table 
       what cascadeOnDelete() does :The onDelete('cascade') means that when the row is deleted, it will delete all it's references and attached data too.



       Query builder

       Laravel's database query builder provides a convenient, fluent interface to creating and running database queries. It can be used to perform most database operations in your application and works perfectly with all of Laravel's supported database systems.

       


Insert data with query builder

 public function insert(Request $request){
        
        DB::table('posts')->insert([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        return response('Your data has inserted successufly');
    }


    how to get data from database to show it in page ?

        public function index(){
       $posts = DB::table('posts')->get();
       return view('posts.index',compact('posts'));
    } 

    how to get data from database to edit it in page ?
    
    public function edit($id){
        $post = DB::table('posts')->where('id',$id)->first();
        return view('posts.edit',compact('post'));
        }

   how to update data in database ?

   public function update(Request $request,$id){
            DB::table('posts')->where('id',$id)->update([
                'title'=>$request->title,
                'body'=>$request->body
            ]);

            return redirect()->route('posts');
            }

 how to delete data in database ?

               public function delete($id){
                DB::table('posts')->where('id','=',$id)->delete();

                return redirect()->route('posts');
            }












*/




?>
