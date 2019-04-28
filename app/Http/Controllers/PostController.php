<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use DB;

class PostController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'verified']);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //$postsUser = Post::all();

        $postsUser = Post::with('user')->paginate(5);
        return view('posts.index', ['postsUser' => $postsUser]);
        //return view('posts.index', compact('postsUser'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('posts.new');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => 'required',
            ]);
            Post::create([
                'title' => request('title'),
                'content' => request('content'),
                'tags' => request('tags'),
                'user_id' => Auth()->user()->id

                ]);
                return redirect()->route('posts.index')->with('success', 'Post is created');
            }

            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show($id)
            {
                $post = Post::find($id);
                return view('posts.show', compact('post'));
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit($id)
            {
                $post = Post::find($id);
                if($post !== NULL && Auth::user()->id === $post->user_id) {
                    return view('posts.edit' , compact('post'));
                }
                else {
                    return abort(404);
                }
            }
            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, $id)
            {
                $request->validate([
                    'title'=>'required',
                    'content'=>'required',
                    'tags'=>'required',
                    ]);
                    $update = Post::find($id);
                    $update->title =  $request->get('title');
                    $update->content = $request->get('content');
                    $update->tags = $request->get('tags');
                    $update->save();

                    return redirect()->route('postsShow', $update->id )->with('success', 'Post updated!');
                }

                /**
                * Remove the specified resource from storage.
                *
                * @param  int  $id
                * @return \Illuminate\Http\Response
                */
                public function deletePost($id)
                {
                    $post = Post::find($id);
                    if($post !== NULL && Auth::user()->id === $post->user_id) {

                        return view('posts.delete', compact('post'));
                    }
                    else {
                        return abort(404);
                    }
                }

                public function destroy($id)
                {
                    $id = Post::find($id);
                    $id->delete();
                    return redirect()->route('posts.index')->with('success', 'Post Deleted !');
                }

                public function tag(Request $request)
                {
                    $tag = $request->input('tags');
                    $posts = $this->blog_gestion->indexTag($this->nbrPages, $tag);
                    $links = $posts->setPath('')->appends(compact('tags'))->render();
                    $info = trans('front/blog.info-tag') . '<strong>' . $this->blog_gestion->getTagById($tag) . '</strong>';

                    return view('front.blog.index', compact('posts', 'links', 'info'));
                }
            }
