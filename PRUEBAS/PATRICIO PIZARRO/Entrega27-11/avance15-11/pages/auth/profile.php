<?php
    include("database/auth.php");
?>

<div class="container mt-5">
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>This is your profile page.</p>
</div>