   @if(count($errors) > 0)
   @foreach($errors -> all() as $error) <script>

       Materialize.toast('{{ $error }} ', 3000, 'red rounded') </script>
   @endforeach
   @endif

   @if(Session::has('success')) <script type = "text/javascript" >

 Materialize.toast(
        '{{ Session::get('success') }}', 3000, 'green rounded')

   </script>

   @endif