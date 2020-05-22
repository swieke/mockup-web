<?php 

require("config.php");
$my_profile = '';
$greeting = '';
$logout = '';
$id = '';

if(!empty($_SESSION['logged_in'])) 
	{
    $my_profile = "My Profile";
    $logout = 'Log out';
    $greeting = $_SESSION['name'];
    $id = $_SESSION['logged_in'];
  }
?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    </head>
	<body>
        <header class="header">
        <nav class="navbar navbar-style">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href=""><img class="logo" src="./assets/Logo_Wardaya_College.png"></a>
                </div>
                
                <ul class="nav navbar-right smooth-scroll">
                    <li class="menulist"><a href="./profile.php"><?= $my_profile ?></a></li>
                    <li class="menulist"><a href="./logout.php"><?= $logout ?></a></li>
                    <li class="menulist"><a href="#">Home</a></li>
                    <li class="menulist"><a href="#about">About Us</a></li>
                    <li class="menulist"><a href="#content">Content</a></li>
                    <li class="menulist"><a href="#footer">Contacts</a></li>
                    <li class="menulist"><a href="./login.php"><?php if ($logout =='') {echo "Login";}?></a></li>
                </ul>
            </div>
        </nav>

        <div class="container container-banner">
            <div class="row">
                <div class="col-sm-6 banner-info">
                    <h1> Start learning now <?= $greeting?></h1>
                    <p class="big-text"> Join Wardaya College</p>
                    <p> Learn anywhere, learn anytime.</p>
                    <?php if (!$logout) {echo '<a class="btn btn-first" href="./register.php">REGISTER</a>';}?>
                    <?php if (!$logout) {echo '<a class="btn btn-second" href="./login.php">LOGIN</a>';}?>
                </div>
                <div class="col-sm-6">
                <img src="./assets/study.png" class="img-responsive banner-image" id="header_img">
                </div>
            </div>
        </div>
        </header>

        <section id="content">
          <div class="row-sm-2">
            <div class="col-sm-12">
              <h1><strong>Pick your subject.</strong></h1>
            </div>
          </div>
          <div class="row-sm-9">
            <a class="btn btn-warning" >MATEMATIKA</a>
          <a class="btn btn-danger">FISIKA</a>
          <a class="btn btn-success">KIMIA</a>
          </div>
        </section>

        <section id="about">
            <h1> About</h1>
            <br/>
            <br/>
            <div class="col-sm-6">
                <p>
                  Wardaya College adalah situs belajar online / e-learning berisi video pelajaran dan kuis matematika terlengkap dan gratis. Selain matematika, kami juga sedang mengembangkan materi belajar kimia dan pelajaran sains lainnya.
                </p>
                <p>
                  Diawali dengan perbincangan dua orang kawan lama Anton Wardaya dan Gunawan Tjandra pada pertengahan tahun 2012, peluncuran situs Wardaya College adalah kisah perjuangan 2+ tahun pembuatan.
                  Para founders kami memiliki pekerjaan penuh waktu dengan kesibukan mereka masing-masing. Namun dengan semangat yang membara, dan tidak jarang mengorbankan jam tidur, mereka perlahan-lahan melengkapi materi pembelajaran dan mengembangkan situs ini.
                  Pada tanggal 17-Agustus-2014, kami memulai beta testing dan secara terbatas membuka akses Wardaya College untuk para beta testers. Pada tanggal 28-Oktober-2014, kami secara resmi membuka akses Wardaya College untuk publik.
                  Sekarang kisah Wardaya College bukan hanya milik para founders dan staffs, melainkan juga milik Anda para pengunjung dan pengguna situs.
                </p>
            </div>
        </section>

      <!-- Footer -->
      <section id="footer"></section>
      <div class="footer">
        <div class="row" style="padding: 30px;">
          <div class="col-sm-4"">
            <div class="container">
              <h3>WARDAYA COLLEGE</h3>
              <p>&phone; (+62) 21 293 360 36</p>
              <p>Ruko Sentra Bisnis, Jl. Tanjung Duren Raya No.8</p>
              <p>RT.12/RW.2, Tj. Duren Utara, Kec. Grogol Petamburan</p>
              <p>Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470</p>
            </div>            
          </div>
          <div class="col-sm-4">
            <div class="container">
              <h3>Social Media</h3>
              <ul>
                <li><a href="https://www.facebook.com/wardayacollege" class="footer-link">Facebook</a></li>
                <li><a href="https://twitter.com/wardayacollege" class="footer-link">Twitter</a></li>
                <li><a href="https://www.instagram.com/wardayacollege/" class="footer-link">Instagram</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="container">
              <h3>Contact Us</h3>

              <div class="column">
                <form action="">
                  <label for="fname">Name</label>
                  <br/>
                  <input type="text" id="fname" name="firstname" class="rounded" placeholder="Your name..">
                  <p><label for="subject">Subject</label></p>
                  <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>
                  <br/>
                  <br/>
                  <input type="submit" value="Submit" class="btn-success rounded">
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          &copy; wardayacollege.com | Designed by Theo Azriel
        </div>
      </div>
    </section>


        <!-- Bootstrap JS-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>

