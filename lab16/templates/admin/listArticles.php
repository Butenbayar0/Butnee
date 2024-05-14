<?php include "templates/include/header.php" ?>


      <div id="adminHeader"><br>
        <h2>Мэдээ мэдээллийн сайт Админ</h2>
        <p>Сайн байна уу <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Гарах</a></p>
      </div>


      <h1>Бүх Мэдээ</h1>


<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>


<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>


      <table>
        <tr>
          <th>Нийтэлсэн огноо</th>
          <th>Мэдээ</th>
          <th>Ангилал</th>
        </tr>


<?php foreach ( $results['articles'] as $article ) { ?>


        <tr onclick="location='admin.php?action=editArticle&amp;articleId=<?php echo $article->id?>'">
          <td><?php echo date('j M Y', $article->publicationDate)?></td>
          <td>
            <?php echo $article->title?>
          </td>
          <td> <?php echo $article->content ?></td>
        </tr>


<?php } ?>


      </table>


      <p><?php echo $results['totalRows']?> Мэдээ<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> байна.</p>


      <p><a href="admin.php?action=newArticle">Мэдээ нэмэх</a></p>


<?php include "templates/include/footer.php" ?>
