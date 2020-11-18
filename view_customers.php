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
    <!-- jQuery CDN -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>View Customers</title>
</head>
<style>
    a.submitBtn {
        display: flex;
        background: rgba(79,117,226, 0.77);
        border: 1px solid rgba(79,117,226, 0.77);
        align-items: center;
        border-radius: 80px;
        justify-content: space-around;
        text-decoration: none;
        color: white;
        width: 73%;
        padding: 5px;
    }
</style>
<body>
    <nav id="largeNav">
        <section class="brand">
            <div>
                <img src="images/TSF_logo.png" id="brand-logo" alt="Sparks Foundation">
            </div>
            <div>
                <span>The Sparks Foundation Bank</span>
            </div>
        </section>
        <section id="bigNavLinks">
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
        <section id="toggler-btn">
            <img src="images/bars-solid.png" alt="toggle" style="height: 30px;margin-right: 20px;">
        </section>
    </nav>
    <nav id="smallNav">
        <ul class="smallNavList">
            <li>
                <a class="nav-link" href="index.php" id="home1">Home</a>
            </li>
            <li class="activeSmallNav">
                <a class="nav-link" href="view_customers.php" id="view">View Customers</a>
            </li>
            <li>
                <a class="nav-link" href="transaction_history.php" id="history">Transaction History</a>
            </li>
            <li>
                <a class="nav-link" href="#" id="transferSmallNav">Transfer Money</a>
            </li>
        </ul>
    </nav>
    <main>
        <section class="topContent">
            <div class="mainHeading">
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
                    <tbody id="customer_data">
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
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <?php
        require_once "transfer_money.php";
    ?>

    <!-- Customer Detail Modal -->

    <div id="customer_detail" class="modal">
        <div class="modal-content">
            <div>
                <span id="closeDetail" style="cursor: pointer;">&times;</span>
            </div>
            <div class="modalMainContent">
                <section class="sparksImg">
                    <img src="images/TSF_logo.png" alt="TSF">
                </section>
                <section id="customerDetails">
                    <div>
                        <h4>Parth Kalbag</h4>
                        <div>
                            <table cellspacing="10" style="text-align: left;">
                                <tr>
                                    <th>Account No:-</th>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <th>Phone No:-</th>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <th>Email ID:-</th>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <th>Address:-</th>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <th>Current Balance:-</th>
                                    <td>NA</td>
                                </tr>
                            </table>
                        </div>
                        <button id="transact-send">Send Money</button>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>

        $(".submitBtn").on("click", function () {
            $("#customer_detail").css('display', 'block');
            $.ajax({
                url: "ajax/customer_detail.php?id=" + this.id,
                type: "POST",
                success: function (data) {
                    $("#customerDetails").html(data);
                }
            })
        })


        $("#closeDetail").on("click", function () {
            $("#customer_detail").css("display", "none");
        })

        $("#transact-send").on("click", function () {
            $("#customer_detail").css("display", "none");
            $("#transferMoney").css("display", "block");
        })

        $(window).on("click", function (event) {
            let target = $(event.target);
            if (target.is("#customer_detail")) {
                $("#customer_detail").css("display", "none");
            }
        })

        $("#toggler-btn").on("click", function () {
            let nav = $("#smallNav");
            let smallNavDisplay = nav.css("display");
            let widthOfBrowser = window.innerWidth;

            if (smallNavDisplay === "none" && widthOfBrowser <= 798) {
                nav.css("display", "block");
            }


            else if (smallNavDisplay === "block" && widthOfBrowser <= 798) {
                nav.css("display", "none");
            }
        })

    </script>
</body>
</html>