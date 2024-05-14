<?php
	require_once "user_auth.php";
	require_once "db.php";
	$title = "Хэрэглэгчид";
	require_once "header.php"; 

	$user_found_query = "SELECT * FROM users";
	$user_found = $dbcon->query($user_found_query);
?>

<div class="card mb-3">
  <div class="card-header bg-success text-center"><h2>Хэрэглэгчийн жагсаалт</h2></div>
  <div class="card-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Дугаар</th>
            <th>Нэр</th>
            <th>И-мэйл</th>
            <th>Зураг</th>
            <th>Статус</th>
            <th>Үйлдэл</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $serial = 1;        
        foreach ($user_found as $row) {?>   

          <tr>
            <td><?=$serial++?></td>
            <td><?=$row['fname']?></td>
            <td><?=$row['email']?></td>
            <td><img src="image/users/<?=$row['photo']?>" alt="" width='50'></td>

            <!-- статусыг харуулах  -->

            <td><?=$row['status']==1?"<span class='bg-danger p-2'>хаалттай</span>":"<span class='bg-success p-2'>Идэвхтэй</span>"?></td>

            <td>
                <?php

                // Идэвхтэй товчлуур
                if($row['status']==1){ ?>
                    <a class="btn btn-sm btn-success" href="active.php?id=<?php echo base64_encode($row['id']); ?>" >Идэвхжүүлэх</a>
                <?php }else{ ?>

                <!-- Хаалттай товчлуур -->

               <a class="btn btn-sm btn-danger" href="deactive.php?id=<?php echo base64_encode($row['id']); ?>" >Хаалттай</a>
            <?php   } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
 
  </div>
</div>

<?php 
    require_once "footer.php";
?>
