<?php

namespace BookStack\Http\Controllers;

use BookStack\Actions\ActivityQueries;
use BookStack\Entities\Models\Book;
use BookStack\Entities\Models\Page;
use BookStack\Entities\Queries\RecentlyViewed;
use BookStack\Entities\Queries\TopFavourites;
use BookStack\Entities\Repos\BookRepo;
use BookStack\Entities\Repos\BookshelfRepo;
use BookStack\Entities\Tools\PageContent;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index( )
    {
        return redirect('/shelves'); 
    }

    /**
     * Get custom head HTML, Used in ajax calls to show in editor.
     */
    public function customHeadContent()
    {
        return view('common.custom-head');
    }

    /**
     * Show the view for /robots.txt.
     */
    public function robots()
    {
        $sitePublic = setting('app-public', false);
        $allowRobots = config('app.allow_robots');

        if ($allowRobots === null) {
            $allowRobots = $sitePublic;
        }

        return response()
            ->view('misc.robots', ['allowRobots' => $allowRobots])
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Show the route for 404 responses.
     */
    public function notFound()
    {
        return response()->view('errors.404', [], 404);
    }
}
