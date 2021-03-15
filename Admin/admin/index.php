<!--
    This File is to let's Admin Add, Remove Or Edit Admin Data. 
-->
<?php
include('../extra/header.php');

//To allow only admin's to access this page.
echo Access();

//Get user id from Session .
$id = $_SESSION['uid'];

//Select user data from database to display it to the user
$query = "SELECT * FROM Admin where uid = '$_SESSION[uid]' AND name = '$_SESSION[uname]'";
$query_run = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($query_run)
?>
<!-- This HTML Page display's Admin Data to the user -->
<main class="col-md-auto ms-sm-auto col-lg-auto px-md-15 justify-content-center">
    <center>
        <div class="container">
            <form>
                <h3><b><u>ADMIN Details</u></b></h3>
                <fieldset disabled>
                    <div class="form-group">
                        <div class="thumbnail">
                            <?php echo "<img src='../upload/" . $row['admin_image'] . "' class='img-thumbnail' style='width:20%'>"; ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-5 col-form-label"><b>Name</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputname" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputemail" class="col-sm-5 col-form-label"><b>Email</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputemail" value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputph" class="col-sm-5 col-form-label"><b>Phone Number : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputph" value="<?php echo $row['mobile']; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputun" class="col-sm-5 col-form-label"><b>username</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputun" value="<?php echo $row['username']; ?>">
                        </div>
                    </div>
                    <br>
                </fieldset>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success btn-outline-light" data-toggle="modal" data-target="#edit-admin">
                            Edit Admin
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Add-admin">
                            Add Admin
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline-light btn-danger" data-toggle="modal" data-target="#remove-admin">
                            Remove Admin
                        </button>
                    </div>
                </div>
                <br><br><br>
            </form>
        </div>
    </center>
</main>

<!-- This modal display's form for adding Admin Data. -->
<div class="modal fade" id="Add-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Admin Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <form action='../admin/add-admin.php' method='POST' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-5 col-form-label"><b>Name</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputname" name='name' required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputadminimage" class="col-sm-5 col-form-label"><b>Admin Image : </b></label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="admin_image" id="inputadminimage">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputemail" class="col-sm-5 col-form-label"><b>Email</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required name="email" title="please enter a valid email address" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputemail">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputph" class="col-sm-5 col-form-label"><b>Phone Number : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required name="ph_no" title="Please enter a valid Phone Number." pattern="^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputph">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputun" class="col-sm-5 col-form-label"><b>username</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputun" name="username" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputpass" class="col-sm-5 col-form-label"><b>password</b></label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="inputpass" name="password" required>
                        </div>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                    <button type="submit" class="btn btn-outline-primary"> Edit </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- This modal display's form for editing Admin Data. -->
<div class="modal fade" id="edit-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Admin Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <form action='../admin/edit-admin.php' method='POST' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-5 col-form-label"><b>Name</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputname" name='name' value="<?php echo $row['name']; ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputadminimage" class="col-sm-5 col-form-label"><b>Admin Image : </b></label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="admin_image" id="inputadminimage">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputemail" class="col-sm-5 col-form-label"><b>Email</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required name="email" value="<?php echo $row['email']; ?>" title=" please enter a valid email address" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputemail">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputph" class="col-sm-5 col-form-label"><b>Phone Number : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required name="ph_no" value="<?php echo $row['mobile']; ?>" title="Please enter a valid Phone Number." pattern="^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputph">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputpass" class="col-sm-5 col-form-label"><b>password</b></label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="inputpass" name="password">
                        </div>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                    <button type="submit" class="btn btn-outline-primary"> Add </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- This modal is to confirm removal of admin data. -->
<div class="modal fade" id="remove-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Remove Admin <?php $row['name']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        Are you sure you want to Remove this Admin.
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="../admin/remove-admin.php" method='post' enctype="multipart/form-data">
          <button type="submit" name="remove_confirm" class="btn btn-primary">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('../extra/footer.php'); ?>