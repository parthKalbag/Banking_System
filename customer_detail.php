<div id="customer_detail" class="modal">
    <div class="modal-content">
        <div>
            <span id="closeDetail" style="cursor: pointer;">&times;</span>
        </div>
        <div class="modalMainContent">
            <section class="sparksImg">
                <img src="images/TSF_logo.png" alt="TSF">
            </section>
            <section class="customerDetails">
                <h4>Parth Kalbag</h4>
                <div>
                    <table cellspacing="10">
                        <tr>
                            <th>Account No:-</th>
                            <td>104353453465</td>
                        </tr>
                        <tr>
                            <th>Phone No:-</th>
                            <td>104353453465</td>
                        </tr>
                        <tr>
                            <th>Email ID:-</th>
                            <td>104353453465</td>
                        </tr>
                        <tr>
                            <th>Address:-</th>
                            <td>104353453465</td>
                        </tr>
                    </table>
                </div>
                <button id="transact-send">Send Money</button>
            </section>
        </div>
    </div>
</div>
<script>
    let customerDetailModal = document.getElementById("customer_detail");
    let closeCustomerDetailBtn = document.getElementById("closeDetail");
    let transactBtnFromDetail = document.getElementById("transact-send");

    closeCustomerDetailBtn.onclick = function () {
        customerDetailModal.style.display = "none";
    }

    transactBtnFromDetail.onclick = function () {
        customerDetailModal.style.display = "none";
        transferMoneyModal.style.display = "block";
    }

    window.onclick = function (event) {
        if (event.target === customerDetailModal) {
            customerDetailModal.style.display = "none";
        }
    }
</script>