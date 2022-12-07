<!DOCTYPE html>
<html lang="en">
<?php
  require "assets\include\cipher.php";
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rail Fence</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css?m" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center  me-auto me-lg-0">
        <i class="bi bi-shield-lock"></i>
        <h1>Cipher Emulator</h1>
      </a>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Rail <span>Fence</span> Cipher.</h2>
          <p>The rail fence cipher (also called a zigzag cipher) is a form of transposition cipher. It derives its name from the way in which it is encoded.</p>
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main" data-aos="fade" data-aos-delay="1500">
    <div class="container ">
    <div class="row my-5">
        <div class="content col-sm-6 col-lg-8">
          <h4>Working of Emulator<i class="bi bi-arrow-right-circle-fill"></i></h4>
          <p>The following are the steps on how Emulator Works:
            <ul>
              <li>Step 1<i class="bi bi-chevron-right"></i>User has to Enter the Plain Text in Message Box.</li>
              <li>Step 2<i class="bi bi-chevron-right"></i>Press Encode-Button to Encrypt the Message.</li>
              <li>Step 3<i class="bi bi-chevron-right"></i>The PHP code on the backend will use the Rail Fence Algorithm to Encrypt.</li>
              <li>Step 4<i class="bi bi-chevron-right"></i>The Output is displayed in the Output Box.</li>
            </ul>
          </p>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="row justify-content-center mt-4">
            <div class="box-title col-lg-9">
              <img scr="">
            </div>
          </div>
        </div>
      </div>
      <div class="row my-5">
        <div class="content col-sm-6 col-lg-8">
          <h4>Encryption:<i class="bi bi-arrow-right-circle-fill"></i></h4>
          <p>
          In a transposition cipher, the order of the alphabets is re-arranged to obtain the cipher-text.
            <ul>
              <li><i class="bi bi-chevron-right"></i>In the rail fence cipher, the plain-text is written downwards and diagonally on successive rails of a
                imaginary fence.</li>
              <li><i class="bi bi-chevron-right"></i>When we reach the bottom rail, we traverse upwards moving diagonally, after reaching the top rail,
                the direction is changed again. Thus the alphabets of the message are written in a zig-zag manner.</li>
              <li><i class="bi bi-chevron-right"></i>After each alphabet has been written, the individual rows are combined to obtain the cipher-text.</li>
            </ul>
          </p>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="row justify-content-center mt-4">
            <div class="box-title col-lg-9">
              <h6>Encode</h6>
              <form method="post" class="php-email-form">
                <div class="form-group mt-3">
                  <h3>Plain Text:</h3>
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                
                <div class="text-center">
                    <button type="submit" name="encode-btn">Encode</button>
                </div>
                <!--<div class="text-center"><input type="submit" name="enode-btn" value="Encode"/></div>-->
                <div class="my-3">
                <?php
                  if($_SERVER['REQUEST_METHOD']==='POST'){
                    if(isset($_POST["encode-btn"])){
                      $input = $_POST['message'];
                      $message = "Ecoded Message is:<br>" . encode($input,2);
                      echo "<div class='message'>".$message."</div>";
                    }
                  }
                ?>
                </div>
              </form>
            </div><!-- End Contact Form -->
          </div>
        </div>
      </div>
      <div class="row my-5">
        <div class="content col-sm-6 col-lg-8">
          <h4>Decryption:<i class="bi bi-arrow-right-circle-fill"></i></h4>
          <p>
          As we’ve seen earlier, the number of columns in rail fence cipher remains equal to the length of plain-text message. And the key corresponds to the number of rails.
            <ul>
              <li><i class="bi bi-chevron-right"></i>Hence, rail matrix can be constructed accordingly. Once we’ve got the matrix we can 
              figure-out the spots where texts should be placed (using the same way of moving diagonally up and down alternatively ).</li>
              <li><i class="bi bi-chevron-right"></i>Then, we fill the cipher-text row wise. After filling it, we traverse the matrix in 
              zig-zag manner to obtain the original text.</li>
            </ul>
          </p>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="row justify-content-center mt-4">
            <div class="box-title col-lg-9">
              <h6>Decode</h6>
              <form method="post" class="php-email-form">
                <div class="form-group mt-3">
                  <h3>Cipher Text:</h3>
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                
                <div class="text-center">
                    <button type="submit" name="decode-btn">Decode</button>
                </div>
                <!--<div class="text-center"><input type="submit" name="enode-btn" value="Encode"/></div>-->
                <div class="my-3">
                <?php
                  if($_SERVER['REQUEST_METHOD']==='POST'){
                    if(isset($_POST["decode-btn"])){
                      $input = $_POST['message'];
                      $message = "Decoded Message is:<br>" . decode($input,2);
                      echo "<div class='message'>".$message."</div>";
                    }
                  }
                ?>
                </div>
              </form>
            </div><!-- End Contact Form -->
          </div>
        </div>
      </div>
      <div class="row my-5">
        <div class="content col">
          <video autoplay muted loop>
            <source src="assets\vid\encrypt.mp4" type="video/mp4">
                Your browser does not support the video tag.
          </video><br><br>
          <h4>Time Complexity:<i class="bi bi-arrow-right-circle-fill"></i></h4>
          <p>O(row * col)</p>
          <h4>Auxiliary Space:<i class="bi bi-arrow-right-circle-fill"></i></h4>
          <p>O(row * col)</p> 
        </div>
      </div>
      <div class="row my-5">
      <div class="content col-6">
          <h4>Advantage :<i class="bi bi-arrow-right-circle-fill"></i></h4>
          <p>
            <ul>
              <li><i class="bi bi-chevron-right"></i>The advantage of the Rail Fence cipher over other transposition ciphers like the sawtooth cipher is that there is a variable distance between consecutive letters.</li>
              <li><i class="bi bi-chevron-right"></i>What we mean by variable distance is that
              the letters need not be arranged in fixed vertical columns that descends.</li>
              <li><i class="bi bi-chevron-right"></i>But it can also be arranged in a zig zag manner. Therefore, this increases the difficulty of cracking the code.</li>
            </ul>
          </p>
        </div>
        <div class="content col-6">
          <h4>Disadvantages:<i class="bi bi-arrow-right-circle-fill"></i></h4>
          <p>
            <ul>
              <li><i class="bi bi-chevron-right"></i>One of the problems that the rail fence cipher face is that the security of the code is
              dependant on the fact that a cryptanalyst does not know the method of encryption.</li>
              <li><i class="bi bi-chevron-right"></i>Hence, once the method of encryption is broken, the code is broken
              already.</li>
              <li><i class="bi bi-chevron-right"></i>Another problem with the rail fence cipher is that is not very strong. This means that
              the number of possible solutions are so small that a cryptanalyst can try them all by hand.</li>
              <li><i class="bi bi-chevron-right"></i>Therefore, the rail fence cipher is very easy to break as we only have to test all the possible divisors up to half the length of the text.</li>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        <strong><span>Team:</span><br></strong>
        Shreyas D. Chimote<br>
        Warad G. Dalal<br>
        Prathemesh I. Naik
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>