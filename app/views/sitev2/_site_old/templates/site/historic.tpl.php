<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
    <body>
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
                <?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>

                <?php if($event != false){ ?>
                    <h3><?=$event->title?></h3>
                    <?=Core::formatContent($event->content)?>
                <?php }  else { ?>
                    <p>There is no historic event for today's date.
                       If you know of one, please contact the Web Services Team.</p>
                <?php } ?>
            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>