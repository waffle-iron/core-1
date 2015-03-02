<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
    <body>
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
                <?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>
                <p>Please select the airfield you wish to receive information on.  Airfields are ordered by
                   their name in the left hand column and by ICAO in the right hand column.</p>

				<div class="airfieldsIndexWrapper">
                    <div class="floatLeft">
                        <h2>Sorted by name</h2>
                        <ul>
                            <?php foreach($airfields->name as $airfield){ ?>
                                <li>
                                    <a href="<?=Registry::get("URIGenerator")->generate($airfield->icao)?>">
                                        <?php if($airfield->highlight): ?>
                                            <strong><?=$airfield->name?> (<?=$airfield->icao?> / <?=$airfield->iata?>)</strong>
                                        <?php else: ?>
                                            <?=$airfield->name?> (<?=$airfield->icao?> / <?=$airfield->iata?>)
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="floatRight">
                        <h2>Sorted by ICAO</h2>
                        <ul>
                            <?php foreach($airfields->icao as $airfield){ ?>
                                <li>
                                    <a href="<?=Registry::get("URIGenerator")->generate($airfield->icao)?>">
                                        <?php if($airfield->highlight): ?>
                                            <strong><?=$airfield->icao?> / <?=$airfield->iata?> - <?=$airfield->name?></strong>
                                        <?php else: ?>
                                            <?=$airfield->icao?> / <?=$airfield->iata?> - <?=$airfield->name?>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="clear-both">&nbsp;</div>
                    <br />
                </div>
            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>