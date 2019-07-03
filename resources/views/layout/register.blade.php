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

  {!! Html::style('semantic/semantic.min.css') !!}
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
  <script src="{{asset('semantic/components/transition.js') }}"></script>
  <script src="{{ asset('semantic/semantic.min.js') }}"></script>
  <script src="{{asset('semantic/components/form.js') }}"></script>
  {{-- <script src="{{ asset('semantic/components/message.js') }}"></script> --}}

  <script>
    // namespace
        window.semantic = {
          handler: {}
        };
  </script>

  <style>
    body {
      padding: 1em;
    }

    .ui.menu {
      margin: 3em 0em;
    }

    .ui.menu:last-child {
      margin-bottom: 110px;
    }
  </style>

  <!--- Example Javascript -->
  <script>
    $(document)
  .ready(function() {
    $('.ui.menu .ui.dropdown').dropdown({
      on: 'hover'
    });
    $('.ui.menu a.item')
      .on('click', function() {
        $(this)
          .addClass('active')
          .siblings()
          .removeClass('active')
        ;
      })
    ;
  })
;
  </script>


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
          S'enregistrer ...
        </div>
      </h2>
      <form method="POST" class="ui large form" action="{{ route('register') }}" enctype= 'multipart/form-data'>
        @csrf
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" id="name" name="name" placeholder="Nom">
            </div>
          </div>

          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" id="surname" name="surname" placeholder="Prenom">
            </div>
          </div>

          <div class="field">
            <select class="ui fluid dropdown" name="sex">
              <option value="" placeholder="Sexe"><i class="user icon"></i>Sexe</option>
              <option value="M">Masculin</option>
              <option value="F">Feminin</option>
            </select>
          </div>

          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="email" id="email" name="email" placeholder="Email">
            </div>
          </div>

          <div class="field">
            <div class="ui left icon input">
              <i class="phone icon"></i>
              <input type="number" id="phone" name="phone" placeholder="Telephone">
            </div>
          </div>

          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input id="password" type="password" name="password" placeholder="Password">
            </div>
          </div>

          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input id="password-confirm" type="password" name="password_confirmation"
                placeholder="Confirmation Password">
            </div>
          </div>

          {{-- <div class="field">
            <div class="ui left icon input">
              <i class="picture icon"></i>
              <input id="file" type="file" name="avatar"
                placeholder="Votre photo">
            </div>
          </div> --}}

          <div class="ui fluid large teal submit button" required>S'erengistrer</div>
        </div>

        <div class="ui error message"></div>

      </form>
      <div class="ui message">
        <a href="{{ route('login') }}">se connecter</a>
      </div>
    </div>
  </div>

  <script>
    semantic.validateForm = {};
    
    // ready event
    semantic.validateForm.ready = function() {
        $('select.dropdown').dropdown();
    };
    
    // attach ready event
    $(document).ready(semantic.validateForm.ready);
    
  </script>
</body>

</html>