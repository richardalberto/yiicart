<?php

/* @todo use __DIR__ if php5.3 */
include_once dirname(__FILE__) . '/ConfigWidget.php';

/**
 * Galleryii class file.
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
class Galleryii extends ConfigWidget {

    public $rootFolder;
    public $baseFolder = '/images/galleryii';
    public $thumbnails = '/thumbnails';
    public $images = '/images';
    public $thumbSide = 120;

    private function showHelpPage() {
        echo ""
        . "<div class=\"form\"><div class=\"errorMessage\">"
        . "Galleryii is not correctly configured.<br />"
        . "To fix this stuff create /images/galleryii/thumbnails path for thumbnails "
        . "and /images/galleryii/thumbnails path for images "
        . "or send Galleryii widget a new path:<br />"
        . highlight_string("<?php\n\t\$this->widget('ext.lyiightbox.Galleryii',array(\n\t\t'baseFolder' => '/images/galleryii/'\n\t\t'images' => '/images/'\n\t\t'images' => '/images/'\n\t)); \n?>", true)
        . "</div></div>";
    }

    private function showNumberOfFolder() {
        echo ""
        . "<div class=\"form\"><div class=\"errorMessage\">"
        . "I've found a folder for Galleryii's widget. But I've not found folders <strong>{$this->thumbnails}</strong> and <strong>{$this->images}</strong>.<br />"
        . "Create theme and then reload this page."
        . "</div></div>";
    }

    private function showThumbnails() {
        $path = dirname(__FILE__) . '/../../..' . $this->baseFolder . $this->thumbnails;
        $dirHandle = opendir($path);
        $countImages = 0;
        while ($image = readdir($dirHandle))
            if (!in_array($image, array('.', '..')))
                LyiightBox2::thumb($this, $image, $this->thumbSide);
        closedir($dirHandle);
    }

    private function countfiles() {
        $path = dirname(__FILE__) . '/../../..' . $this->baseFolder;
        $dirHandle = opendir($path);
        $dirToFound = array(
            $this->images,
            $this->thumbnails
        );
        $dirFounded = array();
        while ($file = readdir($dirHandle))
            if (!in_array($file, array('.', '..')))
                $dirFounded[] .= $file;
        if (count($dirToFound) != count($dirFounded))
            $this->showNumberOfFolder();
        $this->showThumbnails();
        closedir($dirHandle);
    }

    private function countImages() {
        $root = dirname(__FILE__) . '/../../..';
        $path = $root . $this->baseFolder;
        if (is_dir($path)) {
            $this->countFiles();
        } else {
            $this->showHelpPage();
        }
    }

    public function __construct() {
        parent::__construct();
    }

    public function init() {
        parent::config();
        $this->countImages();
    }

}