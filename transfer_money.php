<div id="transferMoney" class="modal">
    <div class="modal-content">
        <span id="close" style="cursor: pointer;">&times;</span>
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