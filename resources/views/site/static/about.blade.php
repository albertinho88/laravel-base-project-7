@extends('layouts.website_layout')

@section('title', 'Quiénes Somos')

@section('content')

    <!-- Page Title
    ============================================= -->
    <section id="page-title" class="page-title-mini">

        <div class="container clearfix">
            <h1>Quiénes Somos?</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quiénes Somos?</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
		============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_one_third">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Nuestra <span>Historia</span></h4>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>

                </div>

                <div class="col_one_third">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Qué <span>hacemos</span>?</h4>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>

                </div>

                <div class="col_one_third col_last">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Por qué <span>escogernos</span>?</h4>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>

                </div>



                <div class="fancy-title title-border">
                    <h3>El Equipo</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 bottommargin">
                        <div class="team">
                            <div class="team-image">
                                <img src="{{ asset('images/team/9.jpg') }}" alt="John Doe">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Alberto Lárraga</h4><span>Software Developer</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 bottommargin">
                        <div class="team">
                            <div class="team-image">
                                <img src="{{ asset('images/team/2.jpg') }}" alt="Josh Clark">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Daniel Chiriboga</h4><span>Graphic Designer</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 bottommargin">
                        <div class="team">
                            <div class="team-image">
                                <img src="{{ asset('images/team/3.jpg') }}" alt="Mary Jane">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Fernando Duque</h4><span>Digital Marketer</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 bottommargin">
                        <div class="team">
                            <div class="team-image">
                                <img src="{{ asset('images/team/10.jpg') }}" alt="Nix Maxwell">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Jorge Bustillos</h4><span>Digital Marketer</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
