<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/gallery.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <script src="https://kit.fontawesome.com/5f58e28f90.js" crossorigin="anonymous"></script>
    <title>Favourites</title>
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
                        <a href="start" class="menu-button">
                            <i class="fa-solid fa-house"></i>
                            <p class="menu-button-text">Start</p>
                        </a>
                    </li>
                    <li>
                        <a href="favourites" class="menu-button" style="color: #d46900">
                            <i class="fa-solid fa-heart"></i>
                            <p class="menu-button-text">Favourite ideas</p>
                        </a>
                    </li>
                    <li>
                        <a href="gallery" class="menu-button">
                            <i class="fa-solid fa-image"></i>
                            <p class="menu-button-text">My gallery</p>
                        </a>
                    </li>
                    <li>
                        <a href="profile" class="menu-button">
                            <i class="fa-solid fa-user"></i>
                            <p class="menu-button-text">My profile</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div style="color: red;">
                You're in the demo version, this functions may not be ready to use.
            </div>
            <button class="log-out" onclick="window.location.href='login'">Log out</button>
        </nav>
        <div class="base-container">
            <img class="decoration-top" alt="" src="public/img/Vector 3.svg">
            
            <div class="top-leyer">
                <div class="search-bar" style="visibility: hidden">
                    <input placeholder="search idea">
                </div>
                
                <div class="section">
                    <div class="idea" id="idea-1">
                        <img src="public/img/ideas/simple_drawing_1.jpg">
                        <div>
                            <h3>Idea</h3>
                            <p>This might be your favourite idea</p>
                            <div class="social-section">
                                <i class="fas fa-heart"></i>
                                <i class="fa-solid fa-image"></i>
                            </div>
                        </div>
                    </div>
                    <div class="idea" id="idea-2">
                        <img src="public/img/logo-bird.png">
                        <div>
                            <h3>Might</h3>
                            <p>because it doesn't work yet</p>
                            <div class="social-section">
                                <i class="fas fa-heart"></i>
                                <i class="fa-solid fa-image"></i>                        
                            </div>
                        </div>
                    </div>
                    <div class="idea" id="idea-3">
                        <img src="public/img/ideas/simple_drawing_3.jpg">
                        <div>
                            <h3>Stay tuned</h3>
                            <p>for the next update</p>
                            <div class="social-section">
                                <i class="fas fa-heart"></i>
                                <i class="fa-solid fa-image"></i>                        
                            </div>
                        </div>
                    </div>
                    <div class="idea" id="idea-4">
                        <img src="public/img/ideas/scribble_art_1.jpeg">
                        <div>
                            <h3>Really</h3>
                            <p>we're trying our best</p>
                            <div class="social-section">
                                <i class="fas fa-heart"></i>
                                <i class="fa-solid fa-image"></i>
                            </div>
                        </div>
                    </div>
                    <div class="idea" id="idea-5">
                        <img src="public/img/ideas/scribble_art_2.jpeg">
                        <div>
                            <h3>And really</h3>
                            <p>want to update this project in the future</p>
                            <div class="social-section">
                                <i class="fas fa-heart"></i>
                                <i class="fa-solid fa-image"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    		<img class="decoration-bottom" alt="" src="public/img/Vector 4.svg">
        </div>
    </div>
</body>
</html>