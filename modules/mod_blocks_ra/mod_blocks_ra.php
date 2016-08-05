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
$document->addStyleSheet('modules/mod_blocks_ra/tmpl/css/mod_blocks.css');

//задаем количество блоков в модуле
$qtySlides = 4;

?>

<div class="block-wrapper col-md-12">
    <?php for ($i = 0; $i < $qtySlides; $i++) { ?>
        <a id="ablock" class="item col-xs-12  col-sm-6  col-md-3" href="">
            <div class="block-img">
                <div class="block-hover" style="background-image: url('<?php echo $params->get('img'.$i); ?>');">
                    <div class="titleblock">
                        <p><?php echo $params->get('txt'.$i); ?></p>
                    </div>
                </div>
            </div>
        </a>
    <?php } ?>
</div>
<div class="clearfix"></div>
