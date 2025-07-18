<?php  include 'alert.php'?>
<header class="fadeInDown animated">
    <div class="header-div-in">
        <div class="logo-back-div">
            <div class="menu-div" title="Open Menu" onclick="_openMenu()" id="menu-div"><i class="bi-text-right"></i></div>
            <div class="logo-div">
                <div class="div-in">
                    <img src="<?php echo $websiteUrl?>/all-images/images/logo.png" alt="<?php echo $appName?> logo" />
                </div>
            </div>
        </div>
       
        <div class="header-nav-div">
            <div class="left-nav">
                <ul>
                    <li class="active-li" title="Dashboard" onclick="_getActivePage({page:'dashboard', divid:'dashboard'});" id="top-dashboard"><i class="bi-speedometer2"></i> Dashboard</li>
                </ul> 
            </div>

            <div class="right-nav">
                <div class="right-icon-div left-icon-div">
                    <div class="icon-div" onclick="_getActivePage({page:'settings', divid:'settings'});" title="System Settings">
                        <i class="bi-gear"></i>
                    </div>
                        
                    <div class="icon-div bell_notification" onclick="_getActivePage({page:'systemAlert', divid:'systemAlert'});" title="System Alert">
                        <i class="bi-bell"></i>
                        <div>20</div>
                    </div>
                </div>

                <div class="right-icon-div no-border" title="Click To View Profile" onclick="_toggleProfileDiv()">
                    <div class="profile-div">
                        <div class="info-div">
                            <div class="name" id="loginHeaderName"><strong>Hon. Paul Emmanuel</script></strong></div>
                            <div class="role" id="loginRoleName">SUPER ADMIN</div>
                        </div>
                        <div class="img-div" id="profile_pix">
                            <img src="<?php echo $websiteUrl; ?>/all-images/images/avatar.jpg" alt="Profile Image">
                        </div>
                    </div>
                </div>

                <div class="toggle-profile-div">
                    <div class="toggle-div-in">
                        <div class="toggle-profile-pix-div" id="profile_pix2">
                            <img src="<?php echo $websiteUrl; ?>/all-images/images/avatar.jpg" alt="Profile Image">
                        </div>

                        <div class="header-content">
                            <div class="toggle-profile-name"><span id="loginProfileName">Hon. Paul Emmanuel</span></div>
                            <div class="toggle-profile-others"><span id="loginProfileStaffId">STF00001</span></div>
                            <div class="header-btn-div">
                                <button class="btn" title="View Profile" type="button" onclick=""><i class="bi-person"></i> Profile</button>
                                <button class="btn" title="Log-Out" type="button" onclick="_getForm({page: 'logoutConfirmForm', url: adminPortalLocalUrl});"><i class="bi-box-arrow-in-right"></i> Log-Out</button>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
