<?php

namespace App\Http\Controllers\Front;

use App\Criteria\LatestCriteria;
use App\Http\Controllers\Controller;
use App\Repositories\DestinationRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DestinationRepository $destRepo)
    {
        $destinations = $destRepo->pushCriteria(LatestCriteria::class)->paginate();

        return view('front.home', compact('destinations'));
    }

    public function show($slugTitle, DestinationRepository $destRepo)
    {
        $title = implode(' ', explode('-', $slugTitle));
        $destination = $destRepo->findWhere(['title' => $title])->first();

        return view('front.show', compact('destination'));
    }
}
