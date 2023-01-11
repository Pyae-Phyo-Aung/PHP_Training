<?php
session_start();
if (!$_SESSION['username']) {
    header("location:login.php");
}
include_once "header.php";
?>
    <!--/.header -->
    <section class="sec-welcome">
        <div class="l-inner">
            <h2 class="welcome">Welcome to our webiste.</h2>
        </div>
    </section>
    <!--/.sec-welcome -->
</body>

</html>
