<?php

namespace App\Http\Controllers\Post;

use Alaouy\Youtube\Facades\Youtube;
use App\Forms\PostForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\FormBuilder;

class PostController extends Controller {

    /**
     * Page principale
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Page de création d'un post
     *
     * @param FormBuilder $formBuilder
     * @return Factory|View
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PostForm::class, [
            'method' => 'POST',
            'url' => route('admin.post.store')
        ]);
        return view('post.create', compact('form'));
    }

    /**
     * Sauvegarde d'un nouveau post
     *
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(FormBuilder $formBuilder, Request $request)
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

        return redirect(route('home') . '/post/' . Post::all()->last()->id . '/' . Post::all()->last()->slug);
    }

    /**
     * Affichage d'un post
     *
     * @param $id
     * @param $slug
     * @return Factory|View|void
     */
    public function show($id, $slug)
    {
        $posts = Post::where([
            'id' => $id,
            'slug' => $slug
        ])->get();
        return view('post.show', compact('posts', $posts));
    }

    /**
     * Page d'édition d'un post
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Mise à jour d'un post
     *
     * @param int $id
     * @param PostRequest $request
     * @return Factory|View
     */
    public function update(int $id, PostRequest $request)
    {
        $post = Post::find($id);
        $post->slug = str_slug($request->title);
        $post->update($request->all());

        return redirect()->route('post.show', [$id, Post::find($id)->slug])
            ->with('success','Product updated successfully');
    }

    /**
     * Supprime un post
     *
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect(route('post.index'));
    }

    /**
     * @return Factory|View
     */
    public function threads()
    {
        return view('threads.index');
    }

}
