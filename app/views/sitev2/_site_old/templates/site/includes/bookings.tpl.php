<div class="colLeftAddContent">
    <h2>BOOKINGS</h2>
    <p>
         ------- TODAY <?=gmdate("d/m/y")?> -------<br />
         &nbsp;---- All times are in UTC ----
    </p>
    <ul>
    <?php foreach(Registry::get("Stats")->getData("bookings") as $booking){ 
		
		// Get the member
		$bookingMember = Registry::get("MemberModel")->getMember($booking->member_id);
		
		// Was a member returned?
		if($bookingMember){
			$name = $bookingMember->firstName." ".$bookingMember->lastName;
		} else {
			$name = $booking->member_id;
		}
		
		// Switch up the booking type and set vars.
		switch($booking->type){
			case 'BK':
				$colour = '#336633';
				$type = "Booking";
				break;
			
			case 'ME':
				$colour = '#7429C7';
				$type = "Mentoring";
				break;
			
			case 'EX':
				$colour = '#993300';
				$type = "Exam";
				$name = "Secret o_O";
				break;
			
			case 'EV':
				$colour = '#FF0000';
				$type = "Event";
				//$name = "Undefined";
				break;
			
			case 'GS':
				$colour = '#FF8C00';
				$type = "Group Mentoring";
				break;
                            
                        default: 
				$colour = '#FF8C00';
				$type = "Undefined";
				//$name = "Undefined";
				break;
		}
		
        ?>
        <li><a id="<?=$booking->id;?>" onmouseout="hideBookingInfo(this.id)" onmouseover="showBookingInfo(this.id)" style="color: <?=$colour;?>;" href="javascript:;">[<?=Registry::get("DateTimeHandler")->formatTimestamp($booking->from, 'H:i', false)?>-<?=Registry::get("DateTimeHandler")->formatTimestamp($booking->to, 'H:i', false)?>] <?=$booking->position; 
			if($booking->type == 'ME'){ echo ' (M)'; } 
			if($booking->type == 'EX'){ echo ' (X)'; }
		?></a></li>
		<div id="<?=$booking->id;?>Info" style="line-height: 20px; color: <?=$colour;?>; display: none; border:1px solid <?=$colour;?>; background: #eee; padding:20px; position: absolute;">
			<p style="color: black;"><strong>Booking Information</strong></p>
			<p></p>
			<p><em>Type: <?=$type;?></em></p>
			<p><strong>Position: <?=$booking->position;?></strong></p>
			<p>From/to: <?=Registry::get("DateTimeHandler")->formatTimestamp($booking->from, 'H:i', false)?> - <?=Registry::get("DateTimeHandler")->formatTimestamp($booking->to, 'H:i', false)?></p>
			<p>Member: <?=$name;?></p>
		</div>
    <?php }; ?>
    </ul>
    <?php /* 
    <p>--- TOMORROW <?=gmdate("d/m/y")?> ---</p>
    <ul>
    <?php foreach(Rts::getData("bookings_tomorrow") as $booking): ?>
        <li><a href="javascript:;">[<?=$booking->from?> - <?=$booking->to?>] <?=$booking->position?></a></li>
    <?php endforeach; ?>
    </ul>
    */ ?>
    <div class="colLeftAddContentLink">[<a href="http://rts.vatsim-uk.co.uk/bookings/calendar.php" target="_blank">View Bookings Calendar</a>]</div>
</div>
