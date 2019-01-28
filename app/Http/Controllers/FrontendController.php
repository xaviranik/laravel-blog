<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class FrontendController extends Controller
{

    public function index()
    {
        $categories = Category::take(5)->get();
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();

        // Finding category & respective posts
        $angular_posts = Category::find(1)->posts()->orderBy('created_at', 'desc')->take(3)->get();
        $laravel_posts = Category::find(2)->posts()->orderBy('created_at', 'desc')->take(3)->get();
        $django_posts = Category::find(3)->posts()->orderBy('created_at', 'desc')->take(3)->get();
        
        return view('index')
        ->with('categories', $categories)
        ->with('first_post', $posts[0])
        ->with('second_post', $posts[1])
        ->with('third_post', $posts[2])
        ->with('angular_posts', $angular_posts)
        ->with('django_posts', $django_posts)
        ->with('laravel_posts', $laravel_posts);
    }

    public function singlePost($slug)
    {
        $categories = Category::take(5)->get();
        $post = Post::where('slug', $slug)->first();
        $all_tags = Tag::all();

        // Getting next and previous post
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

        $next_post = Post::find($next_id);
        $prev_post = Post::find($prev_id);

        return view('single')
        ->with('post', $post)
        ->with('all_tags', $all_tags)
        ->with('categories', $categories)
        ->with('next_post', $next_post)
        ->with('prev_post', $prev_post);
    }

    public function categoryPost($id)
    {
        $categories = Category::take(5)->get();
        $category = Category::find($id);

        return view('category')
        ->with('categories', $categories)
        ->with('category', $category);
    }

    public function tagPost($id)
    {
        $categories = Category::take(4)->get();
        $tag = Tag::find($id);

        return view('tag')
        ->with('categories', $categories)
        ->with('tag', $tag);
    }

    public function searchPost()
    {
        dd($search->all());
    }

}
