<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
    <body>
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
                <?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>
				<h4><?=$airfield->name?> Airport (<?=$airfield->icao?>)</h4>
				<div class="airfieldsGenInfoContent">
                                    <p><?=$airfield->intro?></p>
				</div>
				<div class="hr"></div>
				<div class="infoSupWrapper">

    				<div class="infoSubWrapper">
    					<div class="floatLeft">
        					<h5 style="font-size: 14px;">General Airport Information</h5>
            				<table cellspacing="0" cellpadding="0" class="infoHorT">
            					<tr><th>Name</th><td><?=$airfield->name?></td></tr>
            					<tr><th>ICAO / IATA</th><td><?=$airfield->icao?> / <?=$airfield->iata?></td></tr>
            					<tr><th>Elevation</th><td><?=$airfield->elevation?>ft</td></tr>
            					<tr><th>Co-ordinates</th><td><?=$airfield->latitude?>, <?=$airfield->longitude?></td></tr>
            					<tr><th>FIR</th><td><?=$airfield->fir?></td></tr>
            				</table>
            			</div>
            			<div class="floatRight">
            				<!-- Max 250px width -->
            				<? /*<img class="airfieldsImage" src="<?=$airfield->img?>" />*/ ?>
            			</div>
            			<div class="clearBoth"></div>
        			</div>

        			<div class="infoSubWrapper">
        				<h5>ATC Commuication</h5>
        				<table cellspacing="0" cellpadding="0" class="infoVerT">
        					<tr><th>Position Identifier</th><th>Callsign</th><th>Frequency (MHz)</th></tr>
        					<?php foreach($airfield->atc as $position): ?>
        					   <tr><td><?=$position->callsign?></td><td><?=$position->spokenCallsign?></td><td><?=$position->frequency?></td></tr>
        					<?php endforeach; ?>
        				</table>
        			</div>

        			<div class="infoSubWrapper">
        				<h5>Navigational Aids</h5>
        				<table cellspacing="0" cellpadding="0" class="infoVerT">
        					<tr><th>Type</th><th>Identifier</th><th>Frequency</th><th>Remarks</th></tr>
                                                <?php foreach($airfield->navaids as $navaid): ?>
                                                   <tr><td><?=$navaid->type?> <?=$navaid->typeExtra?></td>
                                                       <td><?=$navaid->ident?></td>
                                                       <td><?=$navaid->frequency.$navaid->frequencyType?></td>
                                                       <td><?=$navaid->remarks?></td></tr>
                                                <?php endforeach; ?>
        				</table>
        			</div>

                           <div class="infoSubWrapper">
        			<h5>SIDs</h5>
        			<table cellspacing="0" cellpadding="0" class="infoVerT">
        				<tr><th width="100">Identifier</th><th width="100">Initial Altitude</th><th>Remarks</th></tr>
                            <?php foreach($airfield->sids as $navaid): ?>
                                    <td><?=$navaid->identifier?></td>
                                    <td>
                                    <?php if($navaid->altitude < 1){
								 
								 if (!preg_match("/^FL/i", $navaid->altitude)){
									 echo "N/A";
								 } else {
									 echo $navaid->altitude;
								 }
								 
								 ?>
                   		    <?php }else{ echo $navaid->altitude; }?>
                                    </td>
                                    <td><?=$navaid->remarks?></td>
                                </tr>
                            <?php endforeach; ?>
        			</table>
        		   </div>

                           <div class="infoSubWrapper">
        			<h5>STARs</h5>
        			<table cellspacing="0" cellpadding="0" class="infoVerT">
        				<tr><th width="100">Identifier</th><th width="100">Initial Waypoint</th><th>Remarks</th></tr>
                            <?php foreach($airfield->stars as $navaid): ?>
                                    <td><?=$navaid->identifier?></td>
                                    <td><?=$navaid->initialWaypoint?></td>
                                    <td><?=$navaid->remarks?></td>
                                </tr>
                            <?php endforeach; ?>
        			</table>
        		   </div>
        			<div class="infoSubWrapper">
        				<h5>Runway Information</h5>
        				<table cellspacing="0" cellpadding="0" class="infoVerT">
                            <tr><th>Runway</th><th>Magnetic Bearing</th><th>Dimensions</th><th>Surface</th></tr>
        				    <?php foreach($airfield->runways as $runway): ?>
        				        <tr>
                                    <td><?=$runway->ident?></td>
                                    <td><?=$runway->magneticBearing?>&deg;</td>
                                    <td><?=$runway->length?>m x <?=$runway->width?>m</td>
                                    <td><?=$runway->surface_v?></td>
        				        </tr>
        				    <?php endforeach; ?>
        				</table>
        			</div>

        		</div>

                <div class="airfieldsOnlineActivity">
                    <h6>Online Activity</h6>
                    <div class="airfieldsOnlineControllers">
                        <table cellspacing="0" cellpadding="0" class="activityVerT">
                            <tr><th>Latest Weather Information</th></tr>
                            <tr>
                                <td><?=$lastMetar = file_get_contents('http://metar.vatsim.net/'.$airfield->icao);?></td>
                            </tr>
                        </table>
                        <table cellspacing="0" cellpadding="0" class="activityVerT"> 
                            <tr><th>Member Name</th><th>Position Callsign</th><th>Frequency</th><th>Online Since (Time online)</th></tr>
                            <?php if(count($airfield->controllers) == 0){ ?>
                            <tr><td>No controllers are currently online.</td></tr>
                            <?php } ?>
                            <?php foreach($airfield->controllers as $controller): ?>
                                <tr>
                                    <td><?=$controller->memberName?></td>
                                    <td><?=$controller->callsign?></td>
                                    <td><?=$controller->frequency?></td>
                                    <td><?=$controller->onlineSince_f?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="airfieldsOnlineFlights">
                        <table cellspacing="0" cellpadding="0" class="activityVerT">
                            <tr>
                                <th>Callsign</th>
                                <th>Pilot Name</th>
                                <th>Airfields</th>
                                <th>Altitude</th>
                                <th>Speed</th>
                                <th>Status</th>
                                <th>Last Update</th>
                                <th>Online Since</th>
                            </tr>
                            <?php if(count($airfield->pilots) == 0){ ?>
                            <tr>
                                <td>No pilots are currently online for this airfield.</td>
                            </tr>
                            <?php } ?>
                            <?php foreach($airfield->pilots as $pilot): ?>
                                <tr>
                                    <td><?=$pilot->callsign?></td>
                                    <td><?=$pilot->memberName?></td>
                                    <td><?=$pilot->dep?> - <?=$pilot->arr?> <?=$pilot->alt ? "(" . $pilot->alt . ")" : ""?></td>
                                    <td><?=$pilot->altitude?></td>
                                    <td><?=$pilot->groundSpeed?></td>
                                    <td><?=$pilot->status?></td>
                                    <td><?=$pilot->lastUpdated_f?></td>
                                    <td><?=$pilot->logonTime_f?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <h6 style="margin-top: 10px;">Downloads</h6>
                    <div class="airfieldsDownloads">
                        <table cellspacing="0" cellpadding="0" class="activityVerT">
                        <tr>
                            <th>File Name</th>
                            <th>Category</th>
                            <th>Last Updated</th>
                            <th>Author</th>
                            <th>More info / Download</th>
                        </tr>
                        <?php if(count($airfield->downloads) == 0){ ?>
                        <tr><td>No downloads are linked to this airfield.</td></tr>
                        <?php } ?>
                        <?php foreach($airfield->downloads as $download): ?>
                        <tr>
                            <td><?=$download->name?></td>
                            <td><?=$download->category->name?></td>

                            <td><?=$download->lastUpdate_f?></td>

                            <td><?=$download->author?></td>

                            <td><a href="<?=Registry::get("URIGenerator")->generate("download", "info", "site", array("downloadID" => $download->downloadID))?>">More info</a> /
                                <a href="<?=Registry::get("URIGenerator")->generate("download", "fetch", "site", array("downloadID" => $download->downloadID))?>" target='_blank' onClick="javascript: pageTracker._trackPageview('<?=Registry::get("URIGenerator")->generate("download", "fetch", "site", array("downloadID" => $download->downloadID))?>');">Download</a>
                            </td>
                        </tr>
                       <?php endforeach; ?>
                      </table>
                    </div>
                </div>
                <div class="hr"></div>

                <?php if($airfield->extra):?>
            		<div class="airfieldsExtraCont">
                        <?php if($airfield->extra->departure): ?>
                            <h6>Departure Procedures</h6>
                            <div><?=$airfield->extra->departure_f?></div>
                        <?php endif; ?>

                        <?php if($airfield->extra->arrival): ?>
                            <h6>Arrival Procedures</h6>
                            <div><?=$airfield->extra->arrival_f?></div>
                        <?php endif; ?>

                        <?php if($airfield->extra->nonStandard): ?>
                            <h6>Non-Standard Procedures</h6>
                            <div><?=$airfield->extra->nonStandard_f?></div>
                        <?php endif; ?>

                        <?php if($airfield->extra->vfr): ?>
                            <h6>VFR Procedures</h6>
                            <div><?=$airfield->extra->vfr_f?></div>
                        <?php endif; ?>

                        <?php if($airfield->extra->additional): ?>
                            <h6>Additional Information</h6>
                            <div><?=$airfield->extra->additional_f?></div>
                        <?php endif; ?>
            		</div>
            		<div class="hr"></div>
                <?php endif; ?>

            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>