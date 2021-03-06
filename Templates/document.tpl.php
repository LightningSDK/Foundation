<!doctype html>
<?php
use lightningsdk\core\Tools\ClientUser;
use lightningsdk\core\Tools\Messenger;
use lightningsdk\core\Tools\Request;
use lightningsdk\core\View\Menu;

\lightningsdk\foundation\View\Foundation::init();
?>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $this->build(['metadata', 'lightningsdk/core']); ?>
    <?= $this->renderHeader(); ?>
</head>
<body style="<?= \lightningsdk\core\View\CMS::plain('site_body_style', ['display_only' => true]); ?>" class="no-js <?= \lightningsdk\core\View\CMS::plain('site_body_class', ['display_only' => true]); ?>">
<?php if (ClientUser::getInstance()->isAdmin()): ?>
Body Style: <?= \lightningsdk\core\View\CMS::plain('site_body_style', ['norender' => true]); ?><br>
Body Class: <?= \lightningsdk\core\View\CMS::plain('site_body_class', ['norender' => true]); ?>
<?php endif; ?>
<div style="min-height: 100vh; display: flex; flex-direction: column;">
        <?php if (empty($hide_header)): ?>
            <div class="page-header">
                <?= \lightningsdk\core\View\CMS::embed('site_template_header'); ?>
            </div>
        <?php endif; ?>
        <?php if (empty($hide_menu) || ClientUser::getInstance()->isAdmin()): ?>
        <div id="menu-anchor-top"></div>
        <div id="menu-container" style="z-index: 1000" data-sticky-container>
            <div id="menu-wrapper" class="sticky" style="width:100%" data-sticky data-margin-top="0" data-top-anchor="menu-anchor-top" data-btm-anchor="end-of-content">
                <div class="row">
                    <?php if (empty($hide_menu)): ?>
                        <div class="title-bar hide-for-medium" data-responsive-toggle="main-menu">
                            <button class="menu-icon" type="button" data-toggle="main-menu"></button>
                            <div class="title-bar-title">Menu</div>
                        </div>
                        <div class="top-bar" id="main-menu">
                            <div class="top-bar-left hide-for-small-only">
                                <ul class="vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown">
                                    <li><a href="/"><?= \lightningsdk\core\View\CMS::plain('site_name', ['default' => 'Your new site!', 'display_only' => true, 'cache' => true]); ?></a></li>
                                    <?= \lightningsdk\core\View\SocialMedia\Links::render(); ?>
                                    <li><?= \lightningsdk\core\View\CMS::plain('site_name', ['default' => 'Your new site!', 'norender' => true, 'cache' => true]); ?></li>
                                </ul>
                            </div>
                            <div class="top-bar-right">
                                <ul class="vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown">
                                    <?= Menu::render('main', true); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (ClientUser::getInstance()->isAdmin()): ?>
                        <div class="title-bar hide-for-medium" data-responsive-toggle="admin-menu">
                            <button class="menu-icon" type="button" data-toggle="admin-menu"></button>
                            <div class="title-bar-title">Admin Menu</div>
                        </div>
                        <div class="top-bar" id="admin-menu">
                            <div class="top-bar-left hide-for-small-only">
                                <ul class="vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown">
                                    <li>Admin Menu:</li>
                                </ul>
                            </div>
                            <div class="top-bar-right">
                                <ul class="vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown">
                                    <?= Menu::render('admin'); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div>
            <?php if (empty($full_width)): ?>
                <div class="row">
                    <div class="medium-<?=!empty($right_column)?8:12;?> columns">
                        <?php if (!empty($page_header)): ?>
                            <h1 id="page_header"><?=$page_header?></h1>
                        <?php
                        endif;
                        echo Messenger::renderErrorsAndMessages();
                        if (!empty($content)) :
                            $this->build($content);
                        endif; ?>
                        <?php if (!empty($this->vars['share']) && (Request::getLocation() == '' || Request::getLocation() == 'index')) : ?>
                            <div class="social-share">
                                <?= \lightningsdk\core\View\SocialMedia\Links::render(Request::getURL()); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($right_column)): ?>
                        <div class="small-12 medium-4 columns right-column">
                            <?= \lightningsdk\core\View\CMS::embed('right_column', ['cache' => true]); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <?php
                echo Messenger::renderErrorsAndMessages();
                if (!empty($content)) :
                    $this->build($content);
                endif; ?>
            <?php endif; ?>
        </div>
        <?php if (empty($hide_footer)): ?>
            <div class="page-footer" style="margin-top:auto;">
                <?= \lightningsdk\core\View\CMS::embed('site_template_footer', ['cache' => true]); ?>
            </div>
        <?php endif; ?>
</div>
<?= $this->renderFooter(); ?>
<div id="end-of-content"></div>
</body>
</html>
