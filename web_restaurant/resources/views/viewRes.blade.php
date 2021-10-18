<x-app-layout>
    <!DOCTYPE html>
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
            <link href="/assets/css/addRes.css" rel="stylesheet" />

            <style>
                .border-radius-lg {
                    border-radius: .5rem;
                }

            </style>
    </head>
    <body>
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('img/bg2.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="brand text-center">
                            <h1>{{$Title}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                <img src="data:image/{{base64_encode($Detail->resPicType)}};charset=utf8;base64,{{base64_encode($Detail->resPic)}}" alt="restaurant image" loading="lazy"/>
                <h4>Restaurant Name: {{$Detail -> resName}}</h4>
                <h4>Postcode: {{$Detail -> resPostcode}}</h4>
                <h4>Food Type: {{$Detail -> resFoodType}}</h4>
                <h4>Description: {!! nl2br($Detail -> resDescription)!!}</h4>
                <h4>Created At: {{$Detail -> createdAt}}</h4>
                <a href="/resRating/{{$Detail->resID}}" class="text-primary text-sm">Review & Ratings </a>
            </div>
        </div>

    </body>
    @include('footer')
    </html>
</x-app-layout>