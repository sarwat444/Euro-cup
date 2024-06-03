<footer class="pb-70">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-contact">
                        <h3>{{__('front.Contact Us')}}</h3>
                        <ul>
                            <li>
                                <i class="icofont-ui-message"></i>
                                <a href="/cdn-cgi/l/email-protection#e980878f86a9848c8d809a8c9fc78a8684"><span class="__cf_email__" data-cfemail="432a2d252c032e26272a3026356d202c2e">[email&#160;protected]</span></a>
                                <a href="/cdn-cgi/l/email-protection#d2bab7bebebd92bfb7b6bba1b7a4fcb1bdbf"><span class="__cf_email__" data-cfemail="92faf7fefefdd2fff7f6fbe1f7e4bcf1fdff">[email&#160;protected]</span></a>
                            </li>
                            <li>
                                <i class="icofont-stock-mobile"></i>
                                <a href="tel:+07554332322">Call: +07 554 332 322</a>
                                <a href="tel:+236256256365">Call: +236 256 256 365</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="footer-item">
                    <div class="footer-quick">
                        <h3>{{__('front.Quick Links')}}</h3>
                        <ul>
                            <li >
                                <a href="{{route('specializes')}}" class="nav-link ">{{__('front.Medical specialties')}}</a>
                            </li>

                            <li >
                                <a href="{{route('questions.index')}}" class="nav-link ">{{__('front.Questions')}}</a>
                            </li>

                            <li >
                                <a href="{{route('createMedicalSupplies')}}" class="nav-link ">{{__('front.Medical Supplies')}}</a>
                            </li>

                            <li>
                                <a href="{{route('alternative_medicine')}}" class="nav-link ">{{__('front.Alternative Medicine')}}</a>
                            </li>
                            <li >
                                <a href="{{route('blogs')}}" class="nav-link">{{__('front.Blogs')}}</a>
                            </li>
                            <li >
                                <a href="{{route('about')}}" class="nav-link">{{__('front.About Us')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-quick">
                        <h3>{{__('front.our Services')}}</h3>
                        <ul>
                            <li>
                                <a href="#">Dental Care</a>
                            </li>
                            <li>
                                <a href="#">Cardiology</a>
                            </li>
                            <li>
                                <a href="#">Hijama Therapy</a>
                            </li>
                            <li>
                                <a href="#">Massage Therapy</a>
                            </li>
                            <li>
                                <a href="#">Ambluance Sevices</a>
                            </li>
                            <li>
                                <a href="#">Medicine</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-feedback download_images">
                        <h3>{{__('front.Download Our App')}}</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#" class="d-flex">
                                    <img src="{{asset(config('constants.asset_path').'assets/front/img/app_store.png')}}" alt="app-store">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#">
                                    <img src="{{asset(config('constants.asset_path').'assets/front/img/google_paly.png')}}" alt="app-store">
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright-area">
    <div class="container">
        <div class="copyright-item">
            <p>{{__('front.Copyright @ 2024 Recived For Germaniatek')}}</p>
        </div>
    </div>
</div>
