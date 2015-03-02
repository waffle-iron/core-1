<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
    <body>
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
                <?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>
                <?=Registry::get("Template")->fetch('site/includes/latestIronmics.tpl.php', false)?>
                <?=Registry::get("Template")->fetch('site/includes/latestExamPasses.tpl.php', false)?>
                <?=Registry::get("Template")->fetch('site/includes/latestOBSPasses.tpl.php', false)?>
            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>