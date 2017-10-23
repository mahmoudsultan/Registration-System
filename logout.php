<?php
    session_start();
    unset($_SESSION['usersession']);
    unset($_SESSION['username']);
?>
<?php
    require_once "setup.php";
    include "views/_header.php";
?>
<div class="alert alert-success">
    You've logged out successfully.. redirecting to homepage..
</div>

<script>
    setTimeout(function() {
        window.location.href = '/index.php';
    }, 1000);
</script>

<?php
    include "views/_footer.html";
?>