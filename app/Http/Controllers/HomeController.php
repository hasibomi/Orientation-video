<?php

namespace App\Http\Controllers;

use App\User;
use App\UserVideo;
use App\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Video
     */
    protected $video;

    /**
     * @var UserVideo
     */
    protected $userVideo;

    /**
     * HomeController constructor.
     *
     * @param User $user
     * @param Video $video
     * @param UserVideo $userVideo
     * @param Request $request
     */
    public function __construct(User $user, Video $video, UserVideo $userVideo, Request $request)
    {
        $this->user = $user;
        $this->video = $video;
        $this->userVideo = $userVideo;
        $this->request = $request;
    }

    /**
     * Home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        return view('Main.Home.Home')
                ->withVideos($this->video->all());
    }

    /**
     * Login page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginPage()
    {
        if(\Auth::user())
        {
            return redirect('/');
        }

        return view('Main.Home.Login');
    }

    /**
     * Log a user in.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function signin()
    {
        // Validate inputs
        $this->validate(
            $this->request,
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username is required',
                'password.required' => 'Password is required'
            ]
        );

        $username = $this->request->input('username');
        $password = $this->request->input('password');

        if(\Auth::attempt(['username' => $username, 'password' => $password]))
        {
            return redirect()->intended();
        }

        return redirect()->back()
                ->withError('Login failed');
    }

    /**
     * View a video.
     *
     * @param $slug
     * @return mixed
     */
    public function video($slug)
    {
        $slug = explode('-', $slug);
        $id = $slug[0];

        $video = $this->video->with(['watchedVideo'])->where('id', $id);

        if($video->count() > 0)
        {
            $next = $this->video->where('id', '>', $id);

            return view('Main.Videos.View')
                ->withVideo($video->first())
                ->withNext($next);
        }

        abort(404);
    }

    /**
     * Watch a video fully.
     *
     * @param $slug
     * @return mixed
     */
    public function watchVideo($slug)
    {
        $slug = explode('-', $slug);
        $id = $slug[0];

        $video = $this->video->find($id);

        if($video->count() > 0)
        {
            $this->userVideo->create([
                'user_id' => \Auth::user()->id,
                'video_id' => $id
            ]);

            return redirect()->back()
                    ->withSuccess('Video watched');
        }

        abort(404);
    }

    /**
     * Unwatch a video.
     *
     * @param $slug
     * @return mixed
     */
    public function unwatchVideo($slug)
    {
        $slug = explode('-', $slug);
        $id = $slug[0];

        $watchedVideo = $this->userVideo->find($id);

        if($watchedVideo->count() > 0)
        {
            $watchedVideo->delete();

            return redirect()->back()
                ->withSuccess('Video unwatched');
        }

        abort(404);
    }

    /**
     * Logout a user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if (\Auth::user())
        {
            \Auth::logout();
        }

        return redirect()->intended();
    }
}
