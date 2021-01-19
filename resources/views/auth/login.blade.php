<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
	<meta name="author" content="Chaanto">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>SIMAC</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="{{asset('dist/css/my-login.css')}}" rel="stylesheet">
</head>

<body class="my-login-page">
	<section class="h-100" sty>
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
                    <div class="brand">
						<img src="{{asset('images/logo-icon.png')}}" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
                            <form method="POST" action="{{ route('login') }}" class="my-login-validation">
                                @csrf
								<div class="form-group">
									<label for="email">E-mail</label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" required autofocus placeholder="enter your email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

								<div class="form-group">
									<label for="password">Password
									</label>
									<input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password"
                                    placeholder="enter your password"required autocomplete="current-password"
                                    >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
								<div class="form-group m-0">
									<button type="submit" class="btn btn-dark btn-block">
										Login
									</button>
                                </div>
                                <div class="mt-4 text-center">
									Don't have an account? <a href="#">Create One</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('dist/js/my-login.js')}} "></script>
</body>

</html>