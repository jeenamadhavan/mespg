<div class="container banner">
    <div class="jumbotron fk-jumbotron">
        <h1>Welcome!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis ac mi in vulputate. Cras at suscipit nibh. Curabitur mollis viverra vulputate. Suspendisse porta id purus eget tempor. Proin nec tortor lacus. Quisque pretium mauris ut lacinia vulputate.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">APPLY NOW</a></p>
    </div>
</div>
<div class="container">
    <div class="row">
        
        <div class="col-xs-6">
            <h3 class="lead">APPLY FOR COURSE</h3>
            <p>
                <strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod, elit ac pretium scelerisque, metus dolor mattis dolor, vitae consequat metus dolor eu eros.</strong>
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod, elit ac pretium scelerisque, metus dolor mattis dolor, vitae consequat metus dolor eu eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod, elit ac pretium scelerisque, metus dolor mattis dolor, vitae consequat metus dolor eu eros.Aliquam euismod, elit ac pretium scelerisque, metus dolor mattis dolor, vitae consequat metus dolor eu eros.Aliquam euismod, elit ac pretium scelerisque, metus dolor mattis dolor, vitae consequat metus dolor eu eros.
            </p>
            <p><a href="/forgot/" class="btn btn-default btn-block">Read More Instructions</a></p>
            <p><a href="/new-customer/" class="btn btn-info btn-block">Yes please, register now!</a></p>
        </div>
        <div class="col-xs-6">
            <h3 class="lead">REGISTER</h3>
            <form id="loginForm" method="POST" action="/login/" novalidate="novalidate">
                <div class="form-group">
                    <label for="Email" class="control-label">Email Address</label>
                    <input type="email" class="form-control" id="Email" name="email" value="" required="" title="Please enter your email Address" placeholder="Your email Address">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="Please enter your password">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="password-repeat" class="control-label">Repeat Password</label>
                    <input type="password" class="form-control" id="password-repeat" name="repeatpassword" value="" required="" title="Please Repeat your password" placeholder="Please Repeat your password">
                    <span class="help-block"></span>
                </div>
                <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" id="remember"> Remember login
                    </label>
                    <p class="help-block">(if this is a private computer)</p>
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>
</div>