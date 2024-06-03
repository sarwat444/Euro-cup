<div class="navbar-area sticky-top">
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="{{asset(config('constants.asset_path').'assets/front/img/logo-two.png')}}" alt="Logo">
        </a>
    </div>
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset(config('constants.asset_path').'assets/front/img/logo.png')}}" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link ">{{__('front.home')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('services')}}" class="nav-link ">{{__('front.services')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('specializes')}}" class="nav-link ">{{__('front.Medical specialties')}}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('blogs')}}" class="nav-link">{{__('front.Blogs')}}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('createMedicalSupplies')}}" class="nav-link ">{{__('front.Medical Supplies')}}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('alternative_medicine')}}" class="nav-link ">{{__('front.Alternative Medicine')}}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">{{__('front.About Us')}}</a>
                        </li>
                    </ul>
                    <ul>
                        <li class="nav-item dropdown languages_dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(App::getLocale() == 'ar')
                                    العربيه
                                @elseif(App::getLocale() == 'en')
                                    English
                                @elseif(App::getLocale() == 'fr')
                                    Français
                                @endif
                                <img  src="{{asset(config('constants.asset_path').'assets/front/img/flags/' . App::getLocale() . '.png')}}" height="20px">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en') }}"> <img src="{{asset(config('constants.asset_path').'assets/front/img/flags/en.png')}}" height="20px"> English </a></li>
                                <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar') }}"><img src="{{asset(config('constants.asset_path').'assets/front/img/flags/ar.png')}}" height="20px"> العربيه </a></li>
                                <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('fr') }}"><img src="{{asset(config('constants.asset_path').'assets/front/img/flags/fr.png')}}" height="20px">  Français </a></li>
                            </ul>
                        </li>
                    </ul>
                    @auth
                        <ul>
                            <li class="nav-item dropdown profile_drowpdown languages_dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if(!empty(Auth::user()->image) && File::exists(public_path(config('constants.asset_path').'uploads/doctors/'.Auth::user()->image)))
                                        <img style="border-radius: 50%;height: 40px; width: 40px; background-size: cover; justify-content: center; object-fit: cover;" src="{{ asset(config('constants.asset_path').'uploads/doctors/'.Auth::user()->image) }}" height="30px">
                                    @else
                                        <img src="{{ asset(config('constants.asset_path').'assets/front/img/default.png') }}" height="20px">
                                    @endif
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="{{route('orders')}}">{{__('front.My Orders')}} </a></li>
                                    <li><a class="dropdown-item" href="{{ route('edit_profile' , \Illuminate\Support\Facades\Auth::id()) }}">{{__('front.Edit Profile')}} </a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">  {{__('front.Logout')}} </a></li>
                                </ul>
                            </li>
                        </ul>
                    @else
                        <div class="nav-links">
                            <span><a href="{{ route('login') }}">{{ __('front.Login') }}</a> / <a href="{{ route('register') }}">{{ __('front.Register') }}</a></span>
                        </div>
                    @endauth

                </div>
            </nav>
        </div>
    </div>
</div>
