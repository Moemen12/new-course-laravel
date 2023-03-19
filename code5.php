<?php
/*

restore data using model

    public function restore($id){
        Post::withTrashed()
        ->where('id',$id)
        ->restore();
        return redirect()->back();     //return us to the same page
  }

how to remove the deleted items from database


public function forcedelete($id){
    Post::withTrashed()
    ->where('id',$id)
    ->forceDelete();
    return redirect()->back();
}


Query scopes using model

if there are so many conditions we must we using Query scopes , it makes the site more performance

how u can use it?

go to model 

make a function start with scope + name


 public function scopeConditions($query){
        return $query->where('body', '=','kanaan');
    }


  write all ur conditions above then call it by using only its name in controller like this

      public function index()
    {
        $posts = Post::Conditions()->get();
        return view('posts.index',compact('posts'));
    }


validation


    public function store(Request $request)
    {
 
        $request->validate([
            'title'=>'required',
            'body'=>'required',

        ]);



        Post::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        return response('the info has added');
    }


    how to show this error in page ?

    <input type="text" name="title" placeholder="Enter title">
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br><br>
<input type="text" name="body" placeholder="Enter body">
@error('body')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror




php artisan make:request requestName

    public function authorize(): bool
    {
        return false;
    }

    change from false to true 

    public function authorize(): bool
    {
        return true;
    }




    then in rules function write all your validation 


      public function rules(): array
    {
        return [
            'title'=>'required',
            'body'=>'required',
        ];

        and if we want to customize our message we can 
            in rules function

        public function messages(): array
               {
    return [
        'title.required' => 'A title is required',
        'body.required' => 'A message is required',
    ];
              }


if user submitted the data how can store the data in input

<input type="text" name="title" value="{{ old('title') }}">




    }


    then in controller pass it to function


        public function store(StorePostRequest $request)
    {
 
    
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        return response('the info has added');
    }


*/



?>
