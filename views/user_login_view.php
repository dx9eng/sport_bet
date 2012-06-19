<!DOCTYPE html>
<html>
<head>
<title>Sport bettings - user</title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="/sport_bet/css/288433.css" />
</head>
<body>
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
          <p>
            <h1>Content</h1>
            User test sample.
          </p>
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
