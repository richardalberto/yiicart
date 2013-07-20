<?php

if(!defined('GLOB_BRACE')) define ('GLOB_BRACE', 1024);
if(!defined('GLOB_MARK')) define ('GLOB_MARK', 2);
if(!defined('GLOB_NOSORT')) define ('GLOB_NOSORT', 4);
if(!defined('GLOB_NOCHECK')) define ('GLOB_NOCHECK', 16);
if(!defined('GLOB_NOESCAPE')) define ('GLOB_NOESCAPE', 64);
if(!defined('GLOB_ERR')) define ('GLOB_ERR', 1);
if(!defined('GLOB_ONLYDIR')) define ('GLOB_ONLYDIR', 8192);
if(!defined('GLOB_AVAILABLE_FLAGS')) define ('GLOB_AVAILABLE_FLAGS', 9303);

class FileManagerController extends BackendController {

    public function actionIndex() {
        $no_image = Product::model()->getImageWithSize(100, 100);

        $directory = Yii::app()->basePath . '/image/data/';

        if (isset($_GET['field']))
            $field = $_GET['field'];
        else
            $field = '';

        if (isset($_GET['CKEditorFuncNum']))
            $fckeditor = $_GET['CKEditorFuncNum'];
        else
            $fckeditor = false;

        $this->renderPartial('index', array(
            'no_image' => $no_image,
            'directory' => $directory,
            'field' => $field,
            'fckeditor' => $fckeditor
        ));
    }

    public function actionImage($image) {
        $imageTool = new ImageTool;
        echo $imageTool->resize(html_entity_decode($image, ENT_QUOTES, 'UTF-8'), 100, 100);
    }

    public function actionDirectory() {
        $json = array();

        if (isset($_POST['directory'])) {
            $directories = glob(rtrim(Yii::app()->params['imagePath'] . 'data/' . str_replace('../', '', $_POST['directory']), '/') . '/*', GLOB_ONLYDIR);

            if ($directories) {
                $i = 0;

                foreach ($directories as $directory) {
                    $json[$i]['data'] = basename($directory);
                    $json[$i]['attributes']['directory'] = substr($directory, strlen(Yii::app()->params['imagePath'] . 'data/'));

                    $children = glob(rtrim($directory, '/') . '/*', GLOB_ONLYDIR);

                    if ($children) {
                        $json[$i]['children'] = ' ';
                    }

                    $i++;
                }
            }
        }

        echo CJSON::encode($json);
    }

    public function actionFiles() {
        $json = array();

        if (!empty($_POST['directory'])) {
            $directory = Yii::app()->params['imagePath'] . 'data/' . str_replace('../', '', $_POST['directory']);
        } else {
            $directory = Yii::app()->params['imagePath'] . 'data/';
        }

        $allowed = array(
            '.jpg',
            '.jpeg',
            '.png',
            '.gif'
        );

        $files = glob(rtrim($directory, '/') . '/*');

        if ($files) {
            foreach ($files as $file) {
                if (is_file($file)) {
                    $ext = strrchr($file, '.');
                } else {
                    $ext = '';
                }

                if (in_array(strtolower($ext), $allowed)) {
                    $size = filesize($file);

                    $i = 0;

                    $suffix = array(
                        'B',
                        'KB',
                        'MB',
                        'GB',
                        'TB',
                        'PB',
                        'EB',
                        'ZB',
                        'YB'
                    );

                    while (($size / 1024) > 1) {
                        $size = $size / 1024;
                        $i++;
                    }

                    $json[] = array(
                        'filename' => basename($file),
                        'file' => substr($file, strlen(Yii::app()->params['imagePath'] . 'data/')),
                        'size' => round(substr($size, 0, strpos($size, '.') + 4), 2) . $suffix[$i]
                    );
                }
            }
        }

        echo CJSON::encode($json);
    }

    public function actionCreate() {
        $json = array();

        if (isset($_POST['directory'])) {
            if (isset($_POST['name']) || $_POST['name']) {
                $directory = rtrim(Yii::app()->params['imagePath'] . 'data/' . str_replace('../', '', $_POST['directory']), '/');

                if (!is_dir($directory)) {
                    $json['error'] = Yii::t('filemanager', 'Warning: Please select a directory!');
                }

                if (file_exists($directory . '/' . str_replace('../', '', $_POST['name']))) {
                    $json['error'] = Yii::t('filemanager', 'Warning: A file or directory with the same name already exists!');
                }
            } else {
                $json['error'] = Yii::t('filemanager', 'Warning: Please enter a new name!');
            }
        } else {
            $json['error'] = Yii::t('filemanager', 'Warning: Please select a directory!');
        }
        
        // TODO: add permission verification
        /*if (!$this->user->hasPermission('modify', 'common/filemanager')) {
            $json['error'] = Yii::t('filemanager', 'Warning: Permission Denied!');
        }*/

        if (!isset($json['error'])) {
            mkdir($directory . '/' . str_replace('../', '', $_POST['name']), 0777);

            $json['success'] = Yii::t('filemanager', 'Success: Directory created!');
        }

        echo CJSON::encode($json);
    }

