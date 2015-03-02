<?php if(count(Registry::get("Stats")->getData("next_event")) < 1){ ?>
   <h3 align="center">A Short Welcome Message</h3></br>
	On behalf of our staff and members, welcome to VATSIM-UK.<br /><br />

	VATSIM is short for the Virtual Air Traffic Simulation network, an online community who share an interest in flight 
	simulation and air traffic control. VATSIM hosts a network of servers around the globe. Members connect to the 
	servers to fly their simulators online and to provide air traffic control to pilots. VATSIM-UK provides air 
	traffic control and a wealth of information for controlling and flying in the United Kingdom on VATSIM. We pride 
	ourselves in providing regular and high quality air traffic control for our pilots. This, combined with our great 
	community, is what makes VATSIM-UK such a great place to be. Get involved!<br /><br />

	To join our great community, simply follow the easy-to-follow steps over at our Join Us page. Whether as a pilot, 
	controller or both, you will receive a warm welcome by our community and will have a great time, whilst making 
	a lot of new friends along the way.<br /><br />

	Feel free to browse this website to take full advantage of our wealth of information and resources. If you still 
	have questions, please visit our <a href="http://community.vatsim-uk.co.uk">forums</a> where our members will be 
	happy to help.<br /><br />

    <table style="width: 100%;" border="0" cellpadding="1" cellspacing="0">
		<tbody>
			<tr>
				<td style="width: 290px;">
					Welcome!</td>
				<td rowspan="3">
					<img alt="" src="http://www.vatsim-uk.co.uk/website/images/branding/logo-blue-small.png" style="width: 186px; height: 47px;"></td>
			</tr>
			<tr>
				<td>
					<b>Kris Thomson</b></td>
			</tr>
			<tr>
				<td>
					VATSIM-UK Division Director</td>
			</tr>
		</tbody>
	</table><br /><br />
    
    <div align="center"><iframe width="425" height="349" src="http://www.youtube.com/v/gLjKKQ0-BrE?version=3&hl=en_GB" frameborder="0" allowfullscreen></iframe></div>
<?php } else { ?>
  <h3 align="center">Upcoming Events</h3>
    <ul>
    <?php foreach(Registry::get("Stats")->getData("next_event") as $atc){ 
        	
        // Get the member
	$bookingMember = Registry::get("MemberModel")->getMember($atc->add_by);

        // Was a member returned?
        if($bookingMember){
                $name = $bookingMember->firstName." ".$bookingMember->lastName;
        } else {
                $name = $booking->add_by;
        }
        
        ?>
        <h1><?=$atc->event?></h1>
        </br><div align="center"><img src="http://rts.vatsim-uk.co.uk/upload/events/<?=$atc->id?>.<?=$atc->image?>" /></div></br>
        <h5>When:</h5> <?=$atc->date?> :: <?=Registry::get("DateTimeHandler")->formatTimestamp($atc->from, 'H:i', false)?>-<?=Registry::get("DateTimeHandler")->formatTimestamp($atc->to, 'H:i', false)?></h5>
        <h5>What: </h5>
        <?=$atc->text?></br>
        <a href="<?=$atc->thread?>"><?=$atc->thread?></a></br>
        </br>Added by: <?=$name?> (<?=$atc->add_date?>)</br>
    <?php } ?>
    <?php } ?>
    </ul>
