<?php
    include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>Home</h2>
            <?php
            if(isset($_SESSION['u_id'])){
                echo $_SESSION['u_uid'];
            } else echo '<image src="stranger.gif" class="ima"></image>';
            ?>

        </div>
    </section>


<?php
include_once 'footer.php';
?>
