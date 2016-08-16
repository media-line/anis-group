<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Use of Google Font
if ($this->params->get('googleFont'))
{
	$doc->addStyleSheet('//fonts.googleapis.com/css?family=' . $this->params->get('googleFontName'));
	$doc->addStyleDeclaration("
	h1, h2, h3, h4, h5, h6, .site-title {
		font-family: '" . str_replace('+', ' ', $this->params->get('googleFontName')) . "', sans-serif;
	}");
}

// Template color
if ($this->params->get('templateColor'))
{
	$doc->addStyleDeclaration("
	body.site {
		border-top: 3px solid " . $this->params->get('templateColor') . ";
		background-color: " . $this->params->get('templateBackgroundColor') . ";
	}
	a {
		color: " . $this->params->get('templateColor') . ";
	}
	.nav-list > .active > a,
	.nav-list > .active > a:hover,
	.dropdown-menu li > a:hover,
	.dropdown-menu .active > a,
	.dropdown-menu .active > a:hover,
	.nav-pills > .active > a,
	.nav-pills > .active > a:hover,
	.btn-primary {
		background: " . $this->params->get('templateColor') . ";
	}");
}

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle'), ENT_COMPAT, 'UTF-8') . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}

// Add JavaScript Frameworks
$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/js/template.js');
// Add Stylesheets
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/template.css');
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<!--[if lt IE 9]><script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->

	<!-- Подключение Bootstrap -->
	<link type="text/css" rel="stylesheet" href="/bootstrap-3.3.2/css/bootstrap.css" />
	<script type="text/javascript" src="/bootstrap-3.3.2/js/bootstrap.min.js"></script>

	<!-- Подключение собственного CSS -->
	<link type="text/css" rel="stylesheet" href="/templates/protostar/css/custom.css" />

</head>
	<body>
		<div class="container">
			<div class="header">
				<div class="logo  col-md-2"></div>
				<div class="main_menu  col-md-8">
					<jdoc:include type="modules" name="main_menu" style="xhtml" />
				</div>
				<div class="lang  col-md-2">
					<jdoc:include type="modules" name="lang" style="xhtml" />
				</div>
			</div>
            <?php
            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            if ($menu->getActive() != $menu->getDefault())
            {
                echo '   <jdoc:include type="modules" name="position-2" style="xhtml" /> <jdoc:include type="component" /><jdoc:include type="modules" name="mod_map" style="xhtml" />';
            } ?>
			<div class="top_slider">
                <jdoc:include type="modules" name="top_slider" style="xhtml" />
			</div>
            <div class="clearfix"></div>
			<div class="blocks">
                <jdoc:include type="modules" name="blocks" style="xhtml" />
			</div>
			<div class="bottom_slider"></div>
			<div class="list_of_articles">
                <jdoc:include type="modules" name="list_of_articles" style="xhtml" />
            </div>
			<footer>
				<div class="copyright">
						<jdoc:include type="modules" name="copyright" style="xhtml" />
				</div>
				<div class="bottom_menu">
						<jdoc:include type="modules" name="bottom_menu" style="xhtml" />
						<jdoc:include type="modules" name="services_menu" style="xhtml" />
				</div>
				<div class="right_footer">
					<div class="phone">
							<img src="/images/phone.png" /> <jdoc:include type="modules" name="phone" style="xhtml" />
					</div>
					<div class="medialine">
							<p>Разработка сайта - <a target="_blank" href="http://www.medialine.by">Медиа Лайн</a></p>
					</div>
				</div>
			</footer>
		</div>
	</body>
</html>
