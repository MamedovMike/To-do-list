<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Log In - To Do List</title>
    <link rel="stylesheet" href="../styles/style.css">
  </head>
  <body style="background-color: #ac1212;">
    <div><h1 class="header-h1">To Do List</h1></div>
    <div class="sign_in">
        <form action="sign_in_success.php" method="POST">
          <div class="acb"> <h2 class="hhh2">Log In</h2>
            <div><input type="email" name="email" placeholder="E-Mail" class="signinemail"></div>
            <div><input type="password" name="password" placeholder="Password" class="bdc"></div>
            <div><input type="submit" value="Log In" class="loggin"></div>
            </div>
            <div class="error_112">
              <?if(isset($_GET['status'])):?>
                  <? echo $_GET['status']; ?>
                  <? endif; ?>
            </div>
        </form>
    </div>
  </body>
</html>