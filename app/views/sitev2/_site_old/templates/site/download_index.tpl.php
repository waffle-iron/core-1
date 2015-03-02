<?= Registry::get("Template")->fetch('site/includes/head.tpl.php', false) ?>
<body>
    <?= Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false) ?>
    <div class="colRight">
        <div class="contentWrapper">
            <?= Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false) ?>
            <div class="downloadsFilterLinks">
                <a href="<?= $setting_uri_rel ?>downloads/0">Show all</a>&nbsp;&nbsp;|
                <select name="dl_chg" id="dl_chg" onchange="javascript: downloadsIndexChangeFilter(this);">
                    <option value="0">***Filter Downloads***</option>
                    <?php
                    foreach ($categories as $category) {
                        $sel = "";
                        $arr = "";
                        if ($currentCategory == $category->categoryID) {
                            $sel = "selected=\"selected\"";
                            $arr = "-> ";
                        }
                        ?>
                        <option value="<?= $category->categoryID ?>" <?= $sel ?>><?= $arr . $category->name ?></option>
                    <?php } ?>
                </select>
                <p></p>If you are re-directed to this page after trying to download a locally hosted file, then you
                will probably find that it is not there, or has yet to be uploaded properly. Try clicking on
                'More Info' to check.
                <p></p>Equally, if you find any of the EXTERNAL downloads are no longer at the address first specified
                then please get in contact with the Web Services department. 
            </div>
            <div class="downloadsFilter">
                <table cellspacing="0" cellpadding="0" class="downloadsT">
                    <tr>
                        <th>File Name</th>
                        <th>Version</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th width="125">More info / Download</th>
                    </tr>
                    <?php foreach ($downloads as $download) { ?>
                        <tr>
                            <td><?= $download->name ?></td>

                            <?php if ($download->type == 'local') { ?>
                                <td><?= ($download->latestVersion ? $download->latestVersion->version : "--") ?></td>
                            <?php } else { ?>
                                <td>--</td>
                            <?php } ?>

                            <td><a href="<?= Registry::get("URIGenerator")->generate("downloads", "index", "site", array("categoryID" => $download->category->categoryID)) ?>"><?= $download->category->name ?></a></td>

                            <td><?= $download->author_f ?></td>

                            <td>
                                <?php if ($download->type == 'local') { ?>
                                    <a href="<?= Registry::get("URIGenerator")->generate("download", "info", "site", array("downloadID" => $download->downloadID)) ?>">More info</a> /
                                <?php } else { ?>
                                    <a href="<?= Registry::get("URIGenerator")->generate("download", "info", "site", array("downloadID" => $download->downloadID)) ?>" target='_blank' onClick="javascript: pageTracker._trackPageview('<?= Registry::get("URIGenerator")->generate("download", "info", "site", array("downloadID" => $download->downloadID)) ?>');">More info</a> /
                                <?php } ?>
                                <a href="<?= Registry::get("URIGenerator")->generate("download", "fetch", "site", array("downloadID" => $download->downloadID)) ?>" target='_blank' onClick="javascript: pageTracker._trackPageview('<?= Registry::get("URIGenerator")->generate("download", "fetch", "site", array("downloadID" => $download->downloadID)) ?>');">Download</a>
                            </td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div> <!-- colRight -->
    <?= Registry::get("Template")->fetch('site/includes/foot.tpl.php', false) ?>
