<?php

namespace App\Repositories\Panel;
use App\Models\{Vote,Winner};
use DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class VoteEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $votes = Vote::select('*')
            ->with([
                'user:id,first_name,last_name'
            ])->get();
        return DataTables::of($votes)
            ->addIndexColumn()
            ->addColumn('user', function ($vote) {
                return $vote->user->first_name . ' ' . $vote->user->last_name;
            })->addColumn('match_name', function ($vote) {
                return $vote->match_name;
            })->addColumn('home_participant', function ($vote) {
                return $vote->home_participant;
            })->addColumn('away_participant', function ($vote) {
                return $vote->away_participant;
            })->addColumn('vote', function ($vote) {
                return $vote->vote;
            })->addColumn('created at', function ($vote) {
                return date('d.m.y H:i', strtotime($vote->created_at));
            })->addColumn('win', function ($vote) {
                return view('panel.votes.partials.active', compact('vote'))->render();
            })->rawColumns(['win'])
            ->make(true);
    }

    public function show($id) {
        return Vote::with(['user', 'country'])->findOrFail($id);
    }

    public function create(): array
    {
        $lang = App::getLocale();
        $data['countries'] = Country::where('status',1)->select('id','name_'.$lang.' as name', 'phone_code')->voteBy('name')->get();
        return $data;
    }
    public function store($request) {
        DB::beginTransaction();
        try {
            $data = $request->all();
            Vote::updateOrCreate(['id' => 0], $data);
            DB::commit();
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch(Exception $e) {
            $message = __('message_error');
            $status = false;
            DB::rollback();
        }
        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }
    public function changeStatus($id)
    {
        // Find the vote by ID
        $vote = Vote::find($id);

        if (!$vote) {
            // Return an error response if the vote is not found
            return [
                'message' => __('vote_not_found'),
                'status' => false,
            ];
        }
        $selected_vote = Winner::where(['vote_id' => $id , 'user_id' => $vote->user_id ])->first() ;

        if(!empty($selected_vote))
        {
            $selected_vote->delete() ;
        }else{
            Winner::create(
                [
                    'user_id' => $vote->user_id,
                    'vote_id' => $id,
                    'match_name' => $vote->match_name
                ]
            );
        }
        // Return a success response
        return [
            'message' => __('message_done'),
            'status' => true,
        ];
    }

public function view_statistics($request)
{
    $match_id = $request->match_id;
    $home_team = $request->home_participant;
    $away_team = $request->away_participant;

    $total_votes = Vote::where('match_id', $match_id)->count();
    $team_1_votes = Vote::where(['match_id' => $match_id, 'vote' => $home_team])->count();
    $team_1_draw_team_2_votes = Vote::where(['match_id' => $match_id, 'vote' => 'Draw ' . $home_team . ' ' . $away_team])->count();
    $team_2_votes = Vote::where(['match_id' => $match_id, 'vote' => $away_team])->count();

    $team_1_percentage = $total_votes > 0 ? ($team_1_votes / $total_votes) * 100 : 0;
    $team_1_draw_team_2_percentage = $total_votes > 0 ? ($team_1_draw_team_2_votes / $total_votes) * 100 : 0;
    $team_2_percentage = $total_votes > 0 ? ($team_2_votes / $total_votes) * 100 : 0;

    return view('front.voteStatistics', [
        'home_team' => $home_team,
        'away_team' => $away_team,
        'home_team_percentage' => $team_1_percentage,
        'draw_percentage' => $team_1_draw_team_2_percentage,
        'away_team_percentage' => $team_2_percentage,
    ]);
}

}
