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

        </style>
    </head>

    <body>
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
                                    {{ sprintf('%.1f', $Detail->serviceRating / $Detail->numReviews) }} /5                                    
                                @else
                                    -
                                @endif
                            </p>
                            <p>
                                <i class="fas fa-concierge-bell text-primary"></i> Food Rate: 
                                {{-- Check number of review is more than zero and only display the food rating --}}
                                @if ($Detail->numReviews > 0)
                                    {{ sprintf('%.1f', $Detail->foodRating / $Detail->numReviews) }} /5                                   
                                @else
                                    -
                                @endif
                            </p>
                            <p>
                                <i class="fas fa-thumbs-up text-primary"></i> Value Rate: 
                                {{-- Check number of review is more than zero and only display the value rating --}}
                                @if ($Detail->numReviews > 0)
                                    {{ sprintf('%.1f', $Detail->valueRating / $Detail->numReviews) }} /5                                
                                @else
                                    -
                                @endif
                            </p>
                            <p>
                                <i class="fas fa-clock text-primary"></i>
                                {{ $Detail->createdAt }}
                            </p>
                            <a href="/resRating/{{ $Detail->resID }}" class="btn bg-primary w-100 mt-3">
                                Write A Review
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @include('footer')

    </html>
</x-app-layout>
