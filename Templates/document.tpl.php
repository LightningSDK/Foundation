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
<body class="antialiased hide-extras">
<div class="marketing off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">

        <?php if (empty($hide_header)): ?>
            <div style="overflow:hidden">
                <?= \Lightning\View\CMS::embed('site_template_header'); ?>
            </div>
        <?php endif; ?>
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
                            <?php if ((array)$site->site_menu): ?>
                                <?= Menu::render($site->site_menu); ?>
                            <?php else: ?>
                                <li class="home"><a href="/">Home</a></li>
                                <li class="blog"><a href="/blog">Blog</a></li>
                                <li class="contact"><a href="/contact">Contact</a></li>
                            <?php endif; ?>
                            <li>
                                <?php if (ClientUser::getInstance()->isImpersonating()): ?>
                                    <a href="/user?action=stop-impersonating">Return to Admin User</a>
                                <?php endif; ?>
                                <?php if (ClientUser::getInstance()->id > 0): ?>
                                    <a href="/user?action=logout">Log Out</a>
                                <?php else: ?>
                                    <a href="/user">Log In</a>
                                <?php endif; ?>
                            </li>
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
                            <li class="has-dropdown not-click">
                                <a href="/admin/blog/edit">Blog</a>
                                <ul class="menu">
                                    <li><a href="/admin/blog/edit">Blog Posts</a></li>
                                    <li><a href="/admin/blog/categories">Blog Categories</a></li>
                                </ul>
                            </li>
                            <li><a href="/admin/pages">Pages</a></li>
                            <li><a href="/admin/users">Users</a></li>
                            <li class="has-dropdown not-click">
                                <a href="/admin/mailing/lists">Mailing</a>
                                <ul class="menu">
                                    <li><a href="/admin/mailing/lists">Mailing Lists</a></li>
                                    <li><a href="/admin/mailing/templates">Templates</a></li>
                                    <li><a href="/admin/mailing/messages">Messages</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <section role="main" class="scroll-container">
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
        </section>
        <?php if (empty($hide_footer)): ?>
            <?= \Lightning\View\CMS::embed('site_template_footer'); ?>
        <?php endif; ?>
    </div>
</div>
<?= $this->renderFooter(); ?>
</body>
</html>
