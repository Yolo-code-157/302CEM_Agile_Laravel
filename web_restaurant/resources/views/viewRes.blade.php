<x-app-layout>
    <html lang="en">

    <head>
        <title>Hello, Restaurant!</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <!-- Fonts and icons -->
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"-->

        <!-- Material Kit CSS -->
        <link href="/assets/css/viewRes.css" rel="stylesheet" />

        <style>
            div {
                text-align: justify;
            }

            .img-fluid {
                object-fit: cover;
                width: 100%;
                height: 430px;
            }

            .border-radius-lg {
                border-radius: .5rem;
            }

            .review-average {
                color: #9c27b0;
            }

            .ratings {
                margin-top: 15px;
                margin-left: 15px;
                margin-right: 15px;
            }

            .ratings i {
                color: #cecece;
                font-size: 25px;
            }

            .rating-color {
                color: #9c27b0 !important;
            }

            .small-ratings i {
                color: #cecece;
            }

            .review-stat {
                width: 6%;
                margin-bottom: 2px;
            }

            .review-stat-average {
                margin-bottom: 2px;
            }

            .bar-container {
                width: 100%;
                margin-top: 10px;
                margin-left: 15px;
                margin-right: 15px;
                background-color: #cecece;
                text-align: center;
            }

            .bar-service {
                width: 20%;
                height: 18px;
                background-color: #9c27b0;
            }

            .bar-value {
                width: 40%;
                height: 18px;
                background-color: #9c27b0;
            }

            .bar-food {
                width: 60%;
                height: 18px;
                background-color: #9c27b0;
            }

        </style>
    </head>

    <body>
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        <div class="page-header header-filter" data-parallax="true" style="background-image: url('img/bg3.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="brand text-center">
                            <h1>{{ $Title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                <div class="row section">
                    <div class="col">
                        <img src="data:image/{{ base64_encode($Detail->resPicType) }};charset=utf8;base64,{{ base64_encode($Detail->resPic) }}"
                            class="img-fluid border-radius-lg" alt="restaurant image" loading="lazy" />
                    </div>
                    <div class="col">
                        <div class="card-header p-0">
                            <h3 class="text-primary">{{ $Detail->resName }}</h3>
                        </div>
                        <div class="card-body px-0">
                            {!! nl2br($Detail->resDescription) !!}
                            <p>
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                {{ $Detail->resPostcode }}
                            </p>
                            <p>
                                <i class="fas fa-utensils text-primary"></i>
                                {{ $Detail->resFoodType }}
                            </p>
                            <p>
                                <i class="fas fa-laugh-beam text-primary"></i> Service Rate: 
                                {{-- Check number of review is more than zero and only display the service rating --}}
                                @if ($Detail->numReviews > 0)
                                    {{ sprintf('%.1f', $Detail->serviceRating / $Detail->numReviews) }} /5.0                                    
                                @else
                                    -
                                @endif
                            </p>
                            <p>
                                <i class="fas fa-concierge-bell text-primary"></i> Food Rate: 
                                {{-- Check number of review is more than zero and only display the food rating --}}
                                @if ($Detail->numReviews > 0)
                                    {{ sprintf('%.1f', $Detail->foodRating / $Detail->numReviews) }} /5.0                                   
                                @else
                                    -
                                @endif
                            </p>
                            <p>
                                <i class="fas fa-thumbs-up text-primary"></i> Value Rate: 
                                {{-- Check number of review is more than zero and only display the value rating --}}
                                @if ($Detail->numReviews > 0)
                                    {{ sprintf('%.1f', $Detail->valueRating / $Detail->numReviews) }} /5.0                                
                                @else
                                    -
                                @endif
                            </p>
                            <p>
                                <i class="fas fa-clock text-primary"></i>
                                {{ substr($Detail->createdAt, 0, 10) }}
                            </p>

                            @if (Auth::user())
                                @foreach ($Rating as $rate)
                                    @if ($rate->username == Auth::user()->name)
                                       <p class="btn bg-primary w-100 mt-3"> Review given</p>
                                    @elseif($rate== $Rating[count($Rating)-1])
                                        <a href="/resRating/{{ $Detail->resID }}" class="btn bg-primary w-100 mt-3">
                                            Write A Review
                                        </a>
                                        
                                    @endif
                                @endforeach
                                @if( count($Rating)==0 )
                                <a href="/resRating/{{ $Detail->resID }}" class="btn bg-primary w-100 mt-3">
                                            Write A Review
                                        </a>
                                @endif
                            @else
                                <a href="/resRating/{{ $Detail->resID }}" class="btn bg-primary w-100 mt-3">
                                    Write A Review
                                </a>
                            @endif
                        </div>  
                    </div>
                </div>
                <div style="padding-bottom: 70px;">
                    <h2 class="text-primary font-weight-bold">Reviews</h2>
                    <div class="card-header p-0 d-flex align-items-center">
                        <h2 class="review-average font-weight-bold"> 
                            @if ($Detail->numReviews > 0)
                                {{  sprintf('%.1f',(sprintf('%.1f', $Detail->serviceRating / $Detail->numReviews) + sprintf('%.1f', $Detail->foodRating / $Detail->numReviews) + sprintf('%.1f', $Detail->valueRating / $Detail->numReviews) )/3 )}}
                            @else
                                -
                            @endif
                                        </h2>
                        <div class="ratings">
                            <i class="fas fa-star rating-color"></i>
                            <i class="fas fa-star rating-color"></i>
                            <i class="fas fa-star rating-color"></i>
                            <i class="fas fa-star rating-color"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="review-stat font-weight-bold">Service</h5>
                        <div class="bar-container">
                            <div class="bar-service"></div>
                        </div>
                        <h5 class="review-stat-average font-weight-bold">
                        @if ($Detail->numReviews > 0)
                                {{ sprintf('%.1f', $Detail->serviceRating / $Detail->numReviews) }}                                 
                        @else
                            -
                        @endif
                        </h5>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="review-stat font-weight-bold">Food</h5>
                        <div class="bar-container">
                            <div class="bar-value"></div>
                        </div>
                        <h5 class="review-stat-average font-weight-bold">
                            @if ($Detail->numReviews > 0)
                                    {{ sprintf('%.1f', $Detail->foodRating / $Detail->numReviews) }}                                  
                            @else
                                -
                            @endif
                        </h5>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="review-stat font-weight-bold">Value</h5>
                        <div class="bar-container">
                            <div class="bar-food"></div>
                        </div>
                        <h5 class="review-stat-average font-weight-bold"> 
                            @if ($Detail->numReviews > 0)
                                 {{ sprintf('%.1f', $Detail->valueRating / $Detail->numReviews) }}                                
                            @else
                                 -
                            @endif
                            </h5>
                    </div>
                    @foreach ($Rating as $Rate)
                    <div class="card-body px-0">
                        <hr>
                        <h5 class="font-weight-bold">
                            <i class="fas fa-user text-primary"></i>
                            {{ $Rate->username}}
                        </h5>
                        <p>
                        {{ $Rate->review }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
    @include('footer')

    </html>
</x-app-layout>
