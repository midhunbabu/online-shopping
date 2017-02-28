

<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>
<body>

 
    <div class="container-fluid">
        <div class="row ">
               
            <?php  foreach ($data as $product)
            {
            ?>
                <div class="col-md-3 col-lg-3 col-md-offset-0 col-lg-offset-0 hidden-sm hidden-xs headd ">
                   <br><?=$product['vchr_product_name']?><br><?=$product['fkIntSubCategory']['vchr_sub_category_name'] ?><br><?=$product['int_price'] ?>

                </div>
            <?php
            }
            ?>
        </div>
    </div>
   

</body>
</html>




 