    public function actionDelete() {
        $json = array();

        if (isset($_POST['path'])) {
            $path = rtrim(Yii::app()->params['imagePath'] . 'data/' . str_replace('../', '', html_entity_decode($_POST['path'], ENT_QUOTES, 'UTF-8')), '/');

            if (!file_exists($path)) {
                $json['error'] = Yii::t('filemanager', 'Warning: Please select a directory or file!');
            }

            if ($path == rtrim(Yii::app()->params['imagePath'] . 'data/', '/')) {
                $json['error'] = Yii::t('filemanager', 'Warning: You can not delete this directory!');
            }
        } else {
            $json['error'] = Yii::t('filemanager', 'Warning: Please select a directory or file!');
        }
        
        // TODO: check permission
        /*if (!$this->user->hasPermission('modify', 'common/filemanager')) {
            $json['error'] = Yii::t('filemanager', 'Warning: Permission Denied!');
        }*/

        if (!isset($json['error'])) {
            if (is_file($path)) {
                unlink($path);
            } elseif (is_dir($path)) {
                $files = array();
                $path = array($path . '*');
                while (count($path) != 0) {
                    $next = array_shift($path);

                    foreach (glob($next) as $file) {
                        if (is_dir($file)) {
                            $path[] = $file . '/*';
                        }

                        $files[] = $file;
                    }
                }

                rsort($files);

                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    } elseif (is_dir($file)) {
                        rmdir($file);
                    }
                }
            }

