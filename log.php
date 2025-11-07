<?php
session_start();

// Database connection setup
$host = 'localhost';
$dbname = 'user_auth';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("<div style='color:red; text-align:center; margin-top:20px;'>Connection failed: " . $e->getMessage() . "</div>");
}

$message = "";

// Handle Sign Up
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup"])) {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $pass = $_POST["password"];

    if (!empty($name) && !empty($email) && !empty($pass)) {
        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hashed]);
            $message = "<div style='color:green; text-align:center;'>Account created successfully! Please sign in.</div>";
        } catch (PDOException $e) {
            $message = "<div style='color:red; text-align:center;'>Email already exists!</div>";
        }
    } else {
        $message = "<div style='color:red; text-align:center;'>Please fill all fields!</div>";
    }
}

// Handle Sign In
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signin"])) {
    $email = trim($_POST["email"]);
    $pass = $_POST["password"];

    if (!empty($email) && !empty($pass)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($pass, $user['password'])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            header("Location: homepage.html"); // redirect after successful login
            exit();
        } else {
            $message = "<div style='color:red; text-align:center;'>Invalid credentials!</div>";
        }
    } else {
        $message = "<div style='color:red; text-align:center;'>Please enter both email and password!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modern Login Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
*{margin:0;padding:0;box-sizing:border-box;font-family:'Montserrat',sans-serif;}
body{
    background: linear-gradient(to right, #b19cd9, #cbb4e3);
    display:flex;align-items:center;justify-content:center;flex-direction:column;height:100vh;
}
.container{
    background-color:#fff;border-radius:30px;box-shadow:0 5px 15px rgba(0,0,0,0.35);
    position:relative;overflow:hidden;width:768px;max-width:100%;min-height:480px;
}
.container p{font-size:14px;line-height:20px;margin:20px 0;}
.container span{font-size:12px;}
.container a{color:#333;font-size:13px;text-decoration:none;margin:15px 0 10px;}
.container button{
    background-color:#6a0dad;color:#fff;font-size:12px;padding:10px 45px;border:none;border-radius:8px;
    font-weight:600;text-transform:uppercase;margin-top:10px;cursor:pointer;
}
.container button.hidden{background-color:transparent;border:1px solid #fff;}
.container form{
    background-color:#fff;display:flex;align-items:center;justify-content:center;flex-direction:column;
    padding:0 40px;height:100%;
}
.container input{
    background-color:#eee;border:none;margin:8px 0;padding:10px 15px;font-size:13px;border-radius:8px;width:100%;
}
.form-container{position:absolute;top:0;height:100%;transition:all 0.6s ease-in-out;}
.sign-in{left:0;width:50%;z-index:2;}
.container.active .sign-in{transform:translateX(100%);}
.sign-up{left:0;width:50%;opacity:0;z-index:1;}
.container.active .sign-up{
    transform:translateX(100%);opacity:1;z-index:5;animation:move 0.6s;
}
@keyframes move{
    0%,49.99%{opacity:0;z-index:1;}
    50%,100%{opacity:1;z-index:5;}
}
.social-icons{margin:20px 0;}
.social-icons a{
    border:1px solid #ccc;border-radius:20%;display:inline-flex;justify-content:center;align-items:center;
    margin:0 3px;width:40px;height:40px;color:#6a0dad;
}
.toggle-container{
    position:absolute;top:0;left:50%;width:50%;height:100%;overflow:hidden;
    transition:all 0.6s ease-in-out;border-radius:150px 0 0 100px;z-index:1000;
}
.container.active .toggle-container{transform:translateX(-100%);border-radius:0 150px 100px 0;}
.toggle{
    background:linear-gradient(to right,#7e57c2,#6a0dad);color:#fff;position:relative;left:-100%;
    width:200%;height:100%;transition:all 0.6s ease-in-out;
}
.container.active .toggle{transform:translateX(50%);}
.toggle-panel{
    position:absolute;width:50%;height:100%;display:flex;align-items:center;justify-content:center;
    flex-direction:column;padding:0 30px;text-align:center;transition:all 0.6s ease-in-out;
}
.toggle-left{transform:translateX(-200%);}
.container.active .toggle-left{transform:translateX(0);}
.toggle-right{right:0;transform:translateX(0);}
.container.active .toggle-right{transform:translateX(200%);}
</style>
</head>
<body>
<?= $message ?>
<div class="container" id="container">
    <div class="form-container sign-up">
        <form method="POST">
            <h1>Create Account</h1>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>or use your email for registration</span>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in">
        <form method="POST">
            <h1>Sign In</h1>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>or use your email password</span>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <a href="#">Forgot Your Password?</a>
            <button type="submit" name="signin">Sign In</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Welcome Back!</h1>
                <p>Enter your personal details to use all of site features</p>
                <button class="hidden" type="button" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Hello, Friend!</h1>
                <p>Register with your personal details to use all of site features</p>
                <button class="hidden" type="button" id="register">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script>
const container = document.getElementById('container');
document.getElementById('register').addEventListener('click',()=>container.classList.add("active"));
document.getElementById('login').addEventListener('click',()=>container.classList.remove("active"));
</script>
</body>
</html>
