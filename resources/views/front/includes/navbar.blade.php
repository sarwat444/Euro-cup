 <div class="full-width-header">
     <header id="rs-header" class="rs-header home-style6">
         <div class="menu-area menu-sticky">
             <div class="container-fluid2">
                 <div class="row-table">
                     <div class="col-cell">
                         <div class="logo-area text-center">
                             <a href="{{ route('home') }}">
                                 <img class="normal-logo" src="{{ asset(config('constants.asset_path') . 'assets/front/images/logo.png')}}" alt="logo">
                                 <img class="sticky-logo" src="{{ asset(config('constants.asset_path') . 'assets/front/images/logo.png')}}" alt="logo">
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="login_links">
                    @auth
                    <ul class="navbar-nav auth_dropdown">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(!empty(Auth::user()->image))
                            <img style="height:40px ; border-radius: 50%;height: 40px; width: 40px; background-size: cover; justify-content: center; object-fit: cover;" src="{{ asset(config('constants.asset_path').'uploads/doctors/'.Auth::user()->image) }}" height="30px">
                            @else
                            <img style="height:40px ;border-radius: 50%;height: 40px; width: 40px; background-size: cover; justify-content: center; object-fit: cover;"  src="{{ asset(config('constants.asset_path').'assets/front/images/default.png') }}" height="20px">
                             @endif
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">{{__('front.Logout')}}</a>
                          </div>
                        </li>
                      </ul>
                @else
                    <div class="nav-links">
                        <span><a href="{{ route('login') }}">{{ __('front.Login') }}</a> / <a href="{{ route('register') }}">{{ __('front.Register') }}</a></span>
                    </div>
                @endauth
                </div>
             </div>
         </div>
     </header>
 </div>
