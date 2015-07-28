<?php use Authority\Eloquent\FeedService;

class FeedServiceController extends \BaseController
{
    protected $feed;

    function __construct(FeedService $feed)
    {
        $this->feed = $feed;
    }

    public function index()
    {
        return View::make('adm.admin.feed.index', [
            'feed' => $this->feed->orderBy('id')->get()
        ]);
    }
}