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