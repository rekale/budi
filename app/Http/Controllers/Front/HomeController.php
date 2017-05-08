<?php

namespace App\Http\Controllers\Front;

use App\Criteria\LatestCriteria;
use App\Criteria\RandomCriteria;
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
        $destRand = $destRepo->pushCriteria(RandomCriteria::class)->paginate(3);

        return view('front.home', compact('destinations', 'destRand'));
    }

    public function show($slugTitle, DestinationRepository $destRepo)
    {
        $title = implode(' ', explode('-', $slugTitle));
        $destination = $destRepo->findWhere(['title' => $title])->first();

        return view('front.show', compact('destination'));
    }
}
