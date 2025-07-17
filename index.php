<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3 class="header">Login Page</h3>
                    <form class="form-group" action="/controllers/login.php" method="post">
                        <label class="form-label" for="username">Username:</label>
                        <input class="form-control" name="username" placeholder="Username" required>
                        <br>
                        <label class="form-label" for="password">Password:</label>
                        <input class="form-control" name="password" type="password" placeholder="Password" required>
                        <br>
                        <button class="btn btn-md btn-primary" type="submit">Login</button>
                        <a href="/views/register_page.php" class="btn btn-md btn-secondary">Register Now!</a>
                    </form>
                </div>
                <div class="col-md-3"></div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>