<?php 
include("../partials/header.php");
include("../partials/config.php");
include("./nav.php");
?>
<style>
    .abc{
        margin-top:100px;
    }
</style>
<div class="container my-5">
<div class="abc d-flex justify-content-center text-center flex-wrap">
  <?php 
  if(isset($_GET['discount_id'])){
    $active="";
  }else{
    $active="active";
  }
  
  
  
  ?>
<a href="index.php?get=all" class="btn btn-outline-dark rounded-5 mt-5 p-3 mx-auto <?=$active?>">&nbsp;&nbsp;ALL&nbsp;&nbsp;</a>
<?php 
            $getBrands="SELECT * From `discount`;";
            $getBrands_run=mysqli_query($con, $getBrands) or die("failed");
            if(mysqli_num_rows( $getBrands_run) > 0){
                while($brand=mysqli_fetch_assoc($getBrands_run)){
              ?>
                   
                    <a href="index.php?discount_id=<?=$brand['discount_id']?>" class="btn btn-outline-dark rounded-5 mt-5 p-3 mx-auto "><?=$brand['value']?></a>        
                    <?php
                }
            }            
            ?>
</div>
</div>
<div class="container ">
    <div class="row">
        <?php if(isset($_GET['discount_id'])){
$discount_id=$_GET['discount_id'];
$getCarsByBrand="SELECT * FROM `cars` as c inner join `discount` as b on c.discount_id=b.discount_id where c.discount_id=$discount_id order by c.id desc;";
$getCarsByBrand_run=mysqli_query($con, $getCarsByBrand) or die("failed");
               if(mysqli_num_rows( $getCarsByBrand_run) > 0){
                   while($car=mysqli_fetch_assoc($getCarsByBrand_run)){
                       ?>
                     <div class="col-lg-4 col-md-6 col-sm-12 my-3" data-aos="zoom-out-up">
                     <div class="card">

  <div class="card-body">
  <img src="./img/<?php echo $car['car_ image']?>" class="card-img-top" alt="..." height=300>
    <h5 class="card-title"><?=$car['car_name']?> <?=$car['model']?></h5>
    <p class="card-text"><?=$car['value']?></p>
    <p class="card-text"><del>Was <?=$car['price']?><del></p>
    <a href="#" class="btn btn-dark">Now<?=$car['price']-($car['price']* $car ['value']/100)?> PKR.</a>
    <a href="cardetails.php?car_id=<?=$car['id']?>" class="btn btn-dark">view details</a>
  </div>
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
               $getCars="SELECT * FROM `cars` as c inner join `discount` as b on c.discount_id=b.discount_id order by c.id desc;";

               $getCars_run=mysqli_query($con, $getCars) or die("failed");
               if(mysqli_num_rows( $getCars_run) > 0){
                   while($car=mysqli_fetch_assoc($getCars_run)){
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
                     </div>
                       <?php
                   }
               }
               else{
                echo "No Car Found.";
               }
            }
            
            
            ?>
    </div>
</div>







<script>
  AOS.init();
</script>

<?php 
include("./footer.php");
?>