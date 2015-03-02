	<h3 align="center">Golden Mics<br /><br /></h3>
	<ul>
		<center><img src="http://www.pcflyer.net/vatsim/events/2012_TWR_GM.png" alt="Golden Mic 2012"/></center><br>
		<center><img src="http://www.net-flyer.net/vatsim/events/TWR2011.png" alt="Golden Mic 2011"/></center><br>
	</ul><br />

	<h3 align="center">Latest Iron Mics!<br><br></h3>
    <ul>
    <?php foreach(Registry::get("Stats")->getData("latest_ironmic") as $mic){ ?>
       <center><img src="<?=$mic->imageURL?>" alt="Iron Mic!"/></center><br>
    <?php } ?>
    </ul>
   <h3 align="center">Previous Iron Mics!<br><br></h3>
    <ul>
    <?php foreach(Registry::get("Stats")->getData("previous_ironmics") as $pmic){ ?>
       <center><img src="<?=$pmic->imageURL?>" alt="Iron Mic!"/></center><br>
    <?php } if(count(Registry::get("Stats")->getData("previous_ironmics")) < 1){ ?>
        <center>There aren't anymore in the database...</center><br>
    <?php } ?>
    </ul>
