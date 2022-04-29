<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\CommonMark\MarkdownConverterInterface;

class PostsController extends Controller
{

    protected $converter;

    public function __construct(MarkdownConverterInterface $converter)
    {
        $this->converter = $converter;
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        return view('index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->description = $this->converter->convertToHtml($post->description);
        return view('show', compact('post'));
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

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

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

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
}
