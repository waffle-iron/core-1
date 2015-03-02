<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
        <!-- Online Controllers Map Info -->

        <body onload="runNotams('news'); runEvents('eventsFeed');">
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
                <?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>

                <?php if(isset($event)){ ?>
                <div class="historicEvent">
                    <div id="he-title"><h3><?=$event->title?></h3></div>
                    <div id="he-content"><?=Core::formatContent($event->stem)?></div>
                    <div id="he-link"><a href="<?=$setting_uri_rel?>historic/">Click here to read more</a></div>
                </div>
                <div class="hr">&nbsp;</div>
                <?php } ?>

                <div style="font-size:  16px;" align="center"><a href="<?=$setting_uri_rel?>design2/index.php">CLICK ME TO SEE THE NEW DESIGN</a></div>
                sdflkjsdflkjsdflkjsdflkjsdlfkjsdlfkjsdlfkjsdlfkjsdlfkj
                <? //Registry::get("Template")->fetch('site/includes/upcomingEvents.tpl.php', false)?>

                <?php if(isset($notams)): ?>
                <div id="news">
                    <ul>
                        <?php foreach($notams as $key => $notam){ ?>
                        <li><a href="#news-<?=$key?>"><?=(strlen($notam->title) > 40) ? substr($notam->title, 0, 33).'...' : $notam->title;?></a></li>
                        <?php } ?>
                    </ul>
                    <?php foreach($notams as $key => $notam){ ?>
                    <div class="newsContentWrapperHome" id="news-<?=$key?>">
                        <h3><?=$notam->title;?></h3>
                        <div class="newsContent"><?=Core::formatContent($notam->content, 120)?></div>
                        <div class="newsWrittenByHome" id="news-wb-<?=$key?>">
                            Posted in <strong><?=$notam->category?></strong>. <a style="color: #6a9fc0;" href="<?=Registry::get("URIGenerator")->generate("notam", "display", "site", array("notamID" => $notam->notamID))?>">Click here to read more</a><br />
                            <em>Written by <?=$notam->author?> (<?=$notam->authorID?>). <?=$notam->timestamp_f?></em>
                        </div>
                        <div class="clearBoth"></div>
                    </div>
                    <?php } ?>
                </div>
                <?php endif; ?>

                <div id="mapCanvas" style="width: 500px; height: 300px" align="center"></div>
            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>