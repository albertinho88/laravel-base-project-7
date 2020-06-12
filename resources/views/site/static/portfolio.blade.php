@extends('layouts.website_layout')

@section('title', 'Portafolio')

@section('content')

    <!-- Page Title
    ============================================= -->
    <section id="page-title" class="page-title-mini">

        <div class="container clearfix">
            <h1>Portafolio</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Portafolio</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Portfolio Filter
					============================================= -->
					<!--<ul id="portfolio-filter" class="portfolio-filter clearfix" data-container="#portfolio">

						<li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
						<li><a href="#" data-filter=".pf-icons">Icons</a></li>
						<li><a href="#" data-filter=".pf-illustrations">Illustrations</a></li>
						<li><a href="#" data-filter=".pf-uielements">UI Elements</a></li>
						<li><a href="#" data-filter=".pf-media">Media</a></li>
						<li><a href="#" data-filter=".pf-graphics">Graphics</a></li>

                    </ul>-->
                    <!-- #portfolio-filter end -->

					<!--<div id="portfolio-shuffle" class="portfolio-shuffle" data-container="#portfolio">
						<i class="icon-random"></i>
					</div>

					<div class="clear"></div>-->

					<!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container portfolio-1 clearfix">

						<article class="portfolio-item pf-media pf-icons clearfix">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="{{ asset('images/portfolio/1/1.png') }}" alt="Open Imagination">
								</a>
								<div class="portfolio-overlay">
									<a href="{{ asset('images/portfolio/full/1.png') }}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
									<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single.html">DVO Ecuador</a></h3>
								<span><a href="#">Media</a>, <a href="#">Icons</a></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus enim sed. Optio, reprehenderit, ex.</p>
								<ul class="iconlist">
									<li><i class="icon-ok"></i> <strong>Created Using:</strong> PHP, HTML5, CSS3</li>
									<li><i class="icon-ok"></i> <strong>Completed on:</strong> 12th January, 2014</li>
									<li><i class="icon-ok"></i> <strong>By:</strong> John Doe</li>
								</ul>
								<a href="portfolio-single.html" class="button button-3d noleftmargin">Launch Project</a>
							</div>
						</article>

						<article class="portfolio-item pf-illustrations clearfix">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="{{ asset('images/portfolio/1/2.jpg') }}" alt="Locked Steel Gate">
								</a>
								<div class="portfolio-overlay">
									<a href="{{ asset('images/portfolio/full/2.jpg') }}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
									<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single.html">Locked Steel Gate</a></h3>
								<span><a href="#">Illustrations</a></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus enim sed. Optio, reprehenderit, ex.</p>
								<ul class="iconlist">
									<li><i class="icon-ok"></i> <strong>Created Using:</strong> HTML5, CSS3, jQuery</li>
									<li><i class="icon-ok"></i> <strong>Completed on:</strong> 14th February, 2014</li>
									<li><i class="icon-ok"></i> <strong>By:</strong> Mary Jane</li>
								</ul>
								<a href="portfolio-single.html" class="button button-3d noleftmargin">Launch Project</a>
							</div>
						</article>

						<article class="portfolio-item pf-graphics pf-uielements clearfix">
							<div class="portfolio-image">
								<a href="#">
									<img src="{{ asset('images/portfolio/1/3.jpg') }}" alt="Mac Sunglasses">
								</a>
								<div class="portfolio-overlay">
									<a href="http://vimeo.com/89396394" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
									<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single-video.html">Mac Sunglasses</a></h3>
								<span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus enim sed. Optio, reprehenderit, ex.</p>
								<ul class="iconlist">
									<li><i class="icon-ok"></i> <strong>Created Using:</strong> Wordpress, CSS3</li>
									<li><i class="icon-ok"></i> <strong>Completed on:</strong> 21st February, 2014</li>
									<li><i class="icon-ok"></i> <strong>By:</strong> Ricky Martin</li>
								</ul>
								<a href="portfolio-single-video.html" class="button button-3d noleftmargin">Launch Project</a>
							</div>
						</article>

						<article class="portfolio-item pf-icons pf-illustrations clearfix">
							<div class="portfolio-image">
								<div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
									<div class="flexslider">
										<div class="slider-wrap">
											<div class="slide"><a href="portfolio-single-gallery.html"><img src="images/portfolio/1/4.jpg" alt="Morning Dew"></a></div>
											<div class="slide"><a href="portfolio-single-gallery.html"><img src="images/portfolio/1/4-1.jpg" alt="Morning Dew"></a></div>
										</div>
									</div>
								</div>
								<div class="portfolio-overlay" data-lightbox="gallery">
									<a href="{{ asset('images/portfolio/full/4.jpg') }}" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
									<a href="{{ asset('images/portfolio/full/4-1.jpg') }}" class="hidden" data-lightbox="gallery-item"></a>
									<a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single-gallery.html">Morning Dew</a></h3>
								<span><a href="#">Icons</a>, <a href="#">Illustrations</a></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus enim sed. Optio, reprehenderit, ex.</p>
								<ul class="iconlist">
									<li><i class="icon-ok"></i> <strong>Created Using:</strong> jQuery, Ruby</li>
									<li><i class="icon-ok"></i> <strong>Completed on:</strong> 3rd March, 2014</li>
									<li><i class="icon-ok"></i> <strong>By:</strong> Corey Smith</li>
								</ul>
								<a href="portfolio-single-gallery.html" class="button button-3d noleftmargin">Launch Project</a>
							</div>
						</article>

						<article class="portfolio-item pf-uielements pf-media clearfix">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="{{ asset('images/portfolio/1/5.jpg') }}" alt="Console Activity">
								</a>
								<div class="portfolio-overlay">
									<a href="{{ asset('images/portfolio/full/5.jpg') }}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
									<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single.html">Console Activity</a></h3>
								<span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus enim sed. Optio, reprehenderit, ex.</p>
								<ul class="iconlist">
									<li><i class="icon-ok"></i> <strong>Created Using:</strong> PHP, CSS3, MySQL</li>
									<li><i class="icon-ok"></i> <strong>Completed on:</strong> 16th March, 2014</li>
									<li><i class="icon-ok"></i> <strong>By:</strong> Emma Watson</li>
								</ul>
								<a href="portfolio-single.html" class="button button-3d noleftmargin">Launch Project</a>
							</div>
						</article>

						<article class="portfolio-item pf-graphics pf-illustrations clearfix">
							<div class="portfolio-image">
								<div class="fslider" data-arrows="false">
									<div class="flexslider">
										<div class="slider-wrap">
											<div class="slide"><a href="portfolio-single-gallery.html"><img src="images/portfolio/1/6.jpg" alt="Shake It"></a></div>
											<div class="slide"><a href="portfolio-single-gallery.html"><img src="images/portfolio/1/6-1.jpg" alt="Shake It"></a></div>
											<div class="slide"><a href="portfolio-single-gallery.html"><img src="images/portfolio/1/6-2.jpg" alt="Shake It"></a></div>
											<div class="slide"><a href="portfolio-single-gallery.html"><img src="images/portfolio/1/6-3.jpg" alt="Shake It"></a></div>
										</div>
									</div>
								</div>
								<div class="portfolio-overlay" data-lightbox="gallery">
									<a href="images/portfolio/full/6.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
									<a href="images/portfolio/full/6-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
									<a href="images/portfolio/full/6-2.jpg" class="hidden" data-lightbox="gallery-item"></a>
									<a href="images/portfolio/full/6-3.jpg" class="hidden" data-lightbox="gallery-item"></a>
									<a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single-gallery.html">Shake It!</a></h3>
								<span><a href="#">Illustrations</a>, <a href="#">Graphics</a></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus enim sed. Optio, reprehenderit, ex.</p>
								<ul class="iconlist">
									<li><i class="icon-ok"></i> <strong>Created Using:</strong> PHP, HTML5, CSS3</li>
									<li><i class="icon-ok"></i> <strong>Completed on:</strong> 24th March, 2014</li>
									<li><i class="icon-ok"></i> <strong>By:</strong> Jane Doe</li>
								</ul>
								<a href="portfolio-single-gallery.html" class="button button-3d noleftmargin">Launch Project</a>
							</div>
						</article>

						<article class="portfolio-item pf-uielements pf-icons clearfix">
							<div class="portfolio-image">
								<a href="portfolio-single-video.html">
									<img src="images/portfolio/1/7.jpg" alt="Backpack Contents">
								</a>
								<div class="portfolio-overlay">
									<a href="http://www.youtube.com/watch?v=kuceVNBTJio" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
									<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single-video.html">Backpack Contents</a></h3>
								<span><a href="#">UI Elements</a>, <a href="#">Icons</a></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus enim sed. Optio, reprehenderit, ex.</p>
								<ul class="iconlist">
									<li><i class="icon-ok"></i> <strong>Created Using:</strong> HTML5, CSS3, jQuery</li>
									<li><i class="icon-ok"></i> <strong>Completed on:</strong> 2nd April, 2014</li>
									<li><i class="icon-ok"></i> <strong>By:</strong> John Doe</li>
								</ul>
								<a href="portfolio-single-video.html" class="button button-3d noleftmargin">Launch Project</a>
							</div>
						</article>

					</div><!-- #portfolio end -->

				</div>

			</div>

		</section><!-- #content end -->

@endsection
