<?php
//including file who connects to database
include 'connectDB.php';
//declare class which inserts email into database
class InsertEmail extends ConnectDB{
  //declare method which does inserting
  public function insert($email){
    //declaring usename and email provider
    $username = strstr($email, '@', true);
    $emailProvider = substr(strrchr($email, "@"), 0);
    //declaring parameters for selecting specific row
    $sql = "INSERT INTO form(username,email) VALUES ('$username','$emailProvider')";
    $this->connect()->query($sql);
  }
}
//check if form is posted and email is valid
if (isset($_POST['postedEmail'])) {
  $email = $_POST['postedEmail'];
  if (preg_match("/^[^ ]+@[^ ]+\.[a-z]{2,3}$/",$email) && $email !="" && substr($email, -3) != '.co') {
    $insertEmail = new InsertEmail();
    $insertEmail->insert($email);
}
}
 ?>
