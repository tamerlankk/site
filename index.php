<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<!-- contact.html  21 Nov 2019 04:05:04 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Добро пожаловать</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="login-brand">
              Добро пожаловать
            </div>
            <div class="card card-primary">
              <div class="row m-0">
                <div class="col-12 col-md-12 col-lg-6 p-0">
                  <div class="card-body">
                      <form action="hash.php" method="POST">
                        <div class="form-group floating-addon">
                          <!-- <label style="font-size:23px">Номер для шифрования </label> -->
                          <div class="input-group">
                          
                            <input id="phone" type="text" class="form-control" name="phoneNumber" value="<?php echo $_SESSION['phoneNumber'] ?? '' ?>" autofocus>
                          </div>
                        </div>
                        <div class="form-group floating-addon">
                          <!-- <label style="font-size:23px">Шифрованный номер</label> -->
                          <div class="input-group">
                           
                            <input id="encryptedNumber" type="text" disabled class="form-control" name="encryptedNumber" value="<?php echo $_SESSION['encryptedPhoneNumber'] ?? '' ?>">
                          </div>
                        </div>
                      
                        <div class="form-group text-right">
                          <button type="submit" id="encryptBtn" class="btn btn-round btn-lg btn-primary">
                            Далее 
                          </button>
                        </div>
                      </form>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 p-0">
                  <div class="card-body">
                    <form action="hash.php" method="POST">
                        <div class="form-group floating-addon">
                          <!-- <label style="font-size:23px">Код для дешифрования </label> -->
                          <div class="input-group">
                            
                            <input id="phone2" value="<?php echo $_SESSION['code'] ?? '' ?>" type="text" class="form-control" name="code" autofocus>
                          </div>
                        </div>
                        <div class="form-group floating-addon">
                          <!-- <label style="font-size:23px">Дешифрованный номер</label> -->
                          <div class="input-group">
                            
                            <input id="encryptedNumber" type="text" disabled class="form-control" value="<?php echo $_SESSION['decryptedNumber'] ?? '' ?>">
                          </div>
                        </div>
                        <div class="form-group text-right">
                          <button type="submit" id="encryptBtn" class="btn btn-round btn-lg btn-primary">
                            Далее 
                          </button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php 
  
   unset($_SESSION['encryptedPhoneNumber']);
   unset($_SESSION['decryptedNumber']);
   unset($_SESSION['phoneNumber']);
   unset($_SESSION['code']);

  ?>


  <!-- General JS Scripts -->
  <!-- <script src="assets/js/app.min.js"></script> -->
 
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <!-- <script src="assets/js/custom.js"></script> -->
  <script>
    $(document).ready(function() {
      $('#phone').mask('+99999999999');
      $('#phone2').mask('+99999999999');
    });
  </script>
</body>
</html>