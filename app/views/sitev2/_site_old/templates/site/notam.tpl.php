<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
    <body>
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
            	<?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>
				<div class="newsItemWrapper">
    				<h6><?=$notam->title?></h6>

                    <?php //TODO: Link the author to their profile page. ?>
                    <p><em>Written by <?=$notam->author?>,
                       <?=$notam->timestamp_f?></em></p>
                    <p><?=$notam->content_f?></p>
                    <br />

                    <div style='float: left; width:25%' align='left'>
                        [<a class="returnLink" href="<?=Registry::get("URIGenerator")->generate("notam", "index", "site")?>">Return to NOTAMs</a>]
                    </div>
                </div>
            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>