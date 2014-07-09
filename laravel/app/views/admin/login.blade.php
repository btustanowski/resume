@extends('admin.meta')

@section('mastercontent')
<div class="row">
    <div class="panel panel-default col-lg-6 col-lg-offset-3 panel-login">
        <div class="panel-body">
            <h2>Identify yourself, stranger.</h2>
            <hr>
            <form class="form-signin" role="form">
                <div class="form-group">
                    <div class="input-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input id="username" type="text" class="form-control" placeholder="Login" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                        <input id="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" data-loading-text="Authenticating..." id="login">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#login').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var btn = $(this);
            btn.button('loading');

            $.ajax({
                url: '/admin/login',
                type: 'post',
                data: {
                    username: $('#username').val(),
                    password: $('#password').val()
                }
            }).done(function(data) {
                if(data.status === 1) {
                    location.reload();
                } else {
                    btn.button('reset');
                    new PNotify({
                        title: 'Authentication error.',
                        text: data.error,
                        type: 'error'
                    });
                }
            });
        });
    });
</script>
@stop