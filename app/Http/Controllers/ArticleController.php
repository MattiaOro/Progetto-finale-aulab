<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PublicController;


class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::where('is_accepted',true)->orderBy('created_at','desc')->get();
        return view('Articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Articles.create');

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
       

    

        $article=Article::create([
    
            'title'=>$request->input('title'),
            'subtitle'=>$request->input('subtitle'),
            'body'=>$request->input('body'),
            'img'=>$request->file('img')->store('public/img'),
            'category_id'=>$request->category,
            'user_id'=>Auth::user()->id,
            'slug'=>Str::slug($request->title),
        ]);

        $tags=explode(',',$request->tags);

        foreach ($tags as $tag){
            $newTag=Tag::updateOrCreate([
                'name'=>$tag
            ]);
            $article->tags()->attach($newTag);
        }
        
        return redirect (route ('homepage'))->with('message','Articolo inviato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    
    {
        return view('Articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('Articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'=>'required|min:5|unique:articles,title,' . $article->id,
            'subtitle'=>'required|min:5|unique:articles,subtitle,' . $article->id,
            'body'=>'required|min:10',
            'image'=>'image',
            'category'=>'required',
            'tags'=>'required'
        ]);
        $article->update([
         'title'=>$request->title,
         'subtitle'=>$request->subtitle,
         'body'=>$request->body,
         'category_id'=>$request->category,
         'slug'=>Str::slug($request->title),
         

        ]);
        if ($request->image) {
            Storage::delete($article->img);
            $article->update([
                'img'=>$request->file('image')->store('public/img')
            ]);
        }
        $tags=explode(',',$request->tags);
        $newTags=[];
        
        foreach($tags as $tag){
            $newTag=Tag::updateOrCreate([
                'name'=>$tag,
            ]);
            $newTags[]=$newTag->id;
        }
        $article->tags()->sync($newTags);

        return redirect (route ('writer.dashboard'))->with('message','Hai correttamente aggiornato questo articolo');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag){
            $article->tags()->detach($tag);
        }
        $article->delete();
        return redirect (route ('writer.dashboard'))->with('message','Hai correttamente cancellato questo articolo');
    }

    //! Filter by category

    public function byCategory(Category $category)
    {
        $articles=$category->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted==true;
        });
        return view('Articles.by-category',compact('category','articles'));
    }

     //! Filter by writer

     public function byWriter(User $user)
     {
         $articles=$user->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted==true;});
         return view('Articles.by-user',compact('user','articles'));
     }
//! Funzione ricerca
     public function articleSearch(Request $request){
        $query=$request->input('query');
        $articles=Article::search($query)->where('is_accepted',true)->orderBy('created_at','desc')->get();

        return view('Articles.search-index', compact('articles', 'query'));
     }

    
}
