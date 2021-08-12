<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Http\Resources\Post as PostResource;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Post::class); //can the user view this contact (from contactPolicy)

        return PostResource::collection(request()->user()->posts);
    }

    public function store()
    {
        $this->authorize('create', Post::class);

        $post = request()->user()->posts()->create($this->validateData());

        return (new PostResource($post))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
        
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);
        return new PostResource($post);
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);

        $post->update($this->validateData());

        return (new PostResource($post))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response([], Response::HTTP_NO_CONTENT);
    }

    private function validateData()
    {
        return request()->validate([
            'date' => 'required',
            'subject' => 'required',
            'topic' => 'required',            
            'takeaway' => 'required',
      ]);
    }
}
