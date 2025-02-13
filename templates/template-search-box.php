<?php

/**
 * Template Name: Find Verse Short Code
 * Description: Find Verse Search Box
 */
 $color = get_option('tips_find_verse_color', '#31bbd8'); 
$button_text = get_option('tips_find_verse_button_text', 'Find Verse'); 
$place_order = get_option('tips_find_verse_place_order', 'Tips: Find Verse');
?>
<div class="entry-content">
  <div id="find-verse">
    <form id="lookup-verse" method="get" target="_blank" action="<?php echo esc_url(home_url('/find-verse')); ?>">
      <!-- Set the placeholder and button text from options -->
      <input type="text" name="verseId" id="verseId" required placeholder="<?php echo esc_attr($place_order); ?>">
      <input type="submit" value="<?php echo esc_attr($button_text); ?>" style="background-color: <?php echo esc_attr($color); ?>;">
    </form>
  </div>
</div>

