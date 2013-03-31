<article>
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <ul>
                <?php
                foreach ($nodes as $node):
                    ?>

                    <?php
                    $slide_transition = 'fade';
                    $slide_image_background = '';
                    if (!empty($node->field_slider_background [LANGUAGE_NONE][0]['uri'])) {
                        $slide_image_background = file_create_url($node->field_slider_background [LANGUAGE_NONE][0]['uri']);
                    }
                    if (!empty($node->field_slider_transition[LANGUAGE_NONE][0]['value'])) {
                        $slide_transition = $node->field_slider_transition[LANGUAGE_NONE][0]['value'];
                    }
                    $captions = array();
                    if (!empty($node->field_slider_captions[LANGUAGE_NONE])) {
                        $captions = $node->field_slider_captions[LANGUAGE_NONE];
                    }
                    $slide_image = '';
                    if (!empty($node->field_slider_image[LANGUAGE_NONE])) {
                        $slide_image = file_create_url($node->field_slider_image[LANGUAGE_NONE][0]['uri']);
                    }
                    ?>
                    <li data-transition="<?php print $slide_transition; ?>" data-slotamount="10" >
                        <?php if (!empty($slide_image_background)): ?>
                            <img src="<?php print $slide_image_background; ?>" alt="" />
                        <?php endif; ?>

                        <div class="caption <?php print $node->field_slider_image_transition[LANGUAGE_NONE][0]['value']; ?>" data-x="<?php print $node->field_image_data_x[LANGUAGE_NONE][0]['value']; ?>" data-y="<?php print $node->field_image_data_y[LANGUAGE_NONE][0]['value']; ?>" data-speed="900" data-start="900" data-easing="easeOutBounce">
                            <img src="<?php print $slide_image; ?>" alt="" />
                        </div>

                        <?php if (!empty($captions)): ?>
                            <?php foreach ($captions as $caption): ?>
                                <?php
                                $result = field_collection_item_load($caption['value']);
                                $extra_class = 'big_green';
                                if (!empty($result->field_extra_class[LANGUAGE_NONE])) {
                                    $extra_class = $result->field_extra_class[LANGUAGE_NONE][0]['value'];
                                }
                                $field_caption_transition = 'lfr';
                                if (!empty($result->field_caption_transition[LANGUAGE_NONE][0]['vaue'])) {
                                    $field_caption_transition = $result->field_caption_transition[LANGUAGE_NONE][0]['vaue'];
                                }
                                ?>
                                <div class="caption <?php print $field_caption_transition . ' ' . $extra_class; ?>" data-x="<?php print $result->field_data_x[LANGUAGE_NONE]['0']['value']; ?>" data-y="<?php print $result->field_data_y[LANGUAGE_NONE]['0']['value']; ?>" data-speed="400" data-start="<?php print $result->field_data_start[LANGUAGE_NONE][0]['value']; ?>" data-easing="easeOutExpo">
                                    <?php print $result->field_text[LANGUAGE_NONE][0]['value']; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </li>

                <?php endforeach; ?>
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</article>