<?= Registry::get("Template")->fetch('site/includes/head.tpl.php', false) ?>
<body>
    <?= Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false) ?>
    <div class="colRight">
        <div class="contentWrapper">
            <?= Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false) ?>

            <div id="fileInfo">
                <h6>Download Information</h6>
                <table cellspacing="0" cellpadding="0" class="downloadsVerT">
                    <tr>
                        <th>Download Name</th>
                        <td><?= $download->name ?></td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td><?= $download->author_f ?></td>
                    </tr>
                    <tr>
                        <th>First Published</th>
                        <td><?= $download->created_f ?></td>
                    </tr>
                    <tr>
                        <th>Total Downloads</th>
                        <td><?= $download->totalDownloads ?></td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td><?= $download->lastUpdate_f ?></td>
                    </tr>
                    <tr>
                        <th>Current Version</th>
                        <td><?= (!$download->latestVersion ? 'No versions available.' : $download->latestVersion->version . " [<a href=\"" . Registry::get("URIGenerator")->generate("download", "fetch", "site", array("downloadID" => $download->downloadID)) . "\">Download</a>]") ?></td>
                    </tr>
                    <tr>
                        <th>MD5 Checksum</th>
                        <td><?= (!$download->latestVersion ? '--' : $download->latestVersion->md5) ?></td>
                    </tr>
                    <tr>
                        <th>Version Downloads</th>
                        <td><?= (!$download->latestVersion ? '--' : $download->latestVersion->downloadCount) ?></td>
                    </tr>
                    <tr>
                        <th>Next Update</th>
                        <td><?= $download->nextUpdate_f ?></td>
                    </tr>
                </table>
                <div class="downloadDescription">
                    <?=$download->description?>
                </div>
            </div>

            <div class="hr"></div>

            <?php if ($download->latestVersion) { ?>
                <?php if ($download->latestVersion->whatsNew != '') { ?>
                    <div id="whatsNew" class="downloadsLists">
                        <h6>What's New? (Version <?= $download->latestVersion->version ?>)</h6>
                        <p><?= $download->latestVersion->whatsNew ?></p>
                    </div>
                <?php } ?>
            <?php } ?>

            <div id="versionHistory">
                <h6>Version History</h6>
                <div id="versionHistoryItems" class="downloadsLists">
                    <table cellspacing="0" cellpadding="0" class="downloadsListsT">
                        <tr>
                            <th>Version</th>
                            <th>Released On</th>
                            <th>Version Downloads</th>
                            <th>MD5</th>
                            <?= (($download->allowOldVersions == 1) ? '<th>Download</th>' : '') ?>
                        </tr>
                        <?php foreach ($download->versions as $version) { ?>
                            <tr>
                                <td><?= $version->version ?></td>
                                <td><?= $version->released_f ?></td>
                                <td><?= $version->downloadCount ?></td>
                                <td><?= $version->md5 ?></td>
                                <?= (($download->allowOldVersions == 1) ? '<td><a href="' . Registry::get("URIGenerator")->generate("download", "fetch", "site", array("downloadID" => $download->downloadID, "versionID" => $version->versionID)) . '">Download</a></td>' : '') ?>
                            </tr>
                        <?php } if (count($download->versions) < 1) { ?>
                            <tr>
                                <td colspan="<?= (($download->allowOldVersions == 1) ? 5 : 4) ?>">There are no current/previous versions of this download available.</td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <div class="hr"></div>

            <!-- TODO: Allow subscriptions. -->
            <!--<div id="downloadsSubscribe">
					<h6>Subscribe</h6>
                    <p>
						<a href="javascript:;">You can subscribe to this download by clicking this text. You will be emailed with any updates
						 we put on the site.</a>
					</p>
				</div>-->

        </div>
    </div> <!-- colRight -->
    <?=
    Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>