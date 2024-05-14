<?php include "templates/include/header.php" ?>


      <h1>Мэдээний архив</h1>


      <ul id="headlines" class="archive">


<?php foreach ( $results['articles'] as $article ) { ?>


        <li>
          <h2>
            <span class="pubDate"><?php echo date('j F Y', $article->publicationDate)?></span><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
          </h2>
          <p class="summary"><?php echo htmlspecialchars( $article->summary )?></p>
        </li>


<?php } ?>


      </ul>


      <p><?php echo $results['totalRows']?> Мэдээ<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> байна.</p>


      <p><a href="./">Нүүр хуудасруу буцах</a></p>


<?php include "templates/include/footer.php" ?>
