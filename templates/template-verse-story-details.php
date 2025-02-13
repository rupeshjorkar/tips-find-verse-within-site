<?php

/**
 * Template Name: VerseStoryDetailsPage
 * Description: Verse Story Details will be displayed
 */
$terms = $_SERVER['QUERY_STRING'];
$data = [];
if($terms) :
    $data = Tips_API_Common::fetch_verse_story_details_from_api($terms);
endif;    
$url = site_url();
?>
<div class="container">
    <?php if (is_wp_error($data)) : ?>
        <section class="error-section">
            <div class='error'>
                <p><?php echo esc_html($data->get_error_message()); ?></p>
            </div>
        </section>
    <?php elseif (is_array($data) && !empty($data)) : ?>
        <section class="book-stories-section">
            <?php foreach ($data as $verse) : ?>
                <article class="book-story">
                    <?php if (isset($verse['slug'])) : ?>
                        <?php
                        if (isset($verse["title"]["rendered"])) : ?>
                            
                                <h1>
                                    <?php
                                    echo sanitize_text_field($verse['title']['rendered']);
                                    echo '<span class="term with-original" data-original="' . esc_attr($verse['title']['hover_title']) . '">';
                                    echo sanitize_text_field($verse['title']['hover_title']);
                                    echo '</span>';
                                    ?>
                                </h1>
                           
                        <?php endif; ?>
					<?php if (isset($verse['geographical_link']['title'])) : ?>
                        <p class="tree-link">
                            <?php
                            $query_params = parse_url($verse['geographical_link']['link'], PHP_URL_QUERY);
                            parse_str($query_params, $params);
                            ?>
                            <a href="<?php echo $url.$verse['geographical_link']['link']; ?>">
                                <?php echo esc_html($verse['geographical_link']['title']); ?>
                            </a>
                        </p>
                    <?php endif; ?>

                    <?php endif; ?>
                    <?php if (isset($verse["content"]["rendered"])) : ?>
                        <div class="entry-content">
                            <p><?php echo wp_kses_post($verse["content"]["rendered"]); ?></p>
                        </div>
                    <?php endif; ?>
					 <?php if (isset($verse["translation_details"])) : ?>
                        <div class="language-content">
                            <?php echo wp_kses_post($verse["translation_details"]); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($verse['taxonomies_list'])) : ?>
                        <div class="entry-meta">
                            <?php if (isset($verse['taxonomies_list']['Language'])) : ?>
                                <p><b><?php _e('LANGUAGES:', TIPS_SEARCH_WIDGET_TEXT_DOMAIN); ?></b>
                                    <?php foreach ($verse['taxonomies_list']['Language'] as $key => $val) : ?>
                                        <?php echo wp_kses_post(strtoupper($key) . "&nbsp;&nbsp;"); ?>
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>
                            <?php if (isset($verse['taxonomies_list']['Verse'])) : ?>
                                <p><b><?php _e('VERSES:', TIPS_SEARCH_WIDGET_TEXT_DOMAIN); ?></b>
                                    <?php foreach ($verse['taxonomies_list']['Verse'] as $key => $val) : ?>
                                        <?php _e("<a href='".$val."'>".$key."</a>"); ?>
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>
                            <?php if (isset($verse['taxonomies_list']['Source'])) : ?>
                                <p><b><?php _e('SOURCES:', TIPS_SEARCH_WIDGET_TEXT_DOMAIN); ?></b>
                                    <?php foreach ($verse['taxonomies_list']['Source'] as $key => $val) : ?>
                                        <?php _e("<a href='".$val."'>".$key."</a>"); ?>
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>
                            
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
                     
            <?php
                if($data[0]['prev_story']):
                    _e("<div class='prev-page'>");
					_e('<span aria-hidden="true" class="nav-subtitle">Previous</span>');
                    _e("<a href='".$data['0']['prev_story']['link']."'><img src='".$data['0']['prev_story']['image']."'>". $data['0']['prev_story']['title'] ."</a>"); 
                    _e("</div>");
                endif; 
            ?>
             <?php
                if($data[0]['next_story']):
                    _e("<div class='next-page'>");
					_e('<span aria-hidden="true" class="nav-subtitle">Next</span>');
                    _e("<a href='".$data['0']['next_story']['link']."'>". $data['0']['next_story']['title'] ." <img src='".$data['0']['next_story']['image']."'></a>");
                    _e("</div>");
                endif; 
            ?>


        </section>
    <?php else : ?>
        <section class="no-stories-section">
            <div class="entry-content">
                <p><?php _e('No Stories Found.', TIPS_SEARCH_WIDGET_TEXT_DOMAIN); ?></p>
            </div>
        </section>
    <?php endif; ?>
</div>