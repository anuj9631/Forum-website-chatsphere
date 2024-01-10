


<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodal">Sign up to iDiscuss</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/forum/partials/_handlesignup.php" method="post">
    <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="signupemail" aria-describedby="emailHelp" name="signupemail">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
     </div>
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="signupassword" name="signupassword">
    </div>
    <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="signupcpassword" name="signupcpassword">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
     
    </div>
  </div>
</div>