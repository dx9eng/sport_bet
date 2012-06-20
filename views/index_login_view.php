<!DOCTYPE html>
<html>
<head>
<title>Sport bettings - home</title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="/sport_bet/css/style.css" />
<script type="text/javascript" src="/sport_bet/javascript/jquery.js"></script>
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
