<?php
    require_once "mysql_connection.php";

    error_reporting(0);
    $senderID = $_POST["sender_id"] ?? -1;
    $receiverID = $_POST["receiver_id"] ?? -1;
    $amount = $_POST["amount"] ?? -1;

    if ($senderID !== -1 and $receiverID !== -1 and $amount > 0) {
        $senderSQL = "SELECT current_balance from users where user_id=" . $senderID;
        $receiverSQL = "SELECT current_balance from users where user_id=" . $receiverID;

        $senderDetails = $conn->query($senderSQL);
        $receiverDetails = $conn->query($receiverSQL);

        if ($senderDetails->num_rows > 0) {
            while ($senderDetailRow = $senderDetails->fetch_assoc()) {
                $senderCurrentAmount = $senderDetailRow["current_balance"];

                if ($amount <= $senderCurrentAmount) {
                    try {
                        $conn->begin_transaction();
                        $senderNewBalance = $senderCurrentAmount - $amount;
                        $receiverCurrentBalance = 0;

                        if($receiverDetails->num_rows > 0) {
                            while($receiverDetailRow = $receiverDetails->fetch_assoc()) {
                                $receiverCurrentBalance = $receiverDetailRow["current_balance"];
                            }
                        }

                        $receiverNewBalance = $receiverCurrentBalance + $amount;

                        $senderUpdateQuery = "UPDATE users set current_balance=" . $senderNewBalance . " WHERE user_id=" . $senderID;
                        $receiverUpdateQuery = "UPDATE users set current_balance=" . $receiverNewBalance . " WHERE user_id=" . $receiverID;

                        # Update in transactions table
                        $updateTransaction = "INSERT INTO transactions(sender_id, receiver_id, amount) values(". $senderID . "," . $receiverID . "," . $amount . ")";

                        # Execute the transaction
                        $conn->query($senderUpdateQuery);
                        $conn->query($receiverUpdateQuery);
                        $conn->query($updateTransaction);

                        $conn->commit();

                    }
                    catch (Throwable $e) {
                        $conn->rollback();
                    }
                }
            }
        }
    }
?>

<div id="transferMoney" class="modal">
    <div class="modal-content">
        <span id="close" style="cursor: pointer;">&times;</span>
        <div class="transferModalTitle">
            <span>Make a transaction</span>
        </div>
        <div class="transferModalForm">
            <form method="POST">
                <select name="sender_id">
                    <option value="-1">Sender Name</option>
                    <?php
                        require_once "mysql_connection.php";

                        $sql = "SELECT user_id, user_first_name, user_last_name FROM users";
                        $senderDetails = $conn->query($sql);

                        if ($senderDetails->num_rows > 0) {
                            while ($senderDetailsRow = $senderDetails->fetch_assoc()) {
                                echo "<option value='" . $senderDetailsRow["user_id"] . "'>" . $senderDetailsRow["user_first_name"] . " " . $senderDetailsRow["user_last_name"] . "(" . $senderDetailsRow["user_id"] . ")" . "</option>";
                            }
                        }
                    ?>
                </select>
                <select name="receiver_id">
                    <option value="-1">Receiver Name</option>
                    <?php
                        require_once "mysql_connection.php";

                        $sql = "SELECT user_id, user_first_name, user_last_name FROM users";
                        $receiverDetails = $conn->query($sql);

                        if ($receiverDetails->num_rows > 0) {
                            while ($receiverDetailsRow = $receiverDetails->fetch_assoc()) {
                                echo "<option value='" . $receiverDetailsRow["user_id"] . "'>" . $receiverDetailsRow["user_first_name"] . " " . $receiverDetailsRow["user_last_name"] . "(" . $receiverDetailsRow["user_id"] . ")" . "</option>";
                            }
                        }

                        $conn->close();
                    ?>
                </select>
                <input type="number" name="amount" placeholder="Amount">
                <button type="submit">Pay</button>
            </form>
        </div>
    </div>
</div>
<script>
    $("#transfer").on("click", function() {
        $("#transferMoney").css("display", "block");
    })

    $("#close").on("click", function() {
        $("#transferMoney").css("display", "none");
    })

    $("#transferSmallNav").on("click", function () {
        $("#transferMoney").css("display", "block");
    })

    $(window).on("click", function (event) {
        let target = $(event.target);
        if (target.is("#transferMoney")) {
            $("#transferMoney").css("display", "none");
        }
    })
</script>