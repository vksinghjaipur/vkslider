<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <link rel="stylesheet" href="{{ asset('frontend/newdesign/css/style.css') }}">

  <title>home-await-form</title>
</head>

<body>
  <div class="form_hed">
    <div class="container">
      <div class="row">
        <div class="col-md-4 form_part">
          <img class="logo_man" src="{{asset('frontend/newdesign/images/logo-main.svg')}}">
          <h2>Tell us! About Your <span>Dream Home</span></h2>
          <p>Define your dream home effortlessly through our concise search requirements form, guiding us to discover
            your ideal living space.</p>
          <img class="logo_man1" src="{{asset('frontend/newdesign/images/form_img.svg')}}">
        </div>

        <div class="col-md-8 form_part1">    
          <form class="row gx-3 gy-2 align-items-center" action="{{route('saleproperty')}}" method="GET">
            <div class="col-md-4 form_partline">
              <label for="inputState" class="form-label">Beds</label>
              <select name="beds" id="inputState" class="form-select">
                <option value="" selected>Any</option>
                <option value="1">1+</option>
                <option value="2">2+</option>
                <option value="3">3+</option>
                <option value="4">4+</option>
                <option value="5">5+</option>
              </select>
            </div>
            
            <div class="col-md-4 form_partline">
              <label for="inputState" class="form-label">Baths</label>
              <select name="baths" id="inputState" class="form-select">
                <option value="" selected>Any</option>
                <option value="1">1+</option>
                <option value="2">2+</option>
                <option value="3">3+</option>
                <option value="4">4+</option>
                <option value="5">5+</option>
              </select>
            </div>
            <div class="col-md-4 form_partline">
              <label for="inputState" class="form-label">Homestyle</label>
              <select name="prop_type" id="inputState" class="form-select">
                <option selected>Select Type</option>
                <option value="All">All</option>
                <option value="single_family">Single Family</option>
                <option value="townhome">Townhomes</option>
              </select>
            </div>
            <div class="col-md-4 form_partline1">
              <label for="inputState" class="form-label">Floor</label>
              <select name="stories" id="inputState" class="form-select">
                <option selected>Stories</option>
                <option>All</option>
                <option value="one_story">One Story</option>
                <option value="two_story">Two Story</option>
              </select>
            </div>
            <div class="col-md-4 form_partline1">
              <label for="inputState" class="form-label">Price Range ($)</label>
              <select name="price_from" id="inputState" class="form-select">
                <option value="50000">50,000</option>
                <option value="100000">1,00,000</option>
                <option value="300000">3,00,000</option>
                <option value="600000">6,00,000</option>
                <option value="1000000">10,00,000</option>
              </select>
            </div>
            <div class="col-md-4 form_partline1">
              <label for="inputState" class="form-label">Miles</label>
              <select name="price_to" id="inputState" class="form-select">
                <option selected>Select Miles</option>
                <option value="5">5 Miles</option>
                <option value="10">10 Miles</option>
                <option value="15">15 Miles</option>
                <option value="20">20 Miles</option>
                <option value="25">25 Miles</option>
                <option value="30">30 Miles</option>
              </select>
            </div>
            <div class="col-md-4 form_partline2">
                <label for="inputState" class="form-label">State</label>   
                <select id="state-dd" name="state" class="form-select"></select>  
            </div>
            <div class="col-md-4 form_partline2">
              <label for="inputState" class="form-label">City</label>
              <select id="city-dd" name="city" class="form-select"></select>
            </div>
            
            <div class="col-md-4 form_partline2">
              <label for="inputState" class="form-label">Zipcode</label>
              <input id="zipcode" class="form-input" type="text" value="{{Auth::user()->zip_code}}" name="zipcode">
            </div>
            <label for="inputState" class="form-label">Describe Your Requirement : </label>
            <div class="form-floating">
              <textarea name="describe_property" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                style="height: 100px"></textarea>
              <!-- <label for="floatingTextarea2">Comments</label> -->
            </div>
            <button class="btn btn-primary" type="submit">Search Your Dream Home</button>
        </div>
        </form>
      </div>
   
      
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<!-- Frontend script start -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/slick.js') }}"></script>
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
 
  <script>
    new WOW().init();
    $('.multiple-slider').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false
    });

    $('.our-service-slider').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3
    });

    $('.customer-service-slider').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1
    });

    $('.our-sign-home').slick({
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 2,
      autoplay: true,
      autoplaySpeed: 1000

    });


    $('.home-in-img').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 1000

    });


   


   $(function() {
    var header = $("header");
  
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 150) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    });
  
});
</script>
<!-- Frontend script end ---->

