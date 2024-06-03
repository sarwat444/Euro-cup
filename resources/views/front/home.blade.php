@extends('front.layouts')
@push('title', __('front.Home Page'))
@push('styles')

@endpush
@section('content')
     <!--Full width header End-->
        <!-- Modal -->
        <div class="modal fade guess_modal" id="exampleModalCenter" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6>Guess The Winner</h6>
                        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="radio">
                                        <input id="radio-1" name="radio" type="radio" checked>
                                        <label for="radio-1" class="radio-label">
                                            <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}" alt="Man City">
                                            Man City
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <input id="radio-2" name="radio" type="radio">
                                        <label for="radio-2" class="radio-label">
                                            <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}" alt="Arsenal">
                                            Arsenal
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer ">
                        <button  type="button" class="btn btn-primary send_result">Send</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest News Start -->
        <div class="rs-lates-news home6-latest-news pt-25">
            <div class="container-fluid2">
                <div class="row">
                    <div
                        class="col-xl-3 col-lg-12 pr-20 md-pr-15 sticky-sidebar">
                        <div class="inner-content">
                            <div class="match-details mb-45">
                                <div class="title-part">
                                    <h2 class="title"> Recent Winners</h2>
                                </div>
                                <div class="match-list-sidebar">
                                    <div class="match-list">
                                        <div class="sidebar-fixture">
                                            <div class="list-1">
                                                <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}" alt="Images">
                                                <span>Man City</span>
                                            </div>
                                            <div class="list-2">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span>Aug 01
                                                                    2021</span>
                                                                <span
                                                                    class="match-time">03:00</span>
                                                                <span>Etihad
                                                                    Stadium</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="list-3">
                                                <img
                                                    src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/7.png')}}"
                                                    alt="Images">
                                                <span>Arsenal </span>
                                            </div>
                                        </div>
                                        <div class="sidebar-fixture">
                                            <div class="list-1">
                                                <img
                                                    src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                    alt="Images">
                                                <span>Real Madrid</span>
                                            </div>
                                            <div class="list-2">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span>Aug 01
                                                                    2021</span>
                                                                <span
                                                                    class="match-time">03:00</span>
                                                                <span>Real
                                                                    Anoeta
                                                                    Stadium</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="list-3">
                                                <img
                                                    src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/2.png')}}"
                                                    alt="Images">
                                                <span>Arsenal </span>
                                            </div>
                                        </div>
                                        <div class="sidebar-fixture">
                                            <div class="list-1">
                                                <img
                                                    src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                    alt="Images">
                                                <span> Barcelona</span>
                                            </div>
                                            <div class="list-2">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span>Aug 01
                                                                    2021</span>
                                                                <span
                                                                    class="match-time">03:00</span>
                                                                <span>Etihad
                                                                    Stadium</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="list-3">
                                                <img
                                                    src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/10.png')}}"
                                                    alt="Images">
                                                <span>Liverpool</span>
                                            </div>
                                        </div>
                                        <div class="sidebar-fixture">
                                            <div class="list-1">
                                                <img
                                                    src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/6.png')}}"
                                                    alt="Images">
                                                <span>Atletico Madrid</span>
                                            </div>
                                            <div class="list-2">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span>Aug 01
                                                                    2021</span>
                                                                <span
                                                                    class="match-time">03:00</span>
                                                                <span>Bernabéu
                                                                    Stadium</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="list-3">
                                                <img
                                                    src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                    alt="Images">
                                                <span>Valencia </span>
                                            </div>
                                        </div>
                                        <div class="sidebar-fixture">
                                            <div class="list-1">
                                                <img
                                                    src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                    alt="Images">
                                                <span>Atletico Madrid</span>
                                            </div>
                                            <div class="list-2">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span>Aug 01
                                                                    2021</span>
                                                                <span
                                                                    class="match-time">03:00</span>
                                                                <span>Bernabéu
                                                                    Stadium</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="list-3">
                                                <img
                                                    src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                    alt="Images">
                                                <span>Valencia </span>
                                            </div>
                                        </div>
                                        <div class="link">
                                            <a href="#">All Winners</a>
                                        </div>
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
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                                alt="Images">
                                                        </td>
                                                        <td>
                                                            <span>Aug 20
                                                                2021</span>
                                                            <span
                                                                class="total-goal">2-2</span>
                                                            <span>Central
                                                                Olympic
                                                                Stadium</span>
                                                        </td>
                                                        <td>
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
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
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                                alt="Images">
                                                        </td>
                                                        <td>
                                                            <span>Aug 20
                                                                2021</span>
                                                            <span
                                                                class="total-goal">2-2</span>
                                                            <span>Central
                                                                Olympic
                                                                Stadium</span>
                                                        </td>
                                                        <td>
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
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
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                                alt="Images">
                                                        </td>
                                                        <td>
                                                            <span>Aug 20
                                                                2021</span>
                                                            <span
                                                                class="total-goal">2-2</span>
                                                            <span>Central
                                                                Olympic
                                                                Stadium</span>
                                                        </td>
                                                        <td>
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
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
                        <div id="carouselExampleIndicators"
                            class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}"
                                        class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}"
                                        class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}"
                                        class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}"
                                        class="d-block w-100">
                                </div>
                            </div>
                        </div>
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"
                                data-slide-to="0" class="active">
                                <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}"
                                    class="d-block w-100">
                            </li>
                            <li data-target="#carouselExampleIndicators"
                                data-slide-to="1">
                                <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}"
                                    class="d-block w-100">
                            </li>
                            <li data-target="#carouselExampleIndicators"
                                data-slide-to="2">
                                <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}"
                                    class="d-block w-100">
                            </li>
                            <li data-target="#carouselExampleIndicators"
                                data-slide-to="3">
                                <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}"
                                    class="d-block w-100">
                            </li>
                            <li data-target="#carouselExampleIndicators"
                                data-slide-to="4">
                                <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/slider/slider.jpg')}}"
                                    class="d-block w-100">
                            </li>
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
                                        <div class="vote-list">
                                            <div class="sidebar-fixture mb-0">
                                                <div class="list-1">
                                                    <img
                                                        src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                        alt="Images">
                                                    <span>Man City</span>
                                                </div>
                                                <div class="list-2">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span>Aug 04
                                                                        2021</span>
                                                                    <span
                                                                        class="match-time">03:00</span>
                                                                    <span>Etihad
                                                                        Stadium</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="list-3">
                                                    <img
                                                        src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                        alt="Images">
                                                    <span>Arsenal </span>
                                                </div>
                                            </div>
                                            <button
                                                class="btn btn-primary vote_btn"
                                                data-toggle="modal"
                                                data-target="#exampleModalCenter">Vote</button>
                                        </div>
                                        <div class="vote-list">
                                            <div class="sidebar-fixture">
                                                <div class="list-1">
                                                    <img
                                                        src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                        alt="Images">
                                                    <span>Real Madrid</span>
                                                </div>
                                                <div class="list-2">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span>Aug 06
                                                                        2021</span>
                                                                    <span
                                                                        class="match-time">03:00</span>
                                                                    <span>Real
                                                                        Anoeta
                                                                        Stadium</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="list-3">
                                                    <img
                                                        src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                        alt="Images">
                                                    <span>Arsenal </span>
                                                </div>
                                            </div>
                                            <button
                                                class="btn btn-primary vote_btn">Vote</button>
                                        </div>
                                        <div class="vote-list">
                                            <div class="sidebar-fixture">
                                                <div class="list-1">
                                                    <img
                                                        src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                        alt="Images">
                                                    <span> Barcelona</span>
                                                </div>
                                                <div class="list-2">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span>Aug 08
                                                                        2021</span>
                                                                    <span
                                                                        class="match-time">03:00</span>
                                                                    <span>Etihad
                                                                        Stadium</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="list-3">
                                                    <img
                                                        src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                        alt="Images">
                                                    <span>Liverpool</span>
                                                </div>
                                            </div>
                                            <button
                                                class="btn btn-primary vote_btn">Vote</button>
                                        </div>
                                        <div class="vote-list">
                                            <div class="sidebar-fixture">
                                                <div class="list-1">
                                                    <img
                                                        src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                        alt="Images">
                                                    <span>Atletico Madrid</span>
                                                </div>
                                                <div class="list-2">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span>Aug 10
                                                                        2021</span>
                                                                    <span
                                                                        class="match-time">03:00</span>
                                                                    <span>Bernabéu
                                                                        Stadium</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="list-3">
                                                    <img
                                                        src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/1.png')}} "
                                                        alt="Images">
                                                    <span>Valencia </span>
                                                </div>
                                            </div>
                                            <button
                                                class="btn btn-primary vote_btn">Vote</button>
                                        </div>

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
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                                alt="Images">
                                                        </td>
                                                        <td>
                                                            <span>Aug 20
                                                                2021</span>
                                                            <span
                                                                class="total-goal">1-2</span>
                                                            <span>Central
                                                                Olympic
                                                                Stadium</span>
                                                        </td>
                                                        <td>
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
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
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                                alt="Images">
                                                        </td>
                                                        <td>
                                                            <span>Aug 20
                                                                2021</span>
                                                            <span
                                                                class="total-goal">2-2</span>
                                                            <span>Central
                                                                Olympic
                                                                Stadium</span>
                                                        </td>
                                                        <td>
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
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
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
                                                                alt="Images">
                                                        </td>
                                                        <td>
                                                            <span>Aug 20
                                                                2021</span>
                                                            <span
                                                                class="total-goal">0-0</span>
                                                            <span>Central
                                                                Olympic
                                                                Stadium</span>
                                                        </td>
                                                        <td>
                                                            <img
                                                                src="{{ asset(config('constants.asset_path') . 'assets/front/images/team-logo/8.png')}}"
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

});
</script>
@endpush
