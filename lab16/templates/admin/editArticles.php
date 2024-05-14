<?php include "templates/include/header.php" ?>


      <div id="adminHeader"> <br>
        <h2>Мэдээ мэдээллийн сайт Админ</h2>
        <p>Сайн байна уу <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Гарах</a></p>
      </div>


      <h1><?php echo $results['pageTitle']?></h1>


      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="articleId" value="<?php echo $results['article']->id ?>"/>


<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>


        <ul>


          <li>
            <label for="title">Мэдээний гарчиг</label>
            <input type="text" name="title" id="title" placeholder="Мэдээний гарчиг оруулна" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['article']->title )?>" />
          </li>


          <li>
            <label for="summary">Тайлбар</label>
            <textarea name="summary" id="summary" placeholder="Мэдээний тайлбар орлууна" required maxlength="1000" style="height: 5em;"><?php echo htmlspecialchars( $results['article']->summary )?></textarea>
          </li>




          <li>
            <label for="publicationDate">Нийтэлсэн огноо</label>
            <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['article']->publicationDate ? date( "Y-m-d", $results['article']->publicationDate ) : "" ?>" />
          </li>

          <li>
            <label for="summary">Ангилал</label>
            <select id="content" name="content">
              <option value="volvo"><?php echo htmlspecialchars($results['article']->content) ?></option>
              <option value="saab">Олон улс</option>
              <option value="mercedes">Дотоод</option>
              <option value="audi">Спорт</option>
              <option value="audi">Урлаг</option>
            </select>
          </li>
          

        </ul>


        <div class="buttons">
          <input type="submit" name="saveChanges" value="Хадгалах" />
          <input type="submit" formnovalidate name="cancel" value="Буцах" />
        </div>


      </form>


<?php if ( $results['article']->id ) { ?>
      <p><a href="admin.php?action=deleteArticle&amp;articleId=<?php echo $results['article']->id ?>" onclick="return confirm('Delete This Article?')">Мэдээ устгах</a></p>
<?php } ?>


<?php include "templates/include/footer.php" ?>