<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\CommonMark\MarkdownConverterInterface;

class PostsController extends Controller
{

    /**
     * @var MarkdownConverterInterface
     */
    protected $converter;

    /**
     * PostsController constructor.
     *
     * @param MarkdownConverterInterface $converter
     */
    public function __construct(MarkdownConverterInterface $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug)
    {
        if (is_numeric($slug)) {
            $post = Post::findOrFail($slug);
        } else {
            $post = Post::where('slug', $slug)->firstOrFail();
        }

        if (empty($post)) {
            session()->flash('error', 'Tutorial not found !');
            return redirect('/');
        }

        $post->description = $this->converter->convertToHtml($post->description);
        return view('show', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:150',
            'description' => 'required|min:3',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title) . '-' . time();

        if ($post->save()) {
            session()->flash('success', 'Tutorial saved successfully !');
            return redirect()->route('posts.show', $post->slug);
        }

        session()->flash('error', 'Error saving tutorial !');
        return back()->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id)
    {
        $post = Post::find($id);

        if (empty($post)) {
            session()->flash('error', 'Tutorial not found !');
            return redirect()->route('posts.index');
        }

        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, int $id)
    {
        $post = Post::find($id);

        if (empty($post)) {
            session()->flash('error', 'Tutorial not found !');
            return redirect()->route('posts.index');
        }

        $this->validate($request, [
            'title' => 'required|min:3|max:150',
            'description' => 'required|min:3',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;

        if ($post->save()) {
            session()->flash('success', 'Tutorial updated successfully !');
            return redirect()->route('posts.show', $post->slug);
        }

        session()->flash('error', 'Error updating tutorial !');
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy(int $id)
    {
        $post = Post::find($id);

        if (empty($post)) {
            session()->flash('error', 'Tutorial not found !');
            return back();
        }

        if ($post->delete()) {
            session()->flash('success', 'Tutorial deleted successfully !');
        } else {
            session()->flash('error', 'Error deleting tutorial !');
        }

        return back();
    }
}
