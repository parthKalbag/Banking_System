<div style="text-align: center;">
    <?php
        require_once "../mysql_connection.php";

        if (isset($_GET["id"])) {
            $sql = "SELECT * FROM users where user_id=" . $_GET["id"];

            $usersResult = $conn->query($sql);

            if ($usersResult->num_rows > 0) {
                while ($usersRow = $usersResult->fetch_assoc()) {
                    echo "<h4 style='font-size: 24px;color: #4F75E2;'>" . $usersRow["user_first_name"] . " " . $usersRow["user_last_name"] . "</h4>";
                    echo "<div style='text-align: center;'>";
                    echo "<table cellspacing='10' style='text-align: left;'> ";
                    echo "<tr>";
                    echo "<td style='color: #4F75E2;text-transform: uppercase;'>Account No: </td>";
                    echo "<td>" . $usersRow["user_id"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style='color: #4F75E2;text-transform: uppercase;'>Phone No: </td>";
                    echo "<td>" . $usersRow["user_phone_no"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style='color: #4F75E2;text-transform: uppercase;'>Email: </td>";
                    echo "<td>" . $usersRow["user_email"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style='color: #4F75E2;text-transform: uppercase;'>Address: </td>";
                    echo "<td>" . $usersRow["user_address"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style='color: #4F75E2;text-transform: uppercase;'>Current Balance: </td>";
                    echo "<td>" . $usersRow["current_balance"] . "</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</div>";
                }
            }
        }
    ?>
</div>
