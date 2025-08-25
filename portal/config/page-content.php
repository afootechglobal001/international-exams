<?php if ($page == 'signupOtp') { ?>
<div class="caption-div animated fadeIn">
    <div class="caption-title-div">
        <div class="title-div">
            <div class="icon-div"><i class="bi bi-shield-lock-fill"></i></div>
            <h3>OTP</h3>
        </div>
        <div class="btn-div">
            <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                <i class="bi bi-x-lg"></i> Close
            </button>
        </div>
    </div>
    <!-- /////////// Title ////////////////////////////// -->
    <div class="caption-notification">
        <p>Hi, an OTP have been sent to your email address <strong>(<?php echo $id ?>)</strong>. Kindly enter the OTP to
            proceed</p>
    </div>
    <div class="caption-body">
        <div class="text_field_container" id="otp_container">
            <script>
            textField({
                id: 'otp',
                title: 'Enter OTP here',
            });
            </script>
        </div>
        <div class="btn-div">
            <button class="btn" id="proceedBtn" onclick="_verifyUserEmail();">PROCEED <i
                    class="bi bi-arrow-right"></i></button>
        </div>
    </div>
</div>
<?php } ?>