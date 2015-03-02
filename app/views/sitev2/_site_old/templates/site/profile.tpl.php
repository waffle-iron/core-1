<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
    <body>
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
                <?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>

                <!-- Basic Information -->
                <div class="profileBasicInfo">
                	<img class="floatLeft profileAvatar" src="http://www.vatsim-uk.co.uk/newnw/images/default-profile-image.png" />
                	<div class="basicInformation">
                		<p id="name">Chris Doherty</p>
                		<p id="dateOfBirth">April 24th 1992 (18)</p>
                		<p id="atcRating">Student 2</p>
                		<p id="bio">Alia causae impetus mea ei. Ad est perfecto senserit rationibus. Ne pri partiendo efficiantur. Verterem gubergren vis an. No vix diam iisque petentium. Sit tota aliquyam salutandi ex.

<br /><br />Id nam dico regione salutandi, ne quod eirmod temporibus nec. Sed vivendo ancillae liberavisse no. Eos animal philosophia no, id diam ancillae periculis quo, duo at libris invidunt. Est solum iracundia at, at sed elitr discere eruditi, vim postea fuisset ne. An quo everti disputando, mel at assum aliquyam quaestio, cibo iuvaret nonummy id eos. Ea vim graecis maluisset consulatu, quot errem copiosae ea duo.

<br /><br />Ad propriae voluptua constituam sed, omittam probatus evertitur his at, vim epicuri recusabo eu. Ut mea hinc meis ullum. Ne temporibus reprehendunt his, eam natum omnesque ne. Graecis posidonium temporibus pro no, sit no molestiae cotidieque, fabulas saperet in usu. Ut quaeque corpora mediocritatem quo, solet libris fabulas eu sed, ad his eros omnis voluptatum. Viris civibus at eam, quando mnesarchum te vel.

<br /><br />Ea vel tollit latine tibique. Verear animal dignissim ius te, eripuit officiis persequeris cu eum. Id duo doctus accusam nominavi, qui lorem iuvaret suscipiantur an. Id debet reprimique his, et dictas detraxit eum, dignissim definitionem vis ex. Cu vide iusto pri.

<br /><br />Ubique signiferumque no nec, mei alia incorrupte at, ius illud ullum mediocrem et. Qui in inani pertinax deseruisse. Ad brute nonummy graecis vix, ad pro suas dolor. Vix tation dictas oblique ut, accusata antiopam ea quo, falli dictas moderatius ad per. Ut elit postulant vituperata duo.</p>
                   	</div>
                	<div class="clearBoth"></div>
                </div>

                <div class="profileInfoArea">
                    <h6 class="profileH6">Recent Controller Sessions</h6>
                    <table cellspacing="0" cellpadding="0" class="infoVerT">
                        <tr>
                            <th>Position</th><th>Callsign</th><th>Frequency</th><th>Time controlling</th>
                        </tr>
                        <?php for($i=1;$i<=5;$i++){ ?>
                        <tr>
                            <td>Birmingham Tower</td><td>EGBB_TWR</td><td>118.300</td><td>1600 - 1824 (2:24)</td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>

                <div class="profileInfoArea">
                    <h6 class="profileH6">Recent Flights</h6>
                    <table cellspacing="0" cellpadding="0" class="infoVerT">
                        <tr>
                            <th>Callsign</th><th>Departure to Destination</th><th>Flight Time</th>
                        </tr>
                        <?php for($i=1;$i<=5;$i++){ ?>
                        <tr>
                            <td>BAW412H</td><td>EGBB to EGPF</td><td>2115 - 2300 (1:45)</td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>

                <!--

                *** Not sure if we need this due to the GRP ***

                <div class="profileInfoAreao">
                    <h6 class="profileH6">Controllable positions</h6>
                    <table cellspacing="0" cellpadding="0" class="infoVerT">
                        <tr>
                            <th>Callsign</th><th>Departure to Destination</th><th>Flight Time</th>
                        </tr>
                        <?php for($i=1;$i<=5;$i++){ ?>
                        <tr>
                            <td>BAW412H</td><td>EGBB to EGPF</td><td>2115 - 2300 (1:45)</td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                -->

                <div class="profileInfoArea">
                    <h6 class="profileH6">RTS Membership</h6>
                    <table cellspacing="0" cellpadding="0" class="infoVerT">
                        <tr>
                            <th>RTS Name</th><th>Joined On</th><th>Type</th>
                        </tr>
                        <tr>
                            <td>Midlands</td><td>24th April 2010</td><td>Home</td>
                        </tr>
                        <tr>
                            <td>Heathrow</td><td>27th July 2010</td><td>Visiting</td>
                        </tr>
                        <tr>
                            <td>South East</td><td>1st December 2010</td><td>Visiting</td>
                        </tr>
                    </table>
                </div>

                <div class="profileInfoArea">
                    <h6 class="profileH6">Awards</h6>
                    <div class="profileAward">
                        <img title="Chris Doherty has earnt 200 flying hours" src="http://www.vatsim-uk.co.uk/newnw/images/200-hours.png" />
                    </div>
                </div>
            	<div class="clearBoth"></div>
            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>