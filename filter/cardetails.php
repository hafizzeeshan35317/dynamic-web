
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script><?php



include("../partials/config.php");
include("./nav.php");



if(isset($_GET['car_id'])){
echo $car_id=$_GET['car_id'];
$getCarsByBrand="SELECT * FROM `cars` as c inner join `discount` as b on c.discount_id=b.discount_id where c.id=$car_id;";
$getCarsByBrand_run=mysqli_query($con, $getCarsByBrand) or die("failed");
               if(mysqli_num_rows( $getCarsByBrand_run) > 0){
                   while($car=mysqli_fetch_assoc($getCarsByBrand_run)){
                       ?>
                                  <div class="col-lg-4 col-md-6 col-sm-12 my-3" data-aos="fade-up-right">
                     <div class="card">
  
  <div class="card-body">
  <img src="./img/<?php echo $car['car_ image']?>" class="card-img-top" alt="..." height=300>
    <h5 class="card-title"><?=$car['car_name']?> <?=$car['model']?></h5>
    <p class="card-text"><del>Was <?=$car['price']?><del></p>
    <a href="#" class="btn btn-dark">Now<?=$car['price']-($car['price']* $car ['value']/100)?> PKR.</a>
    <a href="">
  </div>
</div>
                       <?php
                   }
               }
               else{
                echo "No Car Found.";
               }
            
            
            }
            else{
                echo "id not Found.";
               }
               ?>
               