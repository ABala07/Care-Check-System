<?php 
require_once 'php/connection.php';
require_once 'php/function.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style type="text/css">
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>ser
</head>
<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-secondary">
      <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">Ellecom</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Contacts</a>
          </li>
      </ul>
  </div>
</div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-6 p-5 bg-dark text-white">
            <div class="row">
                <div class="col-6">
                    <img width="70%" class="img-fluid" src="image/saat-1.png">
                </div>
                <div class="col-6">
                    <h5>Fitbit saati burada bu şekilde ekstra yazılarla burada şeyler yazılacak.</h5>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed posuere hendrerit consequat. In suscipit tortor fringilla sagittis placerat. Quisque pretium hendrerit justo eget pellentesque. Vestibulum varius, quam in faucibus faucibus, lorem sem iaculis lorem, quis gravida velit lacus a mi. In tempor scelerisque pharetra.</p>
                </div>
            </div>
        </div>
        <div class="col-6 p-5 bg-light text-dark">
            <?php 
            if($login == 0){
             ?>
             <h4 class="text-center">Giriş Yap</h4>
             <form action="index.php" method="POST">
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Şifre</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <div id="emailHelp" class="form-text">Kullanıcı adı ve şifrenizi kimseyle paylaşmayınız.</div>
            </div>
            <button type="submit" name="girisyap" class="btn btn-primary">Giriş Yap</button>
        </form>
    <?php } else {
        welcome_message($a_name,$a_surname);
        ?>
        <div>

        </div>
        <div class="row mt-5">
            <?php
            if($a_admin == 1){
                ?>
                <div class="col-3 d-grid gap-2">
                    <a class="btn btn-dark" href="/admin.php">Admin Panel</a>
                </div>
            <?php }
            ?>
            <div class="col-2 d-grid gap-2">
                <a class="btn btn-danger" href="/logout.php">Log Out</a>
            </div>
        <?php } 
        ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<?php 

if(isset($_POST['girisyap'])){
    if(isset($_POST['username']) AND isset($_POST['password'])){
        $username = $_POST['username'];
        $password =$_POST['password'];

        $query = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");

        if(mysql_num_rows($query)>0){

            while($account = mysql_fetch_array($query)){
                $_SESSION['login'] = 1;
                $_SESSION['username'] = $username;
            }

        } else {
            //KULLANICI ADI YADA ŞİFRE YANLIŞ
        }

    } else{
        //BOŞ ALAN VAR
    }

    header("Location:index.php");
}
?>
