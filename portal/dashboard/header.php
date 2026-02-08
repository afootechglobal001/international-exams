<?php include '../alert.php' ?>

<!-- Header -->

<header class="header-div animated fadeInDown">
    <div class="header-div-in">
        <div class="header-left-div">
            <div class="logo-div">
                <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="International Exam Logo" />
            </div>
            <div class="country-logo">
                <img id="countryFlag" src="<?php echo $websiteUrl ?>/uploaded_files/countryFlag/nigeriaFlag.jpg"
                    alt="Flag" />
                <script>
                $("#countryFlag").prop("src", "<?php echo $websiteUrl; ?>/uploaded_files/countryFlag/" + userLoginData
                    .countryFlag);
                </script>
            </div>
            <p>Hi, <span id="headerFirstName">
                    <script>
                    $("#headerFirstName").html(capitalizeFirstLetterOfEachWord(userLoginData.firstName));
                    </script>
                </span>
            </p>
        </div>

        <div class="header-right-div">
            <div class="notification-div"
                onclick="_getForm({page: 'notifications', url: portalOperationMiddlewareUrl});">
                <i class="bi bi-bell icons" title="Notifications"></i>
            </div>
            <div class="profile-pic-div" title="Profile Picture" onclick="_toggleProfileDiv()">
                <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="User Profile Picture">
                <div class="toggle">
                    <div class="toggle-in">
                        <div class="toggle-title">
                            <div class="dp" id="loginProfileName">
                                <script>
                                $("#loginProfileName").html(getFirstLettersOfEachWord(userLoginData.fullName));
                                </script>
                            </div>
                            <div class="text">
                                <h2 id="loginUserFullname">
                                    <script>
                                    $("#loginUserFullname").html(userLoginData.fullName);
                                    </script>
                                </h2>
                                <p id="loginUserEmail">
                                    <script>
                                    $("#loginUserEmail").html(userLoginData.emailAddress);
                                    </script>
                                </p>
                                <p id="loginUserPhone">
                                    <script>
                                    $("#loginUserPhone").html(userLoginData.phoneNumber);
                                    </script>
                                </p>
                            </div>
                        </div>

                        <ul>
                            <li title="Dashboard" onclick="_getActivePage({page:'dashboard', divid:'dashboard'});">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </li>
                            <li title="E-Books" onclick="_getActivePage({page:'ebook', divid:'ebook'});">
                                <i class="bi bi-filetype-pdf"></i> Download E-books
                            </li>
                            <li title="My Exams" onclick="_getActivePage({page:'exam', divid:'exam'});">
                                <i class="bi bi-journal-text"></i> My Registered Exams
                            </li>
                            <li title="Transactions History"
                                onclick="_getActivePage({page:'transactions', divid:'transactions'});">
                                <i class="bi bi-credit-card-2-back"></i> Transactions
                            </li>
                            <li title="Settings"
                                onclick="_getForm({page: 'resetPassword', url: portalOperationMiddlewareUrl});">
                                <i class="bi bi-gear"></i> Settings
                            </li>
                            <li class="loadWallet" title="Log-Out"
                                onclick="_getForm({page: 'loadWallet', url: portalOperationMiddlewareUrl});">
                                <i class="bi bi-wallet"></i> Load Wallet
                            </li>
                            <li class="logOut" title="Log-Out" onclick="_confirmLogOut();">
                                <i class="bi bi-power"></i> Log-Out
                            </li>
                        </ul>



                    </div>
                </div>
            </div>
        </div>
    </div>
</header>