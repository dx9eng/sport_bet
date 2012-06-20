<!DOCTYPE html>
<html>
<head>
<title>Sport bettings - user</title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="/sport_bet/css/288433.css" />
<script type="text/javascript" src="/sport_bet/inc/jquery.js"></script>
</head>
<body>
  <script language="javascript">
  $(document).ready(function() {
    $("tr:even").addClass("even");
  });
  $("tr:odd").addClass("odd");
  </script>
  <div id="wrapper">
    <!-- Header file -->
    <div id="headerwrap">
      <div id="header">
        <?php include 'views/tpl/header.php'; ?>
      </div>
    </div>
    <!-- Header file end -->
    <!-- Menu file -->
    <div id="navigationwrap">
      <div id="navigation">
        <?php include 'views/tpl/menu.php'; ?>
      </div>
    </div>
    <!-- Menu file end -->
    <!-- Content -->
    <div id="contentwrap">
      <div id="content">
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
      </div>
    </div>
    <!-- Content end -->
    <!-- Right Column file -->
    <div id="rightcolumnwrap">
      <div id="rightcolumn">
        <?php include 'views/tpl/rightcolumn.php'; ?>
      </div>
    </div>
    <!-- Right Column file end -->
    <!-- Footer file -->
    <div id="footerwrap">
      <div id="footer">
        <?php include 'views/tpl/footer.php'; ?>
      </div>
    </div>
  </div>
  <!-- Footer file end -->
</body>
</html>
