<?php include "templates/include/header.php" ?>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

      
        body, h1, h2, p, ul, li {
            margin: 0;
            padding: 0;
        }

        ul {
    list-style: none;
    display: grid;
    grid-template-columns: repeat(3, 2fr);
    gap: 20px;
}



        li {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        li:hover {
            transform: scale(1.02);
        }

        h2 {
            margin-bottom: 10px;
            color: #333;
        }

        /* Style the date */
        .pubDate {
            color: #555;
            font-size: 14px;
        }

        /* Style the link */
        a {
            color: #3498db;
            text-decoration: none;
            text-align: center;
        }

        /* Hover effect for the link */
        a:hover {
            text-decoration: underline;
        }

        /* Style the summary */
        .summary {
            color: #777;
        }
        img{
          width: 250px;
        }
        p{
          text-align: right;
        }
    </style>

      <ul id="headlines">


<?php foreach ( $results['articles'] as $article ) { ?>


  <div>
          <h5 class=""><?php echo $article->content;?></h5>
          <h2>
           <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
          </h2>
          <img src="https://images.unsplash.com/photo-1702404275992-929c62049bfe?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1fHx8ZW58MHx8fHx8" alt="">
          <p class="summary"><?php echo htmlspecialchars( $article->summary )?></p>
          <small class="pubDate"><?php echo date('j F', $article->publicationDate)?></small>
</div> 

<?php } ?>


      </ul>


      <p><a href="./?action=archive">Мэдээний архив</a></p>


<?php include "templates/include/footer.php" ?>
