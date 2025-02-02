<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />

    <title>Login page</title>
</head>
<body>
    <div class="container">
        <div class="login-container">  
            <div class="inspiart">
                <span class="inspiart-text">InspiArt</span>
                <span>🪶</span>
            </div>
            <div class="login-form">
                <p class="log-in-to">Log in to see your inspirations</p>
                <form action="login" method="POST">
                    <div class="message">
                        <?php if (isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <p>Username:</p>
                    <input name="username" type="text">
                    <p>Password:</p>
                    <input name="password" type="password">
                    <button type="submit">Log in</button>
                </form>
            </div>
            <div class="forgot">
                <p class="forgot-password">Forgot password?</p>
                <p class="click-here">Click here</p>
            </div>
        </div>
        <div class="base-container">
            <div class="top-panel">
                <img class="decoration-top" alt="" src="public/img/Vector 1.svg">
                <div class="sign-up-section">
                    <div class="still-dont-have">Still don't have an account?</div>
                    <button class="sign-up" onclick="window.location.href='register'">Sign up</button>
                </div>
            </div>
            
    		<img class="decoration-bottom" alt="" src="public/img/Vector 2.svg">
        </div>

        <div class="logo-picture">
            <img src="public/img/logo-bird.png">
        </div>
       
    </div>
</body>