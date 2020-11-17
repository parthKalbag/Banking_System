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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
                    <tbody id="customer_data"></tbody>
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

        $.ajax({
            url: "ajax/view_customers.php",
            type: "POST",
            success: function (data) {
                $("#customer_data").html(data)
            }
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
    </script>
</body>
</html>