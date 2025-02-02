<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/gallery.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <script src="https://kit.fontawesome.com/5f58e28f90.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>Gallery</title>
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
                        <a href="#" class="menu-button" style="color: #d46900">
                            <i class="fa-solid fa-image"></i>
                            <p class="menu-button-text">My gallery</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu-button">
                            <i class="fa-solid fa-user"></i>
                            <p class="menu-button-text">My profile</p>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="log-out">Log out</button>
        </nav>
        <div class="base-container">
            <img class="decoration-top" alt="" src="public/img/Vector 3.svg">
            
            <div class="top-leyer">
                <div class="search-bar">
                    <input placeholder="search idea">
                </div>
                
                <div class="section">
                    <?php foreach($projects as $project): ?>
                        <div class="idea" id="idea_id">
                            <img src="public/uploads/<?= $project->getImage(); ?>">
                            <div class="idea-text">
                                <h3><?= $project->getTitle(); ?></h3>
                                <p><?= $project->getDescription(); ?></p>
                                <div class="social-section">
                                    <i class="fas fa-heart"></i>
                                    <i class="fa-solid fa-image"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    		<img class="decoration-bottom" alt="" src="public/img/Vector 4.svg">
        </div>
    </div>
</body>
</html>