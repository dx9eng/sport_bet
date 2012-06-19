<!DOCTYPE html>
<html>
<head>
<title>Sport bettings - home</title>
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
          <p>
            <h1>Last match results</h1>
          </p>
          <div>
            <?php foreach ($matches as $m) : ?>
              <p>
                <?php echo $m['team1'] ?>
                <?php echo $m['score_team1'] ?>
                <?php echo $m['score_team2'] ?>
                <?php echo $m['team2'] ?>
              </p>
          <?php endforeach ?>
          </div>
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