//  <script>
//   $(function(){ $('.chkToggle2').bootstrapToggle() });
// </script>

<!-- toastr notification js -->
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('failed'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.failed("{{ session('failed') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

  <script>

    new WOW().init();
    $('.slider-for').slick({

    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });

  $('.slider-nav').slick({

    slidesToShow: 4,

    slidesToScroll: 1,

    vertical:true,

    arrows: true,

    asNavFor: '.slider-for',

    dots: false,

    focusOnSelect: true,

    verticalSwiping:true,

    

    responsive: [

    {

        breakpoint: 992,

        settings: {

          vertical: false,

        }

    },

    {

      breakpoint: 768,

      settings: {

        vertical: false,

      }

    },

    {

      breakpoint: 580,

      settings: {

        vertical: false,

        slidesToShow: 3,

      }

    },

    {

      breakpoint: 380,

      settings: {

        vertical: false,

        slidesToShow: 2,

      }

    }

    ]

});









  $('.fil-icon').on('click', function () {

  if ($('.fiilter-box').hasClass('active')) {

    $('.fiilter-box').removeClass('active');

  } else {

    $('.fiilter-box').addClass('active');

  }

});



    





    $('.multiple-slider').slick({

      infinite: true,

      slidesToShow: 1,

      slidesToScroll: 1,

      arrows: false

    });



    $('.our-service-slider').slick({

      infinite: true,

      slidesToShow: 3,

      slidesToScroll: 3

    });



    $('.customer-service-slider').slick({

      infinite: true,

      slidesToShow: 1,

      slidesToScroll: 1

    });



    $('.our-sign-home').slick({

      infinite: true,

      slidesToShow: 1,

      slidesToScroll: 1,

      autoplay: false,

      autoplaySpeed: 1000



    });





    $('.home-in-img').slick({

      infinite: true,

      slidesToShow: 1,

      slidesToScroll: 1,

      autoplay: false,

      autoplaySpeed: 1000



    });









   $('.topcollection').slick({

  infinite: true,

  slidesToShow: 3,

  slidesToScroll: 3

});




$('.house-img').slick({

  infinite: true,

  slidesToShow: 1,

  slidesToScroll: 1,

  autoplay: true

});







// Select all »a« elements with a parent class »links« and add a function that is executed on click

$( '.links a' ).on( 'click', function(e){

    

  // Define variable of the clicked »a« element (»this«) and get its href value.

  var href = $(this).attr( 'href' );

  

  // Run a scroll animation to the position of the element which has the same id like the href value.

  $( 'html, body' ).animate({

        scrollTop: $( href ).offset().top

  }, '300' );

    

  // Prevent the browser from showing the attribute name of the clicked link in the address bar

  e.preventDefault();



});



  </script>
  

<!--V Get Country State City-->

<script>
$(document).ready(function () {
    

            var idCountry = '233';

            $("#state-dd").html('');

            $.ajax({

                url: "{{url('api/fetch-states')}}",

                type: "POST",

                data: {

                    country_id: idCountry,

                    _token: '{{csrf_token()}}'

                },

                dataType: 'json',

                success: function (result) {

                    $('#state-dd').html('<option value="">Select State</option>');

                    $.each(result.states, function (key, value) {

                        $("#state-dd").append('<option value="' + value

                            .id + '">' + value.name + '</option>');

                    });

                    $('#city-dd').html('<option value="">Select City</option>');

                }

            });

        
});
    $(document).ready(function () {

       

        $('#state-dd').on('change', function () {

            var idState = this.value;

            $("#city-dd").html('');

            $.ajax({

                url: "{{url('api/fetch-cities')}}",

                type: "POST",

                data: {

                    state_id: idState,

                    _token: '{{csrf_token()}}'

                },

                dataType: 'json',

                success: function (res) {

                    $('#city-dd').html('<option value="">Select City</option>');

                    $.each(res.cities, function (key, value) {

                        $("#city-dd").append('<option value="' + value

                            .name + '">' + value.name + '</option>');

                    });

                }

            });

        });

    });

</script>
</body>
</html>