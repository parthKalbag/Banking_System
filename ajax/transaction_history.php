<?php
    require_once "../mysql_connection.php";

    $sql = "SELECT * FROM transactions";
    $transactionResult = $conn->query($sql);

    if ($transactionResult->num_rows > 0) {

        while ($row = $transactionResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["transaction_id"] . "</td>";

            # Sender Result
            $senderSQL = "SELECT user_first_name, user_last_name from users where user_id=" . $row["sender_id"];
            $senderResult = $conn->query($senderSQL);

            if($senderResult->num_rows > 0) {
                while ($senderRow = $senderResult->fetch_assoc()) {
                    echo "<td>" . $senderRow["user_first_name"] . "</td>";
                }
            }
            # Receiver Result
            $receiverSQL = "SELECT user_first_name, user_last_name from users where user_id=" . $row["receiver_id"];
            $receiverResult = $conn->query($receiverSQL);

            if($receiverResult->num_rows > 0) {
                while ($receiverRow = $receiverResult->fetch_assoc()) {
                    echo "<td>" . $receiverRow["user_first_name"] . "</td>";
                }
            }

            echo "<td>" . $row["amount"] . "</td>";
            echo "<td>" . $row["transaction_date"] . "</td>";
            echo "<td style='display: flex; justify-content: center'>";
            echo "<a href='#'>";
            echo "<div><span>Repeat</span></div>";
            echo "<div><img src='images/redo-alt-solid.png' alt='' style='width: 20px; height: 20px;'></div>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
    }

    else {
        echo "<tr><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td></tr>";
    }

?>