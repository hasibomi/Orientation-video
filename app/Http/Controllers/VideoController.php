<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;

class VideoController extends Controller
{
    /**
     * @var Video
     */
    protected $video;

    /**
     * @var Request
     */
    protected $request;

    /**
     * HomeController constructor.
     *
     * @param Video $video
     * @param Request $request
     */
    public function __construct(Video $video, Request $request)
    {
        $this->video = $video;
        $this->request = $request;
    }

    /**
     * Show the form to add a video.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('Admin.Videos.Add');
    }

    /**
     * Save a video to db.
     *
     * @return mixed
     */
    public function store()
    {
        // Validate input
        $this->validate($this->request,[
            'title' => 'required',
            'description' => 'required',
            'order_number' => 'required|integer',
            'embed_code' => 'required'
        ]);

        $this->video->create([
            'title' => $this->request->input('title'),
            'description' => $this->request->input('description'),
            'order_number' => $this->request->input('order_number'),
            'embed_code' => $this->request->input('embed_code'),
            'slug' => str_slug($this->request->input('title'), '-')
        ]);

        return redirect('dashboard/videos')->withSuccess('Video added');
    }

    /**
     * View a video.
     *
     * @param $slug
     * @return mixed
     */
    public function view($slug)
    {
        $slug = explode('-', $slug);
        $id = $slug[0];

        $video = $this->video->find($id);

        if($video->count() > 0)
        {
            return view('Admin.Videos.View')
                    ->withVideo($video);
        }

        abort(404);
    }

    /**
     * Edit a video.
     *
     * @param $slug
     * @return mixed
     */
    public function edit($slug)
    {
        $slug = explode('-', $slug);
        $id = $slug[0];

        $video = $this->video->find($id);

        if($video->count() > 0)
        {
            return view('Admin.Videos.Edit')
                ->withVideo($video);
        }

        abort(404);
    }

    /**
     * Update a video.
     *
     * @param $slug
     * @return mixed
     */
    public function update($slug)
    {
        // Validate input
        $this->validate($this->request,[
            'title' => 'required',
            'description' => 'required',
            'order_number' => 'required|integer',
            'embed_code' => 'required'
        ]);

        $slug = explode('-', $slug);
        $id = $slug[0];

        $video = $this->video->find($id);

        if($video->count() > 0)
        {
            $video->title = $this->request->input('title');
            $video->description = $this->request->input('description');
            $video->order_number = $this->request->input('order_number');
            $video->embed_code = $this->request->input('embed_code');
            $video->slug = str_slug($this->request->input('title'), '-');
            $video->save();

            return redirect('dashboard/videos')->withSuccess('Video updated');
        }

        abort(404);
    }

    /**
     * Delete a video.
     *
     * @param $slug
     * @return mixed
     */
    public function delete($slug)
    {
        $slug = explode('-', $slug);
        $id = $slug[0];

        $video = $this->video->find($id);

        if($video->count() > 0)
        {
            $video->delete();

            return redirect('dashboard/videos')->withSuccess('Video removed');
        }

        abort(404);
    }
}
