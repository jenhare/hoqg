<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

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

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');


// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />



	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body >	<!-- Body -->


	<header class="row-fluid">

	<!--Guest navigation bar - stick -->	

	    <nav class="span12 navbar navbar-static-top">
	       
	            <div class="navbar-inner">
                <div class="container-fluid"> 
		                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                           <b> Menu</b>
		                      <span class="icon-bar"></span> 
		                      <span class="icon-bar"></span> 
		                      <span class="icon-bar"></span>
		                  </a>
		                  

		                	
		                  <div class="nav-collapse collapse">
		                    <jdoc:include type="modules" name="topmenu" style="none" />
		                  </div>
                </div>
                </div>
	        </div>
        </nav>
		<div class="span6">
					<h1><a href="<?php echo $this->baseurl?>">Heart of Ohio Quilter's Guild</a></h1>
		</div> 
		<div class="header-search pull-right">
						<jdoc:include type="modules" name="position-0" style="none" />
		</div>
	</header>  
	
	<!-- navigation bar - stick -->	
	<div class="row-fluid">
	    <nav class="span12 navbar navbar-static-top">
	       
	            <div class="navbar-inner">
                <div class="container-fluid"> 
		                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                           <b> Menu</b>
		                      <span class="icon-bar"></span> 
		                      <span class="icon-bar"></span> 
		                      <span class="icon-bar"></span>
		                  </a>
		                  

		                	
		                  <div class="nav-collapse collapse">
		                    <jdoc:include type="modules" name="position-1" style="none" />
		                  </div>
                </div>
                </div>
	        </div>
        </nav>
    </div
	
	<jdoc:include type="modules" name="banner" style="xhtml" />
<div class="row-fluid">
	
	<div id="bgwrap">
		<div class="row-fluid">
			<jdoc:include type="modules" name="banner2" style="xhtml" />
		</div>

		<div class="row-fluid">
				<?php if ($this->countModules('position-8')) : ?>
					<!-- Begin Sidebar -->
					<div id="sidebar" class="span3">
						<div class="sidebar-nav">
							<jdoc:include type="modules" name="position-8" style="xhtml" />
						</div>
					</div>
					<!-- End Sidebar -->
				<?php endif; ?>
				<main id="content" role="main" class="<?php echo $span; ?>">
					<!-- Begin Content -->
					<jdoc:include type="modules" name="position-3" style="xhtml" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="position-2" style="none" />
					<!-- End Content -->
				</main>
				<?php if ($this->countModules('position-7')) : ?>
					<div id="aside" class="span3">
						<!-- Begin Right Sidebar -->
						<jdoc:include type="modules" name="position-7" style="well" />
						<!-- End Right Sidebar -->
					</div>
				<?php endif; ?>

			</div>


                              	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
			<hr />
			<jdoc:include type="modules" name="footer" style="none" />
			<p class="pull-right">
				<a href="#top" id="back-top">
					<?php echo JText::_('TPL_PROTOSTAR_BACKTOTOP'); ?>
				</a>
			</p>
			<p>
				&copy; <?php echo date('Y'); ?> <?php echo 'Heart of Ohio Quilters Guild'; ?>
			</p>
		</div>
	</footer>
		</div>
</div> /*bgwrap end */
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
