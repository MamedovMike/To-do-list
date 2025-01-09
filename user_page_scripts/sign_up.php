<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign Up - To Do List</title>
    <link rel="stylesheet" href="../styles/style.css">
  </head>
  <body style="width:100%; margin: 0px; background-color: #052659;"> 
    <div class="header">
      <h1>To Do List</h1>
    </div>
    <div class="sign_up">
        <form action="sign_up_success.php" method="POST" enctype="multipart/form-data">
          
          <div class="krasota"><h2 class="hh2">Sign Up</h2> 
            <div><input type="text" name="username" placeholder="Username" class="username"></div>
            <div><input type="email" name="email" placeholder="E-Mail" class="email"></div>
            <div><input type="password" name="password" placeholder="Create Password" class="pass"></div>
            <div><input type="password" name="retype_pass" placeholder="Retype Password" class="pass_ret"></div>
            <div><input type="file" name="avatar" style="width: 87%;"></div>
            <div><input type="submit" value="Sign Up" class="signup"></div>
          </div>
        </form>
      </div>
      <div class="error">
        <?if(isset($_GET['status'])):?>
            <? echo $_GET['status']; ?>
            <? endif; ?>
      </div>
    </body>
</html>


