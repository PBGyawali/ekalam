<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
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
        //fetch all blog posts from DB
        $posts= NewsPost::all();
        return view('dashboard', ['posts'=>$posts]);
    }

    function all(){
        $categories=Category::all();
        $featured=NewsPost::where('featured',true);
        $featured_news=$featured->take(3)->get();
        $next_featured_news=$featured->skip(3)->take(3)->get();
        $first_element= $featured->skip(6)->first();
        $category_news=NewsPost::where('category_id','11');
        $first_category_element=$category_news->first();
        $first_category=$category_news->skip(1)->take(3)->get();
        $second_category=$category_news->skip(4)->take(3)->get();
        $third_category=$category_news->skip(7)->take(3)->get();
        $all=config('constants.states');
        //array_shift($all);
        $sports_news=NewsPost::where('category_id','14')->skip(1)->take(3)->get();
        $second_news=NewsPost::where('category_id','14')->first();
        foreach( $all as $key=> $state){
            $state_wise[$key]=NewsPost::where('state',$key)->limit(3)->get();
        }
        return view('allnews',
        compact(
        ['categories','featured_news',
        'next_featured_news','first_element','first_category','first_category_element',
        'state_wise','sports_news','second_news','second_category','third_category'
        ]));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function category($category_id)
    {
        $news=NewsPost::where(['category_id'=>$category_id])->paginate(3);
        $categories=Category::all();
        $category_info=Category::where(['id'=>$category_id])->first();
        $pagename=($category_info)?$category_info->name:'';
        return view('category.show',compact('category_info','categories','news','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form',['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required','unique:news_posts'],
            'category_id' => 'required',
            'news_date' => 'required',
            'image'=> ['nullable', 'image','mimes:jpg,jpeg,png,bmp,tiff' ,'max:4096'],
            'description' => 'required'
        ],[],['image'=>'file','category_id'=>'category name']);
        $fields=[
            'slug'=>  Str::of($request->title)->slug('_'),
            'featured' => $request->has('featured'),
        ];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName=$image->store('public/news');
            $fields['image']=basename($imageName);
        }
        NewsPost::create(array_merge($request->all(), $fields));
        return redirect()->back()->with('message', 'The news was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function show(NewsPost $newsPost)
    {
         //returns the view with the post
         $related_news=NewsPost::where(['category_id'=>$newsPost->category_id])
         ->where('id', '!=', $newsPost->id)->limit(4)->get();
        return view('show',['post'=>$newsPost,'categories'=>Category::all(),'related_news'=>$related_news]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsPost $newsPost)
    {
        //returns the edit view with the post
        return view('form', ['post' => $newsPost,'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsPost $newsPost)
    {
        $this->validate($request, [
            'title' => ['required','unique:news_posts'],
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
        return redirect()->back()->with('message', 'The news was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPost $newsPost)
    {
        $newsPost->delete();
        return redirect()->back()->with('message', 'The news was deleted!');
    }
}
