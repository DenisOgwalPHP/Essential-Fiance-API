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
$savingsid = test_input($_GET['savingsid']);
$cashiername = test_input($_GET['cashiername']);
$accountno = test_input($_GET['accountno']);
$accountname = test_input($_GET['accountname']);
$date= test_input($_GET['date']);
$deposit= test_input($_GET['deposit']);
$transactions= test_input($_GET['transactions']);
$accountbalance = test_input($_GET['accountbalance']);
$submittedby= test_input($_GET['submittedby']);
$modeofpayment= test_input($_GET['modeofpayment']);
$interestrate= test_input($_GET['interestrate']);
$maturityperiod= test_input($_GET['maturityperiod']);
$othermaturitydate= test_input($_GET['othermaturitydate']);
$appreciated= test_input($_GET['appreciated']);
$investmentplan= test_input($_GET['investmentplan']);
$depositinterval= test_input($_GET['depositinterval']);
$ids= test_input($_GET['ids']);
$branch= test_input($_GET['branch']);
$sql1="SELECT * FROM investorsavings where TransactionID ='$ids' and Branch='$branch'";
$result1=mysqli_query($link,$sql1);
if (mysqli_num_rows($result1) == 1) {
	$sql = "UPDATE investorsavings SET SavingsID='$savingsid',CashierName='$cashiername',AccountNo='$accountno',AccountName='$accountname',Date='$date',Deposit=$deposit',Transactions='$transactions',Accountbalance='$accountbalance',SubmittedBy='$submittedby',ModeOfPayment='$modeofpayment',InterestRate='$interestrate',MaturityPeriod='$maturityperiod',OtherMaturityDate='$othermaturitydate',Appreciated='$appreciated',InvestmentPlan='$investmentplan',DepositInterval='$depositinterval' WHERE TransactionID='$ids' and Branch='$branch'";
	$result = mysqli_query($link, $sql);
} else {
	$sql = "INSERT into investorsavings(SavingsID,CashierName,AccountNo,AccountName,Date,Deposit,Transactions,Accountbalance,SubmittedBy,ModeOfPayment,InterestRate,MaturityPeriod,OtherMaturityDate,Appreciated,InvestmentPlan,DepositInterval,TransactionID,Branch)
			VALUES('$savingsid','$cashiername','$accountno','$accountname','$date','$deposit','$transactions','$accountbalance','$submittedby','$modeofpayment','$interestrate','$maturityperiod','$othermaturitydate','$appreciated','$investmentplan','$depositinterval','$ids','$branch')";
	$result = mysqli_query($link, $sql);
}

$response = array();
if ($result) {
	$messages = 'Correct Info';
	$response['error'] = $messages;
	$response['created_at'] = $timeregistered;
	echo json_encode($response);
} else {
	$messages = 'Something Un Expected Happened, Try Again Later';
	$response['error'] = $date . " " . $deposit . " " . $appreciationamount . " " . $accountbalance . " " . $nextappreciationdate . " " . $paidout . " " . $interestrate . " " . $interval;
	echo json_encode($response);
}
//}