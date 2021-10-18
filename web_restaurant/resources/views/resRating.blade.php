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
            <link href="/assets/css/resRating.css" rel="stylesheet" />

            <style>
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
                            <h1>Add Comments & Ratings</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="form-group">
        <div class="container">
                <h4 style="text-align:center ; font-weight:bold;">Restaurant Name: {{$Detail -> resName}}</h4>
                <h4 style="text-align:center ; font-weight:bold;">Postcode: {{$Detail -> resPostcode}}</h4>
        </div>
                <div class="form-group">
                    <!-- Create the editor container -->
                    <div id="content" name="Description" style="height:300px">
                    </div>
                    <textarea class="form-control" id="content-textarea" type="textarea"
                        style="display:none" rows="4" name="description"></textarea><br>
                </div>
        </div>
        <div class="service">
            <p>Service</p>
            <input type="range" min="1" max="5" value="1" id="myRating" class="serviceslider">
            <p>Value:<span id="value"></span></p>
        </div>
        <div class="ratings">
            <p>Value</p>
            <input type="range" min="1" max="5" value="1" id="myValue" class="slider">
            <p>Value:<span id="value2"></span></p>
        </div>
        <div class="food">
            <p>Food</p>
            <input type="range" min="1" max="5" value="1" id="myFood" class="foodslider">
            <p>Value:<span id="value3"></span></p>
        </div>
        <div class="section text-center">
        <input type="submit" class="btn btn-primary btn-round" name="add_rat"><br>  
        </div>     
    </body>  
    <script>
        var serviceslider= document.getElementById("myRating")
        var outputslider=document.getElementById("value")

        outputslider.innerHTML=serviceslider.value;
        serviceslider.oninput=function(){
        outputslider.innerHTML=this.value;
        }
        serviceslider.addEventListener("mousemove",function(){
            var testing= serviceslider.value;
            var color='linear-gradient(90deg, rgb(117,252,117)' + testing + '%,rgb(214,214,214)'+ testing*20 +'%)';
            serviceslider.style.background=color;
        })
    </script>
    <script>
        var slider= document.getElementById("myValue")
        var output=document.getElementById("value2")

        output.innerHTML=slider.value;
        slider.oninput=function(){
        output.innerHTML=this.value;
        }
        slider.addEventListener("mousemove",function(){
            var testing= slider.value;
            var color='linear-gradient(90deg, rgb(117,252,117)' + testing + '%,rgb(214,214,214)'+ testing*20 +'%)';
            slider.style.background=color;
        })
    </script>
    <script>
        var foodslider= document.getElementById("myFood")
        var outputfood=document.getElementById("value3")

        outputfood.innerHTML=foodslider.value;
        foodslider.oninput=function(){
        outputfood.innerHTML=this.value;
        }
        foodslider.addEventListener("mousemove",function(){
            var testing= foodslider.value;
            var color='linear-gradient(90deg, rgb(117,252,117)' + testing + '%,rgb(214,214,214)'+ testing*20 +'%)';
            foodslider.style.background=color;
        })
    </script>
    @include('footer')
    </html>
</x-app-layout>   
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
    $(document).ready(function() {
        var quill = new Quill('#content', {
            placeholder: 'Add your message in ...',
            theme: 'snow'
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            $('#content-textarea').text($(".ql-editor").html());
        })
    })
    </script>