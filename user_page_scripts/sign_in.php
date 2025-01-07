<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign In</title>
    <link rel="stylesheet" href="../styles/style.css">
  </head>
  <body>
    <div class="sign_in">
      <h1>Sign In</h1>
        <form action="sign_in_success.php" method="POST">
            <div>Enter E-Mail:<input type="email" name="email"></div>
            <div>Enter Password:<input type="password" name="password"></div>
            <div><input type="submit" value="Sign In"></div>
            <?if(isset($_GET['status'])):?>
                <? echo $_GET['status']; ?>
                <? endif; ?>
        </form>
    </div>
  </body>
</html>