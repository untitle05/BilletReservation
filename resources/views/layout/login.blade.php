<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Site Properties -->
    <title>SYSREVBI©</title>

    {!! Html::style('semantic/components/reset.css') !!}
    {!! Html::style('semantic/components/site.css') !!}

    {!! Html::style('semantic/components/container.css') !!}
    {!! Html::style('semantic/components/grid.css') !!}
    {!! Html::style('semantic/components/header.css') !!}
    {!! Html::style('semantic/components/image.css') !!}
    {!! Html::style('semantic/components/menu.css') !!}

    {!! Html::style('semantic/components/divider.css') !!}
    {!! Html::style('semantic/components/form.css') !!}
    {!! Html::style('semantic/components/segment.css') !!}
    {!! Html::style('semantic/components/input.css') !!}
    {!! Html::style('semantic/components/button.css') !!}
    {!! Html::style('semantic/components/list.css') !!}
    {!! Html::style('semantic/components/icon.css') !!}
    {!! Html::style('semantic/components/message.css') !!}



    <script src="{{ asset('semantic/jquery.js') }}"></script>
    <script src="{{asset('semantic/components/form.js') }}"></script>
    <script src="{{asset('semantic/components/transition.js') }}"></script>


    <style type="text/css">
        body {
            background-color: #DADADA;
        }

        body>.grid {
            height: 100%;
        }

        .image {
            margin-top: -100px;
        }

        .column {
            max-width: 450px;
        }
    </style>
    <script>
        $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
    </script>
</head>

<body>

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <div class="content">
                    Se connecter ...
                </div>
            </h2>
            <form class="ui large form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                required autofocus placeholder="E-mail address">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required placeholder="Password">
                        </div>
                    </div>
                    <div class="ui fluid large teal submit button">Login</div>
                </div>

                <div class="ui error message"></div>

            </form>

            <div class="ui message">
                Nouveau ? <a href="{{ route('register') }}">S'enregistrer</a>
            </div>
        </div>
    </div>

</body>

</html>