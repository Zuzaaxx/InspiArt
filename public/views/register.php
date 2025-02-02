<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <script type="text/javascript" src="./public/js/register_validation.js" defer></script>
    <title>Login page</title>
</head>
<body>
    <div class="container">
        <div class="login-container">  
            <div class="inspiart" style="margin-top: 0; padding-top: 0;">
                <span class="inspiart-text">InspiArt</span>
                <span>🪶</span>
            </div>
            <div class="register-form">
                <p class="log-in-to">Join us!</p>
                <form class="register" action="register" method="POST" style="height: 80vh;">
                    <div class="message">
                        <?php if (isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <p>Name:</p>
                    <input name="name" type="text">
                    <p>Username:</p>
                    <input name="username" type="text">
                    <p>Password:</p>
                    <input name="password" type="password">
                    <p>Confirmed password:</p>
                    <input name="confirmedPassword" type="password">
                    <p>E-mail:</p>
                    <input name="email" type="text">
                    <button type="submit">Sign up</button>
                </form>
            </div>
        </div>
        <div class="base-container">
            <div class="top-panel">
                <img class="decoration-top" alt="" src="public/img/Vector 1.svg">
            </div>
            
    		<img class="decoration-bottom" alt="" src="public/img/Vector 2.svg">
        </div>

        <div class="logo-picture">
            <img src="public/img/logo-bird.png">
        </div>
       
    </div>
</body>