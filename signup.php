<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
    <link rel = "stylesheet" type = "text/css" href = "signup.css" />
    <script src="signup.js"></script>
</head>
    <body>
        <div id="login-box" >
              <h1 align="center">Sign Up</h1>
              <form name="myform" action="signup.php" method="post" onsubmit = "return validateForm()" />
              <input type="text" class= "center-block" name="username" placeholder="Username"  required />
              <input type="text" class= "center-block" name="email" placeholder="E-mail"  required />
              <input type="password" class= "center-block" name="password1" placeholder="Password"  required />
              <input type="password" class= "center-block" name="password2" placeholder="Retype password"  required/>
              <input type="submit" class= "center-block" name="signup_submit" value="Sign Up" />
              </form>
            </div>
            
            
            <?php
                include "db.php";
                $username = $_POST["username"];
                $email = $_POST["email"];
                $pass = password_hash($_POST["password1"], PASSWORD_BCRYPT);

                $extract_sql = "select * from user_data;";
                $sql = "INSERT INTO user_data (UserName,Email,passW) values ('$username','$email','$pass');";
                

                $result = mysqli_query($conn,$extract_sql);
                $i=0;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $mail= $row["Email"];
                    $uname = $row['UserName'];
                    if($mail==$email || $uname == $username){
                        $i++;
                    }
                }
                if($i>0){
                    echo '<script>alert("Username or Email already registered")</script>';
                    return;
                }
                 
                if (mysqli_query($conn, $sql)) {
                    echo '<script>alert("Sucessfully signed up")</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                
                mysqli_close($conn); 
            ?>
            
    </body>
    
</html>    
