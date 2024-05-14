<?php 
require_once "user_auth.php";
$title = "Зочин мессеж үзэх";
require_once "header.php";
require_once "db.php";

$id = base64_decode($_GET['id']);

$message_query = $dbcon->query("SELECT * FROM guest_messages WHERE id=$id");
$message = $message_query->fetch_assoc();

if($message['status']==1){
	echo "тийм";
	$upadate = $dbcon->query("UPDATE guest_messages SET status=2 WHERE id=$id");
}

?>
<!-- Хуудасны агуулга эхлэх -->


<div class="card text-dark mb-3">

    <div class="card-header bg-success text-center "><h3>Мессеж</h3></div>

          <div class="card-body text-center">
    
                <?=$message['message']?>
            </div>
        </div>





<!-- ============ footer =============== -->
<?php 
    require_once "footer.php";
?>
