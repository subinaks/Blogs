<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $posts = Post::where('user_id',Auth::user()->id)->get();
        return view('blogs.dashboard', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
    
        try {
            DB::beginTransaction();

            if(isset($request->main_image))
            {
                $imageName = time() . '.' . $request->main_image->extension();
                $request->main_image->move(public_path('images'), $imageName);
            }
            

            $product = Post::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'content' => $request->description,
                'slug'=>Str::slug($request->title),
                'main_image' => $imageName??NULL,
                'user_id'=>Auth::user()->id,
            ]);

            DB::commit();

            return response()->json(['success' => 'Blog added successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json(['error' => 'Failed to add blog'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $post = Post::where('slug',$slug)
        ->where('user_id',Auth::user()->id)->first();
    
        return view('blogs.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $slug)
    {
        try {
            DB::beginTransaction();
            $post = Post::where('slug',$slug)
            ->where('user_id',Auth::user()->id)->first();
            $post->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'description' => $request->description,
            ]);
    
            if ($request->hasFile('main_image')) {
                $imageName = time() . '.' . $request->main_image->extension();
                $request->main_image->move(public_path('images'), $imageName);
                $post->main_image = $imageName;
            }
    
            $post->save();
    
            DB::commit();
    
            return response()->json(['success' => 'Blog updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json(['error' => 'Failed to update Blog'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            $post=Post::where('slug',$slug)
            ->where('user_id',Auth::user()->id)->first();
            $post->delete();
            return response()->json(['success' => 'Blog deleted successfully']);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Failed to delete Blog'], 500);
        }
    }
}
