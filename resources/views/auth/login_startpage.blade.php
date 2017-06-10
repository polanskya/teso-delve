
<form role="form" method="POST" action="{{ url('/login') }}" class="startpage-login">
    <div class="panel panel-default">
        <div class="panel-body">
            {{ csrf_field() }}

            <div class="row">
                <h3 class="m-t-0 col-md-12">Login</h3>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-5">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-5">
                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                </div>

                <div class="form-group col-md-2">
                    <button type="submit" class="form-control-static btn btn-default">
                        Login
                    </button>
                </div>

                <div class="col-md-12 text-center">
                    @if ($errors->has('email'))
                        <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                    @endif

                    @if ($errors->has('password'))
                        <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Remember Me</label>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ url('/register') }}">Register</a> -
                    <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                </div>
            </div>
        </div>
    </div>
</form>
