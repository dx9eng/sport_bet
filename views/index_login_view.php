<?php include 'tpl/top.php'; ?> 
        <p>
        <?php if (isset($_SESSION['admin'])) {
          header('Location: /sport_bet/admin/');
        }
        elseif (isset($_SESSION['user'])) {
          header('Location: /sport_bet/user/');
        }
        else {
          ?>
          <!-- Home content-->
          <?php include 'tpl/results.php'; ?>
          <!-- Home content end-->
        <?php } ?>
<?php include 'tpl/bottom.php'; ?>