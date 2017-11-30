<?php
namespace sunnnnn\select;

use yii\web\AssetBundle;

class SelectAsset extends AssetBundle{ 
    
    public $sourcePath = __DIR__;
    
    public $css = [
        'css/select2.min.css'
    ];
    
    public $js = [
        'js/select2.min.js',
        'js/i18n/zh-CN.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
