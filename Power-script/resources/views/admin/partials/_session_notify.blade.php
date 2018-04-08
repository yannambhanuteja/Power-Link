@if (Session::has('success'))
   <script type="text/javascript">
        $(document).ready(function(){

            

            $.notify({
                icon: 'small fa fa-check-circle',
                message: "{{ Session::get('success') }}"

            },{
                type: 'success',
                timer: 4000
            });

        });
    </script>
    
@endif

@if (Session::has('delete'))
   <script type="text/javascript">
        $(document).ready(function(){

            

            $.notify({
                icon: 'small fa fa-check-circle',
                message: "{{ Session::get('delete') }}"

            },{
                type: 'danger',
                timer: 4000
            });

        });
    </script>
    
@endif

 @if ( count( $errors ) > 0 )
  @foreach ($errors->all() as $error)
   <script type="text/javascript">
   
        $(document).ready(function(){

            

            $.notify({
               
                message: "{{ $error }}"

            },{
                type: 'danger',
                timer: 2000
            });

        });
    </script>
        @endforeach
    
@endif