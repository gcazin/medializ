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
        return (User::isAdmin()) ? view('admin.index') : redirect(route('home'));
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
        return (User::isAdmin()) ? view('admin.show') : redirect(route('home'));
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
           'url' => route('post.store')
        ]);
        return view('post.create', compact('form'));
    }

    public function update(int $id, Request $request, FormBuilder $formBuilder)
    {
        $post = Post::findOrFail($id);
        $postForm = PostForm::class;

        $form = $formBuilder->create($postForm);
        $form->redirectIfNotValid();

        $post->update($form->getFieldValues());
        return view(route('post.update', compact([
            'form',
            'post'
        ])));
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
