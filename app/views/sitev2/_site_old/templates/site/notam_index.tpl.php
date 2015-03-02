<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
    <body>
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
                <?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>

                <div class="notamPageInfoWrapper">
                    <div class="notamPageInfoLeft">
                        <?=($offset > 0 ? '[<a href="'.$prevURI.'">Previous Page</a>]' : '&nbsp;')?>
                    </div>
                    <div class="notamPageInfoCenter">
                        <div id="notamFilter">
                            Filter:
                            <select>
                                <option name="1">General News</option>
                                <option name="2">Training News</option>
                            </select>
                        </div>
                        <div id="notamPageInfo">
                            <strong>Page <?=($total > 0 ? floor($offset/$limit)+1 : 0)?> of <?=ceil($total/$limit)?> //
                            Displaying NOTAMs <?=($total > 0 ? $offset+1 : 0)?> to <?=($total > 0 ? (($offset+$limit) > $total ? $total : $offset+$limit) : 0)?></strong>
                        </div>
                    </div>
                    <div class="notamPageInfoRight">
                        <?=($offset < ($total-$limit) ? '[<a href="'.$nextURI.'">Next Page</a>]' : '&nbsp;')?>
                    </div>
                    <div class="clearBoth"></div>
                </div>

                <?php foreach($notams as $key => $notam){ ?>
				<div class="newsContentWrapper">
					<h3><a style="color: #646565; font-size: 13px;" href="<?=Registry::get("URIGenerator")->generate("notam", "display", "site", array("notamID" => $notam->notamID))?>"><?=$notam->title?></a></h3>
					<div class="newsContent"><?php if (!empty($notam->stem_f)){?><?=$notam->stem_f?>...
                   			<?php }else{ echo "There doesnt seem to be a short description written, try clicking on the link to show the entire NOTAM."; }?></div>
					<div class="newsWrittenBy">
						<a href="<?=Registry::get("URIGenerator")->generate("notam", "display", "site", array("notamID" => $notam->notamID))?>">Click here to read more</a><br />
						<em>Written by <?=$notam->author?> -- <?=$notam->timestamp_f?></em>
					</div>
					<div class="clearBoth"></div>
				</div>
                <?php } ?>

                <div class="notamPageInfoWrapper">
                    <div class="notamPageInfoLeft">
                        <?=($offset > 0 ? '[<a href="'.$prevURI.'">Previous Page</a>]' : '&nbsp;')?>
                    </div>
                    <div class="notamPageInfoCenter">
                        <div id="notamPageInfo">
                            <strong>Page <?=($total > 0 ? floor($offset/$limit)+1 : 0)?> of <?=ceil($total/$limit)?> //
                            Displaying NOTAMs <?=($total > 0 ? $offset+1 : 0)?> to <?=($total > 0 ? (($offset+$limit) > $total ? $total : $offset+$limit) : 0)?></strong>
                        </div>
                    </div>
                    <div class="notamPageInfoRight">
                        <?=($offset < ($total-$limit) ? '[<a href="'.$nextURI.'">Next Page</a>]' : '&nbsp;')?>
                    </div>
                    <div class="clearBoth"></div>
                </div>

            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>