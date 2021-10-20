<!-- contains only navbar -->
<link rel="stylesheet" href="base.css">

<?php

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    echo '
    <nav id="mynav" class="navbar fixed-top navbar-expand-lg navbar-dark nav-bg">
    <div class="container-fluid">

        <i class="bi bi-tropical-storm icon-green"></i>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-4" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            </ul>
           
        </div>
        <div id="navbarLogin" class="mx-4">
                <a href="dashboard.php" type="button" class="btn btn-outline-light">Welcome '.$_SESSION['name'].'</a>
                <a role="button" class="btn btn-outline-danger" href="logout.php">Logout</a>
            </div>
    </div>
</nav>
<br><br>
';

}
else
{
    echo'
    <nav id="mynav" class="navbar fixed-top navbar-expand-lg navbar-dark nav-bg">
    <div class="container-fluid">

        <i class="bi bi-tropical-storm icon-green"></i>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-4" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
           
        </div>
        <div id="navbarLogin" class="mx-4">
                <a role="button" class="btn btn-outline-success" style="color: rgb(123, 255, 123);" href="login.php">LogIn </a>
                <a role="button" class="btn btn-outline-warning" href="signup.php">SignUp</a>
            </div>
    </div>
</nav>
<br><br>
';
}

?>


