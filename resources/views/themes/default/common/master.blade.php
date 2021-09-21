@include('themes.default.common.header')
@if(Illuminate\Support\Facades\Session::has('message'))
    <div class="alert alert-block alert-success alert-dismissible" style="color:green">
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@yield('content')
@include('themes.default.common.footer')

<script type="text/javascript">
    // import {alert} from "../../../../../public/assets/js/utility/utility";

    $(document).ready(function () {
        $('.alert').hide(8000);
    });

    $(document).ready(function () {

        $('.publication_filter').change(function (e) {
            var val = $(this).find(':checked').val();
            console.log(val);

            $.ajax({
                url: document.URL,
                type: 'get',
                data: {
                    value: val,
                },
                success: function (result) {
                    console.log(result);

                    $('.filter_result').replaceWith($('.filter_result')).html(result);
                }
            });

        })


    });

</script>
