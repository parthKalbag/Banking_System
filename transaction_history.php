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
    <!-- jQuery CDN -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Transaction History</title>
</head>
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
                    <a class="nav-link" href="view_customers.php" id="view">View Customers</a>
                </li>
                <li>
                    <a class="nav-link active" href="transaction_history.php" id="history">Transaction History</a>
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
            <li>
                <a class="nav-link" href="view_customers.php" id="view">View Customers</a>
            </li>
            <li class="activeSmallNav">
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
                    </tr>
                    </thead>
                    <tbody id="transactionHistory"></tbody>
                </table>
            </div>
        </section>
    </main>
        <?php
            require_once "transfer_money.php";
        ?>
    <script>
        $.ajax({
            url: "ajax/transaction_history.php",
            type: "POST",
            success: function (data) {
                $("#transactionHistory").html(data)
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