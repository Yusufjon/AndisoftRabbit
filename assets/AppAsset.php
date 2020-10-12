<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
 "https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css",

      "frontasset/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css",
        "frontasset/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css",
       "frontasset/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css",
        "frontasset/css/bootstrap.min.css",
       "frontasset/css/icons.min.css",
       "frontasset/css/app.min.css",
                       
    ];
    public $js = [
  "https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js",
   "frontasset/libs/bootstrap/js/bootstrap.bundle.min.js",
   "frontasset/libs/metismenu/metisMenu.min.js",
   "frontasset/libs/simplebar/simplebar.min.js",
   "frontasset/libs/node-waves/waves.min.js",
   "frontasset/libs/apexcharts/apexcharts.min.js",
   "frontasset/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js",
   "frontasset/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js",
   "frontasset/libs/datatables.net/js/jquery.dataTables.min.js",
   "frontasset/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js",
   "frontasset/libs/datatables.net-responsive/js/dataTables.responsive.min.js",
   "frontasset/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js",
   "frontasset/js/app.js",
   "//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js",

    ];

    public $depends = [
        'yii\web\YiiAsset',
      
    ];
}
