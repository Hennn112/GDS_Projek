
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Wikrama-logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="style/landing-page2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Epilogue' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&display=swap" rel="stylesheet">
    <title>GDS Wikrama</title>
</head>
<body>
    <div class="topnav">
        <img src="img/Wikrama.png" alt="">
        <p class="active" href="#home">GDS <span>Wikrama</span></p>
    </div>
    <section class="hero">
        <main class="content">
            <h3>Halo, selamat datang</h3>
            <h1>GDS wikrama <br><span>gerakan disiplin siswa</span></h1>
            <button class="button" onclick="document.getElementById('id01').style.display='block'"><span>Login</span></button>

        <!-- The Modal -->
        <div id="id01" class="modal">

        <!-- Modal Content -->
        <form class="modal-content" action="login.php"method="post">
            <div class="imgcontainer">
            <img src="img/user (2) 1.png" alt="Avatar" class="avatar" style="width: 50px;">
            </div>

            <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" name="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
                <div class="container">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            </div>

            </div>
        </form>
        </div>
        </main>
        <main class="content-image">
            <img src="img/Vectary_texture.png" alt="">
        </main>
    </section>
    <section class="container">
        <div class="title">
            <h1>apa itu gerakan disiplin siswa ?</h1>
        </div>
        <div class="row">
            <div class="column">
                <p>Suatu upaya atau program yang bertujuan untuk meningkatkan disiplin siswa di <span>Sekolah</span></p>
            </div>
            <div class="column">
                <p>Membentuk perilaku siswa agar lebih patuh terhadap peraturan dan juga membentuk karakter siswa</p>
            </div>
        </div>
        <div class="form">
            <a href="" target="_blank">Laporkan Siswa</a>
        </div>
    </section>

    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>

    <footer>
        <p>Copyright &copy; 2023;</p>
    </footer> 
</body>
</html>