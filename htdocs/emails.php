<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <!-- importing CSS files -->
    <link rel="stylesheet" href="css/emails.css">
  </head>
  <body>
    <!-- Main page link -->
    <a id="back" href="emails.php">Main table</a>
    <?php
    //displaying table depending on the conditions
    if (isset($_GET['emaill']) && isset($_GET['searchfield'])) {
      //displaying table with selected provider and search result
      include_once 'includes/searched-email.php';
      $filt1 = $_GET['searchfield'];
      $filt2 = $_GET['emaill'];
      $usersObj2 = new SearchedEmail();
      $usersObj2->SearchedAndProv($filt1,$filt2);
    }else if (isset($_GET['emaill']) && !isset($_GET['searchfield'])) {
      //displaying table with selected provider
      include_once 'includes/filtered-prov.php';
      $filt = $_GET['emaill'];
      $usersObj2 = new FilteredEmail();
      $usersObj2->Filter($filt);
    } else if(isset($_GET['searchfield']) && $_GET['searchfield'] !="" && !isset($_GET['emaill']) ) {
      //displaying table with search result and checking if searchfield isn't empty
      include_once 'includes/searched-email.php';
      $searched = $_GET['searchfield'];
      $usersObj2 = new SearchedEmail();
      $usersObj2->Searched($searched);
    } else{
      //displaying table when visiting page
      include_once 'includes/view-email.php';
      $usersObj = new ViewEmail();
      $usersObj->view();
    }

     ?>
  </body>
    <!-- Importing JavaScript files -->
    <script src="js/sort.js"></script>
</html>
