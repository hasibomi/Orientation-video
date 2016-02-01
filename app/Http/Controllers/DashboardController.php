<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Video
     */
    protected $video;

    /**
     * HomeController constructor.
     *
     * @param User $user
     * @param Video $video
     * @param Request $request
     */
    public function __construct(User $user, Video $video, Request $request)
    {
        $this->user = $user;
        $this->video = $video;
        $this->request = $request;
    }

    public function home()
    {
        return view('Admin.Dashboard.Dashboard');
    }

    /**
     * Show all users.
     *
     * @return mixed
     */
    public function users()
    {
        return view('Admin.Users.Show')
                ->withUsers($this->user->all());
    }

    /**
     * View a user.
     *
     * @param $username
     * @return mixed
     */
    public function viewUser($username)
    {
        $user = $this->user->where('username', $username);

        if($user->count() > 0)
        {
            return view('Admin.Users.View')
                    ->withUser($user->first());
        }

        abort(404);
    }

    /**
     * Show all videos.
     *
     * @return mixed
     */
    public function videos()
    {
        return view('Admin.Videos.Show')
                ->withVideos($this->video->all());
    }
}
