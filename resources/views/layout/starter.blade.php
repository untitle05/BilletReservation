<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Page d'Accueil</title>
    {!! Html::style('semantic/semantic.min.css') !!}
    {!! Html::style('semantic/components/reset.css') !!}
    {!! Html::style('semantic/components/site.css') !!}

    {!! Html::style('semantic/components/container.css') !!}
    {!! Html::style('semantic/components/grid.css') !!}
    {!! Html::style('semantic/components/header.css') !!}
    {!! Html::style('semantic/components/image.css') !!}
    {!! Html::style('semantic/components/menu.css') !!}

    {!! Html::style('semantic/components/divider.css') !!}
    {!! Html::style('semantic/components/dropdown.css') !!}
    {!! Html::style('semantic/components/segment.css') !!}
    {!! Html::style('semantic/components/button.css') !!}
    {!! Html::style('semantic/components/list.css') !!}
    {!! Html::style('semantic/components/icon.css') !!}
    {!! Html::style('semantic/components/sidebar.css') !!}
    {!! Html::style('semantic/components/transition.css') !!}

    <style type="text/css">
        .hidden.menu {
            display: none;
        }

        .masthead.segment {
            min-height: 700px;
            padding: 1em 0em;
        }

        .masthead .logo.item img {
            margin-right: 1em;
        }

        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }

        .masthead h1.ui.header {
            margin-top: 3em;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }

        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }

        .ui.vertical.stripe {
            padding: 8em 0em;
        }

        .ui.vertical.stripe h3 {
            font-size: 2em;
        }

        .ui.vertical.stripe .button+h3,
        .ui.vertical.stripe p+h3 {
            margin-top: 3em;
        }

        .ui.vertical.stripe .floated.image {
            clear: both;
        }

        .ui.vertical.stripe p {
            font-size: 1.33em;
        }

        .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
        }

        .quote.stripe.segment {
            padding: 0em;
        }

        .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
        }

        .footer.segment {
            padding: 5em 0em;
        }

        .secondary.pointing.menu .toc.item {
            display: none;
        }

        @media only screen and (max-width: 700px) {
            .ui.fixed.menu {
                display: none !important;
            }

            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                Do whatever you want when you want to display: none;
            }

            .secondary.pointing.menu .toc.item {
                display: block;
            }

            .masthead.sDo whatever you want when you want toegment {
                min-heiDo whatever you want when you want toght: 350px;
            }

            Do whatever you want when you want to Do whatever you want when you want to .masthead hDo whatever you want when you want to1.ui.header {
                font-siDo whatever you want when you want toze: 2em;
                margin-top: 1.5em;
            }

            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }
    </style>

    <script src="{{ asset('semantic/jquery.js') }}"></script>
    <script src="{{asset('semantic/components/visibility.js') }}"></script>
    <script src="{{asset('semantic/components/sidebar.js') }}"></script>
    <script src="{{asset('semantic/components/transition.js') }}"></script>
    <script>
        $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;

    })
  ;
    </script>
</head>

<body>
    <!-- Following Menu -->


    <!-- Sidebar Menu -->

    {{-- <div class="ui vertical inverted sidebar menu">
        <a class="active item">Home</a>
        <a class="item">Work</a>
        <a class="item">Company</a>
        <a class="item">Careers</a>

    </div> --}}


    <!-- Page Contents -->
    <div class="pusher">
        <div class="ui inverted vertical masthead center aligned segment">

            <div class="ui container">

                <!-- rigthsidebar -->

                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>

                    <div class="right item">
                        <a class="ui inverted button" href="{{ route('login') }}">Log in</a>
                        <a class="ui inverted button" href="{{ route('register') }}">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="ui container">
                <div class="pusher">
                    <div class="ui inverted vertical masthead center aligned segment">

                        <div class="ui container">
                            @include('layout.rigthsidebar')

                        </div>

                        <div class="ui text container">
                            <h1 class="ui inverted header">
                                Systeme de Reservation de Billets
                            </h1>
                            <h2>Projet tutoré</h2>
                            <div class="ui huge primary button"><a href="{{ route('login') }}" style="color:aliceblue">Get Started <i
                                        class="right arrow icon"></i></a></div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="ui inverted vertical footer segment">
                <div class="ui container">
                    <div class="ui stackable inverted divided equal height stackable grid">
                        <div class="three wide column">
                            <h4 class="ui inverted header">Accueil</h4>
                            <div class="ui inverted link list">
                                <a href="homepage.html#" class="item">Nouveautés</a>
                                <a href="homepage.html#" class="item">Nous contacter</a>
                                <a href="homepage.html#" class="item">Nos offres</a>
                                <a href="homepage.html#" class="item">Gallerie</a>
                            </div>
                        </div>
                        <div class="three wide column">
                            <h4 class="ui inverted header">Nos partenaires</h4>
                            <div class="ui inverted link list">
                                <a href="homepage.html#" class="item">Geolocalisation</a>
                                <a href="homepage.html#" class="item">A propos de nous</a>
                                <a href="homepage.html#" class="item">FAQ</a>
                                <a href="homepage.html#" class="item">Aller plus loin</a>
                            </div>
                        </div>
                        <div class="seven wide column">
                            <h4 class="ui inverted header">Footer Header</h4>
                            <p>Systeme de Reservation des Billets de Voyage - SYSREVBI© 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>