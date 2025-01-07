<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="../styles/style.css">
  </head>
  <body> 
    <div class="sign_up">
        <form action="sign_up_success.php" method="POST">
            <div>Enter Username:<input type="text" name="username"></div>
            <div>Enter E-Mail:<input type="email" name="email"></div>
            <div>Create Password:<input type="password" name="password"></div>
            <div>Retype Password:<input type="password" name="retype_pass"></div>
            <div><input type="submit" value="Sign Up"></div>
            <?if(isset($_GET['status'])):?>
                <? echo $_GET['status']; ?>
                <? endif; ?>
        </form>
    </div>
  </body>
</html>


