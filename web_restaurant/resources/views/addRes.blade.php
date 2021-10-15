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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

        <!-- Material Kit CSS -->
        <link href="/assets/css/addRes.css" rel="stylesheet" />
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
                            <h1>Add Restaurant</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                <div class="section text-left">
                    <form name="Add Res" action="add" method="post">
                        @csrf
                        <input type="text" class="form-control" placeholder="Restaurant Name" name="name"
                            required><br>
                        <span style="color:red">@error('name'){{ $message }} @enderror</span>
                        <br>
                        <input type="text" class="form-control" placeholder="Restaurant Postcode" name="postcode"
                            required><br>
                        <span style="color:red">@error('postcode'){{ $message }} @enderror</span>
                        <br>
                        <input type="file" name="pic" class="form-control" accept="image/* " required><br>
                        <span style="color:red">@error('pic'){{ $message }} @enderror</span>
                        <br>
                        <input type="text" class="form-control" placeholder="Type of Food Served" name="foodtype"
                            required><br>
                        <span style="color:red">@error('foodtype'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <div class="form-group">
                                <!-- Create the editor container -->
                                <div id="content" name="Description" style="height:300px">
                                </div>
                                <textarea class="form-control" id="content-textarea" type="textarea"
                                    style="display:none" rows="4" name="description"></textarea><br>
                            </div>
                        </div>
                        <span style="color:red">@error('description'){{ $message }} @enderror</span>
                        {{-- Get the Session Username --}}
                        <input type="text" hidden class="form-control" placeholder="Type of Food Served"
                            value="{{ Auth::user()->name }}" name="username" required><br>
                        <input type="submit" class="btn btn-primary btn-round" name="add_res"><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
    @include('footer')

    </html>
</x-app-layout>

<!-- Include the Quill library -->
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
