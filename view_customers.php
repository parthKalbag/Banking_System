<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <!-- Local CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/view_customers.css">
    <link rel="stylesheet" href="css/customer_detail.css">
    <!-- Icon for title -->
    <link rel="icon" href="images/favicon.ico" type="image/ico">
    <title>View Customers</title>
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
                    <a class="nav-link active" href="view_customers.php" id="view">View Customers</a>
                </li>
                <li>
                    <a class="nav-link" href="transaction_history.php" id="history">Transaction History</a>
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
                    <span class="main-content">View Customers</span>
                </div>
                <div style="margin-top: 12px;">
                    <span class="sub-content">View the data of the customers present in the database</span>
                </div>
            </div>
            <div class="topContentImg">
                <img src="images/banking_homepage.jpg" alt="Banking">
            </div>
        </section>
        <section class="mainContent">
            <div class="inputClass">
                <div>
                    <div>
                        <img src="images/search-solid.png" alt="" style="opacity: 65%; margin-left: 5px;">
                    </div>
                    <div>
                        <input type="text" placeholder="Search by Name...">
                    </div>
                </div>
            </div>
            <div class="tableContent">
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>Current Balance</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "mysql_connection.php";

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
                                    echo "<a href='#' onclick='openCustomerModal()'>";
                                    echo "<div><span>View Data</span></div>";
                                    echo "<div><img src='images/external-link-alt-solid.png' alt='' style='width: 20px; height: 20px;'></div>";
                                    echo "</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }

                            else {
                                echo "No Results Found";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <?php
        require_once "transfer_money.php";
    ?>
    <?php
        require_once "customer_detail.php";
    ?>
<script>
    function openCustomerModal() {
        document.getElementById("customer_detail").style.display = "block";
    }
</script>
</body>
</html>