<?php
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
require_once('connect.php');
//if (isset($_)) {
$loanid = test_input($_GET['loanid']);
$accountno = test_input($_GET['accountno']);
$accountname= test_input($_GET['accountname']);
$servicingperiod= test_input($_GET['servicingperiod']);
$repaymentinterval= test_input($_GET['repaymentinterval']);
$loanamount = test_input($_GET['loanamount']);
$interest= test_input($_GET['interest']);
$collateral= test_input($_GET['collateral']);
$collateralvalue= test_input($_GET['collateralvalue']);
$refereename= test_input($_GET['refereename']);
$refereetel= test_input($_GET['refereetel']);
$refereeaddress= test_input($_GET['refereeaddress']);
$refereerelationship= test_input($_GET['refereerelationship']);
$applicationdate= test_input($_GET['applicationdate']);
$registeredby=test_input($_GET['registeredby']);
$issuetype= test_input($_GET['issuetype']);
$loantype= test_input($_GET['loantype']);
$issueno= test_input($_GET['issueno']);
$intervals= test_input($_GET['intervals']);
$clearance= test_input($_GET['clearance']);
$maturitydate= test_input($_GET['maturitydate']);
$branch= test_input($_GET['branch']);
$ids= test_input($_GET['ids']);

$sql="INSERT into loan(LoanID,AccountNo,AccountNames,ServicingPeriod,RepaymentInterval,LoanAmount,Interest,Collateral,CollateralValue,RefereeName,RefereeTel,RefereeAddress,RefereeRelationship,ApplicationDate,RegisteredBy,IssueType,LoanType,IssueNo,Intervals,Branch,Clearance,MaturityDate,TransactionID)
VALUES('$loanid','$accountno','$accountname','$servicingperiod','$repaymentinterval','$loanamount','$interest','$collateral','$collateralvalue','$refereename','$refereetel','$refereeaddress','$refereerelationship','$applicationdate','$registeredby','$issuetype','$loantype','$issueno','$intervals','$branch','$clearance','$maturitydate','$ids')";
$result=mysqli_query($link,$sql);

$response = array();
if ($result) {
	$messages = 'Correct Info';
	$response['error'] = $messages;
	$response['created_at'] = $timeregistered;
	echo json_encode($response);
} else {
	$messages = 'Something Un Expected Happened, Try Again Later';
	$response['error'] = $messages;
	echo json_encode($response);
}

//}