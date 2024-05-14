<?php include "templates/include/header.php" ?>


      <form action="admin.php?action=login" method="post" style="width: 50%;">
        <input type="hidden" name="login" value="true" />


<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>


        <ul>


          <li>
            <label for="username">Нэвтрэх нэр</label>
            <input type="text" name="username" id="username" placeholder="Нэвтрэх нэрээ оруул" required autofocus maxlength="20" />
          </li>


          <li>
            <label for="password">Нууц үг</label>
            <input type="password" name="password" id="password" placeholder="Нэвтрэх нууц үгээ оруул" required maxlength="20" />
          </li>


        </ul>


        <div class="buttons">
          <input type="submit" name="login" value="Нэвтрэх" />
        </div>


      </form>


<?php include "templates/include/footer.php" ?>
