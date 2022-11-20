<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Photograph-Y</title>
</head>

<body>
    <div class="container">

        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log
                    In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">
                    <div class="sign-in-htm">
                        <form action="includes/login.php" method="post">
                            <div class="group">
                                <label for="user" class="label">Email</label>
                                <input id="user" type="email" name="email" class="input">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" type="password" name="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <input type="submit" class="button" name="login" value="Log In">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <label for="tab-2">Don't have an account yet?</a>
                            </div>
                        </form>
                    </div>
                    <div class="sign-up-htm">
                        <form action="includes/signup.php" method="post">
                            <div class="group">
                                <label for="user" class="label">Full Name</label>
                                <input id="user" type="name" name="fullname" class="input">
                            </div>
                            <div class="group">
                                <label for="email" class="label">Email</label>
                                <input id="email" type="email" name="email" class="input">
                            </div>
                            <div class="group">
                                <label for="phone" class="label">Phone</label>
                                <input id="phone" type="phone" name="phone" class="input">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" type="password" name="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <label class="role">Customer
                                    <input type="radio" checked="checked" name="role" value="customer">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="role">Seller
                                    <input type="radio" name="role" value="seller">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" name="signup" value="Sign Up">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <label for="tab-1">Already Member?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
