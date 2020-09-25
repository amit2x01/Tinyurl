

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TinyUrl - Login</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    <header style="background: #e7e7e7;">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6">
                    <h4>Tinyurl - Login</h4>
                </div>
            </div>
        </div>
    </header>
    <main>
       <div class="container my-4">
            <div class="row">
                <div class="col-md-6">
                  
                    <form action="{{ url('/ap/login') }}" method="POST">
                        <h3>Login to Admin</h3><br>
                        @if(Session::has('error'))
                                <div class="alert alert-danger p-2">
                                    <b>{{Session::get('error') }}</b>
                                </div>
                        @endif
                        @csrf
                        <label>Enter Your Username</label>
                        <input type="text" class="form-control form-control-sm" name="username">
                        @if($errors->has('username'))
                            <span class="text-danger text-16 bold">{{ $errors->first('username') }}</span>
                        @endif
                        <label>Enter Your Password</label>
                        <input type="password" class="form-control form-control-sm" name="password">
                        @if($errors->has('password'))
                            <span class="text-danger text-16 bold">{{ $errors->first('password') }}</span>
                        @endif
                        <br>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>
            </div>
       </div>

    </main>
</body>
</html>