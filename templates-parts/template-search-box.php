<?php
/**
 * Template Name: Chapters Template
 * Description: ALl chapters of specific book will be displayed
 */

global $template_data;
$book_chapter_numbers = $template_data['api_response'];
$book_code = $template_data['book_code'];

?>

<div class="container test">
    <?php if (is_wp_error($book_chapter_numbers)) { ?>
        <section class="error-section">
            <div class='error'>
                <p><?php _e(esc_html($book_chapter_numbers->get_error_message())); ?></p>
            </div>
        </section>
    <?php } elseif (empty($book_chapter_numbers['chapter_numbers'])) {
    ?>
        <section class="error-section">
            <div class='error'>
                <p><?php _e("No Chapters Found"); ?></p>
            </div>
        </section>
    <?php
    } elseif (is_array($book_chapter_numbers) && !empty($book_chapter_numbers)) { ?>       
                    <ul id="chapters-list-ul" class="chapters chapters-Gen">
                    <?php foreach ($book_chapter_numbers['chapter_numbers'] as $index => $chapter_no) { ?>
                        <li id="chapter-<?php _e($chapter_no) ?>" data-book="<?php _e($book_code); ?>" class="chapter" data-id="<?php _e($chapter_no); ?>">
                            <?php _e(wp_kses_post("<a class='chapter-slide' href='#' data-id='".esc_attr($chapter_no)."'>" . sanitize_text_field($chapter_no) . "</a>")); ?>
                        </li>
                    <?php }; ?>
                    </ul>
                
    <?php } else { ?>
        <section class="no-chapters-section">
            <div class="entry-content">
                <p><?php _e('No Chapters Found.', TIPS_SEARCH_WIDGET_TEXT_DOMAIN); ?></p>
            </div>
        </section>
    <?php } ?>
</div>