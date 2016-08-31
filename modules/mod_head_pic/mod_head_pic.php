<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_footer
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;


//подключаем css-файл модуля
$document =JFactory::getDocument();
$document->addStyleSheet('modules/mod_head_pic/tmpl/css/mod_head_pic.css');

$pathname = $_SERVER['REQUEST_URI'];

$slide1 = $params->get('img0');
$slide2 = $params->get('img1');
$slide3 = $params->get('img2');
$slide4 = $params->get('img3');

    if(strpos($pathname, 'inzhenernoe-proektirovanie') !== false) {
        echo '
            <img src="'. $slide1 .'" style="width: 100%;" />;
        ';
    } elseif(strpos($pathname, 'tekhnicheskie-perevody') !== false) {
        echo '
            <img src="'. $slide2 .'" style="width: 100%;" />
        ';
    } elseif(strpos($pathname, '3d-proektirovanie') !== false) {
        echo '
            <img src="'. $slide3 .'" style="width: 100%;" />
        ';
    } elseif(strpos($pathname, 'inzhenernye-raschety') !== false) {
        echo '
            <img src="'. $slide4 .'" style="width: 100%;" />
        ';
    }