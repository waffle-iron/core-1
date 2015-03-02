

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
                    Posted in <strong><?=$notam->categoryID?></strong>. <a style="color: #6a9fc0;"
                                                                           href="<?=Registry::get("URIGenerator")->generate("notam", "display", "site", array("notamID" => $notam->notamID))?>">Click
                        here to read more</a><br/>
                    <em>Written by <?=$notam->authorID?>. <?=$notam->timestamp?></em>
                </div>
                <div class="clearBoth"></div>
            </div>
        <?php } ?>
    </div>
<?php endif;  ?>