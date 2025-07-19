<?php if ($page == 'dashboard') { ?>
    <div class="user-subjects-title-div">
        <h4><i class="bi bi-bar-chart" title="Exam List"></i> List of Exams</h4>

        <div class="user-subjects-div-in">
            <div class="subject-item">
                <h4 title="TOEFL Exam">TOEFL</h4> <i class="bi bi-chevron-down" title="Expand TOEFL"></i>
            </div>
            <div class="subject-item">
                <h4 title="GRE Exam">GRE</h4> <i class="bi bi-chevron-down" title="Expand GRE"></i>
            </div>
            <div class="subject-item">
                <h4 title="GMAT Exam">GMAT</h4> <i class="bi bi-chevron-down" title="Expand GMAT"></i>
            </div>
            <div class="subject-item">
                <h4 title="SAT Exam">SAT</h4> <i class="bi bi-chevron-down" title="Expand SAT"></i>
            </div>
            <div class="subject-item">
                <h4 title="ACT Exam">ACT</h4> <i class="bi bi-chevron-down" title="Expand ACT"></i>
            </div>
            <div class="subject-item">
                <h4 title="PTE Exam">PTE</h4> <i class="bi bi-chevron-down" title="Expand PTE"></i>
            </div>
            <div class="subject-item">
                <h4 title="IELTS Exam">IELTS</h4> <i class="bi bi-chevron-down" title="Expand IELTS"></i>
            </div>
        </div>

        <div class="view-more-btn">
            <button class="btn" title="View More Exams"><i class="bi bi-eye"></i>View More</button>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'exam') { ?>
    <div class="user-subjects-title-div">
        <h4><i class="bi bi-bar-chart" title="Exam List"></i> List of Exams</h4>

        <div class="user-subjects-div-in">
            <div class="subject-item">
                <h4 title="TOEFL Exam">TOEFL</h4> <i class="bi bi-chevron-down" title="Expand TOEFL"></i>
            </div>
            <div class="subject-item">
                <h4 title="GRE Exam">GRE</h4> <i class="bi bi-chevron-down" title="Expand GRE"></i>
            </div>
            <div class="subject-item">
                <h4 title="GMAT Exam">GMAT</h4> <i class="bi bi-chevron-down" title="Expand GMAT"></i>
            </div>
            <div class="subject-item">
                <h4 title="SAT Exam">SAT</h4> <i class="bi bi-chevron-down" title="Expand SAT"></i>
            </div>
            <div class="subject-item">
                <h4 title="ACT Exam">ACT</h4> <i class="bi bi-chevron-down" title="Expand ACT"></i>
            </div>
            <div class="subject-item">
                <h4 title="PTE Exam">PTE</h4> <i class="bi bi-chevron-down" title="Expand PTE"></i>
            </div>
            <div class="subject-item">
                <h4 title="IELTS Exam">IELTS</h4> <i class="bi bi-chevron-down" title="Expand IELTS"></i>
            </div>
        </div>

        <div class="view-more-btn">
            <button class="btn" title="View More Exams"><i class="bi bi-eye"></i>View More</button>
        </div>
    </div>
<?php } ?>


<?php if ($page == 'transactionHistory') { ?>
    <div class="user-subjects-title-div">
        <div class="transactions-header">
            <h4><i class="bi bi-list-check"></i> Transactions History</h4>
            <button class="download-btn"><i class="bi bi-download"></i> Download</button>
        </div>

        <div class="table-container">
            <table class="transactions-table">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Purpose</th>
                        <th>Transaction Method</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>TRANS02620250714045350</td>
                        <td>₦1,000.00</td>
                        <td>VIDEO SUBSCRIPTION</td>
                        <td>DIRECT ONLINE PAYMENT</td>
                        <td><span class="status success">SUCCESSFUL</span></td>
                        <td>2025-07-14 18:53:50</td>
                        <td><button class="view-btn"><i class="bi bi-eye"></i> View Details</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>TRANS02520250517090055</td>
                        <td>₦1,000.00</td>
                        <td>VIDEO SUBSCRIPTION</td>
                        <td>DIRECT ONLINE PAYMENT</td>
                        <td><span class="status success">SUCCESSFUL</span></td>
                        <td>2025-05-17 17:00:55</td>
                        <td><button class="view-btn"><i class="bi bi-eye"></i> View Details</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>TRANS02520250517090055</td>
                        <td>₦1,000.00</td>
                        <td>VIDEO SUBSCRIPTION</td>
                        <td>DIRECT ONLINE PAYMENT</td>
                        <td><span class="status success">SUCCESSFUL</span></td>
                        <td>2025-05-17 17:00:55</td>
                        <td><button class="view-btn"><i class="bi bi-eye"></i> View Details</button></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>TRANS02520250517090055</td>
                        <td>₦1,000.00</td>
                        <td>VIDEO SUBSCRIPTION</td>
                        <td>DIRECT ONLINE PAYMENT</td>
                        <td><span class="status success">SUCCESSFUL</span></td>
                        <td>2025-05-17 17:00:55</td>
                        <td><button class="view-btn"><i class="bi bi-eye"></i> View Details</button></td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>