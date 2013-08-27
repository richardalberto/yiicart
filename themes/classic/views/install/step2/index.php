
<?php if (Yii::app()->user->hasFlash('warning')): ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Error</h4>
                <?php echo Yii::app()->user->getFlash('warning'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<legend>1. Please configure your PHP settings to match requirements listed below.</legend>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="35%" align="left"><b>PHP Settings</b></th>
            <th width="25%" align="left"><b>Current Settings</b></th>
            <th width="25%" align="left"><b>Required Settings</b></th>
            <th width="15%" align="center"><b>Status</b></th>
        </tr>
    </thead>
    <tbody>
        <tr class="<?php if (phpversion() < '5.0'): ?>error<?php endif; ?>">
            <td>PHP Version:</td>
            <td><?php echo phpversion(); ?></td>
            <td>5.0+</td>
            <td><?php if (phpversion() > '5.0'): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
        <tr class="<?php if (ini_get('register_globals')): ?>error<?php endif; ?>">
            <td>Register Globals:</td>
            <td><?php echo ini_get('register_globals') ? 'On' : 'Off'; ?></td>
            <td>Off</td>
            <td><?php if (!ini_get('register_globals')): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
        <tr class="<?php if (ini_get('magic_quotes_gpc')): ?>error<?php endif; ?>">
            <td>Magic Quotes GPC:</td>
            <td><?php echo (ini_get('magic_quotes_gpc')) ? 'On' : 'Off'; ?></td>
            <td>Off</td>
            <td><?php if (!ini_get('magic_quotes_gpc')): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
        <tr class="<?php if (!ini_get('file_uploads')): ?>error<?php endif; ?>">
            <td>File Uploads:</td>
            <td><?php echo ini_get('file_uploads') ? 'On' : 'Off'; ?></td>
            <td>On</td>
            <td><?php if (ini_get('file_uploads')): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
        <tr class="<?php if (ini_get('session_auto_start')): ?>error<?php endif; ?>">
            <td>Session Auto Start:</td>
            <td><?php echo (ini_get('session_auto_start')) ? 'On' : 'Off'; ?></td>
            <td>Off</td>
            <td><?php if (!ini_get('session_auto_start')): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
    </tbody>
</table>
<br />

<legend>2. Please make sure the PHP extensions listed below are installed.</legend>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="35%" align="left"><b>Extension</b></th>
            <th width="25%" align="left"><b>Current Settings</b></th>
            <th width="25%" align="left"><b>Required Settings</b></th>
            <th width="15%" align="center"><b>Status</b></th>
        </tr>
    </thead>
    <tbody>
        <tr class="<?php if (!extension_loaded('mysql')): ?>error<?php endif; ?>">
            <td>MySQL:</td>
            <td><?php echo extension_loaded('mysql') ? 'On' : 'Off'; ?></td>
            <td>On</td>
            <td><?php if (extension_loaded('mysql')): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
        <tr class="<?php if (!extension_loaded('gd')): ?>error<?php endif; ?>">
            <td>GD:</td>
            <td><?php echo extension_loaded('gd') ? 'On' : 'Off'; ?></td>
            <td>On</td>
            <td><?php if (extension_loaded('gd')): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
        <tr class="<?php if (!extension_loaded('curl')): ?>error<?php endif; ?>">
            <td>cURL:</td>
            <td><?php echo extension_loaded('curl') ? 'On' : 'Off'; ?></td>
            <td>On</td>
            <td><?php if (extension_loaded('curl')): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
        <tr class="<?php if (!function_exists('mcrypt_encrypt')): ?>error<?php endif; ?>">
            <td>mCrypt:</td>
            <td><?php echo function_exists('mcrypt_encrypt') ? 'On' : 'Off'; ?></td>
            <td>On</td>
            <td><?php if (function_exists('mcrypt_encrypt')): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
        <tr class="<?php if (!extension_loaded('zlib')): ?>error<?php endif; ?>">
            <td>ZIP:</td>
            <td><?php echo extension_loaded('zlib') ? 'On' : 'Off'; ?></td>
            <td>On</td>
            <td><?php if (extension_loaded('zlib')): ?><i class="icon-check"></i><?php else: ?><i class="icon-check-empty"></i><?php endif; ?></td>
        </tr>
    </tbody>
</table>
<br />

<legend>3. Please make sure you have set the correct permissions on the files list below.</legend>
<table class="table table-striped">
    <thead>
        <tr>
            <th align="left"><b>Files</b></th>
            <th align="left"><b>Status</b></th>
        </tr>
    </thead>
    <tbody>
        <tr class="<?php if (!is_writable($configFile)): ?>error<?php endif; ?>">
            <td><?php echo $configFile; ?></td>
            <td>
                <?php if (!file_exists($configFile)) { ?>
                    <span class="text-error">Missing</span>
                <?php } elseif (!is_writable($configFile)) { ?>
                    <span class="text-error">Unwritable</span>
                <?php } else { ?>
                    <span class="text-success">Writable</span>
                <?php } ?>
            </td>
        </tr>
    </tbody>
</table>
<br />

<legend>4. Please make sure you have set the correct permissions on the directories list below.</legend>
<table class="table table-striped">
    <thead>
        <tr>
            <th align="left"><b>Directories</b></th>
            <th align="left"><b>Status</b></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $assetsPath; ?></td>
            <td><?php echo is_writable($assetsPath) ? '<span class="text-success">Writable</span>' : '<span class="text-error">Unwritable</span>'; ?></td>
        </tr>
        <tr>
            <td><?php echo $runtimePath; ?></td>
            <td><?php echo is_writable($runtimePath) ? '<span class="text-success">Writable</span>' : '<span class="text-error">Unwritable</span>'; ?></td>
        </tr>
        <tr>
            <td><?php echo $imagesPath; ?></td>
            <td><?php echo is_writable($imagesPath) ? '<span class="text-success">Writable</span>' : '<span class="text-error">Unwritable</span>'; ?></td>
        </tr>
        <tr>
            <td><?php echo $imagesDataPath; ?></td>
            <td><?php echo is_writable($imagesDataPath) ? '<span class="text-success">Writable</span>' : '<span class="text-error">Unwritable</span>'; ?></td>
        </tr>
    </tbody>
</table>
<div class="row-fluid">
    <div class="span12">
        <a id="back" class="btn btn-primary pull-left" href="<?php echo $this->createUrl('/install/step1'); ?>"><?php echo Yii::t('common', 'Back'); ?></a>
        <a id="continue" class="btn btn-primary pull-right" href="<?php echo $this->createUrl('validate'); ?>"><?php echo Yii::t('common', 'Continue'); ?></a>
    </div>
</div>