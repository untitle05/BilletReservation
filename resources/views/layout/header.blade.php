{{-- header --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {!! Html::style('semantic/semantic.min.css') !!}
  {{-- {!! Html::style('semantic/dataTables.semanticui.min.css') !!} --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css"> --}}
  @yield('css')

  <script src="{{ asset('semantic/jquery.js') }}"></script>
  <script src="{{ asset('semantic/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('semantic/dataTables.semanticui.min.js') }}"></script>
  <script src="{{ asset('semantic/semantic.min.js') }}"></script>
  {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
  {{-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script> --}}

  <script>
    // namespace
      window.semantic = {
        handler: {}
      };
  </script>
  @yield('js')

  <title>SYSREVBI©</title>

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

</head>

<body>