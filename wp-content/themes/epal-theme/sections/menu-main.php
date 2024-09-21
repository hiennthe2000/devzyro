<!--
- Menu main
-->
<?php
$currentURL = "http" . (isset($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$path = parse_url($currentURL, PHP_URL_PATH);
$parts = explode('/', trim($path, '/'));
$current_menu = end($parts);
?>
<input type="hidden" id="current-menu" value="<?php echo $current_menu; ?>">

<header id="menu-main" class="menu-main">
    <div class="container">
        <div class="menu-main-body row menu-pc">
            <div class="logo col-3">
                <?php if (get_field('logo', 'option')): $logo_header = get_field('logo', 'option');?>
                <?php $link_logo_pc = get_field('link_logo_pc', 'option');?>
                <a href="<?php echo $link_logo_pc ? $link_logo_pc : home_url(); ?>">
                    <img src="<?php echo $logo_header['url'] ?>" alt="<?php echo $logo_header['alt'] ?>">
                </a>
                <?php endif;?>
            </div>
            <div class="menu-main-right col-9">
                <div class="menu-active ">
                    <?php wp_nav_menu(['theme_location' => 'menu_main']);?>
                </div>
                <div class="search">
                    <form class="search-form" action="/" method="GET" role="form" _lpchecked="1">
                        <input type="hidden" name="post_type" value="post">
                        <button type="submit" class="btn-search" value="Search"><i class="fa fa-search"></i></button>
                        <input type="text" name="s" id="s-home" autocomplete="off" placeholder="Tìm kiếm">
                    </form>
                </div>
            </div>
        </div>
        <div class="menu-main-body row menu-mobile">
            <div id="overlay"></div>
            <div class="logo col-6">
                <?php if (get_field('logo', 'option')): $logo_header = get_field('logo', 'option');?>
                <?php $link_logo_mb = get_field('link_logo_mobile', 'option');?>
                <a href="<?php echo $link_logo_mb ? $link_logo_mb : home_url(); ?>">
                    <img src="<?php echo $logo_header['url'] ?>" alt="<?php echo $logo_header['alt'] ?>">
                </a>
                <?php endif;?>
            </div>
            <div class="menu-main-right col-6">
                <div class="menu-active-mobile">
                    <div class="box-header-mobile">
                        <div class="logo">
                            <?php if (get_field('logo_mobile', 'option')): $logo_mobile = get_field('logo_mobile', 'option');?>
                            <a href="<?php echo $link_logo_mb ? $link_logo_mb : home_url(); ?>">
                                <img src="<?php echo $logo_mobile['url'] ?>" alt="<?php echo $logo_mobile['alt'] ?>">
                            </a>
                            <?php endif;?>
                        </div>
                        <div class="button-close" id="hide-mobile">
                            X
                        </div>
                    </div>
                    <div class="search">
                        <form class="search-form" action="/" method="GET" role="form" _lpchecked="1">
                            <input type="hidden" name="post_type" value="post">
                            <button type="submit" class="btn-search" value="Search"><i
                                    class="fa fa-search"></i></button>
                            <input type="text" name="s" id="s-home" autocomplete="off" placeholder="Tìm kiếm">
                        </form>
                    </div>
                    <?php wp_nav_menu(['theme_location' => 'menu_main']);?>
                </div>
                <i id="show-mobile" class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</header>