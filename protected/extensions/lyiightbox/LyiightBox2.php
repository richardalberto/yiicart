<?php

/* @todo use __DIR__ if php5.3 */
include_once dirname(__FILE__) . '/ConfigWidget.php';

/**
 * LyiightBox2 class file.
 *
 * @author Simone Gentili <sensorario@gmail.com>
 * @version 1.1
 */

/**
 * This widget encapsulates the LightBox2 script for popup images.
 *
 * ({@link https://github.com/sensorario/lyiightbox}).
 *
 * @author Simone Gentili <sensorario@gmail.com>
 */
class LyiightBox2 extends ConfigWidget {

    public $thumbnail = '';
    public $image = '';
    public $title = 'image';
    public $group = 'default';
    public $visible = true;

    public function __construct() {
        parent::__construct();
    }

    private function printImage() {
        return $this->visible ? '<img src="'
                . $this->thumbnail
                . '" border="0" />' : '';
    }

    private function printLink() {
        echo '<a '
        . 'href="' . $this->image . '" '
        . 'rel="lightbox[_' . $this->group . ']" '
        . 'title="' . $this->title . '"'
        . '>'
        . $this->printImage()
        . '</a>';
    }

    public function init() {
        parent::config();
        $this->printLink();
    }

    public static function thumb(Galleryii $galleryii, $image, $width = 120) {
        echo "<div style=\"width: ".($width+3)."px; height: ".($width+30+3)."px; margin: 3px; border: #ccc 1px solid; float: left; \">";
        echo "<div style=\"width: $width; height: $width; margin: 3px; border: #ccc 1px solid;\">";
        echo '<a '
        . 'href="' . "{$galleryii->rootFolder}{$galleryii->baseFolder}{$galleryii->images}/{$image}" . '" '
        . 'rel="lightbox[galleryii]" '
        . '>'
        . '<img src="'."{$galleryii->rootFolder}{$galleryii->baseFolder}{$galleryii->thumbnails}/{$image}".'" style="width: 100%;">'
        . '</a>';
        echo "</div>";
        echo "</div>";
    }

}