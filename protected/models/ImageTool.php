<?php

class ImageTool {

    public static function resize($filename, $width=0, $height=0) {
        if (!file_exists(Yii::app()->params['imagePath'] . $filename) || !is_file(Yii::app()->params['imagePath'] . $filename)) {
            return;
        }

        $info = pathinfo($filename);

        $extension = $info['extension'];

        $old_image = $filename;
        $new_image = substr($filename, 0, strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;
        $cache_dir = Yii::app()->assetManager->getBasePath() . "/cache/";

        if (!file_exists($cache_dir . $new_image) || (filemtime(Yii::app()->params['imagePath'] . $old_image) > filemtime($cache_dir . $new_image))) {
            $path = '';

            $directories = explode('/', dirname(str_replace('../', '', $new_image)));

            foreach ($directories as $directory) {
                $path = $path . '/' . $directory;

                if (!file_exists($cache_dir . $path)) {
                    @mkdir($cache_dir . $path, 0777);
                }
            }

            $image = new Image(Yii::app()->params['imagePath'] . $old_image);
            $image->resize($width, $height);
            $image->save($cache_dir . $new_image);
        }

        return Yii::app()->assetManager->getBaseUrl() . '/cache/' . $new_image;
    }

}

?>