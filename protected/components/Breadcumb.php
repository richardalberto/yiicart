<?php

class Breadcumb extends CInputWidget {

    public $breadcrumbs;

    function run() {
        echo '<ul class="breadcrumb">';
        echo '  <li><a href="' . Yii::app()->createUrl('/site/index').'">' . Yii::t('common', 'Home') . '</a> <span class="divider">/</span></li>';
        foreach ($this->breadcrumbs as $breadcrumb){
            if ($breadcrumb == end($this->breadcrumbs))
                echo '<li class="active">' . $breadcrumb . '</li>';
            else
                echo '<li><a href="#">' . $breadcrumb . '</a> <span class="divider">/</span></li>';
        }
         
        echo '</ul>';
    }

}