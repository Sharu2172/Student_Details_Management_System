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

</body>

</html>