            $json['success'] = Yii::t('filemanager', 'Success: Your file or directory has been deleted!');
        }

        echo CJSON::encode($json);
    }

    public function actionMove() {
        $json = array();

        if (isset($_POST['from']) && isset($_POST['to'])) {
            $from = rtrim(Yii::app()->params['imagePath'] . 'data/' . str_replace('../', '', html_entity_decode($_POST['from'], ENT_QUOTES, 'UTF-8')), '/');

            if (!file_exists($from)) {
                $json['error'] = Yii::t('filemanager', 'Warning: File or directory does not exist!');
            }

            if ($from == Yii::app()->params['imagePath'] . 'data') {
                $json['error'] = Yii::t('filemanager', 'Warning: Can not alter your default directory!');
            }

            $to = rtrim(Yii::app()->params['imagePath'] . 'data/' . str_replace('../', '', html_entity_decode($_POST['to'], ENT_QUOTES, 'UTF-8')), '/');

            if (!file_exists($to)) {
                $json['error'] = Yii::t('filemanager', 'Warning: Move to directory does not exists!');
            }

            if (file_exists($to . '/' . basename($from))) {
                $json['error'] = Yii::t('filemanager', 'Warning: A file or directory with the same name already exists!');
            }
        } else {
            $json['error'] = Yii::t('filemanager', 'Warning: Please select a directory!');
        }
        
        // TODO: check permissions
        /*if (!$this->user->hasPermission('modify', 'common/filemanager')) {
            $json['error'] = Yii::t('filemanager', 'Warning: Permission Denied!');
        }*/

        if (!isset($json['error'])) {
            rename($from, $to . '/' . basename($from));

            $json['success'] = Yii::t('filemanager', 'Success: Your file or directory has been moved!');
        }

        echo CJSON::encode($json);
    }

    public function actionCopy() {
        $json = array();

        if (isset($_POST['path']) && isset($_POST['name'])) {
            if ((strlen($_POST['name']) < 3) || (strlen($_POST['name']) > 255)) {
                $json['error'] = Yii::t('filemanager', 'Warning: Filename must be a between 3 and 255!');
            }

            $old_name = rtrim(Yii::app()->params['imagePath'] . 'data/' . str_replace('../', '', html_entity_decode($_POST['path'], ENT_QUOTES, 'UTF-8')), '/');

            if (!file_exists($old_name) || $old_name == Yii::app()->params['imagePath'] . 'data') {
                $json['error'] = Yii::t('filemanager', 'Warning: Can not copy this file or directory!');
            }

            if (is_file($old_name)) {
                $ext = strrchr($old_name, '.');
            } else {
                $ext = '';
            }

            $new_name = dirname($old_name) . '/' . str_replace('../', '', html_entity_decode($_POST['name'], ENT_QUOTES, 'UTF-8') . $ext);

            if (file_exists($new_name)) {
                $json['error'] = Yii::t('filemanager', 'Warning: A file or directory with the same name already exists!');
            }
        } else {
            $json['error'] = Yii::t('filemanager', 'Warning: Please select a directory or file!');
        }

        // TODO: check permissions
        /*if (!$this->user->hasPermission('modify', 'common/filemanager')) {
            $json['error'] = Yii::t('filemanager', 'Warning: Permission Denied!');
        }*/

        if (!isset($json['error'])) {
            if (is_file($old_name)) {
                copy($old_name, $new_name);
            } else {
                $this->recursiveCopy($old_name, $new_name);
            }

            $json['success'] = Yii::t('filemanager', 'Success: Your file or directory has been copied!');
        }

        echo CJSON::encode($json);
    }
    
    public function actionFolders() {
        echo $this->recursiveFolders(Yii::app()->params['imagePath'] . 'data/');
    }
    
    public function actionRename() {
        $json = array();

        if (isset($_POST['path']) && isset($_POST['name'])) {
            if ((strlen($_POST['name']) < 3) || (strlen($_POST['name']) > 255)) {
                $json['error'] = Yii::t('filemanager', 'Warning: Filename must be a between 3 and 255!');
            }

            $old_name = rtrim(Yii::app()->params['imagePath'] . 'data/' . str_replace('../', '', html_entity_decode($_POST['path'], ENT_QUOTES, 'UTF-8')), '/');

            if (!file_exists($old_name) || $old_name == Yii::app()->params['imagePath'] . 'data') {
                $json['error'] = Yii::t('filemanager', 'Warning: Can not rename this directory!');
            }

            if (is_file($old_name)) {
                $ext = strrchr($old_name, '.');
            } else {
                $ext = '';
            }

            $new_name = dirname($old_name) . '/' . str_replace('../', '', html_entity_decode($_POST['name'], ENT_QUOTES, 'UTF-8') . $ext);

            if (file_exists($new_name)) {
                $json['error'] = Yii::t('filemanager', 'Warning: A file or directory with the same name already exists!');
            }
        }
        
        // TODO: check permissions
        /*if (!$this->user->hasPermission('modify', 'common/filemanager')) {
            $json['error'] = Yii::t('filemanager', 'Warning: Permission Denied!');
        }*/

        if (!isset($json['error'])) {
            rename($old_name, $new_name);

            $json['success'] = Yii::t('filemanager', 'Success: Your file or directory has been renamed!');
        }

        echo CJSON::encode($json);
    }

    public function actionUpload() {
        $json = array();

        if (isset($_POST['directory'])) {
            if (isset($_FILES['image']) && $_FILES['image']['tmp_name']) {
                $filename = basename(html_entity_decode($_FILES['image']['name'], ENT_QUOTES, 'UTF-8'));

                if ((strlen($filename) < 3) || (strlen($filename) > 255)) {
                    $json['error'] = Yii::t('filemanager', 'Warning: Filename must be a between 3 and 255!');
                }

                $directory = rtrim(Yii::app()->params['imagePath'] . 'data/' . str_replace('../', '', $_POST['directory']), '/');

                if (!is_dir($directory)) {
                    $json['error'] = Yii::t('filemanager', 'Warning: Please select a directory!');
                }

                if ($_FILES['image']['size'] > 300000) {
                    $json['error'] = Yii::t('filemanager', 'Warning: File too big please keep below 300kb and no more than 1000px height or width!');
                }

                $allowed = array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png',
                    'image/x-png',
                    'image/gif',
                    'application/x-shockwave-flash'
                );

                if (!in_array($_FILES['image']['type'], $allowed)) {
                    $json['error'] = Yii::t('filemanager', 'Warning: Incorrect file type!');
                }

                $allowed = array(
                    '.jpg',
                    '.jpeg',
                    '.gif',
                    '.png',
                    '.flv'
                );

                if (!in_array(strtolower(strrchr($filename, '.')), $allowed)) {
                    $json['error'] = Yii::t('filemanager', 'Warning: Incorrect file type!');
                }

                if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
                    $json['error'] = 'error_upload_' . $_FILES['image']['error'];
                }
            } else {
                $json['error'] = Yii::t('filemanager', 'Warning: Please select a file!');
            }
        } else {
            $json['error'] = Yii::t('filemanager', 'Warning: Please select a directory!');
        }
        
        // TODO: add permission verification
        /*if (!$this->user->hasPermission('modify', 'common/filemanager')) {
            $json['error'] = Yii::t('filemanager', 'Warning: Permission Denied!');
        }
        */

        if (!isset($json['error'])) {
            if (@move_uploaded_file($_FILES['image']['tmp_name'], $directory . '/' . $filename)) {
                $json['success'] = Yii::t('filemanager', 'Success: Your file has been uploaded!');
            } else {
                $json['error'] = Yii::t('filemanager', 'Warning: File could not be uploaded for an unknown reason!');
            }
        }

        echo CJSON::encode($json);
    }

    function recursiveCopy($source, $destination) {
        $directory = opendir($source);

        @mkdir($destination);

        while (false !== ($file = readdir($directory))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($source . '/' . $file)) {
                    $this->recursiveCopy($source . '/' . $file, $destination . '/' . $file);
                } else {
                    copy($source . '/' . $file, $destination . '/' . $file);
                }
            }
        }

        closedir($directory);
    }

    protected function recursiveFolders($directory) {
        $output = '';
        $output .= '<option value="' . substr($directory, strlen(Yii::app()->params['imagePath'] . 'data/')) . '">' . substr($directory, strlen(Yii::app()->params['imagePath'] . 'data/')) . '</option>';

        $directories = glob(rtrim(str_replace('../', '', $directory), '/') . '/*', GLOB_ONLYDIR);
        
        foreach ($directories as $directory) {
            $output .= $this->recursiveFolders($directory);
        }

        return $output;
    }

}

?>
