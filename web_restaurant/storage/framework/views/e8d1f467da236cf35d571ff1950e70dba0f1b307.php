<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
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
        <?php if(Session::get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(Session::get('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(Session::get('fail')): ?>
            <div class="alert alert-danger">
                <?php echo e(Session::get('fail')); ?>

            </div>
        <?php endif; ?>
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
                    <form name="Add Res" action="add" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="text" class="form-control" placeholder="Restaurant Name" name="name"
                            required><br>
                        <span style="color:red"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        <br>
                        <input type="text" class="form-control" placeholder="Restaurant Postcode" name="postcode"
                            required><br>
                        <span style="color:red"><?php $__errorArgs = ['postcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        <br>
                        <input type="file" name="pic" class="form-control" accept="image/* " required><br>
                        <span style="color:red"><?php $__errorArgs = ['pic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        <br>
                        <input type="text" class="form-control" placeholder="Type of Food Served" name="foodtype"
                            required><br>
                        <span style="color:red"><?php $__errorArgs = ['foodtype'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
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
                        <span style="color:red"><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        
                        <input type="text" hidden class="form-control" placeholder="Type of Food Served"
                            value="<?php echo e(Auth::user()->name); ?>" name="username" required><br>
                        <input type="submit" class="btn btn-primary btn-round" name="add_res"><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </html>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

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
<?php /**PATH C:\xampp\htdocs\302CEM_Agile_Laravel\web_restaurant\resources\views/addRes.blade.php ENDPATH**/ ?>