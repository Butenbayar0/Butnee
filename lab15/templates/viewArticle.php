<?php include "templates/include/header.php" ?>


      <h1 style="width: 75%;"><?php echo htmlspecialchars( $results['article']->title )?></h1>
      <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $results['article']->summary )?></div>
      <div style="width: 75%;"><?php echo $results['article']->content?></div>
      <p class="pubDate">Нийтэлсэн огноо <?php echo date('j F Y', $results['article']->publicationDate)?></p>


      <p><a href="./">Нүүр хуудасруу буцах</a></p>


<?php include "templates/include/footer.php" ?>
