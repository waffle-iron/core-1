<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
        <!-- Online Controllers Map Info -->

        <body onload="runNotams('news'); runEvents('eventsFeed');">
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
                <?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>

                <?=Registry::get("Template")->fetch('site/includes/latestNotam.tpl.php', false)?>

                <?php /*if(isset($event)){ ?>
                <div class="historicEvent">
                    <div id="he-title"><h3><?=$event->title?></h3></div>
                    <div id="he-content"><?=Core::formatContent($event->stem)?></div>
                    <div id="he-link"><a href="<?=$setting_uri_rel?>historic/">Click here to read more</a></div>
                </div>
                <div class="hr">&nbsp;</div>
                <?php } */ ?>

                <?=Registry::get("Template")->fetch('site/includes/upcomingEvents.tpl.php', false) ?>

                <?php if(isset($notams)): ?>
                <div id="news">
                    <ul>
                        <?php foreach(Registry::get("Stats")->getData("fetch_notams") as $notam){ ?>
                        <li><?=$notam->title;?></li>
                        <?php } ?>
                    </ul>
                    <?php foreach(Registry::get("Stats")->getData("fetch_notams") as $notam){ ?>
                    <div class="newsContentWrapperHome" id="news">
                        <h3><?=$notam->title;?></h3>
                        <div class="newsContent"><?=$notam->content?></div>
                        <div class="newsWrittenByHome" id="news-wb">
                            Posted in <strong><?=$notam->categoryID?></strong>. <a style="color: #6a9fc0;" href="<?=Registry::get("URIGenerator")->generate("notam", "display", "site", array("notamID" => $notam->notamID))?>">Click here to read more</a><br />
                            <em>Written by <?=$notam->authorID?>. <?=$notam->timestamp?></em>
                        </div>
                        <div class="clearBoth"></div>
                    </div>
                    <?php } ?>
                </div>
                <?php endif;  ?>
            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>