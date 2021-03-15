<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Slidesearch
 * @subpackage Slidesearch/admin/partials
 */
?>

<div class="wrap">

    <h2>Manage Slides <a href="#" class="page-title-action">Upload</a></h2>
    <hr>
    <br>

    <div class="slides-listing">

        <?php
        $path    = WP_CONTENT_DIR . '/uploads/2021/03/';
        $files = scandir($path);
        $files = array_diff(scandir($path), array('.', '..'));
        foreach($files as $file) : ?>

            <!-- Single Slide -->
            <div class="single-slide">
                <div class="slide-content-wrap">
                <span class="slide-icon">
                    <i class="fa fa-file-powerpoint-o"></i>
                </span>
                    <div class="slide-info">
                        <h4><?php echo $file; ?></h4>
                        <ul class="slide-meta">
                            <li>
                                <i class="fa fa-inbox"></i> 48.2 KB
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i> 18/07/2021
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="slide-actions">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-download"></i> Download Slide</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tags"></i> Update Tags</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-close"></i> Delete Slide</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./Single Slide -->

        <?php endforeach; ?>

    </div>

</div>