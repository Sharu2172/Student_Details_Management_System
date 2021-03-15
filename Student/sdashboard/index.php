<!-- File to show details of student based on USN. -->
<?php
include('../extra/header.php');
$usn = $_SESSION['USN'];
?>
<!-- Main body Function -->
<main class="col-md-auto ms-sm-auto col-lg-auto px-md-15 justify-content-center">
  <?php
    $query = "SELECT * FROM stud_details s JOIN personal_details p on s.USN=p.USN JOIN parents_details pd on s.USN=pd.USN JOIN images i ON i.USN=s.USN WHERE s.USN = $usn";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
  ?>
  <center>
    <div class="container">
      <form action="../edit-student/" method="POST" enctype='multipart/form-data'>
        <h3><b><u>Student Details</u></b></h3>
        <fieldset disabled>
          <div class="form-group">
            <div class="thumbnail">
              <?php echo "<img src='../upload/" . $row['stud_image'] . "' class='img-thumbnail' style='width:20%' alt='Student' >"; ?>
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputusn" class="col-sm-5 col-form-label"><b>USN</b></label>
            <div class="col-sm-5">
              <input type="number" class="form-control" name="USN" id="inputusn" value="<?php echo $row['USN'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputname" class="col-sm-5 col-form-label"><b>Student Name</b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="name" id="inputname" value="<?php echo $row['name'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputcourse" class="col-sm-5 col-form-label"><b>Course : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="course" id="inputcourse" value="<?php echo $row['course'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputsem" class="col-sm-5 col-form-label"><b>Semester : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="sem" id="inputsem" value="<?php echo $row['sem'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputyear" class="col-sm-5 col-form-label"><b>Batch Year : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="batchyear" id="inputyear" value="<?php echo $row['batchyear'] ?>">
            </div>
          </div>
          <br>
          <h3><b><u>Personal Detail</u></b></h3>
          <br>
          <div class="form-group row">
            <label for="inputdob" class="col-sm-5 col-form-label"><b>DOB : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="dob" id="inputdob" value="<?php echo $row['dob'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputgen" class="col-sm-5 col-form-label"><b>Gender : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="gender" id="inputgen" value="<?php echo $row['gender'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputbg" class="col-sm-5 col-form-label"><b>Blood Group : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="blood" id="inputbg" value="<?php echo $row['blood'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputph" class="col-sm-5 col-form-label"><b>Phone Number : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="ph_no" id="inputph" value="<?php echo $row['ph_no'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputemail" class="col-sm-5 col-form-label"><b>Email:</b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="email" id="inputemail" value="<?php echo $row['email'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputaddress" class="col-sm-5 col-form-label"><b>Address* : </b></label>
            <div class="col-sm-5">
              <textarea rows="3" cols="40" class="form-control" name="address" id="inputaddress"><?php echo $row['address'] ?></textarea>
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputnat" class="col-sm-5 col-form-label"><b>Nationality* : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="nat" id="inputnat" value="<?php echo $row['nat'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputstate" class="col-sm-5 col-form-label"><b>State : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="state" id="inputstate" value="<?php echo $row['state'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputcity" class="col-sm-5 col-form-label"><b>City : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="city" id="inputcity" value="<?php echo $row['city'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputpin" class="col-sm-5 col-form-label"><b>Pin Code : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="pin" id="inputpin" value="<?php echo $row['pin'] ?>">
            </div>
          </div>
          <br>
          <h3><b><u>Parent's Details</u></b></h3>
          <br>
          <?php if ($row['fimg']) { ?>
            <div class="form-group">
              <div class="thumbnail">
                <?php echo "<img src='../upload/" . $row['fimg'] . "' class='img-thumbnail' style='width:20%' alt='Student' >"; ?>
              </div>
            </div>
            <br>
          <?php } ?>
          <div class="form-group row">
            <label for="inputfname" class="col-sm-5 col-form-label"><b>Father Name : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="fname" id="inputfname" value="<?php echo $row['fname'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputfaddress" class="col-sm-5 col-form-label"><b>Father Office Address : </b></label>
            <div class="col-sm-5">
              <textarea rows="3" cols="40" class="form-control" name="foffice" id="inputfaddress"><?php echo $row['foffice'] ?></textarea>
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputfphone" class="col-sm-5 col-form-label"><b>Father Mobile Number : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="fphone" id="inputfphone" value="<?php echo $row['fphone'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputfmail" class="col-sm-5 col-form-label"><b>Father Email : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="fmail" id="inputfmail" value="<?php echo $row['fmail'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputfinc" class="col-sm-5 col-form-label"><b>Father Annual Income : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="finc" id="inputfinc" value="<?php echo $row['finc'] ?>">
            </div>
          </div>
          <br>
          <?php if ($row['mimg']) { ?>
            <div class="form-group">
              <div class="thumbnail">
                <?php echo "<img src='../upload/" . $row['mimg'] . "' class='img-thumbnail' style='width:20%' alt='Student' >"; ?>
              </div>
            </div>
            <br>
          <?php } ?>
          <div class="form-group row">
            <label for="inputmname" class="col-sm-5 col-form-label"><b>Mother Name : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="mname" id="inputmname" value="<?php echo $row['mname'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputmaddress" class="col-sm-5 col-form-label"><b>Mother Office Address : </b></label>
            <div class="col-sm-5">
              <textarea rows="3" cols="40" class="form-control" name="moffice" id="inputmaddress"><?php echo $row['moffice'] ?></textarea>
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputmphone" class="col-sm-5 col-form-label"><b>Mother Mobile Number : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="mphone" id="inputmphone" value="<?php echo $row['mphone'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputmmail" class="col-sm-5 col-form-label"><b>Mother Email : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="mmail" id="inputmmail" value="<?php echo $row['mmail'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group row">
            <label for="inputminc" class="col-sm-5 col-form-label"><b>Mother Annual Income : </b></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="minc" id="inputminc" value="<?php echo $row['minc'] ?>">
            </div>
          </div>
          <br>
        </fieldset>
        <div class="row">
          <div class="col-md-6">
            <button class="btn btn-primary" id="edit_usn" type="submit">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </center>
</main>
<?php include("../extra/footer.php"); ?>