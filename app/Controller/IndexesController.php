<?php
class IndexesController extends AppController {

	
	
    function indexing($user_id=null){
    	//echo "hii"; exit;
		
		$db = mysqli_connect("mespg.cszmtbbmfrkf.ap-southeast-1.rds.amazonaws.com", "mentordbuser", "m3nt0r#DB", "mespg_db") or die("No db connection");
		//$db = mysqli_connect("localhost", "mentordbuser", "m3nt0r#DB", "mes_pg_admission") or die("No db connection");
		//echo 'hii'; exit;
		$this->autoRender = false;
        $cg1 = '$this->overall_cgpa($mark)';
        $cg2 = '$this->core_cgpa_credit($mark)';
        $c1 = '$this->overall_credits($mark, $total_credits, $credit_tracking)';
        $c2 = '$this->core_credits($mark, $total_credits, $credit_tracking)';
        $cg3 = '$this->comp1_cgpa($mark)';
        $c3 = '$this->comp1_credit($mark)';
		$cg4 = '$this->comp2_cgpa($mark)';
        $c4 = '$this->comp2_credit($mark)';
		
        $m1 = '$this->part1_marks($mark)';
        $mx1 = '$this->part1_max($mark)';
        $m2 = '$this->part3_marks($mark)';
        $mx2 = '$this->part3_max($mark)';

        $indexing_rules = array();
        /*$indexing_rules['M.A English'] = array(
            'M' => array(
						'part1_english'=>"\$index1 =($m1/$mx1)*1000;",
						'part3_english'=>"\$index2 =($m2/$mx2)*1000;",
						'others'=>"\$index3 =($m1/$mx1)*1000;",
						),
            'G' => "\$index = ((($cg1 * $c1) + (2 * $cg2) + ($cg3 * $c3) + ($cg4 * $c4))/($c1 + (2 * $c2) + $c3 + $c4))*250;",
			'E' => array('English','Functional English','English Language and Literature'),
			'sub_wt'=>array('English','English Language and Literature')
        );*/
		$indexing_rules['M.A. Arabic'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =($cg1 * $c1) + ($cg2) + ($cg3 * $c3) + ($cg4 * $c4);",
						'D'=>"\$DRindex =($c1 + $c2 + $c3 + $c4);"
						),
			'E' => array('Arabic','Afsal Ul-Ulama'),
			'sub_wt'=>array('Arabic','Afsal Ul-Ulama')
        );
		$indexing_rules['M.A. Economics'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =$cg1 * $c1;",
						'D'=>"\$DRindex =$c1;"
						),
			'E' => array('Economics','Developmental Economics','Foreign Trade','Mathematics','Statistics'),
			'sub_wt'=>array('Economics','Developmental Economics')
        );
		/*$indexing_rules['M.A History'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =$cg1 * $c1;",
						'D'=>"\$DRindex =$c1;"
						)
        );*/
		$indexing_rules['M.Sc. Mathematics'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =2*($cg2)+(1.5*$cg3*$c3)+(1.5*$cg4*$c4);",
						'D'=>"\$DRindex =(2*$c2)+(1.5*$c3)+(1.5*$c4);"
						),
			'E' => array('Mathematics'),
			'sub_wt'=>array('Mathematics')
        );
		/*$indexing_rules['M.Sc Statistics'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =($cg1 * $c1) + ($cg2) + ($cg3 * $c3) + ($cg4 * $c4);",
						'D'=>"\$DRindex =($c1 + $c2 + $c3 + $c4);"
						),
			'E' => array('Mathematics','Statistics'),
			'sub_wt'=>array('Statistics')
        );*/
		/*$indexing_rules['M.Sc Physics'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =(2* $cg2)+($cg3 * $c3)+($cg4 * $c4);",
						'D'=>"\$DRindex =(2*$c2)+($c3)+($c4);"
						),
			'E' => array('Physics','Applied Physics')
        );*/
		$indexing_rules['M.Sc. Chemistry'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =($cg1 * $c1)+(2 * $cg2)+($cg3*$c3)+($cg4*$c4);",
						'D'=>"\$DRindex =$c1+(2*$c2)+($c3)+($c4);"
						),
			'E' => array('Chemistry','Polymer Chemistry')
        );
		$indexing_rules['M.Sc. Zoology'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =($cg1 * $c1)+(2 * $cg2)+($cg3*$c3)+($cg4*$c4);",
						'D'=>"\$DRindex =$c1+(2*$c2)+($c3)+($c4);"
						),
			'E' => array('Zoology')
        );
		$indexing_rules['M.Com.'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =($cg1 * $c1)+($cg2)+($cg3*$c3)+($cg4*$c4);",
						'D'=>"\$DRindex =$c1+($c2)+($c3)+($c4);"
						)
        );
        $indexing_rules['M.Sc. Food Science'] = array();
		/*$indexing_rules['MLISc'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =($cg1*1000);",
						'D'=>"\$DRindex =4;"
						)
        );*/
		/*$indexing_rules['BLISc'] = array(
            'M' => '',
            'G' => array(
						'N'=>"\$NRindex =($cg1*1000);",
						'D'=>"\$DRindex =4;"
						)
        );*/
		//$indexing_rules['M.Sc Computer Science'] = array();
		//$indexing_rules['MCJ(Self Financing)'] = array();
		//$indexing_rules['MSc. Psychology(Self Financing)'] = array();

        $credit_tracking = array();

        $query="select frkCourseID, frkCourseName from courses";
        $courses = mysqli_query($db,$query);
        while($row = mysqli_fetch_array($courses)) {
          $course_id = $row['frkCourseID'];

          $course_name=$row['frkCourseName'];

          if(isset($indexing_rules[$course_name]))
          {
          	if($user_id) {
          		$query = "select user_id from choices where FIND_IN_SET(".$course_id.", choices) and user_id=".$user_id;
          	} else {
          		$query = "select user_id from choices where FIND_IN_SET(".$course_id.", choices)";
          	}
              
			  
              $choices = mysqli_query($db,$query);
			  
              while($row2 = mysqli_fetch_array($choices)) {
				//echo $row2['user_id']; exit;
             $query2="select * from marks where user_id=".$row2['user_id'];
			  
              $mark = mysqli_fetch_assoc(mysqli_query($db,$query2));
			  if($mark) {
			  $mark=array_map('trim',$mark);
			  //print_r($mark); 
			  }
			  
			  
			  
				  
				  $reservation_sql="select * from reservations where frkUserID=".$row2['user_id'];
				  
				 $reservations = mysqli_query($db,$reservation_sql);
				 while($row3=mysqli_fetch_array($reservations)) {
					 $ncc=$row3['frkNcc/Nss'];
					 $nccA=$row3['NCC_Certificate_A'];
					 $nccB=$row3['NCC_Certificate_B'];
					 $nccC=$row3['NCC_Certificate_C'];
					 
					 $weightage=($ncc*5) + min(10,(($nccA*3)+($nccB*5)+($nccC*10)));
					 
				 
				  if($mark['mark_grade']=='G') {
					  
					  $total_credits = 0;
					 /*if($course_name=='M.A English') {
						 if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
						eval($indexing_rules[$course_name]['G']);
								$tempEnglish=0;
								if($mark['main1_sub']=='English' || $mark['main1_sub']=='English Language and Literature'){
									$tempEnglish=$tempEnglish+$mark['main1_cgpa'];
								}
								if($mark['main2_sub']=='English' || $mark['main2_sub']=='English Language and Literature'){
									$tempEnglish=$tempEnglish+$mark['main2_cgpa'];
								}
								if($mark['main3_sub']=='English' || $mark['main3_sub']=='English Language and Literature'){
									$tempEnglish=$tempEnglish+$mark['main3_cgpa'];
								}
								$sub_weightage=$tempEnglish*(50/4);
								
								$index=$index+$weightage+$sub_weightage;
								$university_id = $mark['university_id'];
								  if($university_id==1) {
									  $index=$index+($index*0.05);
								  }
								  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
								  	
						 } else {
							 
							 $entrance_get="select * from entrances where user_id=".$row2['user_id']." and course_id=".$course_id;
							 
							 $entrance_result=mysqli_query($db,$entrance_get);
							
							 if(mysqli_num_rows($entrance_result)>0) {
								 while($entrance_row=mysqli_fetch_array($entrance_result)) {
									 $index_temp=$entrance_row['mark']; 
									 $index=$index_temp*10;
									 
									 $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
								 }
							 }
						 }
							
					 }*/
					 if($course_name=='M.A. Arabic') {
						 if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['com_other_sub'],$indexing_rules[$course_name]['E'])) {
							 
							$NRindex=($mark['main1_credit']*$mark['main1_cgpa'])+($mark['main2_credit']*$mark['main2_cgpa'])+($mark['main3_credit']*$mark['main3_cgpa'])+($mark['comp1_credit']*$mark['comp1_cgpa'])+($mark['comp2_credit']*$mark['comp2_cgpa'])+($mark['overall_credit']*$mark['overall_cgpa']);
						 
								 //eval($indexing_rules[$course_name]['G']['N']);
								 eval($indexing_rules[$course_name]['G']['D']);
								 // feeder
								 if($mark['main1_sub'] == "Arabic" || $mark['main1_sub'] == "Afsal Ul-Ulama") {
									 $NRindex=$NRindex+($mark['main1_credit']*$mark['main1_cgpa']);
									 $DRindex=$DRindex+$mark['main1_credit'];
									 
								 }
								 if($mark['main2_sub']=='Arabic' || $mark['main2_sub']=='Afsal Ul-Ulama') {
									 $NRindex=$NRindex+($mark['main2_credit']*$mark['main2_cgpa']);
									 $DRindex=$DRindex+$mark['main2_credit'];
								 }
								 if($mark['main3_sub']=='Arabic' || $mark['main3_sub']=='Afsal Ul-Ulama') {
									 $NRindex=$NRindex+($mark['main3_credit']*$mark['main3_cgpa']);
									 $DRindex=$DRindex+$mark['main3_credit'];
								 }
								 if($mark['comp1_sub']=='Arabic' || $mark['comp1_sub']=='Afsal Ul-Ulama') {
									 $NRindex=$NRindex+($mark['comp1_credit']*$mark['comp1_cgpa']);
									 $DRindex=$DRindex+$mark['comp1_credit'];
								 }
								 if($mark['comp2_sub']=='Arabic' || $mark['comp2_sub']=='Afsal Ul-Ulama') {
									 $NRindex=$NRindex+($mark['comp2_credit']*$mark['comp2_cgpa']);
									 $DRindex=$DRindex+$mark['comp2_credit'];
								 }
								 if($mark['com_other_sub']=='Arabic') {
									 $NRindex=$NRindex+($mark['com_other_credit']*$mark['com_other_cgpa']);
									 $DRindex=$DRindex+$mark['com_other_credit'];
								 }
								 
								 
								 
								 // subject weightage
								 
									$tempArabic=0;
									if($mark['main1_sub']=='Arabic' || $mark['main1_sub']=='Afsal Ul-Ulama'){
										$tempArabic=$tempArabic+$mark['main1_cgpa'];
									}
									if($mark['main2_sub']=='Arabic' || $mark['main2_sub']=='Afsal Ul-Ulama'){
										$tempArabic=$tempArabic+$mark['main2_cgpa'];
									}
									if($mark['main3_sub']=='Arabic' || $mark['main3_sub']=='Afsal Ul-Ulama'){
										$tempArabic=$tempArabic+$mark['main3_cgpa'];
									}
									$sub_weightage=$tempArabic*(50/4);
						
							$index=($NRindex/$DRindex)*250;
							
							$index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
							  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
			  					$get_result=mysqli_query($db,$get_sql);
			  					if(mysqli_num_rows($get_result)>0) {
			  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
			  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
			  					} else {
			  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
			 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
			  					}
						 }
							
					 } else if($course_name=='M.A. Economics') {
						 if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							eval($indexing_rules[$course_name]['G']['N']);
							eval($indexing_rules[$course_name]['G']['D']);
							//echo $NRindex."<br>";
							//echo $DRindex."<br>";
							// feeder & subject weightage
							$tempEconomics=0;
							if($mark['main1_sub'] == "Economics" || $mark['main1_sub'] == "Developmental Economics") {
								 $NRindex=$NRindex+($mark['main1_credit']*$mark['main1_cgpa']);
								 $DRindex=$DRindex+$mark['main1_credit'];
								 
								 $tempEconomics=$tempEconomics+$mark['main1_cgpa'];
							 }
							 if($mark['main2_sub'] == "Economics" || $mark['main2_sub'] == "Developmental Economics") {
								 $NRindex=$NRindex+($mark['main2_credit']*$mark['main2_cgpa']);
								 $DRindex=$DRindex+$mark['main2_credit'];
								 
								 $tempEconomics=$tempEconomics+$mark['main2_cgpa'];
							 }
							 if($mark['main3_sub'] == "Economics" || $mark['main3_sub'] == "Developmental Economics") {
								 $NRindex=$NRindex+($mark['main3_credit']*$mark['main3_cgpa']);
								 $DRindex=$DRindex+$mark['main3_credit'];
								 
								 $tempEconomics=$tempEconomics+$mark['main3_cgpa'];
							 }
							 
							$sub_weightage=$tempEconomics*(50/4);
						
							$index=($NRindex/$DRindex)*250;
							
							$index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
							  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
			  					$get_result=mysqli_query($db,$get_sql);
			  					if(mysqli_num_rows($get_result)>0) {
			  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
			  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
			  					} else {
			  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
			 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
			  					}
						 }
							
					 } /*else if($course_name=='M.A History') {
						eval($indexing_rules[$course_name]['G']['N']);
						eval($indexing_rules[$course_name]['G']['D']);
						
						// feeder
						if($mark['main1_sub'] == "History") {
							 $NRindex=$NRindex+($mark['main1_credit']*$mark['main1_cgpa']);
							 $DRindex=$DRindex+$mark['main1_credit'];
							 
						 }
						 else if($mark['main2_sub'] == "History") {
							 $NRindex=$NRindex+($mark['main2_credit']*$mark['main2_cgpa']);
							 $DRindex=$DRindex+$mark['main2_credit'];
							 
						 }
						 else if($mark['main3_sub'] == "History") {
							 $NRindex=$NRindex+($mark['main3_credit']*$mark['main3_cgpa']);
							 $DRindex=$DRindex+$mark['main3_credit'];
							 
						 } else {
							 $NRindex=$NRindex;
							 $DRindex=$DRindex+62;
						 }
						 
						 // no sub weightage for history
						 $sub_weightage=0;
						 $index=($NRindex/$DRindex)*250;
						 
						$index=$index+$weightage+$sub_weightage;
						$university_id = $mark['university_id'];
						  if($university_id==1) {
							  $index=$index+($index*0.05);
						  }
						  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
		  					$get_result=mysqli_query($db,$get_sql);
		  					if(mysqli_num_rows($get_result)>0) {
		  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
		  						mysqli_query($db,$update_sql);
		  					} else {
		  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
		 						mysqli_query($db,$inerst_sql);
		  					}
						 
					 }*/ 
					 else if($course_name=='M.Sc. Mathematics') {
						if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							eval($indexing_rules[$course_name]['G']['N']);
							eval($indexing_rules[$course_name]['G']['D']);
							
							$sub_weightage=0;
							$index=($NRindex/$DRindex)*250;
							
							$index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
							  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					} else {
				  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
				 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					}
						}
					 }
					 /*else if($course_name=='M.Sc Statistics') {
						 if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							eval($indexing_rules[$course_name]['G']['N']);
							eval($indexing_rules[$course_name]['G']['D']);
														
							// feeder 
							
							if($mark['main1_sub'] == "Statistics") {
								 $NRindex=$NRindex+($mark['main1_credit']*$mark['main1_cgpa']);
								 $DRindex=$DRindex+$mark['main1_credit'];
							 }
							 if($mark['main2_sub'] == "Statistics") {
								 $NRindex=$NRindex+($mark['main2_credit']*$mark['main2_cgpa']);
								 $DRindex=$DRindex+$mark['main2_credit'];
							 }
							 if($mark['main3_sub'] == "Statistics") {
								 $NRindex=$NRindex+($mark['main3_credit']*$mark['main3_cgpa']);
								 $DRindex=$DRindex+$mark['main3_credit'];
							 }
							 if($mark['comp1_sub'] == "Statistics") {
								 $NRindex=$NRindex+($mark['comp1_credit']*$mark['comp1_cgpa']);
								 $DRindex=$DRindex+$mark['comp1_credit'];
							 }
							 if($mark['comp2_sub'] == "Statistics") {
								 $NRindex=$NRindex+($mark['comp2_credit']*$mark['comp2_cgpa']);
								 $DRindex=$DRindex+$mark['comp2_credit'];
							 }
							 
							 $sub_weightage=0;
							 $index=($NRindex/$DRindex)*250;
							 
							$index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
							  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
							
						 }
					 }*/
					 /*else if($course_name=='M.Sc Physics') {
						 if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							eval($indexing_rules[$course_name]['G']['N']);
							eval($indexing_rules[$course_name]['G']['D']);
							
							// feeder
							if($mark['comp1_sub'] == "Mathematics") {
								 $NRindex=$NRindex+($mark['comp1_credit']*$mark['comp1_cgpa']);
								 $DRindex=$DRindex+$mark['comp1_credit'];
							 }
							 if($mark['comp2_sub'] == "Mathematics") {
								 $NRindex=$NRindex+($mark['comp2_credit']*$mark['comp2_cgpa']);
								 $DRindex=$DRindex+$mark['comp2_credit'];
							 }
							 $sub_weightage=0;
							 $index=($NRindex/$DRindex)*250;
							 
							$index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
							  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
						 }
					 }*/
					 else if($course_name=='M.Sc. Chemistry' || $course_name=='M.Sc. Zoology') {
						 if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							eval($indexing_rules[$course_name]['G']['N']);
							eval($indexing_rules[$course_name]['G']['D']);
							
							// no feeder and sub weightage
							$sub_weightage=0;
							$index=($NRindex/$DRindex)*250;
							
							$index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
							  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					} else {
				  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
				 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					}
						 }
					 } else if($course_name=='M.Com.') {
						 if($mark['degree_id']==2 || $mark['degree_id']==4) {
							eval($indexing_rules[$course_name]['G']['N']);
							eval($indexing_rules[$course_name]['G']['D']);

							// no feeder and sub weightage
							$sub_weightage=0;
							$index=($NRindex/$DRindex)*250;	

							$index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
							 $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					} else {
				  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
				 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					}
						 }
					 }
					 /*else if($course_name=='MLISc' || $course_name=='BLISc') {
						eval($indexing_rules[$course_name]['G']['N']);
						eval($indexing_rules[$course_name]['G']['D']);

						// no feeder and sub weightage
						$sub_weightage=0;
						$index=($NRindex/$DRindex);

						$index=$index+$weightage+$sub_weightage;
						$university_id = $mark['university_id'];
						  if($university_id==1) {
							  $index=$index+($index*0.05);
						  }
						$get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
		  					$get_result=mysqli_query($db,$get_sql);
		  					if(mysqli_num_rows($get_result)>0) {
		  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
		  						mysqli_query($db,$update_sql);
		  					} else {
		  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
		 						mysqli_query($db,$inerst_sql);
		  					}
					 }*/
					 /*else if($course_name=='M.Sc Computer Science') {
						 $entrance_get="select * from entrances where user_id=".$row2['user_id']." and course_id=".$course_id;
							 
							 $entrance_result=mysqli_query($db,$entrance_get);
							
							 if(mysqli_num_rows($entrance_result)>0) {
								 while($entrance_row=mysqli_fetch_array($entrance_result)) {
									 $index_temp=$entrance_row['mark']; 
									 $index=$index_temp*5;
									 
									 $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
								 }
							 }
					 } else if($course_name=='MCJ(Self Financing)') {
						 $entrance_get="select * from entrances where user_id=".$row2['user_id']." and course_id=".$course_id;
							 
							 $entrance_result=mysqli_query($db,$entrance_get);
							
							 if(mysqli_num_rows($entrance_result)>0) {
								 while($entrance_row=mysqli_fetch_array($entrance_result)) {
									 $index_temp=$entrance_row['mark']; 
									 $index=$index_temp*20;
									 
									 $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
								 }
							 }
					 } else if($course_name=='MSc. Psychology(Self Financing)') {
						 $entrance_get="select * from entrances where user_id=".$row2['user_id']." and course_id=".$course_id;
							 
							 $entrance_result=mysqli_query($db,$entrance_get);
							
							 if(mysqli_num_rows($entrance_result)>0) {
								 while($entrance_row=mysqli_fetch_array($entrance_result)) {
									 $index_temp=$entrance_row['mark']; 
									 $index=$index_temp*5;
									 
									 $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
								 }
							 }
					 }*/
					 
					  
				  } // if grade
				  else if($mark['mark_grade']=='M') {
					  /*if($course_name=='M.A English') {
						  if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['comp1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['comp2_sub'],$indexing_rules[$course_name]['E'])) {
							  eval($indexing_rules[$course_name]['M']['part1_english']);
							  eval($indexing_rules[$course_name]['M']['part3_english']);
							  if($index1>$index2) {
								  $index=$index1;
							  } else if($index2>$index1) {
								  $index=$index2;
							  } else {
								  $index=$index1;
							  }
							  // sub weightage
						  $tempEnglish=0;
							if($mark['main1_sub']=='English' || $mark['main1_sub']=='English Language and Literature'){
								if($mark['main1_max']==600) {
									$tempEnglish=$tempEnglish+($mark['main1_mark']*0.05);
								} else {
									$marks=($mark['main1_mark']/$mark['main1_max'])*600;
									$tempEnglish=$tempEnglish+($marks*0.05);
								}
							}
							if($mark['main2_sub']=='English' || $mark['main2_sub']=='English Language and Literature'){
								if($mark['main2_max']==600) {
									$tempEnglish=$tempEnglish+($mark['main2_mark']*0.05);
								} else {
									$marks=($mark['main2_mark']/$mark['main2_max'])*600;
									$tempEnglish=$tempEnglish+($marks*0.05);
								}
							}
							if($mark['main3_sub']=='English' || $mark['main3_sub']=='English Language and Literature'){
								if($mark['main3_max']==600) {
									$tempEnglish=$tempEnglish+($mark['main3_mark']*0.05);
								} else {
									$marks=($mark['main3_mark']/$mark['main3_max'])*600;
									$tempEnglish=$tempEnglish+($marks*0.05);
								}
							}
							
						  $sub_weightage=$tempEnglish;
						  
						  $index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
						  
							$get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
						  } else {
							 $entrance_get="select * from entrances where user_id=".$row2['user_id']." and course_id=".$course_id;
							 
							 $entrance_result=mysqli_query($db,$entrance_get);
							
							 if(mysqli_num_rows($entrance_result)>0) {
								 while($entrance_row=mysqli_fetch_array($entrance_result)) {
									 $index_temp=$entrance_row['mark']; 
									 $index=$index_temp*10;
									 
									 $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
								 }
							 }
						 }
						  
						  
					  }*/
					  if($course_name=='M.A. Arabic') {
							if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['com_other_sub'],$indexing_rules[$course_name]['E'])) {
								if(in_array($mark['comp1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['comp2_sub'],$indexing_rules[$course_name]['E'])) {
									$part2_sub=$mark['part2_sub'];
									if($part2_sub=='Arabic') {
										$m1=$mark['part2_mark'];
										$mx1=$mark['part2_max'];
									} else {
										$m1=0;
										$mx1=10; // anything gives zero (/)
									}
									$m2=$this->part3_marks($mark);
									$mx2=$this->part3_max($mark);
									
									$index1=($m1/$mx1)*1000;
									$index2=($m2/$mx2)*1000;
									
									if($index1>$index2) {
										$index=$index1;
									} else if($index2>$index1) {
										$index=$index2;
									} else {
										$index=$index1;
									}
								} else {
									$part2_sub=$mark['part2_sub'];
									if($part2_sub=='Arabic') {
										$m1=$mark['part2_mark'];
										$mx1=$mark['part2_max'];
									} else {
										$m1=0;
										$mx1=10; // anything gives zero (/)
									}
									$index=($m1/$mx1)*1000;
								}
								
								$tempArabic=0;
									if($mark['main1_sub']=='Arabic' || $mark['main1_sub']=='Afsal Ul-Ulama'){
										if($mark['main1_max']==600) {
											$tempArabic=$tempArabic+($mark['main1_mark']*0.05);
										} else {
											$marks=($mark['main1_mark']/$mark['main1_max'])*600;
											$tempArabic=$tempArabic+($marks*0.05);
										}
									}
									if($mark['main2_sub']=='Arabic' || $mark['main2_sub']=='Afsal Ul-Ulama'){
										if($mark['main2_max']==600) {
											$tempArabic=$tempArabic+($mark['main2_mark']*0.05);
										} else {
											$marks=($mark['main2_mark']/$mark['main2_max'])*600;
											$tempArabic=$tempArabic+($marks*0.05);
										}
									}
									if($mark['main3_sub']=='Arabic' || $mark['main3_sub']=='Afsal Ul-Ulama'){
										if($mark['main3_max']==600) {
											$tempArabic=$tempArabic+($mark['main3_mark']*0.05);
										} else {
											$marks=($mark['main3_mark']/$mark['main3_max'])*600;
											$tempArabic=$tempArabic+($marks*0.05);
										}
									}
									$sub_weightage=$tempArabic;
									
									$index=$index+$weightage+$sub_weightage;
									$university_id = $mark['university_id'];
									  if($university_id==1) {
										  $index=$index+($index*0.05);
									  }
								  
									$get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					} else {
				  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
				 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					}
							} // E
					  } else if($course_name=='M.A. Economics') {
						  if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							  $m1=$this->part3_marks($mark);
							  $mx1=$this->part3_max($mark);
							  $m2=$this->main_marks($mark);
							  $mx2=$this->main_max($mark);
							  
							  $index=(($m1+$m2)/($mx1+$mx2))*1000;
							  						  
							  // sub weightage
							  $tempEconomics=0;
								if($mark['main1_sub'] == "Economics" || $mark['main1_sub'] == "Developmental Economics") {
									 if($mark['main1_max']==600) {
											$tempEconomics=$tempEconomics+($mark['main1_mark']*0.05);
										} else {
											$marks=($mark['main1_mark']/$mark['main1_max'])*600;
											$tempEconomics=$tempEconomics+($marks*0.05);
										}
								}
								if($mark['main2_sub'] == "Economics" || $mark['main2_sub'] == "Developmental Economics") {
									 if($mark['main2_max']==600) {
											$tempEconomics=$tempEconomics+($mark['main2_mark']*0.05);
										} else {
											$marks=($mark['main2_mark']/$mark['main2_max'])*600;
											$tempEconomics=$tempEconomics+($marks*0.05);
										}
								}
								if($mark['main3_sub'] == "Economics" || $mark['main3_sub'] == "Developmental Economics") {
									 if($mark['main3_max']==600) {
											$tempEconomics=$tempEconomics+($mark['main3_mark']*0.05);
										} else {
											$marks=($mark['main3_mark']/$mark['main3_max'])*600;
											$tempEconomics=$tempEconomics+($marks*0.05);
										}
								}
								
							  $sub_weightage=$tempEconomics;
								//echo $sub_weightage."<br>";
								$index=$index+$weightage+$sub_weightage;
								$university_id = $mark['university_id'];
								  if($university_id==1) {
									  $index=$index+($index*0.05);
								  }
							  
								$get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					} else {
				  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
				 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					}
						  } // E
					  } else if($course_name=='M.Sc. Mathematics') {
						  if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							  $m1=$this->part3_marks($mark);
							  $mx1=$this->part3_max($mark);
							  $m2=$this->main_marks($mark);
							  $mx2=$this->main_max($mark);
							  
							  $index=(($m1+$m2)/($mx1+$mx2))*1000;
							  
							  //no sub weightage
							  $sub_weightage=0;
								
								$index=$index+$weightage+$sub_weightage;
								$university_id = $mark['university_id'];
								  if($university_id==1) {
									  $index=$index+($index*0.05);
								  }
							 
								  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					} else {
				  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
				 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					}
							  
						  } // E
					  }
					  /*else if($course_name=='M.Sc Statistics') {
						  if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							  $m1=$this->part1_marks($mark)+$mark['part2_mark']+$this->part3_marks($mark);
							  $mx1=$this->part1_max($mark)+$mark['part2_max']+$this->part3_max($mark);
							  $m2=$this->part3_marks($mark);
							  $mx2=$this->part3_max($mark);
							  
							  $NRindex=$m1+$m2;
							  $DRindex=$mx1+$mx2;
							  
							  // feeder
							  if($mark['main1_sub'] == "Statistics") {
								 $NRindex=$NRindex+$mark['main1_mark'];
								 $DRindex=$DRindex+$mark['main1_max'];
							  }
							  if($mark['main2_sub'] == "Statistics") {
								 $NRindex=$NRindex+$mark['main2_mark'];
								 $DRindex=$DRindex+$mark['main2_max'];
							  }
							  if($mark['main3_sub'] == "Statistics") {
								 $NRindex=$NRindex+$mark['main3_mark'];
								 $DRindex=$DRindex+$mark['main3_max'];
							  }
							  if($mark['comp1_sub'] == "Statistics") {
								 $NRindex=$NRindex+$mark['comp1_mark'];
								 $DRindex=$DRindex+$mark['comp1_max'];
							  }
							  if($mark['comp2_sub'] == "Statistics") {
								 $NRindex=$NRindex+$mark['comp2_mark'];
								 $DRindex=$DRindex+$mark['comp2_max'];
							  }
							  
							  $index=($NRindex/$DRindex)*1000;
							  
							  //no sub weightage
							  $sub_weightage=0;
								$index=$index+$weightage+$sub_weightage;
								$university_id = $mark['university_id'];
								  if($university_id==1) {
									  $index=$index+($index*0.05);
								  }
							 
								  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
						  } // E
					  }*/
					  /*else if($course_name=='M.Sc Physics') {
						  if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							  
							  $m3=0;
							  $mx3=0;
							  
							  // part3 maths
							  if($mark['comp1_sub'] != "Mathematics") {
								  $m3+=$mark['comp1_mark'];
								  $mx3+=$mark['comp1_max'];
							  } else if($mark['comp2_sub'] != "Mathematics") {
								  $m3+=$mark['comp2_mark'];
								  $mx3+=$mark['comp2_max'];
							  } else {
								 $m3=0;
								$mx3=0; 
							  }
							$NRindex=$m3;
							$DRindex=$mx3;
							// feeder m1
							if($mark['main1_sub'] == "Physics" || $mark['main1_sub'] == "Applied Physics") {
								  $NRindex+=2*$mark['main1_mark'];
								  $DRindex+=2*$mark['main1_max'];
							  }
							  if($mark['main2_sub'] == "Physics" || $mark['main2_sub'] == "Applied Physics") {
								  $NRindex+=2*$mark['main2_mark'];
								  $DRindex+=2*$mark['main2_max'];
							  }
							  if($mark['main3_sub'] == "Physics" || $mark['main3_sub'] == "Applied Physics") {
								  $NRindex+=2*$mark['main3_mark'];
								  $DRindex+=2*$mark['main3_max'];
							  }
							  // feeder m2
							  if($mark['comp1_sub'] == "Mathematics") {
								  $NRindex+=2*$mark['comp1_mark'];
								  $DRindex+=2*$mark['comp1_max'];
							  } else if($mark['comp2_sub'] == "Mathematics") {
								  $NRindex+=2*$mark['comp2_mark'];
								  $DRindex+=2*$mark['comp2_max'];
							  } else {
								$NRindex=$NRindex;
								$DRindex=$DRindex;
							  }
							  
							  $index=($NRindex/$DRindex)*1000;
							  //no sub weightage
							  $sub_weightage=0;
								$index=$index+$weightage+$sub_weightage;
								$university_id = $mark['university_id'];
								  if($university_id==1) {
									  $index=$index+($index*0.05);
								  }
							 
								  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
						  }
					  }*/
					  else if($course_name=='M.Sc. Chemistry') {
						  if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							  $m2=0;
							  $mx2=0;
							  $m3=0;
							  $mx3=0;
							  
							  // part3 maths
							  
							  if($mark['comp1_sub'] == "Mathematics") {
								  $m2+=$mark['comp1_mark'];
								  $mx2+=$mark['comp1_max'];
							  } else if($mark['comp2_sub'] == "Mathematics") {
								  $m2+=$mark['comp2_mark'];
								  $mx2+=$mark['comp2_max'];
							  } else {
								$m2=0;
								$mx2=0;
							  }
							  if($mark['comp1_sub'] != "Mathematics") {
								  $m3+=$mark['comp1_mark'];
								  $mx3+=$mark['comp1_max'];
							  } else if($mark['comp2_sub'] != "Mathematics") {
								  $m3+=$mark['comp2_mark'];
								  $mx3+=$mark['comp2_max'];
							  } else {
								 $m3=0;
								$mx3=0; 
							  }
							$NRindex=$m2+$m3;
							$DRindex=$mx2+$mx3;
							// feeder
							if($mark['main1_sub'] == "Chemistry" || $mark['main1_sub'] == "Polymer Chemistry") {
								  $NRindex+=2*$mark['main1_mark'];
								  $DRindex+=2*$mark['main1_max'];
							  }
							  if($mark['main2_sub'] == "Chemistry" || $mark['main2_sub'] == "Polymer Chemistry") {
								  $NRindex+=2*$mark['main2_mark'];
								  $DRindex+=2*$mark['main2_max'];
							  }
							  if($mark['main3_sub'] == "Chemistry" || $mark['main3_sub'] == "Polymer Chemistry") {
								  $NRindex+=2*$mark['main3_mark'];
								  $DRindex+=2*$mark['main3_max'];
							  }
							  $index=($NRindex/$DRindex)*1000;
							  //no sub weightage
							  $sub_weightage=0;
								$index=$index+$weightage+$sub_weightage;
								$university_id = $mark['university_id'];
								  if($university_id==1) {
									  $index=$index+($index*0.05);
								  }
							 
								  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					} else {
				  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
				 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					}
						  }
					  } else if($course_name=='M.Sc. Zoology') {
						  if(in_array($mark['main1_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main2_sub'],$indexing_rules[$course_name]['E']) || in_array($mark['main3_sub'],$indexing_rules[$course_name]['E'])) {
							$m1=$this->part3_marks($mark);
							$mx1=$this->part3_max($mark);
							
							$NRindex=$m1;
							$DRindex=$mx1;
							// feeder
							if($mark['main1_sub'] == "Zoology") {
								$NRindex=$NRindex+$mark['main1_mark'];
								$DRindex=$DRindex+$mark['main1_max'];
							}
							if($mark['main2_sub'] == "Zoology") {
								$NRindex=$NRindex+$mark['main2_mark'];
								$DRindex=$DRindex+$mark['main2_max'];
							}
							if($mark['main3_sub'] == "Zoology") {
								$NRindex=$NRindex+$mark['main3_mark'];
								$DRindex=$DRindex+$mark['main3_max'];
							}
							
							$index=($NRindex/$DRindex)*1000;
							//no sub weightage
							  $sub_weightage=0;
								$index=$index+$weightage+$sub_weightage;
								$university_id = $mark['university_id'];
								  if($university_id==1) {
									  $index=$index+($index*0.05);
								  }
							 
								  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					} else {
				  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
				 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					}
						  }
					  } else if($course_name=='M.Com.') {
						  if($mark['degree_id']==2 || $mark['degree_id']==4) {
							$m1=$this->part1_marks($mark)+$mark['part2_mark']+$this->part3_marks($mark);
							$mx1=$this->part1_max($mark)+$mark['part2_max']+$this->part3_max($mark);
							$m2=$this->main_marks($mark);
							$mx2=$this->main_max($mark);

							$index=(($m1+$m2)/($mx1+$mx2))*1000;
							// no sub weightage and feeder
							$sub_weightage=0;

							$index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
							 
							$get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						if(mysqli_query($db,$update_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					} else {
				  						$inerst_sql="insert into indexes (`user_id`,`course_id`,`index`) values ('".$row2['user_id']."','".$course_id."','".$index."')";
				 						if(mysqli_query($db,$inerst_sql)) {
											$flag=1;
										} else {
											$flag=0;
										}
				  					}
						  }
					  } else if($course_name=='M.Sc. Food Science') {
						 	$flag=1;
					  }
					  /*else if($course_name=='MLISc' || $course_name=='BLISc') {
						  $m1=$this->part1_marks($mark)+$mark['part2_mark']+$this->part3_marks($mark);
						  $mx1=$this->part1_max($mark)+$mark['part2_max']+$this->part3_max($mark);
						  
						  $index=($m1/$mx1)*1000;
						  // no feeder and sub weightage
						  $sub_weightage=0;
							$index=$index+$weightage+$sub_weightage;
							$university_id = $mark['university_id'];
							  if($university_id==1) {
								  $index=$index+($index*0.05);
							  }
						 
							  $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
					  }*/
					  /*else if($course_name=='M.Sc Computer Science') {
						  $entrance_get="select * from entrances where user_id=".$row2['user_id']." and course_id=".$course_id;
							 
							 $entrance_result=mysqli_query($db,$entrance_get);
							
							 if(mysqli_num_rows($entrance_result)>0) {
								 while($entrance_row=mysqli_fetch_array($entrance_result)) {
									 $index_temp=$entrance_row['mark']; 
									 $index=$index_temp*5;
									 
									 $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
								 }
							 }
					  } else if($course_name=='MCJ(Self Financing)') {
						  $entrance_get="select * from entrances where user_id=".$row2['user_id']." and course_id=".$course_id;
							 
							 $entrance_result=mysqli_query($db,$entrance_get);
							
							 if(mysqli_num_rows($entrance_result)>0) {
								 while($entrance_row=mysqli_fetch_array($entrance_result)) {
									 $index_temp=$entrance_row['mark']; 
									 $index=$index_temp*20;
									 
									 $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
								 }
							 }
					  } else if($course_name=='MSc. Psychology(Self Financing)') {
						  $entrance_get="select * from entrances where user_id=".$row2['user_id']." and course_id=".$course_id;
							 
							 $entrance_result=mysqli_query($db,$entrance_get);
							
							 if(mysqli_num_rows($entrance_result)>0) {
								 while($entrance_row=mysqli_fetch_array($entrance_result)) {
									 $index_temp=$entrance_row['mark']; 
									 $index=$index_temp*5;
									 
									 $get_sql="select * from indexes where user_id=".$row2['user_id']." and course_id=".$course_id;
				  					$get_result=mysqli_query($db,$get_sql);
				  					if(mysqli_num_rows($get_result)>0) {
				  						$update_sql="update indexes set `index`='".$index."' where user_id=".$row2['user_id']." and course_id=".$course_id;
				  						mysqli_query($db,$update_sql);
				  					} else {
				  						$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				 						mysqli_query($db,$inerst_sql);
				  					}
								 }
							 }
					  }*/
				  } // if mark
				  
				  }
				  
				  //$inerst_sql="insert into indexes values ('','".$row2['user_id']."','".$course_id."','".$index."')";
				  //mysqli_query($db,$inerst_sql);
				  
			
              
            }
          }
        }
		if($flag==1) {
			return true;
		} else if($flag=0) {
			return false;
		}
    }

    public function overall_cgpa($mark) //cg1
    {
        return $mark['overall_cgpa'];
    }

    function overall_credits($mark, &$total_credits, &$credit_tracking) //c1
    {
        if(!in_array('c1', $credit_tracking))
        {
          $total_credits+=$mark['overall_credit'];  
          $credit_tracking[] = 'c1';
        }

        return $mark['overall_credit'];
    }
    
    function core_cgpa_credit($mark) //cg2
    {
        $total_cgpa_credit=0;

        $total_cgpa_credit+=$mark['main1_cgpa']*$mark['main1_credit'];

        if($mark['main']==2)
          $total_cgpa_credit+=$mark['main2_cgpa']*$mark['main2_credit'];

        if($mark['main']==3)
          $total_cgpa_credit+=$mark['main3_cgpa']*$mark['main3_credit'];

        return $total_cgpa_credit;
    }

    function core_credits($mark, &$total_credits, &$credit_tracking) //c2
    {
        $credits=$mark['main1_credit'];

        if($mark['main']==2)
          $credits+=$mark['main2_credit'];

        if($mark['main']==3)
          $credits+=$mark['main3_credit'];

        if(!in_array('c2', $credit_tracking))
        {
          $total_credits+=$credits;  
          $credit_tracking[] = 'c2';
        }

        return $credits;
    }
	
	function comp1_cgpa($mark) {
		
			return $mark['comp1_cgpa'];
		
		
	}
	
	function comp1_credit($mark) {
		
			return $mark['comp1_credit'];
		
	}
	
	function comp2_cgpa($mark) {
		
			return $mark['comp2_cgpa'];
		
	}
	
	function comp2_credit($mark) {
		
			return $mark['comp2_credit'];
		
	}
	function part1_marks($mark) {
		
			return $mark['part1_mark'];
		
	}
	function part1_max($mark) {
		
			return $mark['part1_max'];
		
	}
	function part3_marks($mark) {
		
		$part3_marks=0;
		if($mark['main']==1) {
			$part3_marks+=$mark['main1_mark'];
			$part3_marks+=$mark['comp1_mark'];
			$part3_marks+=$mark['comp2_mark'];
			
		} else if($mark['main']==2) {
			$part3_marks+=$mark['main1_mark'];
			$part3_marks+=$mark['main2_mark'];
			$part3_marks+=$mark['comp1_mark'];
			
		} else if($mark['main']==3) {
			$part3_marks+=$mark['main1_mark'];
			$part3_marks+=$mark['main2_mark'];
			$part3_marks+=$mark['main3_mark'];
		}
			return $part3_marks;
		
	}
	function part3_max($mark) {
		
		$part3_max=0;
		if($mark['main']==1) {
			$part3_max+=$mark['main1_max'];
			$part3_max+=$mark['comp1_max'];
			$part3_max+=$mark['comp2_max'];
			
		} else if($mark['main']==2) {
			$part3_max+=$mark['main1_max'];
			$part3_max+=$mark['main2_max'];
			$part3_max+=$mark['comp1_max'];
			
		} else if($mark['main']==3) {
			$part3_max+=$mark['main1_max'];
			$part3_max+=$mark['main2_max'];
			$part3_max+=$mark['main3_max'];
		}
			return $part3_max;
		
	}
	function main_marks($mark) {
		
		$main_marks=0;
		if($mark['main']==1) {
			$main_marks+=$mark['main1_mark'];
			
		} else if($mark['main']==2) {
			$main_marks+=$mark['main1_mark'];
			$main_marks+=$mark['main2_mark'];
			
		} else if($mark['main']==3) {
			$main_marks+=$mark['main1_mark'];
			$main_marks+=$mark['main2_mark'];
			$main_marks+=$mark['main3_mark'];
		}
			return $main_marks;
		
	}
	
	function main_max($mark) {
		
		$main_max=0;
		if($mark['main']==1) {
			$main_max+=$mark['main1_max'];
			
		} else if($mark['main']==2) {
			$main_max+=$mark['main1_max'];
			$main_max+=$mark['main2_max'];
			
		} else if($mark['main']==3) {
			$main_max+=$mark['main1_max'];
			$main_max+=$mark['main2_max'];
			$main_max+=$mark['main3_max'];
		}
			return $main_max;
		
	}
	

    

    //indexing();

    function ranking($choice_array=null) {
    	
    	$this->autoRender=false;
    	$db = mysqli_connect("mespg.cszmtbbmfrkf.ap-southeast-1.rds.amazonaws.com", "mentordbuser", "m3nt0r#DB", "mespg_db") or die("No db connection");
		//$db = mysqli_connect("localhost", "mentordbuser", "m3nt0r#DB", "mes_pg_admission") or die("No db connection");
		if($choice_array) {
			foreach($choice_array as $choice) {
				$query="select id from indexes where course_id=$choice order by `index` desc";
		    	//echo $query;exit();
		    	$indexes = mysqli_query($db,$query);
		    	$rank=0;
		    	while($index = mysqli_fetch_array($indexes)) {
		      		$rank += 1;
		      		if(mysqli_query($db,"update indexes set rank=$rank where id=".$index['id'])) {
		      			$flag=1;
		      		}
		      		//Wmysql_query("update indexes set rank=$rank where id=$index['id']");
		    	}
			}
		} else {
			$query="select frkCourseID, frkCourseName from courses";
		  	$courses = mysqli_query($db,$query);
		  	while($row = mysqli_fetch_array($courses)) {
		    	$course_id = $row['frkCourseID'];
		    	$course_name=$row['frkCourseName'];

		    	$query="select id from indexes where course_id=$course_id order by `index` desc";
		    	//echo $query;exit();
		    	$indexes = mysqli_query($db,$query);
		    	$rank=0;
		    	while($index = mysqli_fetch_array($indexes)) {
		      		$rank += 1;
		      		if(mysqli_query($db,"update indexes set rank=$rank where id=".$index['id'])) {
		      			$flag=1;
		      		}
		      		//Wmysql_query("update indexes set rank=$rank where id=$index['id']");
		    	}

		  	}
		}
    		
		  	if($flag==1) {
		  		return true;
		  	}
    }

}

?>
