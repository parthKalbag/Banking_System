<div id="customer_detail" class="modal">
    <div class="modal-content">
        <span id="closeDetail" style="cursor: pointer;">&times;</span>
    </div>
</div>
<script>
    let transferMoneyModal = document.getElementById("customer_detail");
    let transferBtn = document.getElementById("transfer");
    let closeBtn = document.getElementById("closeDetail");

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