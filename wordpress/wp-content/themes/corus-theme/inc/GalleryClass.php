<?php

/**
 * Class GalleyClass
 *
 * Encapsulates all the Galley logics
 */
class GalleryClass {

    //Contains the images for the slider
    protected $images = [];

    function __construct($post_id) {

        if ($post_id > 0) {

            //Set all the Gallery Images
            $this->set_images($post_id);
        }

    }


    /**
     * Gets all the fields from ACF and then sets it to $images
     * @param $post_id
     */
    private function set_images($post_id) {

        //get ACF fields
        $fields = get_fields();

        //Set the images
        if(count($fields) > 0) {

            foreach ($fields as $slide) {

                if(!empty($slide)) {
                    $this->images[] = $slide['sizes'];
                }

            }

        }

    }

    /**
     * Returns the images for the slider
     * @return array
     */
    function get_images() {

        return $this->images;

    }
}