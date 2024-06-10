@extends('front.layouts')
@push('title', __('front.Home Page'))
@push('styles')

@endpush
@section('content')
    <!--Full width header End-->
    <!-- Modal -->
    <div class="modal fade guess_modal" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>Guess The Winner</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('send_vote') }}" method="post" id="send_vote">
                    @csrf
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="radio">
                                        <input id="radio-1" name="radio" type="radio" value="" required>
                                        <label for="radio-1" class="radio-label">
                                            <img id="home-team-logo" src="" alt="Home Team Logo">
                                            <span id="home-team-name"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <input id="radio-3" name="radio" type="radio" value="Draw" required>

                                        <label for="radio-3" class="radio-label">
                                            <img id="home-draw-logo" src="" alt="Home Draw Logo">
                                            <img id="away-draw-logo" src="" alt="Away Draw Logo">
                                            Draw
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <input id="radio-2" name="radio" type="radio" value="" required>
                                        <label for="radio-2" class="radio-label">
                                            <img id="away-team-logo" src="" alt="Away Team Logo">
                                            <span id="away-team-name"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary send_result">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade guess_modal" id="successVoteModel" tabindex="-1" role="dialog"
    aria-labelledby="successVoteModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-body text-center" id="statistics_data">
                </div>
        </div>
    </div>
