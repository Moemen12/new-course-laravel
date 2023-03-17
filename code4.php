<?php

/*

how to delete  all row in table

  public function deleteAll(){
                DB::table('posts')->delete();
                return redirect()->route('posts');
            }


if we delete all row in table the data will remove but the id will start from the lastest id 
if we want to make it starting from 1 and remove all row too we can

      public function deleteAll(){
                DB::table('posts')->truncate();
                return redirect()->route('posts');
            }
            

            what is Eloquent ?

            Laravel includes Eloquent, an object-relational mapper (ORM) that makes it enjoyable to interact with your database. When using Eloquent, each database table has a corresponding "Model" that is used to interact with that table. In addition to retrieving records from the database table, Eloquent models allow you to insert, update, and delete records from the table as well.


     how to create a model?
     php artisan make:model {modelName} modelName must be in singular (convention name) and first letter capital

     how to create the table and it's model in the same time?
     you can by using 
     php artisan make:model -m or php artisan make:model --migration


  now   how to create the table and it's model and it's controller in the same time?

php artisan make:model Post -mc


php artisan make:model Post -mcr -> resource controller

using the Eloquent there is 2 methods to insert data 

first method :

    public function store(Request $request)
    {
         $post= new Post();
         $post->title = $request->title;
         $post->body = $request->body;

         $post->save();
         return response('the info has inserted successufly');
    }

second method :

    public function store(Request $request)
    {
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        return response('the info has inserted successufly');
    }



if we use this method we must go to the model and add the $fillable variable:

  class Post extends Model
{
    use HasFactory;

    protected $fillable =['title','body'];

}


how to get data from database

    public function index()
    {
        $posts = Post::all();  or  $posts = Post::get();
        return $posts;
    }


how to edit value

   public function edit($id)
    {
        $post = Post::findorFail($id);  or    $post = Post::where('id',$id)->first();
        return view('posts.edit',compact('post'));
    }

notice findorFail() work only with it !!! but by using where u can do any condition u want

how to update value


first method


   public function update(Request $request,$id)
    {
        $post = Post::findorFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('posts.index');
    }

second method

   public function update(Request $request,$id)
    {
        $post = Post::findorFail($id);
       $post->update([
        'title'=>$request->title,
         'body'=>$request->body
       ]);
        return redirect()->route('posts.index');
    }




how to delete value

first method

    public function destroy($id)
    {
        Post::findorFail($id)->delete();
        return redirect()->route('posts.index');

    }


    second method

    public function destroy($id)
    {
        Post::destroy($id);             // destroy take many id to delete
        
        return redirect()->route('posts.index');

    }



*/


?>
