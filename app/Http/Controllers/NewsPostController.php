<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
class NewsPostController extends Controller
{

    var $field=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all news posts from DB as table
        $posts= NewsPost::orderby('id','DESC')->paginate(10);
        return view('news.dashboard', ['posts'=>$posts]);

    }


    function all(){

        $featured_news=NewsPost::featured()->active()->take(7)->get();
        $category_news=NewsPost::categories(11)->active()->take(10)->get();
        $sports_news=NewsPost::categories(14)->active()->take(4)->get();
        $state_wise=NewsPost::state('state1')->active()->take(4)->get();
        return view('allnews',
      compact(['featured_news','category_news','state_wise','sports_news']));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function category($category_id)
    {
        $news=NewsPost::categories($category_id)->active()->paginate(5);
        $categories=Category::all();
        $category_info=$categories->find($category_id);
        $pagename=($category_info)?$category_info->name:'';
        return view('category.show',compact('category_info','news','pagename'));
    }
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->search;
        $slug=Str::of($search)->slug('-');
        // Search in the title and body columns from the posts table
        $news = NewsPost::where('title', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")
                        ->orWhere('summary', 'LIKE', "%$search%")
                        ->orWhere('slug', 'LIKE', "%$slug%")
                        ->active()
                        ->paginate(5);
        $categories=Category::all();
        $pagename=$category_info=ucwords('search result for '.$search);
        // Return the search view with the resluts compacted
         return view('category.show',compact('category_info','news','pagename'));
    }



    public function create()
    {
        return view('news.form',['categories'=>Category::all()]);
    }
    public function edit(NewsPost $newsPost)
    {
        //returns the edit view with the post
        return view('news.form', ['post' => $newsPost,'categories'=>Category::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required','unique:news_posts,title'],
            'category_id' => 'required',
            'news_date' => 'required',
            'image'=> ['nullable', 'image','mimes:jpg,jpeg,png,bmp,tiff' ,'max:4096'],
            'description' => 'required'
        ],[],['image'=>'file','category_id'=>'category name']);
        $fields=[
            'slug'=>  Str::of($request->title)->slug('-'),
            'featured' => $request->has('featured'),
        ];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName=$image->store('public/news');
            $fields['image']=basename($imageName);
        }
        NewsPost::create(array_merge($request->all(), $fields));
        if ($request->ajax()) {
            return response()->json('<div class="alert alert-success">The news was created!</div>');
        }
        return back()->with('message', 'The news was created!');
    }

    public function show($id)
    {
        $related_news=null;
        $newsPost=NewsPost::find($id);
        if($newsPost)
        $related_news=NewsPost::categories($newsPost->category_id)
        ->where('id', '!=', $newsPost->id)
        ->active()
        ->limit(10)
        ->get();

         //returns the view with the post
         return view('news.show', compact(['newsPost','related_news']));
        return view('news.show',['post'=>$newsPost,'related_news'=>$related_news]);
    }

    public function state(Request $request)
    {    //returns the view with the post
        $state_wise =NewsPost::state($request->state)->active()->limit(10)->get();
        $html=view('news.statenews',compact('state_wise'));
        return response($html);
    }



    public function update(Request $request, NewsPost $newsPost)
    {
        $this->validate($request, [
            'title' => ['required',Rule::unique('news_posts')->ignore($newsPost)],
            'category_id' => 'required',
            'news_date' => 'required',
            'image'=> ['nullable', 'image','mimes:jpg,jpeg,png,bmp,tiff' ,'max:4096'],
            'description' => 'required'
        ],[],['image'=>'file','category_id'=>'category name']);
        $fields=[
            'slug'=>  Str::of($request->title)->slug('-'),
            'featured' => $request->has('featured'),
        ];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName=$image->store('public/news');
            $fields['image']=basename($imageName);
        }
        $newsPost->update(array_merge($request->all(), $fields));
        if ($request->ajax()){
            return response()->json('<div class="alert alert-success">The news was updated!</div>');
        }
        return back()->with('message', 'The news was updated!');
    }


    public function destroy(NewsPost $newsPost)
    {
        $newsPost->delete();
        return back()->with('message', 'The news was deleted!');
    }
}



?>

