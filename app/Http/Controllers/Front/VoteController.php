<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Panel\VoteEloquent;
class VoteController extends Controller
{
    private $vote ;
    public function __construct(VoteEloquent $VoteElequent)
    {
        $this->vote = $VoteElequent;
    }

    public function sand_vote(Request $request)
    {
        $this->vote->store($request);
        return redirect()->back()->with('success' , 'Your Vote Send Successfuly') ;
    }
}
