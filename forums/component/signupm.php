<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">Sign Up to ASK MEE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Forums/component/hsignup.php" method="post">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="signupemail" name="signupemail"
                                aria-describedby="emailHelp" autofocus>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signuppassword" name="signuppassword">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"> Confirm Password</label>
                            <input type="password" class="form-control" id="signupcpassword" name="signupcpassword">
                        </div>

                        <button type="submit" class="btn btn-primary">Sign Up</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>