<?php
//including file who connects to database
include_once 'connectDB.php';
//declare class which displays all emails
class ViewEmail extends ConnectDB{
  //declare method which displays all emails
  public function view(){
    //declaring parameters for selecting specific row
    $sql = "SELECT * FROM form";
    $result = $this->connect()->query($sql);
    //if found rows are greater than 0 display them in table
    if ($result->num_rows > 0) {
    echo "<form id='searchform' method='GET'>
      <input type='text' name='searchfield' value=''>
      <input type='submit' name='' value='Search'>
    </form>";
    echo "
    <div id='page'>
    <div id='data'>
    <table class='table table-sortable' border='1'>
    <thead>
      <tr>
        <th id='sort'>Email</th>
        <th id='sort'>Date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    ";
    while ($row = $result->fetch_assoc()) {
      $usernamerow=$row['username'];
      $providerrow=$row['email'];
      $daterow = $row['date'];
      $id = $row['id'];
      echo"
      <tr>
        <td>$usernamerow$providerrow</td>
        <td>$daterow</td>
        <td><a href='includes/delete.php?id=$id'>Delete</a></td>
      </tr>
      ";

    }
  echo '
  </tbody>
  </table>
  </div>
  ';
  //declaring parameters for displaying providers
  $sql2 = "SELECT email FROM form ORDER BY email ASC";
  $result2 = $this->connect()->query($sql2);
  $emailCheck = "";
  echo '<div id="filter">';
  while ($row2 = $result2->fetch_assoc()) {
    if ($row2['email'] != $emailCheck) {
      $emailCheck = $row2['email'];
      echo "<form method='GET'>
        <input type='submit' name='emaill' value='$emailCheck'>
      </form>";
    }

  }
  echo '
  </div>
  </div>
  ';
}else {
  echo "0 results";
}
  }

}

?>
