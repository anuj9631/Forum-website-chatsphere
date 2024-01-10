


<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginmodal">Login to iDiscuss</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/forum/partials/_handlelogin.php" method="post">
      <div class="form-group">
    <label for="loginemail">Email address</label>
    <input type="email" class="form-control" id="loginemail" aria-describedby="loginemail" name="loginemail">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
     </div>
    <div class="form-group">
    <label for="loginpassword">Password</label>
    <input type="password" class="form-control" id="loginpassword" name="loginpassword">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
      
    </div>
  </div>
</div>