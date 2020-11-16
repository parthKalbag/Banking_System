<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <!-- Local CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/view_customers.css">
    <!-- Icon for title -->
    <link rel="icon" href="images/favicon.ico" type="image/ico">
    <title>Transaction History</title>
</head>
<body>
    <nav>
        <section class="brand">
            <div>
                <img src="images/TSF_logo.png" id="brand-logo" alt="Sparks Foundation">
            </div>
            <div>
                <span>The Sparks Foundation Bank</span>
            </div>
        </section>
        <section>
            <ul class="nav-links">
                <li>
                    <a class="nav-link" href="index.php" id="home1">Home</a>
                </li>
                <li>
                    <a class="nav-link" href="view_customers.php" id="view">View Customers</a>
                </li>
                <li>
                    <a class="nav-link active" href="#" id="history">Transaction History</a>
                </li>
                <li>
                    <a class="nav-link" href="#" id="transfer">Transfer Money</a>
                </li>
            </ul>
        </section>
    </nav>
    <main>
        <section class="topContent">
            <div>
                <div>
                    <span class="main-content">Transaction History</span>
                </div>
                <div style="margin-top: 12px;">
                    <span class="sub-content">View all debit and credit transactions happened</span>
                </div>
            </div>
            <div class="topContentImg">
                <img src="images/banking_homepage.jpg" alt="Banking">
            </div>
        </section>
        <section class="mainContent">
            <div class="tableContent">
                <table cellspacing="0">
                    <thead>
                    <tr>
                        <th>Transaction Id</th>
                        <th>Sender Name</th>
                        <th>Receiver Name</th>
                        <th>Amount</th>
                        <th>Transaction Date</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "mysql_connection.php";

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
                                    $receiverResult = $conn->query($senderSQL);

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
                                echo "No Transactions Found";
                            }

                            $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <?php
    require_once "transfer_money.php";
    ?>
</body>
</html>