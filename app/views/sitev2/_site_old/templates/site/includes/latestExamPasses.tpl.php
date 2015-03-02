   <h3 align="center">Latest Exam Passes</h3><br>
    <ul>
    <?php foreach(Registry::get("Stats")->getData("fetch_exam_passes") as $exams){ 
        
        // Get the member
	$bookingMember = Registry::get("MemberModel")->getMember($exams->student_id);

        // Was a member returned?
        if($bookingMember){
                $name = $bookingMember->firstName." ".$bookingMember->lastName.' ('.$exams->student_id.')';
        } else {
                $name = $exams->student_id;
        }
                
        $timeStampFull = substr($exams->date, 0, 10);
        $timeStampExploded = explode('-', $timeStampFull);
        $neatStamp = "$timeStampExploded[2]-$timeStampExploded[1]-$timeStampExploded[0]";
        
    ?>
        <center> <?=$name?> -- <?=$exams->exam?></center>
        <center> Date Awarded: <?php echo $neatStamp?></center><br>
    <?php } if(count(Registry::get("Stats")->getData("fetch_exam_passes")) < 1){ ?>
        No recent exams! Check back soon...
    <?php } ?>
    </ul>
