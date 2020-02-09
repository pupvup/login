<?php
    session_start();
    $link = mysqli_connect("localhost", "id11954195_uzer", "uzeruzer", "id11954195_first");
    if (mysqli_connect_error())
        die ("Connection: [KO]");

    if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST))
    {
        if ($_POST['email'] == '')
            echo '<p style: color = red;>Email address is required!</p>';
        else if ($_POST['password'] == '')
            echo '<p style: color = red;>Password is required!</p>';
        else {
            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0)
                echo "<p style: color = red;>Email is taken!</p>";
            else
            {
                $query = "INSERT INTO users (email, pass, nickname) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."', '')";
                
                if (mysqli_query($link, $query)) {
                    $_SESSION['email'] = $_POST['email'];
                    header("Location: session.php");
                } else {
                    echo "<p style: color = red;>[KO]</p>";
                    printf("<p>msg: %s\n</p>", mysqli_error($link));
                }
            }
        }
    }
?>
<html>
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="style_form.css">
        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="header">
            Current webpage simply represents my first login-form webpage.
        </div>
        <form method="post">
            <p>To continue just Log In to the system:</p>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" class="field" placeholder="Email Address">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" class="field" placeholder="Password">
            <button type="submit">Log In</button>
        </form>
    </body>
</html>