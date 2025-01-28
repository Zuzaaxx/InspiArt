<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/add-idea.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <script src="https://kit.fontawesome.com/5f58e28f90.js" crossorigin="anonymous"></script>
    <title>Add idea</title>
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

        <div class="section">
            <p class="upload-text">Now you can upload your image</p>
            <form action="addIdea" method="POST" ENCTYPE="multipart/form-data">
                <div class="message">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="title" type="text" placeholder="title">
                <textarea name="description" rows="5" placeholder="write something about your work"></textarea>

                <input type="file" name="file">
                <button type="submit">Add</button>
            </form>
        </div>

        <img class="decoration-bottom" alt="" src="public/img/Vector 4.svg">
    </div>
</div>
</body>
</html>