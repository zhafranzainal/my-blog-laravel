<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Http\Resources\BlogResource;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Requests\BlogStoreRequest;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BlogPost::get();

        return $this->return_api(true, Response::HTTP_OK, null, BlogResource::collection($data), null, null);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        $validated = $request->validated();

        $blog = BlogPost::create($validated);

        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blog)
    {
        return $this->return_api(true, Response::HTTP_OK, null, new BlogResource($blog), null, null);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, BlogPost $blog)
    {
        $validated = $request->validated();
        $blog->update($validated);

        return $this->return_api(true, Response::HTTP_ACCEPTED, null, null, null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return $this->return_api(true, Response::HTTP_ACCEPTED, null, null, null);
    }
}
