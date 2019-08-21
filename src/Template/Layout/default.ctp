<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Heart Of Oak Tattoo Manager';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?//= $this->Html->meta('icon') ?>

	<?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
	
    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.3.1/css/solid.css', [
		'integrity' => 'sha384-VGP9aw4WtGH/uPAOseYxZ+Vz/vaTb1ehm1bwx92Fm8dTrE+3boLfF1SpAtB1z7HW',
		'crossorigin' => 'anonymous'
	]) ?>
	<?= $this->Html->css('https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css', [
		'integrity' => 'sha384-1rquJLNOM3ijoueaaeS5m+McXPJCGdr5HcA03/VHXxcp2kX2sUrQDmFc3jR5i/C7',
		'crossorigin' => 'anonymous'
	]) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    
    <!-- Apple WebApp -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    
    <!-- iPhone(first generation or 2G), iPhone 3G, iPhone 3GS -->
	<link rel="apple-touch-icon" sizes="57x57" href="img/icons/touch-icon-iphone.png">
	<!-- iPad and iPad mini @1x -->
	<link rel="apple-touch-icon" sizes="76x76" href="img/icons/touch-icon-ipad.png">
	<!-- iPhone 4, iPhone 4s, iPhone 5, iPhone 5c, iPhone 5s, iPhone 6, iPhone 6s, iPhone 7, iPhone 7s, iPhone8 -->
	<link rel="apple-touch-icon" sizes="120x120" href="img/icons/touch-icon-iphone-retina.png">
	<!-- iPad and iPad mini @2x -->
	<link rel="apple-touch-icon" sizes="152x152" href="img/icons/touch-icon-ipad-retina.png">
	<!-- iPad Pro -->
	<link rel="apple-touch-icon" sizes="167x167" href="img/icons/touch-icon-ipad-pro.png">
	<!-- iPhone X, iPhone 8 Plus, iPhone 7 Plus, iPhone 6s Plus, iPhone 6 Plus -->
	<link rel="apple-touch-icon" sizes="180x180" href="img/icons/touch-icon-iphone-6-plus.png">
	
	<!-- Fav icons, Android and Microsoft -->
	<link rel="icon" type="image/png" sizes="32x32" href="img/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/icons/favicon-16x16.png">
	<link rel="manifest" href="img/icons/site.webmanifest">
	<link rel="mask-icon" href="img/icons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
    
</head>
<body>
	<? if (!$nonav) :?>
    <nav class="top-bar expanded" data-topbar role="navigation">
	    <!--
        <div class="title-area large-2 medium-3 columns menu-title">
	        <h3><?//= $this->Html->link('<i class="fas fa-bars"></i>', [], ['escape' => false]); ?>
	                <?= $this->Html->link($this->fetch('title'), [
	                'controller' => $this->name, 'action' => 'index'
	            ]) ?>
	        </h3>
        </div>
        -->
        <div class="top-bar-section">
            <?= $cakeDescription ?>
        </div>
    </nav>
    <? endif; ?>
    <? //debug($this); ?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
	
	<?= $this->Html->script('foundation/vendor/what-input.js', [ 'type' => 'text/javascript']) ?>
	<?= $this->Html->script('foundation/vendor/foundation.js', [ 'type' => 'text/javascript']) ?>
	<?= $this->Html->script('foundation/app.js', [ 'type' => 'text/javascript']) ?>
    <?= $this->Html->script('main.js', [ 'type' => 'text/javascript']) ?>
    
    <!-- Webapp links fix -->
    <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>

    

</body>
</html>
