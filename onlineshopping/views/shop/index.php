<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>
<body>
    <?php
    foreach ($products as $key => $product) {
    ?>
    <div class="container-fluid">
        <div class="row ">
            <h3><?= $key.' '.'collections' ?></h3>      
            <?php   foreach($product as $itemKey=>$item)
            {
            ?>
                <div class="col-md-3 col-lg-3 col-md-offset-0 col-lg-offset-0 hidden-sm hidden-xs headd ">
                   <br><?=$item['vchr_product_name']?><br><?=$item['fkIntSubCategory']['vchr_sub_category_name'] ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php   
    }
    ?>

</body>
</html>