</div>


    <!-- Latest News Start -->
    <div class="rs-lates-news home6-latest-news pt-25">
        <div class="container-fluid2">
            <div class="row">
                <div class="col-xl-3 col-lg-12 pr-20 md-pr-15 sticky-sidebar">
                    <div class="inner-content">
                        <div class="match-details mb-45">
                            <div class="title-part">
                                <h2 class="title"> Recent Winners</h2>
                            </div>
                            <div class="match-list-sidebar">
                                <div class="match-list">
                                    @foreach ($matches as $match)
                                        <div class="vote-list">
                                            <div class="sidebar-fixture mb-0">
                                                <div class="list-1">
                                                    <img src="{{ $match['home_team']['logo'] ?? '' }}"
                                                        alt="{{ $match['home_team']['name'] }}">
                                                    <span>{{ $match['home_team']['name'] }}</span>
                                                </div>
                                                <div class="list-2">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span>{{ \Carbon\Carbon::parse($match['starting_at'])->format('M d Y') }}</span>
                                                                    <span
                                                                        class="match-time">{{ \Carbon\Carbon::parse($match['starting_at'])->format('H:i') }}</span>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="list-3">
                                                    <img src="{{ $match['away_team']['logo'] ?? '' }}"
                                                        alt="{{ $match['away_team']['name'] }}">
                                                    <span>{{ $match['away_team']['name'] }}</span>
                                                </div>
                                            </div>


                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>

                        <div class="match-details mb-60">
                            <div class="title-part">
                                <h2 class="title"> Recent Match Result</h2>
                            </div>
                            <div class="sidebar-result">
                                <div class="sidebar-part">
                                    <div class="list-1-team"> <span>
                                            Arsenal</span></div>
                                    <div class="list-result">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                    <td>
                                                        <span>Aug 20
                                                            2021</span>
                                                        <span class="total-goal">2-2</span>
                                                        <span>Central
                                                            Olympic
                                                            Stadium</span>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="list-2-team"> <span>
                                            Liverpool</span></div>
                                </div>
                                <div class="sidebar-part">
                                    <div class="list-1-team"> <span>
                                            Arsenal</span></div>
                                    <div class="list-result">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                    <td>
                                                        <span>Aug 20
                                                            2021</span>
                                                        <span class="total-goal">2-2</span>
                                                        <span>Central
                                                            Olympic
                                                            Stadium</span>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="list-2-team"> <span>
                                            Liverpool</span></div>
                                </div>
                                <div class="sidebar-part">
                                    <div class="list-1-team"> <span>
                                            Arsenal</span></div>
                                    <div class="list-result">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                    <td>
                                                        <span>Aug 20
                                                            2021</span>
                                                        <span class="total-goal">2-2</span>
                                                        <span>Central
                                                            Olympic
                                                            Stadium</span>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="list-2-team"> <span>
                                            Liverpool</span></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 lg-order-first Home-slider">
                    <!-- Slider Section Start -->
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @forelse ($sliders as $key =>  $slider)
                                <div class="carousel-item @if ($key == 0) active @endif">
                                    <img src="{{ asset(config('constants.asset_path') . $slider->icon) }}"
                                        class="d-block w-100">
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg') }}"
                                        class="d-block w-100">
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        @forelse ($sliders as $key =>  $slider)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                @if ($key == 0) class="active" @endif>
                                <img src="{{ asset(config('constants.asset_path') . $slider->icon) }}"
                                    class="d-block w-100">
                            </li>
                        @empty
                            <div class="carousel-item active">
                                <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg') }}"
                                    class="d-block w-100">
                            </div>
                        @endforelse
                    </ol>
                    <!-- Slider Section End -->
                </div>
                <div class="col-xl-3 col-lg-12 sticky-sidebar">
                    <div class="inner-content">
                        <div class="match-details mb-45">
                            <div class="title-part">
                                <h2 class="title"> Vote And Win</h2>
                            </div>
                            <div class="match-list-sidebar">
                                <div class="match-list">
                                    @foreach ($matches as $match)
                                        <div class="vote-list">
                                            <div class="sidebar-fixture mb-0">
                                                <div class="list-1">
                                                    <img src="{{ $match['home_team']['logo'] ?? '' }}"
                                                        alt="{{ $match['home_team']['name'] }}">
                                                    <span>{{ $match['home_team']['name'] }}</span>
                                                </div>
                                                <div class="list-2">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span>{{ \Carbon\Carbon::parse($match['starting_at'])->format('M d Y') }}</span>
                                                                    <span
                                                                        class="match-time">{{ \Carbon\Carbon::parse($match['starting_at'])->format('H:i') }}</span>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="list-3">
                                                    <img src="{{ $match['away_team']['logo'] ?? '' }}"
                                                        alt="{{ $match['away_team']['name'] }}">
                                                    <span>{{ $match['away_team']['name'] }}</span>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary vote_btn"
                                                data-match-id = "{{ $match['id'] }}"
                                                data-home-team="{{ $match['home_team']['name'] }}"
                                                data-away-team="{{ $match['away_team']['name'] }}"
                                                data-match-name="{{ $match['name'] }}"
                                                data-starting-at="{{ $match['starting_at'] }}"
                                                data-venue="{{ $match['venue']['name'] ?? 'Unknown Venue' }}"
                                                data-home-team-logo="{{ $match['home_team']['logo'] ?? '' }}"
                                                data-away-team-logo="{{ $match['away_team']['logo'] ?? '' }}">Vote</button>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                        <div class="match-details mb-60">
                            <div class="title-part">
                                <h2 class="title"> Running Matches</h2>
                            </div>
                            <div class="sidebar-result">
                                <div class="sidebar-part">
                                    <div class="list-1-team"> <span>
                                            Arsenal</span></div>
                                    <div class="list-result">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                    <td>
                                                        <span>Aug 20
                                                            2021</span>
                                                        <span class="total-goal">1-2</span>
                                                        <span>Central
                                                            Olympic
                                                            Stadium</span>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="list-2-team"> <span>
                                            Liverpool</span></div>
                                </div>
                                <div class="sidebar-part">
                                    <div class="list-1-team"> <span>
                                            Arsenal</span></div>
                                    <div class="list-result">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                    <td>
                                                        <span>Aug 20
                                                            2021</span>
                                                        <span class="total-goal">2-2</span>
                                                        <span>Central
                                                            Olympic
                                                            Stadium</span>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="list-2-team"> <span>
                                            Liverpool</span></div>
                                </div>
                                <div class="sidebar-part">
                                    <div class="list-1-team"> <span>
                                            Arsenal</span></div>
                                    <div class="list-result">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                    <td>
                                                        <span>Aug 20
                                                            2021</span>
                                                        <span class="total-goal">0-0</span>
                                                        <span>Central
                                                            Olympic
                                                            Stadium</span>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png') }}"
                                                            alt="Images">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="list-2-team"> <span>
                                            Liverpool</span></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest News End -->
    <!-- Scrool to Top Start -->
    <div id="scrollUp">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scrool to Top End -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
                $('.vote_btn').on('click', function() {
                    const matchData = {
                        match_id: $(this).data('match-id'),
                        home_team: $(this).data('home-team'),
                        away_team: $(this).data('away-team'),
                        starting_at: $(this).data('starting-at'),
                        venue: $(this).data('venue'),
                        match_name: $(this).data('match-name'),
                        home_team_logo: $(this).data('home-team-logo'),
                        away_team_logo: $(this).data('away-team-logo')
                    };
                    //send Request  To Retrive Statistics

                    // Update the modal with the match data
                    $('#home-team-name').text(matchData.home_team);
                    $('#away-team-name').text(matchData.away_team);
                    $('input[name="home_participant"]').val(matchData.home_team);

                    $('#radio-1').val(matchData.home_team);
                    $('#radio-3').val(`Draw ${matchData.home_team} ${matchData.away_team}`);
                    $('#radio-2').val(matchData.away_team);

                    // Update the team logos
                    $('#home-team-logo').attr('src', matchData.home_team_logo);
                    $('#home-draw-logo').attr('src', matchData.home_team_logo);
                    $('#away-draw-logo').attr('src', matchData.away_team_logo);
                    $('#away-team-logo').attr('src', matchData.away_team_logo);

                    // Reset the radio buttons
                    $('input[name="radio"]').prop('checked', false);
                    // Show the modal
                    $('#exampleModalCenter').modal('show');

                    $('#send_vote').off('submit').on('submit', function(event) {
                                event.preventDefault(); // Prevent the form from submitting the default way
                                // Get the selected radio value
                                const selectedVote = $('input[name="radio"]:checked').val();
                                // Include the selected vote and match data in the AJAX request
                                $.ajax({
                                    url: $(this).attr('action'),
                                    method: 'POST',
                                    data: {
                                        match_id : matchData.match_id ,
                                        home_participant: matchData.home_team,
                                        away_participant: matchData.away_team,
                                        vote: selectedVote,
                                        match_name: matchData.match_name,
                                        user_id: "{{ Auth::id() }}",
                                        _token: "{{ csrf_token() }}"
                                    },
                                    success: function(response) {
                                        $.ajax({
                                    url:"{{ route('vote_statstics') }}",
                                    method: 'post',
                                    data: {
                                        match_id : matchData.match_id ,
                                        home_participant: matchData.home_team,
                                        away_participant: matchData.away_team,
                                        user_id: "{{ Auth::id() }}",
                                        _token: "{{ csrf_token() }}"
                                    },
                                    success: function(response) {
                                        $('#statistics_data').html(response); ;
                                    },
                                    error: function(xhr, status, error) {
                                        // Handle any errors
                                        console.error(error);
                                    }
                                });
                                        // Close the modal after a successful submission
                                        $('#exampleModalCenter').modal('hide');
                                        $('#successVoteModel').modal('show') ;
                                    },
                                    error: function(xhr, status, error) {
                                        // Handle any errors
                                        console.error(error);
                                    }
                                });
                     });

        });
    });
    </script>
@endpush
