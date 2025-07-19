
<!-- Sidebar -->
<div class="sidebar-div">
    <div class="sidebar-div-in">

        <div class="logo-div">
            <div class="div-in">
                <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="International Exams Logo">
            </div>
        </div>

        <nav class="menu">
            <ul>
                <li class="active" title="Dashboard" id="dashboard" onclick="_getActivePage({page:'dashboard', divid:'dashboard'});"><i class="bi bi-speedometer2"></i> Dashboard</li></li>
                <li title="Exam" id="exam" onclick="_getActivePage({page:'exam', divid:'exam'});"><i class="bi bi-journal-text"></i> Exam</li>
                <li title="Transactions History" id="transactionHistory" onclick="_getActivePage({page:'transactionHistory', divid:'transactionHistory'});"><i class="bi bi-list-check"></i> Transactions History</li>
                <li title="Subscription History"><i class="bi bi-list-check"></i> Subscription History</li>
            </ul>
        </nav>
    </div>

    <nav class="bottom-menu">
        <ul>
            <li title="Settings"><i class="bi bi-gear"></i> Settings</li>
            <li title="Log-Out"><i class="bi bi-power"></i> Log-Out</li>
        </ul>
       
    </nav>
</div>

