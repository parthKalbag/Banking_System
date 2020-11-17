<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <!-- Local CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="images/favicon.ico" type="image/ico">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>The Sparks Foundation Bank</title>
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
                    <a class="nav-link active" href="index.php" id="home">Home</a>
                </li>
                <li>
                    <a class="nav-link" href="view_customers.php" id="view">View Customers</a>
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
                    <span class="main-content">Basic Banking System</span>
                </div>
                <div style="margin-top: 12px;">
                    <span class="sub-content">A Basic Banking System for making transactions between users</span>
                </div>
            </div>
            <div class="topContentImg">
                <img src="images/banking_homepage.jpg" alt="Banking">
            </div>
        </section>
        <section class="title">
            <span class="sub-title" style="font-size: 23px;">Our Services</span>
        </section>
        <section class="cards">
            <div class="card">
                <div>
                   <img src="images/transfer_money.JPG" alt="transfer money">
                </div>
                <div class="card-title">
                    <span>Transfer Money</span>
                </div>
                <div class="card-subtext">
                    <span>Transfer Money between multiple accounts</span>
                </div>
            </div>
            <div class="card">
                <div>
                    <img src="images/search-solid.png" alt="View Transactions">
                </div>
                <div class="card-title">
                    <span>View Transactions</span>
                </div>
                <div class="card-subtext">
                    <span>View all the past transactions happened between different accounts </span>
                </div>
            </div>
            <div class="card">
                <div>
                    <img src="images/users-solid%20(1).png" alt="transfer money">
                </div>
                <div class="card-title">
                    <span>View Customers</span>
                </div>
                <div class="card-subtext">
                    <span>View Customer data</span>
                </div>
            </div>
        </section>
    </main>
    <?php
        require_once "transfer_money.php";
    ?>
</body>
</html>
