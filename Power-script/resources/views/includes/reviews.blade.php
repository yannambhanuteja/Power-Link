<section id="reviews"  >
    <div class="container">
        <div class="section-content">
            <!-- Section's Title -->
            <div class="section-title center-align" data-aos="flip-left">
                <h2> Users <strong>Review's</strong></h2>
                <p>Find out what our users say about us.</p>
            </div>
            <!-- /Section's Title -->

            <!-- Reviews Carousel -->
            <div class="testimonial-carousel carousel-container " >

                <!--  Carousel Items-->
                <div class="carousel" >
                    @foreach($reviews as $review)
                    <div class=" carousel-item"   >
                        <div class="s12 z-depth-4 card  valign-wrapper" >

                            <div class="card-image">
                                @if($review->user_image)

                                <img src="/reviews/{{$review->user_image}}" class="pulse-expand circle responsive-img"> @else
                                <img src="user.jpg" class="pulse-expand circle responsive-img"> @endif
                            </div>
                            <!-- User's image -->

                            <div class="card-content center-align valign">

                                <i class="material-icons left">&#xE244;</i>

                                <p><em>{{$review->review}}</em></p>
                                <!-- users review -->

                                <i class="material-icons right">&#xE244;</i>

                                <!-- user's Name -->
                                <p class="card-title">{{$review->users_name}}<span>
                                            {{$review->occupation}}</span></p>

                                @if($review->stars=='1')

                                <i class="red-text material-icons">star</i>
                                <i class=" material-icons">star</i>
                                <i class=" material-icons">star</i>
                                <i class=" material-icons">star</i>
                                <i class=" material-icons">star</i> @endif @if($review->stars=='2')
                                <i class="orange-text material-icons">star</i>
                                <i class="orange-text material-icons">star</i>
                                <i class=" material-icons">star</i>
                                <i class=" material-icons">star</i>
                                <i class=" material-icons">star</i> @endif @if($review->stars=='3')
                                <i class="yellow-text material-icons">star</i>
                                <i class="yellow-text material-icons">star</i>
                                <i class="yellow-text material-icons">star</i>
                                <i class=" material-icons">star</i>
                                <i class=" material-icons">star</i> @endif @if($review->stars=='4')
                                <i class="yellow-text material-icons">star</i>
                                <i class="yellow-text material-icons">star</i>
                                <i class="yellow-text material-icons">star</i>
                                <i class="yellow-text material-icons">star</i>
                                <i class=" material-icons">star</i> @endif @if($review->stars=='5')
                                <i class="yellow-text material-icons">star</i>
                                <i class="yellow-text material-icons">star</i>
                                <i class="yellow-text material-icons">star</i>
                                <i class="yellow-text material-icons">star</i>
                                <i class="yellow-text material-icons">star</i> @endif

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- / Carousel Items -->
                <!-- Carousel Control -->
                <div class="carousel-control center center-align">
                    <a href="#!" class="pulse-expand btn-floating orange white-text btn waves-effect prev z-depth-2"><i class="material-icons">&#xE314;</i></a>
                    <a href="#!" class="pulse-expand btn-floating orange white-text btn waves-effect next z-depth-2"><i class="material-icons">&#xE315;</i></a>
                </div>
                <!-- /Testimonials Carousel  -->

            </div>
        </div>
        <div class="center-align">
            <a class="expand btn waves-effect waves-light green darken-4 white-text" href="/users/review/create/write"> <i class="pulse-expand material-icons">edit</i> Write Your Review </a>
        </div>
        <br>
</section>
<!-- /Testimonials Section -->
<script>
    $(document).ready(function() {
        $('.carousel').carousel();
        setInterval(function() {
            $('.carousel').carousel('next');
        }, 7000);
        $(".carousel-control .next").on('click', function(e) {
            e.preventDefault();
            $(this).parent(".carousel-control").prev('.carousel').carousel('next', 1);
        });
        $(".carousel-control .prev").on('click', function(e) {
            e.preventDefault();
            $(this).parent(".carousel-control").prev('.carousel').carousel('prev', 1);
        });
    });
</script>

<style>
    #reviews:not(.colored-background) {
        background: #fff;
    }
    
    #reviews .carousel .carousel-item {
        width: 384px;
    }
    
    #reviews .carousel .carousel-item .card {
        border-top: 1px solid red;
        min-height: 240px;
    }
    
    #reviews .carousel .carousel-item .card i.material-icons {
        color: #828080;
    }
    
    #reviews .carousel .carousel-item .card i.material-icons.left {
        transform: scale(-1);
        -webkit-transform: scale(-1);
        -moz-transform: scale(-1);
        margin-bottom: 10px;
    }
    
    #reviews .carousel .carousel-item .card .card-content .card-title,
    #reviews .carousel .carousel-item .card .card-content p {
        clear: both;
        margin: 6px 0;
    }
    
    #reviews .carousel .carousel-item .card .card-content p.card-title {
        font-size: 20px;
    }
    
    #reviews .carousel .carousel-item .card .card-content p.card-title span {
        display: block;
        font-size: 12px;
        text-transform: capitalize;
        font-weight: 500;
    }
    
    #reviews .carousel .carousel-item .card .card-image {
        border-radius: 50%;
        position: absolute;
        top: -44px;
        left: 0px;
        right: 0px;
        margin: auto;
        width: 80px;
        height: 80px;
        overflow: hidden;
    }
    
    #reviews .carousel-control.center.center-align {
        margin-bottom: 27px;
    }
    
    .card {
        margin: 1%;
    }
</style>