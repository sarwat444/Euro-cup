<!-- Front.voteStatistics.blade.php -->

<div class="container">
    <i class="fa fa-check correct_check"></i>
    <h1 class="text-center text-success Vote_text">Vote Send Successfully</h1>

    <div class="row">
        <div class="col-md-12" style="text-align: left">
            <label>{{ $home_team }}</label>
            <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: {{ round($home_team_percentage)}}%;" aria-valuenow="{{ round($home_team_percentage) }}" aria-valuemin="0" aria-valuemax="100">{{ round($home_team_percentage) }}%</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="text-align: left">
            <label>{{ $home_team }} Draw {{ $away_team }}</label>
            <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: {{ round($draw_percentage) }}%;" aria-valuenow="{{ round($draw_percentage) }}" aria-valuemin="0" aria-valuemax="100">{{ round($draw_percentage) }}%</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="text-align: left">
            <label>{{ $away_team }}</label>
            <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: {{ round(  $away_team_percentage) }}%;" aria-valuenow="{{round( $away_team_percentage )}}" aria-valuemin="0" aria-valuemax="100">{{ round($away_team_percentage) }}%</div>
            </div>
        </div>
    </div>
</div>
