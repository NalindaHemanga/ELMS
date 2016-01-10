<?php
require "core/init.php";

if(count($_GET) > 0){
$search_methode=$_GET['searchType'];
$search_term=$_GET['searchInput'];


if($search_methode=="1"){
	switch($search_term){

				case "System Administrator":$search_term="sys_ad";break;
				case "Laboratory Administrator":$search_term="lab_ad";break;
				case "Laboratory Assistant":$search_term="lab_as";break;
				case "Related Lecturer":$search_term="rel_lec";break;
				case "Non-Related Lecturer":$search_term="nrel_lec";break;
				case "Related Teaching Assistant":$search_term="rel_ta";break;
				case "Non-Related Teaching Assistant":$search_term="nrel_ta";break;
				case "Undergraduate Student":$search_term="u_std";break;
				case "Graduate Student":$search_term="g_std";break;
				case "Collaborator":$search_term="col";break;
				case "Temporary Member":$search_term="tmp_mem";break;
							
//echo $search_term;			
}
$results = DB::getInstance()->search("member_role",array("role"=>$search_term));
//print_r($results);
$members;
foreach ($results as $result){
	$members[] = Member::search(array("member_id" => $result['member_id']));
	}
}

elseif($search_methode=="2"){

	$members[]= Member::search(array("member_nic" =>$search_term));
//print_r($members);
}

elseif($search_methode=="3"){

	$members[]= Member::search(array("member_email" =>$search_term));
//print_r($members);
}

//print_r($members);
//echo $search_methode;
//echo $search_term;

echo "<br><br><div class='datagrid'><table>
	<thead><tr><th>Initials</th><th>Surname</th><th>Email</th><th>Remarks</th></tr></thead>";
$x=0;
foreach ($members as $member){
	if(isset($member)){
	$x = 1;
	$initials = $member->getInitials();
	$surname = $member->getSurname();
	$email = $member->getEmail();
	$remarks = $member->getRemarks();

    echo "
        <tbody><tr><td>$initials</td><td>$surname</td><td>$email</td><td>$remarks</td></tr>
        <tr class=\"alt\">
        </tr>
        </tbody>
        ";
	}else{}

}
if($x==0){
echo "</table>No results to display</div>";
}else{
echo "</table></div>";
}
}
?>
