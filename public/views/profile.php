<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <script src="https://kit.fontawesome.com/5f58e28f90.js" crossorigin="anonymous"></script>
    <title>My profile</title>
</head>
<body>
    <div class="container">
        <nav>
            <div class="inspiart">
                <span class="inspiart-text">InspiArt</span>
                <span>🪶</span>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="#" class="menu-button">
                            <i class="fa-solid fa-house"></i>
                            <p class="menu-button-text">Start</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu-button">
                            <i class="fa-solid fa-heart"></i>
                            <p class="menu-button-text">Favourite ideas</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu-button">
                            <i class="fa-solid fa-image"></i>
                            <p class="menu-button-text">My gallery</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu-button" style="color: #d46900">
                            <i class="fa-solid fa-user"></i>
                            <p class="menu-button-text">My profile</p>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="log-out">Log out</button>
        </nav>
        <div class="base-container">
            <img class="decoration-top" alt="" src="public/img/Vector 5.svg">
            <div class="section">
                <img class="profile-picture" src="public/img/profile-picture.svg" alt="ludź">
                   <form>
                    <p class="input-label">Name:</p>
                    <input name="name" type="text" placeholder="name">
                        <p class="input-label">E-mail:</p>
                    <input name="e-mail" type="text" placeholder="email@gmail.com">
                    <p class="input-label">Username:</p>
                    <input name="username" type="text" placeholder="username">
                    <p class="input-label">Password:</p>
                    <input name="password" type="password" placeholder="password">
                </form>
                <button class="save">Save changes</button>
            </div>
            
    		<img class="decoration-bottom" alt="" src="public/img/Vector 4.svg">
        </div>
    </div>
</body>
</html>