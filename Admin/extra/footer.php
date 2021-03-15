<!-- Modal for Logout Button -->
<div class="modal fade" id="Logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        Are you sure you want to logout.
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="../extra/logout.php" method='post' enctype="multipart/form-data">
          <button type="submit" name="logout_confirm" class="btn btn-primary">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Login Button -->
<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal Body -->
      <form action='../extra/login.php' method='post' enctype="multipart/form-data">
        <div class="modal-body">
          <label for="inputEmail" class="visually-hidden">Username</label>
          <input type="text" class="form-control" name='user' placeholder="Username" autofocus>
          <br>
          <label for="inputPassword" class="visually-hidden">Password</label>
          <input type="password" id="inputPassword" class="form-control" name='passwd' placeholder="Password">
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
          <button type="submit" class="btn btn-primary"> Login </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Script to search data when enter is clicked in top navigation bar. -->
<script>
  $(document).ready(function() {
    $('.submit_on_enter').keydown(function(event) {
      // enter has keyCode = 13, change it if you want to use another button
      if (event.keyCode == 13) {
        this.form.submit();
        return false;
      }
    });
  });

function sessionClose()
{
  <?php 
   echo '
   <form method="POST" id="form_id" action="../extra/logout.php"></form>
   <script type="text/javascript">
	   document.forms[\'form_id\'].submit();
   </script>
   ';
?>
}

</script>

</body>

</html>