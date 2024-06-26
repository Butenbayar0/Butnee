<?php 
require_once "user_auth.php";
$title="Статистик";
require_once "header.php";
require_once "db.php";

$fact_information = $dbcon->query("SELECT * FROM stastistics");

?>


<!-- Эхлэх хуудасны агуулга -->

<div class="card text-dark mb-3">
  <div class="card-header bg-success text-center"><h2>Статистик</h2></div>
  <div class="card-body">

    <!-- үйлчилгээ нэмэх алерт  -->

    <?php if(isset($_SESSION['stastistics_update'])){ ?>
              
              <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?=$_SESSION['stastistics_update']?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


    <?php }
    unset($_SESSION['stastistics_update']);
    ?>

    <!-- алерт дууссан -->

    <table class="table table-bordered text-center">
      <thead class="bg-light">
        <tr>
          <td>Онцлог бүтээгдэхүүн</td>
          <td>Идэвхтэй бүтээгдэхүүн</td>
          <td>Туршилтын туршлага</td>
          <td>Харилцагчид</td>
        </tr>
      </thead>
      <tbody>

      <!-- php код -->
      <?php foreach ($fact_information as $result) {
        
       ?>


        <tr>
          <td><?=$result['feature_item']?></td>
          <td><?=$result['active_products']?></td>
          <td><?=$result['experience']?></td>
          <td><?=$result['clients']?></td>

        </tr>

        <!-- дууссан foreach -->
      <?php } ?>
      </tbody>
      

    </table>
    <a class="btn btn-block btn-success" href="statistics_edit.php">Өгөгдлийг засах</a>

  </div>
</div>



<!-- ============ хөвөгчийн агуулга =============== -->
<?php 
    require_once "footer.php";
?>
