@if(session()->has('status') && session()->has('status_code'))
    <script>
        swal({
            title: "{{ session('status')}}",
            //text: "You clicked the button!",
            icon: "{{session('status_code')}}",
        });
    </script>
    <?php

    session()->forget(['status', 'status_code']);
    //echo session()->get('status');
//    session()->flush();
    ?>
@endif

@if(session()->has('status') && session()->has('status_code'))
    <script>
        swal({
            title: "{{ session('status')}}",
            //text: "You clicked the button!",
            icon: "{{session('status_code')}}",
        });
    </script>
    <?php

    session()->forget(['status', 'status_code']);
    //echo session()->get('status');
    //    session()->flush();
    ?>
@endif





