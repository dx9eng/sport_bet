<?php include 'tpl/top.php'; ?>
        <?php
        if (isset($_GET['page']) == 'admin' ) {
          if (isset($_SESSION['admin'])) {
            ?>
            <!-- Home content-->
            <?php include 'tpl/results.php'; ?>
            <!-- Home content end-->
            <?php }
            elseif (isset($_SESSION['user'])) {
              header('Location: /sport_bet/user/');
            }
            else {
              header('Location: /sport_bet/home/');
            }
          }
          elseif (isset($_GET['page']) == 'admin' ) {

          }
          ?>
<?php include 'tpl/bottom.php'; ?>