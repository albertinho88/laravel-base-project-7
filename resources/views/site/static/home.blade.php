@extends('layouts.construction_layout')

@section('title', 'Inicio')

@section('content')

<section id="slider" class="slider-element slider-parallax swiper_wrapper clearfix">

    <div class="slider-parallax-inner">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark" style="background-image: url('{{ asset('images/slider/swiper/10.jpg') }}');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">Estudio Digital</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on our Canvas.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide dark">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">Beautifully Flexible</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
                        </div>
                    </div>
                    <div class="video-wrap">
                        <video poster="{{ asset('images/videos/explore.jpg') }}" preload="auto" loop autoplay muted>
                            <source src='{{ asset('images/videos/explore.mp4') }}' type='video/mp4' />
                            <source src='{{ asset('images/videos/explore.webm') }}' type='video/webm' />
                        </video>
                        <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('{{ asset('images/slider/swiper/3.jpg') }}'); background-position: center top;">
                    <div class="container clearfix">
                        <div class="slider-caption">
                            <h2 data-animate="fadeInUp">Great Performance</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
            <div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
        </div>

    </div>

</section>

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">

        <div class="promo promo-light promo-full bottommargin-lg header-stick notopborder">
            <div class="container clearfix">
                <h3>Llámanos al <span>+593 98 317 7628</span> o escríbenos a <span>info@clicka.ec</span></h3>
                <span>We strive to provide Our Customers with Top Notch Support to make their Theme Experience Wonderful</span>
                <a href="#" class="button button-dark button-xlarge button-rounded">Asesor Virtual</a>
            </div>
        </div>

        <div class="container clearfix">

            <div class="col_one_fourth nobottommargin">
                <div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
                    <div class="fbox-icon">
                        <a href="#"><i class="i-alt noborder icon-shop"></i></a>
                    </div>
                    <h3>e-Commerce Solutions<span class="subtitle">Start your Own Shop today</span></h3>
                </div>
            </div>

            <div class="col_one_fourth nobottommargin">
                <div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
                    <div class="fbox-icon">
                        <a href="#"><i class="i-alt noborder icon-wallet"></i></a>
                    </div>
                    <h3>Easy Payment Options<span class="subtitle">Credit Cards &amp; PayPal Support</span></h3>
                </div>
            </div>

            <div class="col_one_fourth nobottommargin">
                <div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
                    <div class="fbox-icon">
                        <a href="#"><i class="i-alt noborder icon-megaphone"></i></a>
                    </div>
                    <h3>Instant Notifications<span class="subtitle">Realtime Email &amp; SMS Support</span></h3>
                </div>
            </div>

            <div class="col_one_fourth nobottommargin col_last">
                <div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
                    <div class="fbox-icon">
                        <a href="#"><i class="i-alt noborder icon-fire"></i></a>
                    </div>
                    <h3>Hot Offers Daily<span class="subtitle">Upto 50% Discounts</span></h3>
                </div>
            </div>

            <div class="clear"></div><div class="line bottommargin-lg"></div>

            <div class="col_two_fifth nobottommargin">
                <a href="http://vimeo.com/101373765" data-lightbox="iframe">
                    <img src="images/others/1.jpg" alt="Image">
                    <span class="i-overlay"><img src="images/icons/play.png" alt="Play"></span>
                </a>
            </div>

            <div class="col_three_fifth nobottommargin col_last">

                <div class="heading-block">
                    <h2>Globally Preferred Ecommerce Platform</h2>
                </div>

                <p>Worldwide John Lennon, mobilize humanitarian; emergency response donors; cause human experience effect. Volunteer Action Against Hunger Aga Khan safeguards women's.</p>

                <div class="col_half nobottommargin">
                    <ul class="iconlist iconlist-color nobottommargin">
                        <li><i class="icon-caret-right"></i> Responsive Ready Layout</li>
                        <li><i class="icon-caret-right"></i> Retina Display Supported</li>
                        <li><i class="icon-caret-right"></i> Powerful &amp; Optimized Code</li>
                        <li><i class="icon-caret-right"></i> 380+ Templates Included</li>
                    </ul>
                </div>

                <div class="col_half nobottommargin col_last">
                    <ul class="iconlist iconlist-color nobottommargin">
                        <li><i class="icon-caret-right"></i> 12+ Headers &amp; Menu Designs</li>
                        <li><i class="icon-caret-right"></i> Premium Sliders Included</li>
                        <li><i class="icon-caret-right"></i> Light &amp; Dark Colors</li>
                        <li><i class="icon-caret-right"></i> e-Commerce Design Included</li>
                    </ul>
                </div>

            </div>

            <div class="clear"></div>

        </div>

    </div>
</section>

@endsection
