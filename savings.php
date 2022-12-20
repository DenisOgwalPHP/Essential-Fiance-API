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
$accountno = test_input($_GET['accountno']);
$accountname= test_input($_GET['accountname']);
$cashiername= test_input($_GET['cashiername']);
$date= test_input($_GET['date']);
$deposit = test_input($_GET['deposit']);
$transaction= test_input($_GET['transaction']);
$accountbalance= test_input($_GET['accountbalance']);
$modeofpayment= test_input($_GET['modeofpayment']);
$depositdate= test_input($_GET['depositdate']);
$debit= test_input($_GET['debit']);
$credit= test_input($_GET['credit']);
$ids= test_input($_GET['ids']);
$branch= test_input($_GET['branch']);
$sql="INSERT into Savings(SavingsID,AccountNo,AccountName,CashierName,Date,Deposit,Transactions,Accountbalance,ModeOfPayment,DepositDate,Debit,Credit,TransactionID,Branch)
VALUES('$savingsid','$accountno','$accountname','$cashiername','$date','$deposit','$transaction','$accountbalance','$modeofpayment','$depositdate','$debit','$credit','$ids','$branch')";
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