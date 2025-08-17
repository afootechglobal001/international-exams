<?php include '../alert.php' ?>

<!-- Header -->

<header class="header-div animated fadeInDown">
    <div class="header-div-in">
        <div class="header-left-div">
            <div class="logo-div">
                <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="International Exam Logo" />
            </div>
            <div class="country-logo">
                <img src="<?php echo $websiteUrl ?>/all-images/country/NIGERIA.jpg" alt="Nigeria" />
            </div>
            <p>Hi, Oluwagbenga</p>
            <div class="search-div">
                <input type="text" placeholder="Search...">
                <i class="bi bi-search"></i>
            </div>
        </div>

        <div class="header-right-div">
            <div class="notification-div">
                <i class="bi bi-bell icons" title="Notifications"></i>
            </div>
            <div class="profile-pic-div" title="Profile Picture" onclick="_toggleProfileDiv()">
                <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="User Profile Picture">
                <div class="toggle">
                    <div class="toggle-in">
                        <div class="toggle-title">
                            <div class="dp">OA</div>
                            <div class="text">
                                <h2>OLUWAGBENGA AFOLABI</h2>
                                <p>afootechglobal@gmail.com</p>
                                <p>08131252996</p>
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