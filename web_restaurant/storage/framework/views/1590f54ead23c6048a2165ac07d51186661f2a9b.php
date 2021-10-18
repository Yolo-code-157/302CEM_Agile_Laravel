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
<<<<<<< HEAD
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
=======
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
>>>>>>> fc24b618c94399d9e61225adff528af2f25beba3

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
<<<<<<< HEAD
                    <form name="" action="" method="" class="flex">
                        <input type="text" name="" placeholder="Search" class="form-control m-xl-3" required>
                        <input type="submit" name="" class="btn btn-primary btn-round m-xl-3">
                    </form>
                </div>
                <div class="section">
                
                <div class="row">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <!--Modal-->
                    <div class="col-lg-3 col-sm-6 mb-sm-3">
                        <div class="card-plain">
                            <div class="card-header p-0">
                                
                                <img src="data:image/<?php echo e(base64_encode($row->resPicType)); ?>;charset=utf8;base64,<?php echo e(base64_encode($row->resPic)); ?>" 
                                class="img-fluid border-radius-lg" alt="restaurant image" loading="lazy"/>
                            </div>
                            <div class="card-body px-0">
                                <h3>
                                 <a href="#" class="text-dark font-weight-bold"><?php echo e($row -> resName); ?></a>
                                </h3>
                                <h5>Postcode: <?php echo e($row -> resPostcode); ?></h5>
                                <h5>Type: <?php echo e($row -> resFoodType); ?></h5>
                                <h5>Owner: <?php echo e($row -> resOwnerName); ?></h5>
                                <p><?php echo nl2br($row->resDescription); ?></p>
                                <a href="#" class="text-primary text-sm">Read More</a>
                            </div>
                        </div>
                    </div>                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
=======
                    <form name="" method="get" class="flex">
                        <input type="search" name="search" placeholder="Search" class="form-control m-xl-3" required>
                        <input type="submit" name="" class="btn btn-primary btn-round m-xl-3">
                    </form>
                </div>
                <div class="">
                    <?php if($query != ""): ?> 
                    
                        <div class="search-container">
                            
                            <h5 class=""><?php echo $query; ?></h5>
                            
                            <?php if(count($searchRes) > 0): ?>
                                <div class="pt-5 row search-row">
                                    <?php $__currentLoopData = $searchRes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $search): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                    <!--Retrieving all the data based on the search query-->
                                    <div class="col-lg-3 col-sm-6 mb-sm-3">
                                        <div class="card-plain">
                                            <div class="card-header p-0">
                                                <img src="data:image/<?php echo e(base64_encode($search->resPicType)); ?>;charset=utf8;base64,<?php echo e(base64_encode($search->resPic)); ?>" 
                                                class="img-fluid border-radius-lg" alt="restaurant image" loading="lazy"/>
                                            </div>
                                            <div class="card-body px-0">
                                                <h3>
                                                <a href="#" class="text-dark font-weight-bold"><?php echo e($search -> resName); ?></a>
                                                </h3>
                                                <h5>Postcode: <?php echo e($search -> resPostcode); ?></h5>
                                                <a href="viewRes/<?php echo e($search->resID); ?>" class="text-primary text-sm">Read More</a>
                                            </div>
                                        </div>
                                    </div>                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </div>                
                    <?php endif; ?>
                    <div class="row section">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                        <!--Retrieving all the data-->
                        <div class="col-lg-3 col-sm-6 mb-sm-3">
                            <div class="card-plain">
                                <div class="card-header p-0">
                                    <img src="data:image/<?php echo e(base64_encode($row->resPicType)); ?>;charset=utf8;base64,<?php echo e(base64_encode($row->resPic)); ?>" 
                                    class="img-fluid border-radius-lg" alt="restaurant image" loading="lazy"/>
                                </div>
                                <div class="card-body px-0">
                                    <h3>
                                        <a href="#" class="text-dark font-weight-bold"><?php echo e($row -> resName); ?></a>
                                    </h3>
                                    <h5>Postcode: <?php echo e($row -> resPostcode); ?></h5>
                                    <a href="viewRes/<?php echo e($row->resID); ?>" class="text-primary text-sm">Read More</a>
                                </div>
                            </div>
                        </div>                
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
>>>>>>> fc24b618c94399d9e61225adff528af2f25beba3
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
<?php /**PATH C:\xampp\htdocs\302CEM_Agile_Laravel\web_restaurant\resources\views/dashboard.blade.php ENDPATH**/ ?>