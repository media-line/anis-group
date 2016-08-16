<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="newsflash<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
			<div class="one-article-new">
				<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
			</div>
	<?php endforeach; ?>
</div>

<a style="margin: 0 auto;" href="/index.php/ru/stati"><button class="btn ansis-btn">Больше статей</button></a>
