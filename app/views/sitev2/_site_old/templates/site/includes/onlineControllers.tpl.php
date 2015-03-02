<div class="colLeftAddContent">
    <h2>ONLINE CONTROLLERS</h2>
    <ul>
    <?php foreach(Registry::get("Stats")->getData("online_controllers") as $atc){ ?>
        <li>[<?=$atc->frequency?>] <?=$atc->callsign?></li>
    <?php } if(count(Registry::get("Stats")->getData("online_controllers")) < 1){ ?>
        <li align="center">No Controllers Online</li>
    <?php } ?>
    </ul>
    <?php // <div class="colLeftAddContentLink" align="center">[<a href="javascript:;">View Map</a>]</div>  ?>
</div>
