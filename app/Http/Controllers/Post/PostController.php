<?php

namespace App\Http\Controllers\Post;

use Alaouy\Youtube\Facades\Youtube;
use App\Forms\PostForm;
use App\Http\Controllers\Controller;
use App\Post;
use App\Subcategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Kris\LaravelFormBuilder\FormBuilder;

class PostController extends Controller
{
    protected $redirectTo = '/admin';

    public function __construct()
    {
    }

    /**
     * Dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return (User::isAdmin()) ? view('admin.index') : redirect($this->redirectTo);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function media()
    {
        return view('pages.media');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function twittosphere()
    {
        return view('pages.twittosphere');
    }

    public function show()
    {
        return (User::isAdmin()) ? view('admin.admin-show-post') : redirect(route('home'));
    }

    public function subcategory(Request $request)
    {
        $post = Post::where('subcategory_id', $request->subcategory_id)->get();
        return view('pages.subcategory', compact('post', $post));
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PostForm::class, [
           'method' => 'POST',
           'url' => route('admin.store')
        ]);

        return view('admin.create', compact('form'));
    }

    public function delete(Request $request)
    {
        if(User::isAdmin()) {
            Post::findOrFail($request->id)->delete();
        }
        return redirect(route('admin.index'));
    }

    public function detail(Request $request)
    {
        $post = Post::where('id', $request->id)->get();
        return view('pages.detail', compact('post', $post));
    }

    protected function store(FormBuilder $formBuilder, Request $request)
    {
        /*$validatedData = $request->validate ([
            'category_id' => 'required|max:255',
            'youtube_url' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        $post = new Post();

        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        $youtube_url = $request->youtube_url;
        $title = $request->title;
        $description = $request->description;


        $avatar_channel = Youtube::getChannelById ($video_path->snippet->channelId);

        $post->category_id = $category_id;
        $post->subcategory_id = $subcategory_id;
        $post->youtube_url = $youtube_url;
        $post->title = $title;
        $post->description = $description;
        $post->image = $video_path->snippet->thumbnails->high->url;
        $post->author = $video_path->snippet->channelTitle;
        $post->slug = str_slug($title);
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect(route('home') . '/media/' . $post->id . '/' . $post->slug);*/

        $video_path = Youtube::getVideoInfo(Youtube::parseVIdFromURL($request->youtube_url));
        $form = $formBuilder->create(PostForm::class);
        $form->redirectIfNotValid();

        $form_values = $form->getFieldValues();
        $form_hidden = [
            'image' => $video_path->snippet->thumbnails->high->url,
            'author' => $video_path->snippet->channelTitle,
            'slug' => str_slug($request->title),
            'user_id' => Auth::user()->id
        ];
        $form_merge = array_merge($form_values, $form_hidden);
        Post::create($form_merge);

        return redirect(route('home') . '/media/' . Post::all()->last()->id . '/' . Post::all()->last()->slug);

    }
}
