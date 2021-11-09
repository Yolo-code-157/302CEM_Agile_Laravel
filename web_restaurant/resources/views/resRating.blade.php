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
        <link href="/assets/css/resRating.css" rel="stylesheet" />

        <style>
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
        <div class="page-header header-filter" data-parallax="true" style="background-image: url(/img/bg7.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="brand text-center">
                            <h1>Write A Review</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
       
        <div class="form-group">
        <div class="container">
                <h4 style="text-align:center ; font-weight:bold;" hidden>{{$Detail -> resID }}</h4>
                <h4 style="text-align:center ; font-weight:bold;">Restaurant Name: {{$Detail -> resName}}</h4>
                <h4 style="text-align:center ; font-weight:bold;">Postcode: {{$Detail -> resPostcode}}</h4>
        </div>
                <div class="form-group">
                    <!-- Create the editor container -->
                    <div id="content" name="Description" style="height:300px">
=======

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
                            <p>
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                {{ $Detail->resPostcode }}
                            </p>
                        </div>
                        <form role="form" method="post">
                            <div class="card-body px-0">
                                <div class="row">
                                    <div class="col">
                                        <label>Service: </label><br>
                                        <input type="range" id="service_vol" name="service_vol" min="0" max="5" value="0">
                                        <br>
                                        <p>Value: <span id="service_no"></span></p>
                                        <br>
                                    </div>

                                    <div class="col">
                                        <label>Value: </label><br>
                                        <input type="range" id="value_vol" name="value_vol" min="0" max="5" value="0">
                                        <br>
                                        <p>Value: <span id="value_no"></span></p>
                                        <br>
                                    </div>

                                    <div class="col">
                                        <label>Food: </label><br>
                                        <input type="range" id="food_vol" name="food_vol" min="0" max="5" value="0">
                                        <br>
                                        <p>Value: <span id="food_no"></span></p>
                                        <br>
                                    </div>
                                </div>

                                <label>Your Review</label>
                                <textarea name="review" class="form-control" rows="4" required></textarea>
                                <input type="submit" class="btn bg-primary w-100 mt-3">
                            </div>
                        </form>
>>>>>>> f59fb27819e0d9cac2693d7d77f5061ba8327e57
                    </div>
                </div>
            </div>
        </div>
    </body>
    @include('footer')

    <script>
        var serviceVol = document.getElementById("service_vol")
        var serviceNo = document.getElementById("service_no")

        var valueVol = document.getElementById("value_vol")
        var valueNo = document.getElementById("value_no")

        var foodVol = document.getElementById("food_vol")
        var foodNo = document.getElementById("food_no")

        serviceNo.innerHTML = serviceVol.value;
        serviceVol.oninput = function() {
            serviceNo.innerHTML = this.value;
        }

        valueNo.innerHTML = valueVol.value;
        valueVol.oninput = function() {
            valueNo.innerHTML = this.value;
        }

        foodNo.innerHTML = foodVol.value;
        foodVol.oninput = function() {
            foodNo.innerHTML = this.value;
        }
    </script>

    </html>
</x-app-layout>
