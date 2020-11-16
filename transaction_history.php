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
                    <tr>
                        <td>12345</td>
                        <td>Parth Kalbag</td>
                        <td>Pratham Kalbag</td>
                        <td>10000</td>
                        <td>2020-02-01</td>
                        <td style="display: flex; justify-content: center">
                            <a href="#">
                                <div>
                                    <span>Repeat</span>
                                </div>
                                <div>
                                    <img src="images/redo-alt-solid.png" alt="" style="width: 20px; height: 20px">
                                </div>
                            </a>
                        </td>
                    </tr>
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