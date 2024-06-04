<?php

namespace App\Repositories\Panel;
use App\Models\Winner;
use DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class winnerEloquent extends HelperEloquent
{
    public function getDataTable()
    {
        $winners = Winner::select('*')
            ->with([
                'vote' ,
                'user'
            ])
            ->get();
        return DataTables::of($winners)
            ->addIndexColumn()
            ->addColumn('name', function ($winner) {
                return $winner->user->first_name . ' ' . $winner->user->last_name;
            })->addColumn('match_name', function ($winner) {
                return $winner->match_name;
            })
            ->addColumn('vote', function ($winner) {
                return $winner->vote->home_participant . ' VS ' . $winner->vote->away_participant;
            })
            ->addColumn('created at', function ($winner) {
                return date('d.m.y H:i', strtotime($winner->created_at));
            })
            ->rawColumns(['action' , 'active'])
            ->make(true);
    }
}
