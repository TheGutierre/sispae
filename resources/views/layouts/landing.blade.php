<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>PAE - Programa de Acompanhamento dos Egressos</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/my.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

@if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li> {{ Session::get('success.0') }} </li>
        </ul>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-warning">
        Atenção para os seguintes pontos:
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>Portal do Egresso</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('message.register') }}</a></li>
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div id="topwrap">        
        <div class="row centered">
            <div class="col-lg-12">
                <div class="float-left col-xs-6 col-sm-3 text-center">
                    <a href="default.asp"><img src="{{ asset('/img/logo_ub.png') }}" alt="UNIBALSAS" id="logo-header"></a>
                </div>                    
                <div class="fr text-center">
                    <img id="logo-pae" src="img/logo_PAE.png" alt="PAE" />
                </div>
                <span class="clear"></span>
                <div id="predio-wrapper">
                    <img id="predio" src="img/predio_ub.png" alt="UB" />
                    <div id="header-bottom-line">VOCÊ LEVA A MARCA UNIBALSAS NO SEU DIPLOMA</div>
                </div>
                    
            </div>
        </div>
    </div>

    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" style="padding-top: 3em">
                    <h1>Bem-vindo ao Portal do Egresso</h1>
                    <h3>Programa de Acompanhamento </h3><h3>dos Egressos - PAE</h3>
                    <h3>da <b>Unibalsas</b></h3>
                </div>
            </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->


    <section id="desc" name="desc"></section>
    <!-- INTRO WRAP -->
    <div id="intro">
        <div class="container">
            <div class="row centered">
                <h1>Benefícios do Portal do Egresso</h1>
                <br>
                <br>
                <div class="col-lg-4">
                    <a href="#" target="_blank">
                        <img src="{{ asset('/img/intro01.png') }}" alt="">
                        <h3>{{ trans('message.vagas') }}</h3>
                        <p>{{ trans('message.encontrevaga') }}</p>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="https://www.facebook.com/Unibalsas/" target="_blank">
                        <img src="{{ asset('/img/intro02.png') }}" alt="">
                        <h3>{{ trans('message.ubnoface') }}</h3>
                        <p>{{ trans('message.curtaface') }}</p>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="https://www.instagram.com/unibalsas/" target="_blank">
                        <img src="{{ asset('/img/intro03.png') }}" alt="">
                        <h3>{{ trans('message.ubnoinsta') }}</h3>
                        <p>{{ trans('message.curtainsta') }}</p>
                    </a>
                </div>
            </div>
            <br>
            <hr>
        </div> <!--/ .container -->
    </div><!--/ #introwrap -->

    <div id="showcase">
        <div class="container">
            <div class="row">
                <h1 class="centered">{{ trans('message.cursosdepos') }}</h1>
                <br>
                <div class="col-lg-8 col-lg-offset-2">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ asset('/img/posgraduacao/item-01.png') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('/img/posgraduacao/item-02.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div><!-- /container -->
    </div>


    <section id="contact" name="contact"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>{{ trans('message.address') }}</h3>
                <p>
                    Faculdade de Balsas - UNIBALSAS,<br/>
                    BR 230 – Km 05</br>
                    CEP: 65800-000</br>
                    Balsas - MA<br/>
                    Fone: (99) 3542-5500
                </p>
            </div>

            <div class="col-lg-7">
                <h3>{{ trans('message.dropus') }}</h3>
                <br>
                {!! Form::open(['route' => 'contato.enviar', 'class' => '']) !!}
                    <div class="form-group">
                        <label for="name1">{{ trans('message.yourname') }}</label>
                        <input type="name" name="nome" class="form-control" id="name1" placeholder="{{ trans('adminlte_lang::message.yourname') }}">
                    </div>
                    <div class="form-group">
                        <label for="email1">{{ trans('message.emailaddress') }}</label>
                        <input type="email" name="email" class="form-control" id="email1" placeholder="{{ trans('message.enteremail') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.yourtext') }}</label>
                        <textarea class="form-control" name="mensagem" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-large btn-success">{{ trans('message.submit') }}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div id="footer2">
        <div class="container">
            <div id="logo-footer" class="fl">
                <a href="http://www.unibalsas.edu.br" target="_blank"><img src="{{ asset('/img/logo_ub_branca.png') }}" alt="UNIBALSAS" id="logo-footer-img"></a>
            </div>
            <div class="fr">
                <a href="http://www.hollic.com.br" target="_blank"><img src="{{ asset('/img/logo_hollic_branca.png') }}" alt="Hollic" id="logo2-footer-img"></a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script src="{{ asset('/js/Chart.min.js') }}"></script>
<script src="{{ asset('/js/my.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
