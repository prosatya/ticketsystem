<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h1>Login </h1>
        </div>
    </div>
</div>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="POST" name="addItem" role="form" ng-submit="doLogin()">
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <strong>Email : </strong>
                        <div class="form-group">
                         <input type="email" ng-model="form.email" class="form-control" required>                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <strong>Password : </strong>
                        <div class="form-group">
                            <input type="password" ng-model="form.password" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" ng-disabled="addItem.$invalid" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>