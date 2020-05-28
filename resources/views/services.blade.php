@extends('layout.layout')

@section('content')


    @include('common.header')
    <div class="row mb-5 mt-5">
        <div class="col-lg-12">
            <form class="search">
                <input type="text" placeholder="Zipcode, city or street address" name="search" id="search">
                <button type="submit" id="search-btn"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
            <div class="row" id="services-container">

            </div>
            <div class="row" id="loader" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

@endsection

@section('js-libs')
    <script>
        $("#search-btn").on('click', function(e) {
            e.preventDefault();
            $("#loader").addClass('d-flex justify-content-center').show();
            var kw = $("#search").val();
            $.ajax({
                url: "/get-listing",
                type:"GET",
                data: "kw="+kw,
                success: function(res) {
                    $("#loader").removeClass('d-flex justify-content-center').hide();
                    $("#services-container").html(res);
                }
            })
        })
    </script>
@endsection
