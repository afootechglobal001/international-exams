<!-- Sidebar -->
<div class="sidebar-div">
    <div class="sidebar-div-in">
        <nav>
            <ul>
                <li class="active" title="Dashboard" id="dashboard"
                    onclick="_getActivePage({page:'dashboard', divid:'dashboard'});">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </li>
                <li title="E-Books" id="ebook" onclick="_getActivePage({page:'ebook', divid:'ebook'});">
                    <i class="bi bi-filetype-pdf"></i> Download E-books
                </li>
                <li title="My Exams" id="exam" onclick="_getActivePage({page:'exam', divid:'exam'});">
                    <i class="bi bi-journal-text"></i> My Registered Exams
                </li>
                <li title="Transactions History" id="transactions"
                    onclick="_getActivePage({page:'transactions', divid:'transactions'});">
                    <i class="bi bi-credit-card-2-back"></i> Transactions
                </li>
            </ul>
        </nav>

        <nav>
            <ul>
                <li title="Settings" onclick="_getForm({page: 'resetPassword', url: portalLocalUrl});">
                    <i class="bi bi-gear"></i> Settings
                </li>
                <li title="Log-Out" onclick="_getForm({page: 'logoutConfirmForm', url: portalLocalUrl});">
                    <i class="bi bi-power"></i> Log-Out
                </li>
            </ul>
        </nav>
    </div>
</div>