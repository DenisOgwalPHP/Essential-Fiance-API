<?php
require_once('connect.php');
//if (isset($_)) {
$loanid = $_GET['loanid'];
$accountno = $_GET['accountno'];
$accountname= $_GET['accountname'];
$servicingperiod= $_GET['servicingperiod'];
$repaymentinterval= $_GET['repaymentinterval'];
$loanamount = $_GET['loanamount'];
$interest= $_GET['interest'];
$collateral= $_GET['collateral'];
$collateralvalue= $_GET['collateralvalue'];
$refereename= $_GET['refereename'];
$refereetel= $_GET['refereetel'];
$refereeaddress= $_GET['refereeaddress'];
$refereerelationship= $_GET['refereerelationship'];
$applicationdate= $_GET['applicationdate'];
$registeredby= $_GET['registeredby'];
$issuetype= $_GET['issuetype'];
$loantype= $_GET['loantype'];
$issueno= $_GET['issueno'];
$intervals= $_GET['intervals'];
$clearance= $_GET['clearance'];
$maturitydate= $_GET['maturitydate'];
$branch= $_GET['branch'];
$ids= $_GET['ids'];

$sql="INSERT into loan(LoanID,AccountNo,AccountNames,ServicingPeriod,RepaymentInterval,LoanAmount,Interest,Collateral,CollateralValue,RefereeName,RefereeTel,RefereeAddress,RefereeRelationship,ApplicationDate,RegisteredBy,IssueType,LoanType,IssueNo,Intervals,Branch,Clearance,MaturityDate,TransactionID)
VALUES('$loanid','$accountno','$accountname','$servicingperiod','$repaymentinterval','$loanamount','$interest','$collateral','$collateralvalue','$refereename','$refereetel','$refereeaddress','$refereerelationship','$applicationdate','$registeredby','$issuetype','$loantype','$issueno','$intervals','$branch','$clearance','$maturitydate','$ids')";
$result=mysqli_query($link,$sql);
/*
$response = array();
if ($result) 
{
$messages='Correct Info';
 $response['error'] =$messages;
 $response['created_at'] = $timeregistered;
 echo json_encode($response);
}else{
	$messages='Something Un Expected Happened, Try Again Later';
	$response['error'] =$messages;
   echo json_encode($response);
}
*/
//}