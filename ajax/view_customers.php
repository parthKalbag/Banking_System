<?php
require_once "../mysql_connection.php";

$sql = "SELECT * FROM users";
$customerDetails = $conn->query($sql);

if($customerDetails->num_rows > 0) {
    while($customerRow = $customerDetails->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $customerRow["user_id"] . "</td>";
        echo "<td>" . $customerRow["user_first_name"] . " " . $customerRow["user_last_name"]  . "</td>";
        echo "<td>" . $customerRow["user_email"] . "</td>";
        echo "<td>" . $customerRow["user_phone_no"] . "</td>";
        echo "<td>" . $customerRow["current_balance"] . "</td>";
        echo "<td style='display: flex; justify-content: center;'>";
        echo "<a style='cursor:pointer;' id='". $customerRow["user_id"] . "' class='submitBtn'>";
        echo "<div><span>View Data</span></div>";
        echo "<div><img src='images/external-link-alt-solid.png' alt='' style='width: 20px; height: 20px;'></div>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
    }
}

else {
    echo "<tr><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td></tr>";
}
?>