<?php
/**
 * @package corus-theme
 */

get_header();
?>

    <?php

        $gallery = new GalleryClass(get_the_ID());

        //Get all images to set for the slider
        $images = $gallery->get_images();

    ?>


    <div class="exercise-slider" >
        <?php
            foreach ($images as $image) {
        ?>
                <div>
                    <img src="<?=$image['medium']?>" />
                </div>
        <?php
            }
        ?>


    </div>

<?php
get_sidebar();
get_footer();
