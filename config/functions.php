<?php
class allClass
{
    function _pagesButtons($websiteUrl) { ?>
       <div class="btn-div">
            <a href="<?php echo $websiteUrl?>/portal/sign-up" title="Register For Exam">
                <button class="btn" title="Register For Exam">
                    Register For Exam <i class="bi bi-chevron-right"></i>
                </button>
            </a>
            <a href="<?php echo $websiteUrl?>/free-ebook" title="Download E-Books">
                <button class="btn right-btn" title="Download E-Books">
                    <i class="bi bi-download"></i> Download E-Books <span class="span">
                        It's Free</span>
                </button>
            </a>
        </div>       
    <?php }

} //end of class
$callclass = new allClass();
?>