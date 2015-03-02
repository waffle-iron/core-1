   <h3 align="center">Latest OBS->S1 Passes</h3><br>
    <ul>
    <?php foreach(Registry::get("Stats")->getData("fetch_obs_passes") as $exams){
        
        // Get the member
	$bookingMember = Registry::get("MemberModel")->getMember($exams->student_id);

        // Was a member returned?
        if($bookingMember){
                $name = $bookingMember->firstName." ".$bookingMember->lastName.' ('.$exams->student_id.')';
        } else {
                $name = $exams->student_id;
        }        
        
        $timeStampFull = substr($exams->part2_date, 0, 10);
        $timeStampExploded = explode('-', $timeStampFull);
        $neatStamp = "$timeStampExploded[2]-$timeStampExploded[1]-$timeStampExploded[0]";
    ?>
        <center> <?=$name?></center>
        <center> Date Awarded: <?php echo $neatStamp?></center><br>
    <?php } if(count(Registry::get("Stats")->getData("fetch_exam_passes")) < 1){ ?>
        No recent OBS'ers! Check back soon...
    <?php } ?>
    </ul>
