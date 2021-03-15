<!--
  This File is to read data from user and send it to add_student.php file.
-->
<?php
//Header Part of the main page
include('../extra/header.php');

// To allow only Admin's to Access this Page
echo Access();
?>

<!-- Forn to enter the Student Detail's -->
<main class="col-md-auto ms-sm-auto col-lg-auto px-md-15 justify-content-center">
  <center>
    <div class="container">
      <form action="add_student.php" method="post" enctype='multipart/form-data'>
        <h3><b><u>Student Details</u></b></h3>
        <br>
        <div class="form-group row">
          <label for="inputusn" class="col-sm-5 col-form-label"><b>USN</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="usn" placeholder="5 Digits" title="please enter a valid USN." pattern="^\d{5}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputusn" required>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputname" class="col-sm-5 col-form-label"><b>Student Name</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="name" id="inputname" required>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputstudimage" class="col-sm-5 col-form-label"><b>Student Image</b></label>
          <div class="col-sm-5">
            <input type="file" class="form-control" name="stud_image" id="inputstudimage" required>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputcourse" class="col-sm-5 col-form-label"><b>Course</b></label>
          <div class="col-sm-5">
            <select class="form-control" id="inputcourse" name='course' required>
              <option value="" disabled selected>Choose option</option>
              <option value="Computer Science Engineering">Computer Science Engineering</option>
              <option value="Electronic and communication Engineering">Electronic and communication Engineering</option>
              <option value="Mechanical Engineering">Mechanical Engineering</option>
              <option value="Electrical Engineering">Electrical Engineering</option>
              <option value="Civil Engineering">Civil Engineering</option>
              <option value="Chemical Engineering">Chemical Engineering</option>
              <option value="Biomedical Engineering">Biomedical Engineering</option>
              <option value="Aerospace Engineering">Aerospace Engineering</option>
              <option value="Aeronautical Engineering">Aeronautical Engineering</option>
            </select>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputsem" class="col-sm-5 col-form-label"><b>Semester</b></label>
          <div class="col-sm-5">
            <select class="form-control" id="inputsem" name='sem' required>
              <option value="" disabled selected>Choose option</option>
              <option value="1">1'st</option>
              <option value="2">2'nd</option>
              <option value="3">3'rd</option>
              <option value="4">4'th</option>
              <option value="5">5'th</option>
              <option value="6">6'th</option>
              <option value="7">7'th</option>
              <option value="8">8'th</option>
            </select>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputyear" class="col-sm-5 col-form-label"><b>Batch Year</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" placeholder="Between 1970 - 2099" id="inputyear" name="batchyear" title="please enter a valid Year." pattern="^(19|20)\d{2}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" required>
          </div>
        </div>
        <br>
        <h3><b><u>Personal Detail</u></b></h3>
        <br>
        <div class="form-group row">
          <label for="inputdob" class="col-sm-5 col-form-label"><b>DOB</b></label>
          <div class="col-sm-5">
            <input type="date" class="form-control" name="dob" id="inputdob" required>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputgen" class="col-sm-5 col-form-label"><b>Gender</b></label>
          <div class="col-sm-5">
            <select name='gender' class="form-control" id="inputgen" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Not Mention">Not Mention</option>
            </select>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputbg" class="col-sm-5 col-form-label"><b>Blood Group</b></label>
          <div class="col-sm-5">
            <select name="blood" class="form-control" id="inputbg" required>
              <option value="" disabled selected>Choose option</option>
              <option value="A +ve">A +ve</option>
              <option value="A -ve">A -ve</option>
              <option value="B +ve">B +ve</option>
              <option value="B -ve">B -ve</option>
              <option value="AB +ve">AB +ve</option>
              <option value="AB -ve">AB -ve</option>
              <option value="O +ve">O +ve</option>
              <option value="O -ve">O -ve</option>
            </select>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputph" class="col-sm-5 col-form-label"><b>Phone Number</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" required name="ph_no" title="Please enter a valid Phone Number." pattern="^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputph" required>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputemail" class="col-sm-5 col-form-label"><b>Email</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" required name="email" title="please enter a valid email address" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputemail" required>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputaddress" class="col-sm-5 col-form-label"><b>Address</b></label>
          <div class="col-sm-5">
            <textarea rows="3" cols="40" class="form-control" name="address" id="inputaddress" required></textarea>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputnat" class="col-sm-5 col-form-label"><b>Nationality</b></label>
          <div class="col-sm-5">
            <select name="nat" class="form-control" id="inputnat" required>
              <option class="form-control" value="India" selected>India</option>
            </select>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="sts" id="drop-state" class="col-sm-5 col-form-label"><b>State</b></label>
          <div class="col-sm-5">
            <select onchange="print_city('state', this.selectedIndex);" id="sts" class="form-control" name="state" id="inputstate" required></select>
            <script language="javascript">
              print_state("sts");
            </script>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="state" class="col-sm-5 col-form-label"><b>City</b></label>
          <div class="col-sm-5" id="distdiv">
            <select id="state" name="city" id="inputcity" class="form-control" required></select>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputpin" class="col-sm-5 col-form-label"><b>Pin Code</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pin" title="Please Enter a Valid Pin Code." pattern="^[1-9]{1}[0-9]{2}\\s{0, 1}[0-9]{3}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputpin" required>
          </div>
        </div>
        <br>
        <h3><b><u>Parent's Details</u></b></h3>
        <br>
        <div class="form-group row">
          <label for="inputfname" class="col-sm-5 col-form-label"><b>Father Name</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="fname" id="inputfname">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputfimg" class="col-sm-5 col-form-label"><b>Father Image</b></label>
          <div class="col-sm-5">
            <input type="file" class="form-control" name="fimg" id="inputfimg">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputfaddress" class="col-sm-5 col-form-label"><b>Father Office Address</b></label>
          <div class="col-sm-5">
            <textarea rows="3" cols="40" class="form-control" name="foffice" id="inputfaddress"></textarea>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputfphone" class="col-sm-5 col-form-label"><b>Father Mobile Number</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="fphone" title="Please enter a Valid Phone Number." pattern="^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputfphone">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputfmail" class="col-sm-5 col-form-label"><b>Father Email</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="fmail" title="Please enter a Valid Email Address" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputfmail">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputfinc" class="col-sm-5 col-form-label"><b>Father Annual Income</b></label>
          <div class="col-sm-5">
            <input type="number" class="form-control" name="finc" id="inputfinc">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputmname" class="col-sm-5 col-form-label"><b>Mother Name</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="mname" id="inputmname">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputmimg" class="col-sm-5 col-form-label"><b>Mother Image</b></label>
          <div class="col-sm-5">
            <input type="file" class="form-control" name="mimg" id="inputmimg">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputmaddress" class="col-sm-5 col-form-label"><b>Mother Office Address : </b></label>
          <div class="col-sm-5">
            <textarea rows="3" cols="40" class="form-control" name="moffice" id="inputmaddress"></textarea>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputmphone" class="col-sm-5 col-form-label"><b>Mother Mobile Number</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="mphone" title="Please enter a Valid Phone Number." pattern="^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputmphone">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputmmail" class="col-sm-5 col-form-label"><b>Mother Email</b></label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="mmail" title="Please enter a Valid Email Address" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputmmail">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="inputminc" class="col-sm-5 col-form-label"><b>Mother Annual Income</b></label>
          <div class="col-sm-5">
            <input type="number" class="form-control" name="minc" id="inputminc">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
            <button class="btn btn-primary" id="insert" type="submit">Submit</button>
          </div>
          <div class="col-md-6">
            <button class="btn btn-secondary" id="Reset" type="reset">Clear</button>
          </div>
        </div>
        <br><br><br>
      </form>
    </div>
  </center>
</main>
<?php

//Footer part on the main Page
include("../extra/footer.php"); 
?>