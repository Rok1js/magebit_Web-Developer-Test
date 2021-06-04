<?php
//including file who connects to database
include_once 'connectDB.php';
//declare class which deletes specific database row
class deleteEmail extends ConnectDB{
  //declare method who does deleting
  public function delete($idd,$searcfield,$email){
    //declaring parameters for deleting specific row
    $sql = "DELETE FROM form WHERE id='$idd'";
    //if the connection is successful, delete the record and redirect back to the page where the delete button was pressed
    if ($this->connect()->query($sql) == TRUE) {
      if ($searcfield=="" && $email=="") {
        header('Location: '. "../emails.php");
      } else if($searcfield=="" && $email!=""){
        header('Location: '. "../emails.php?emaill=$email");
      } else if($searcfield!="" && $email==""){
        header('Location: '. "../emails.php?searchfield=$searcfield");
      }else{
        header('Location: '. "../emails.php?searchfield=$searcfield&emaill=$email");
      }


    } else {
      //if the connection is notsuccessful, print error
      echo "Error deleting record: " . $this->connect()->error;
    }
  }
}

//if if statment is true pass relevant parameters
if (isset($_GET['id']) && isset($_GET['emaill']) && isset($_GET['searchfield'])) {
  //if delete is requested from sorted provider and searched result url
  $idd = $_GET['id'];
  $email = $_GET['emaill'];
  $search = $_GET['searchfield'];
  $obj = new deleteEmail();
  $obj->delete($idd,$search,$email);
} else if(!isset($_GET['emaill']) && isset($_GET['searchfield'])){
  //if delete is searched result url
  $idd = $_GET['id'];
  $email = null;
  $search = $_GET['searchfield'];
  $obj = new deleteEmail();
  $obj->delete($idd,$search,$email);
} else if(isset($_GET['emaill']) && !isset($_GET['searchfield'])){
  //if delete is requested from sorted provider url
  $idd = $_GET['id'];
  $search = null;
  $email = $_GET['emaill'];
  $obj = new deleteEmail();
  $obj->delete($idd,$search,$email);
} else if(!isset($_GET['emaill']) && !isset($_GET['searchfield'])) {
  //if delete is requested from main page
  $idd = $_GET['id'];
  $search = null;
  $email = null;
  $obj = new deleteEmail();
  $obj->delete($idd,$search,$email);
} else {
  echo "error";
}
?>
