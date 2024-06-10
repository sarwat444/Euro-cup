<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use App\Models\{User,Advertisment} ;

class HomeController extends Controller
{
    public function index()
    {
        $sliders  = Advertisment::where(['active' => 1])->limit(5)->get();
        $startDate = '2024-06-14';
        $endDate = '2024-06-15';
        $apiToken = 'mnXQIe4GiLIHqUJFIPtU3Irb69ymdXj8oWt5AJZ57DjxjyCfZOFzolgkHRs6';

        $matches = ApiHelper::getMatches($startDate, $endDate, $apiToken);

        // Collect unique team names
        $teamNames = [];
        foreach ($matches as $match) {
            $teams = explode(' vs ', $match['name']);
            $teamNames = array_merge($teamNames, $teams);
        }
        $teamNames = array_unique($teamNames);

        // Fetch team logos
        $teamLogos = ApiHelper::getTeamLogos($teamNames, $apiToken);

        // Add logos to matches data
        foreach ($matches as &$match) {
            $teams = explode(' vs ', $match['name']);
            $match['home_team'] = [
                'name' => $teams[0],
                'logo' => $teamLogos[$teams[0]] ?? asset('path/to/default/logo.png'),
            ];
            $match['away_team'] = [
                'name' => $teams[1],
                 'logo' => $teamLogos[$teams[1]] ?? asset('path/to/default/logo.png'),
            ];
        }
        return view('front.home', compact('sliders', 'matches'));
    }
}
