@extends('layouts.website_layout')

@section('title', 'Servicios')

@section('content')

    <!-- Page Title
    ============================================= -->
    <section id="page-title" class="page-title-mini">

        <div class="container clearfix">
            <h1>Servicios</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Servicios</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_one_third">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-pen1 i-alt"></i></a>
							</div>
							<h3>Diseño Gráfico<span class="subtitle">About 20+ Dedicated Slider Templates</span></h3>
						</div>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-world i-alt"></i></a>
							</div>
							<h3>Sitios Web<span class="subtitle">16.7+ Million on your fingertips</span></h3>
						</div>
					</div>

					<div class="col_one_third col_last">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-shop i-alt"></i></a>
							</div>
							<h3>e-Commerce<span class="subtitle">Unlimited Fonts &amp; Customizations</span></h3>
						</div>
					</div>

					<div class="clear"></div>

					<div class="col_one_third">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-mail i-alt"></i></a>
							</div>
							<h3>Mailing<span class="subtitle">Customizable Headers &amp; Menus</span></h3>
						</div>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-database i-alt"></i></a>
							</div>
							<h3>Web Hosting<span class="subtitle">Stylish &amp; Simple Chunky Menus</span></h3>
						</div>
					</div>

					<div class="col_one_third col_last">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-line2-social-facebook i-alt"></i></a>
							</div>
							<h3>Social Media<span class="subtitle">Crystal Clear Images &amp; Icons</span></h3>
						</div>
                    </div>

                    <div class="clear"></div>

                    <div class="col_one_third">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-eye i-alt"></i></a>
							</div>
							<h3>SEO<span class="subtitle">Crystal Clear Images &amp; Icons</span></h3>
						</div>
                    </div>

                    <div class="col_one_third">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-ad i-alt"></i></a>
							</div>
							<h3>Google Ads<span class="subtitle">Crystal Clear Images &amp; Icons</span></h3>
						</div>
                    </div>

                    <div class="col_one_third col_last">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-line2-graph i-alt"></i></a>
							</div>
							<h3>Google Analytics<span class="subtitle">Crystal Clear Images &amp; Icons</span></h3>
						</div>
                    </div>

                    <div class="clear"></div>

                    <div class="col_one_third">
						<div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="icon-google i-alt"></i></a>
							</div>
							<h3>Google Business<span class="subtitle">Crystal Clear Images &amp; Icons</span></h3>
						</div>
                    </div>

                </div>

            </div>

		</section>

@endsection
