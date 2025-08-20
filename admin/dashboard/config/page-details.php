<?php if ($page=='pageContent'){ ?>
    <div class="page-form-div animated fadeIn">
        <div class="page-title">SEO CONTENT</div>
        <div class="form-div">
            <div class="form-input-div">
                <div class="title">PAGE URL</div>
                <div class="text_field_container" id="pageUrl_container">
                    <script>
                        textField({
                            id: 'pageUrl',
                            title: 'page-url'
                        });
                    </script>
                </div>

                <div class="title">PAGE TITLE <span><em>(Not more than 100 words)</em></span></div>
                <div class="text_field_container" id="pageTitle_container">
                    <script>
                        textField({
                            id: 'pageTitle',
                            title: 'Page Title'
                        });
                    </script>
                </div>

                <div class="title">SEO KEYWORDS</div>
                <div class="text_area_container" id="seoKeywords_container">
                    <script>
                        textField({
                            id: 'seoKeywords',
                            title: 'Seo Keywords',
                            type : 'textarea'
                        });
                    </script>
                </div>
                
                <div class="title">SEO DESCRIPTION <span><em>(Not more than 167 words)</em></span></div>
                <div class="text_area_container" id="seoDescription_container">
                    <script>
                        textField({
                            id: 'seoDescription',
                            title: 'Seo Descriptions',
                            type : 'textarea'
                        });
                    </script>
                </div>                       
            </div>
            
            <div class="picture-div">
                <label>
                    <div class="pix-div"><img id="seo_flyer_preview_pix" src="<?php echo $websiteUrl?>/all-images/images/sample.jpg"  id="seo-flyer" /></div>
                    <input type="file" id="seo_flyer" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif"  onchange="seoFlyer.UpdatePreview(this);" />
                </label>
            </div>                        			
        </div>
    </div>

    <div class="page-form-div">
        <div class="page-title">FULL PAGE CONTENT</div>
        <div class="form-div content-form">
            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
            <script>tinymce.init({selector:'#page_content_text',  // change this value according to your HTML
                plugins: "link, image, table"
                });</script>
            <div style="margin-bottom: 5px;">
                <textarea class="text_field" style="width:100%;" rows="27" id="page_content_text" title="TYPE FULL PAGE CONTENT HERE" type="text" maxlength="167" id="" placeholder=""></textarea>
            </div>

            <div class="btn-div">
                <button class="btn" id="save_btn" title="Save Page" onclick="_addPageContent('<?php echo $publish_id?>')"><i class="bi-save"></i> SAVE</button>
            </div>
        </div>
    </div>     
<?php }?>

<?php if ($page=='picturePage'){ ?>    
    <div class="page-form-div animated fadeIn">
        <div class="page-title">UPLOAD MORE PICTURES</div>
        <div class="form-div form-picture-div">
            <div class="picture-back-div">
                <div id="fetchPagePicture"></div>
                <div class="picture-div">
                    <div class="icon-div" title="Delete Picture" onclick=""><i class="bi-trash"></i></div>
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/TOEL.jpg" alt="TOEFL" />
                </div> 

                <div class="picture-div">
                    <div class="icon-div" title="Delete Picture" onclick=""><i class="bi-trash"></i></div>
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/TOEL.jpg" alt="TOEFL" />
                </div>

                <div class="picture-div">
                    <div class="icon-div" title="Delete Picture" onclick=""><i class="bi-trash"></i></div>
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/TOEL.jpg" alt="TOEFL" />
                </div>

                <div class="picture-div select-pix-div">
                    <label>
                        <div class="pix-div"><img src="<?php echo $websiteUrl?>/all-images/images/default.png"/></div>
                        <input type="file" id="pictures" name="pictures[]" multiple accept=".jpg, .JPG, .png, .PNG, .jpeg, .JPEG"  onchange="_save_page_other_pictures('<?php echo $publish_id;?>')" style="display:none;"/>
                    </label>
                </div>
            </div>  
        </div>
    </div>  
<?php }?>
