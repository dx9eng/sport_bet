<?php include 'tpl/top.php'; ?>
        <?php if(isset($_SESSION['user'])) {
          ?>
          <!-- Home content-->
          <?php include 'tpl/results.php'; ?>
          <!-- Home content end-->
          <?php }
          elseif (isset($_SESSION['admin'])) {
            header('Location: /sport_bet/admin/');
          }
          else {
            header('Location: /sport_bet/home/');
          } ?>
<?php include 'tpl/bottom.php'; ?>