<?php defined('C5_EXECUTE') or die("Access Denied."); 

$this->inc('elements/header_top.php'); ?>

<header class="header-bar">
	<div class="container">
		<div class="row">
			<div class="header-brand col-md-3 col-sm-5 col-xs-10">
                <a href="#" title=Minnesota Marine Art Museum">
                    <img src="http://www.mmam.org/Portals/0/logo.png" alt="Minnesota Marine Art Museum">
                </a>
			</div>
            <div class="header-tagline col-md-6">
                <h2>GREAT ART INSPIRED BY WATER</h2>
            </div>
            <div class="header-social col-md-3 col-sm-5 col-xs-10">
                <ul class="scohial pull-right">
                    <li>
                        <a href="https://www.facebook.com/pages/Minnesota-Marine-Art-Museum/190926643382" target="_blank">
                            <img src="http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_facebook_off.png" onmouseover="this.src='http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_facebook_on.png'" onmouseout="this.src='http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_facebook_off.png'" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/MMAMArtStream" target="_blank">
                            <img src="http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_twitter_off.png" onmouseover="this.src='http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_twitter_on.png'" onmouseout="this.src='http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_twitter_off.png'" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="/Interact/MMAM-Art-Stream">
                            <img src="http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_rss_off.png" onmouseover="this.src='http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_rss_on.png'" onmouseout="this.src='http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_rss_off.png'" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="/Learn/Calendar">
                            <img src="http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_calendar_off.png" onmouseover="this.src='http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_calendar_on.png'" onmouseout="this.src='http://www.mmam.org/Portals/_default/Skins/MMAM/img/social_calendar_off.png'" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<header class="header-nav-bar">
    <div class="container">
        <div class="row">
            <div class="header-nav col-md-12 col-sm-7 col-xs-2">
                <?php
                $a = new GlobalArea('Header Navigation');
                $a->display();
                ?>
            </div>
        </div>
    </div>
</header>