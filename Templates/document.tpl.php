<!doctype html>
<?php
use Lightning\Tools\ClientUser;
use Lightning\Tools\Messenger;
use Lightning\View\Menu;

\macdabby\lightning_foundation\View\Foundation::init();
?>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $this->build(['metadata', 'Lightning']); ?>
    <?= $this->renderHeader(); ?>
</head>
<body>
<div style="min-height: 100vh; display: flex; flex-direction: column;">
        <?php if (empty($hide_header)): ?>
            <div>
                <?= \Lightning\View\CMS::embed('site_template_header'); ?>
            </div>
        <?php endif; ?>
        <?php if (empty($hide_menu) || ClientUser::getInstance()->isAdmin()): ?>
        <div class="menu" id="menu-container" style="z-index: 100000" data-sticky-container>
            <div class="sticky" style="width:100%" data-sticky data-margin-top="0" data-top-anchor="menu-container">
                <div class="row">
                    <?php if (empty($hide_menu)): ?>
                        <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
                            <button class="menu-icon" type="button" data-toggle="main-menu"></button>
                            <div class="title-bar-title">Menu</div>
                        </div>
                        <div class="top-bar" id="main-menu">
                            <div class="top-bar-left hide-for-small-only">
                                <ul class="vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown">
                                    <li class="menu-text"><a href="/"><?= \Lightning\View\CMS::plain('site_name', ['default' => 'Your new site!']); ?></a></li>
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
                        <div class="title-bar" data-responsive-toggle="admin-menu" data-hide-for="medium">
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
                    <?php if (!empty($right_column)): ?>
                        <div class="medium-8 columns">
                            <?php if (!empty($page_header)): ?>
                                <h1 id="page_header"><?=$page_header?></h1>
                            <?php
                            endif;
                            echo Messenger::renderErrorsAndMessages();
                            if (!empty($content)) :
                                $this->build($content);
                            endif; ?>
                        </div>
                        <div class="small-12 medium-4 columns right-column">
                            <?php $this->build('right_column'); ?>
                        </div>
                    <?php else: ?>
                        <div class="large-12 columns">
                            <?php if (!empty($page_header)): ?>
                                <h1 id="page_header"><?=$page_header?></h1>
                            <?php
                            endif;
                            echo Messenger::renderErrorsAndMessages();
                            if (!empty($content)) :
                                $this->build($content);
                            endif; ?>
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
            <div style="margin-top:auto;">
                <?= \Lightning\View\CMS::embed('site_template_footer'); ?>
                footer
            </div>
        <?php endif; ?>
</div>
<?= $this->renderFooter(); ?>
</body>
</html>
