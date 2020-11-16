<div id="transferMoney" class="modal">
    <div class="modal-content">
        <span id="close" style="cursor: pointer;">&times;</span>
        <div class="transferModalTitle">
            <span>Make a transaction</span>
        </div>
        <div class="transferModalForm">
            <form method="POST">
                <select name="sender_name">
                    <option value="-1">Sender Name</option>
                    <option value="1">Parth</option>
                    <option value="1">Pratham</option>
                </select>
                <select name="receiver_name">
                    <option value="-1">Receiver Name</option>
                    <option value="1">Parth</option>
                    <option value="1">Pratham</option>
                </select>

                <input type="number" name="amount" placeholder="Amount">

                <button type="submit">Pay</button>
            </form>
        </div>
    </div>
</div>
<script>
    let transferMoneyModal = document.getElementById("transferMoney");
    let transferBtn = document.getElementById("transfer");
    let closeBtn = document.getElementById("close");

    transferBtn.onclick = function () {
        transferMoneyModal.style.display = "block";
    }

    closeBtn.onclick = function () {
        transferMoneyModal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target === transferMoneyModal) {
            transferMoneyModal.style.display = "none";
        }
    }
</script>