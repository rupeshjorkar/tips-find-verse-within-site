<?php

/**
 * Description: Tips Number Short Code Content
 */
$data = Tips_API_Common::fetch_tips_number_data();
    if (is_array($data) && !empty($data)) { 
        $insights_count = $data[0]['insights']['insights_count'];
        $verses_count = $data[0]['verses']['verses_count'];
        $languages_count = $data[0]['languages']['languages_count'];
    ?>
    <div class="tips_number_short_code">
        <div class="main_statistic">
            <?php 
                if (isset($insights_count)) {?>
                    <div class="stories">
                        <div class="statistic">
            				<div class="statistic_icon">
            					<img src="<?php  _e($data[0]['insights']['insights_icon']); ?>">
            				</div>
            				<div class="statistic_link">
            					<span class="amount"><?php  _e($insights_count); ?></span>
            					<span class="title"><?php  _e($data[0]['insights']['insights_title']); ?></span>
            				</div>
                        </div>
                    </div>
            <?php } ?>
            <?php 
                if (isset($verses_count)) {?>
                <div class="verses">	
                    <div class="statistic">
        				<div class="statistic_icon">
        					<img src="<?php  _e($data[0]['verses']['verse_icon']); ?>">
        				</div>
        				<div class="statistic_link">
        					<span class="amount"><?php  _e($verses_count); ?></span>
        					<span class="title"><?php  _e($data[0]['verses']['verses_title']); ?></span>
        				</div>
                    </div>
                </div>
            <?php } ?>
            <?php 
                if (isset($verses_count)) {?>
                <div class="languages">
                    <div class="statistic">
        				<div class="statistic_icon">
        					<img src="<?php  _e($data[0]['languages']['language_icon']); ?>">
        				</div>
        				<div class="statistic_link">
        					<span class="amount"><?php  _e($languages_count); ?></span>
        					<span class="title"><?php  _e($data[0]['languages']['languages_title']); ?></span>
        				</div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } 
else{ ?>
    <section class="no-books-section">
        <div class="entry-content">
            <p><?php esc_html_e( 'No Record Found' , TIPS_SEARCH_WIDGET_TEXT_DOMAIN ); ?></p>
        </div>
    </section>
<?php } ?>