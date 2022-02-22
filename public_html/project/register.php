<?php
require(__DIR__ . "/../../lib/functions.php");
?>
<form method="POST">
    <div>
        <label for="email"> Email </label>
        <input type="email" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="3" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" name="confirm" required minlength="3" />
    </div>
    <input type="submit" value="Register"/>
</form>

<?php
if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])){
    $email= se($_POST, "email" , "", false);
    $password =se($_POST, "password", "", false);
    $confirm= se($_POST, "confirm", "", false);

//TODO 3
$has_error=false;

if(empty($email)){
    echo "Email cannot be empty";
    $has_error=true;
}

//sanitize and validate
$email=filter_var($email, FILTER_SANITIZE_EMAIL);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid email address";
    $has_error=true;
}
if(empty ($password)){
    echo "Password must not be empty";
    $has_error=true;
}

if(empty($confirm)){
    echo "Confirm password must not be empty";
    $has_error=true;
}

if(strlen($password)<3){
    echo "Password too short";
    $has_error=true;
}

if( strlen($password)>0 && $password !== $confirm){
    echo "Password must not match";
    $has_error=true;
}

if(!$has_error){
    echo "Welcome, $email";
}
}
?>
   