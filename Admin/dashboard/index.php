<!-- This File is the Front Page of my Website when it Loads. -->
<?php
include('../extra/header.php')
?>
<!-- This file show's the Table data with all the Student USN in Order. -->
<main class="col-md-auto ms-sm-auto col-lg-auto px-md-4">
  <?php unset($_SESSION['usn']); ?>
  <center>
    <h2>Section title</h2>
  </center>
  <div class="table-responsive">
    <form action="../search-student/" method='post'>
      <table class="table table-dark">
        <thead>
          <tr>
            <th>USN</th>
            <th>Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Batch Year</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Student Image</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // This query is used for reading student data from database.
          $query = "SELECT * FROM stud_details s JOIN personal_details p ON s.USN=p.USN JOIN images i ON i.USN=s.USN ORDER BY s.USN";
          $query_run = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($query_run)) {
            echo "<tr>";
            echo "<td id='td'><button name='search' type='submit' class='tp' value='$row[USN]'><b><u>$row[USN]</b></u></button></td>";
            echo "<td id='td'> $row[name]</td>";
            echo "<td id='td'> $row[course]</td>";
            echo "<td id='td'> $row[sem]</td>";
            echo "<td id='td'> $row[batchyear]</td>";
            echo "<td id='td'> $row[ph_no]</td>";
            echo "<td id='td'> $row[email]</td>";
            echo "<td><img src='../../Student/upload/" . $row['stud_image'] . "' height='100' width='100' class='img-thumnail' /></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </form>
  </div>
</main>
<?php include("../extra/footer.php"); ?>