<?php
    include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">


            <?php
            include_once 'includes/dbh.inc.php';

            if(isset($_SESSION['u_id'])){
                $sql = "SELECT id, firstname, lastname, email, country, city, age 
                        FROM users";
                $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 1) {
                        // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($_SESSION['u_id'] == $row["id"]) {
                                echo "FirstName: " . $row["firstname"] . "<br>" .
                                    "LastName: " . $row["lastname"] . "<br>" .
                                    "Email: " . $row["email"] . "<br>" .
                                    "Country: " . $row["country"] . "<br>" .
                                    "City: " . $row["city"] . "<br>" .
                                    "Age: " . $row["age"] . "<br>";
                            }
                        }
                    }

            } else echo '<image src="stranger.gif" class="ima"></image>';
            ?>

        </div>
    </section>


<?php
include_once 'footer.php';
?>