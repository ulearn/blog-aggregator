?>
<aside class="calig">
    <div id="<?php print $block_html_id; ?>" class="<?php print $classes; calig?>"<?php print $attributes; ?>>

        <?php print render($title_prefix); ?>
        <?php if ($block->subject): ?>
            <div class="heading_line">
                <h3 class="color_black font_heading ucase"><span><?php print $block->subject ?></span></h3>
            </div>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <div class="content"<?php print $content_attributes; ?>>
            <?php print $content ?>
        </div>
    </div>
</aside>
