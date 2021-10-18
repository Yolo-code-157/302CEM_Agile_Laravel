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
        <link href="/assets/css/addRes.css" rel="stylesheet" />

        <style>
            .border-radius-lg {
                border-radius: .5rem;
            }

        </style>
    </head>

    <body>
        <div class="page-header header-filter" data-parallax="true" style="background-image: url('img/bg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="brand text-center">
                            <h1>Restaurant</h1>
                            <h3>Foodies' Choice Best of the Best</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                <div class="pt-5">
                    <form name="" method="get" class="flex">
                        <input type="search" name="search" placeholder="Search" class="form-control m-xl-3" required>
                        <input type="submit" name="" class="btn btn-primary btn-round m-xl-3">
                    </form>
                </div>
                <div class="">
                    @if ($query != "") 
                    {{-- the query is no empty --}}
                        <div class="search-container">
                            {{-- Remove HTML tag and get the text --}}
                            <h5 class="">{!!$query!!}</h5>
                            {{-- if the search restaurant found --}}
                            @if (count($searchRes) > 0)
                                <div class="pt-5 row search-row">
                                    @foreach($searchRes as $search)  
                                    <!--Retrieving all the data based on the search query-->
                                    <div class="col-lg-3 col-sm-6 mb-sm-3">
                                        <div class="card-plain">
                                            <div class="card-header p-0">
                                                <img src="data:image/{{base64_encode($search->resPicType)}};charset=utf8;base64,{{base64_encode($search->resPic)}}" 
                                                class="img-fluid border-radius-lg" alt="restaurant image" loading="lazy"/>
                                            </div>
                                            <div class="card-body px-0">
                                                <h3>
                                                <a href="#" class="text-dark font-weight-bold">{{ $search -> resName }}</a>
                                                </h3>
                                                <h5>Postcode: {{ $search -> resPostcode }}</h5>
                                                <a href="viewRes/{{$search->resID}}" class="text-primary text-sm">Read More</a>
                                            </div>
                                        </div>
                                    </div>                
                                    @endforeach
                                </div>
                            @endif
                        </div>                
                    @endif
                    <div class="row section">
                        @foreach($users as $row)  
                        <!--Retrieving all the data-->
                        <div class="col-lg-3 col-sm-6 mb-sm-3">
                            <div class="card-plain">
                                <div class="card-header p-0">
                                    <img src="data:image/{{base64_encode($row->resPicType)}};charset=utf8;base64,{{base64_encode($row->resPic)}}" 
                                    class="img-fluid border-radius-lg" alt="restaurant image" loading="lazy"/>
                                </div>
                                <div class="card-body px-0">
                                    <h3>
                                        <a href="#" class="text-dark font-weight-bold">{{ $row -> resName }}</a>
                                    </h3>
                                    <h5>Postcode: {{ $row -> resPostcode }}</h5>
                                    <a href="viewRes/{{$row->resID}}" class="text-primary text-sm">Read More</a>
                                </div>
                            </div>
                        </div>                
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
    @include('footer')

    </html>
</x-app-layout>
