<?php
//including file who connects to database
include_once 'connectDB.php';
//declare class which filters emails by  search
class SearchedEmail extends ConnectDB{
  //declare method which does filtering by search
  public function Searched($searched){
    //declaring parameters for selecting specific row
    $sql = "SELECT * FROM form WHERE username LIKE '%$searched%' OR email LIKE '%$searched%' ORDER BY date ASC";
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
          <th>Email</th>
          <th>Date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      ";
      while($row = $result->fetch_assoc()) {

        $usernamerow=$row['username'];
        $providerrow=$row['email'];
        $daterow = $row['date'];
        $id = $row['id'];
        echo"
        <tr>
          <td>$usernamerow$providerrow</td>
          <td>$daterow</td>
          <td><a href='includes/delete.php?id=$id&searchfield=$searched'>Delete</a></td>
        </tr>
        ";

      }
    echo '
    </table>
    </div>
    ';
    //declaring parameters for displaying providers
    $sql2 = "SELECT * FROM form WHERE username LIKE '%$searched%' OR email LIKE '%$searched%' ORDER BY email ASC";
    $result2 = $this->connect()->query($sql2);
    $emailCheck = "";
    echo '<div id="filter">';
    while ($row2 = $result2->fetch_assoc()) {
      if ($row2['email'] != $emailCheck) {
        $emailCheck = $row2['email'];
        echo "<form>
        <input type='hidden' name='searchfield' value='$searched' />
          <input type='submit' name='emaill' value='$emailCheck'>
        </form>";
      }

    }
    echo '
    </div>
    </div>
    ';
} else {
  echo "0 results";
}
  }
  //declare method which does filtering by search and provider
  public function SearchedAndProv($searched,$prov){
    //declaring parameters for selecting specific row
    $sql = "SELECT * FROM form WHERE username LIKE '%$searched%' AND email LIKE '%$prov%' OR email LIKE '%$searched%' AND email LIKE '%$prov%'  ORDER BY date ASC";
    $result = $this->connect()->query($sql);
    //if found rows are greater than 0 display them in table
    if ($result->num_rows > 0) {
      echo "<form id='searchform' method='GET'>
        <input type='text' name='searchfield' value=''>
        <input type='submit' name='' value='Search'>
        <input type='hidden' name='emaill' value='$prov'>
      </form>";
      echo "
      <div id='page'>
      <div id='data'>
      <table class='table table-sortable' border='1'>
      <thead>
        <tr>
          <th>Email</th>
          <th>Date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      ";
      while($row = $result->fetch_assoc()) {

        $usernamerow=$row['username'];
        $providerrow=$row['email'];
        $daterow = $row['date'];
        $id = $row['id'];
        echo"
        <tr>
          <td>$usernamerow$providerrow</td>
          <td>$daterow</td>
          <td><a href='includes/delete.php?id=$id&searchfield=$searched&emaill=$prov'>Delete</a></td>
        </tr>
        ";

      }
    echo '
    </table>
    </div>
    </div>
    ';


}  else {
  echo "0 results";
}

}
}
 ?>
