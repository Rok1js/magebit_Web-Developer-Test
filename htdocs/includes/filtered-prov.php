<?php
//including file who connects to database
include_once 'connectDB.php';
//declare class which filters emails by provider
class FilteredEmail extends ConnectDB
{
    //declare method which does filtering
    public function Filter($filtered)
    {
        //declaring parameters for selecting specific row
        $sql = "SELECT * FROM form WHERE email= '$filtered'";
        $result = $this->connect()
            ->query($sql);
        //if found rows are greater than 0 display them in table
        if ($result->num_rows > 0)
        {
            echo "<form id='searchform' method='GET'>
        <input type='text' name='searchfield' value=''>
        <input type='submit' name='' value='Search'>
        <input type='hidden' name='emaill' value='$filtered'>
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
            while ($row = $result->fetch_assoc())
            {

                $usernamerow = $row['username'];
                $providerrow = $row['email'];
                $daterow = $row['date'];
                $id = $row['id'];
                echo "
            <tr>
              <td>$usernamerow$providerrow</td>
              <td>$daterow</td>
              <td><a href='includes/delete.php?id=$id&emaill=$filtered'>Delete</a></td>
            </tr>
            ";

            }
            echo '
        </table>
        </div>
        </div>
        ';

        }
        else
        {
            echo "0 results";
        }
    }
}
?>
