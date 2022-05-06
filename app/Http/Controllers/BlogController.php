<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $articles = Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            return $q->where('title','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%");
        })->with('user','category')->orderBy('id','desc')->paginate('5');
//        return $articles;
        return view('blog.index',compact('articles'));
    }

    public function detail($slug){
//        return $slug;
        $article = Article::where('slug',$slug)->first();
//        return $article;
        $next = Article::where('id','>',$article->id)->first();
//        return $next;
        $previous = Article::where('id','<',$article->id)->latest('id')->first();
        return view('blog.detail',compact('article','next','previous'));
    }

    public function baseOnCategory($id){
        $articles = Article::where('category_id',"=",$id)->when(isset(request()->search),function ($q){
            $search = request()->search;
             $q->where('title','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%");
        })->with('user','category')->orderBy('id','desc')->paginate('5');
//        return $articles;
        return view('blog.index',compact('articles'));
    }

    public function baseOnUser($id){
//        return $id;
        $articles = Article::where('user_id',"=",$id)->when(isset(request()->search),function ($q){
            $search = request()->search;
            $q->where('title','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%");
        })->with('user','category')->orderBy('id','desc')->paginate('5');
//        return $articles;
        return view('blog.index',compact('articles'));
    }

    public function baseOnDate($date){
        return $date;
        $articles = Article::where('created_at',$date)->when(isset(request()->search),function ($q){
            $search = request()->search;
            $q->where('title','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%");
        })->with('user','category')->orderBy('id','desc')->paginate('5');
//        return $articles;
        return view('blog.index',compact('articles'));
    }

}
