<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Add your custom styles here -->
    <title>Login</title>
</head>

<body>
    <section class="h-100">
        <div class="d-flex min-vh-100 flex-column justify-content-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center mb-4">
                            <a href="/">
                                <img src="{{ asset('login.png')}}" alt="zaman" class="h-14 w-auto" />
                            </a>
                            <h2 class="mt-3 font-weight-bold">Welcome Again</h2>
                            <p class="text-muted">Please log in to your account</p>
                        </div>
                        <form id="login-form">
                            <div class="form-group">
                                <label for="username" id="usernameLabel">Email</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="example@gmail.com" required>
                                <div class="invalid-feedback">Please enter a valid email or phone number.</div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="******" required>
                                <div class="invalid-feedback">Password must be at least 6 characters long.</div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember-me">
                                <label class="form-check-label" for="remember-me">تذكرني</label>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <a href="#" class="text-muted">Forgot Password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <p class="text-center text-muted mt-4">Don't have an account? <a href="/register" class="font-weight-bold">Register Now</a></p>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block flex-grow-1">
                <img src="assets/img/login.png" alt="" class="img-fluid w-100 h-100" style="object-fit: cover;">
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Add your JavaScript for form submission and validation here
    </script>
</body>

</html>
