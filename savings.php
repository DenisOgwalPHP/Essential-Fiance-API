<?php
require_once('connect.php');
//if (isset($_)) {
$savingsid = $_GET['savingsid'];
$accountno = $_GET['accountno'];
$accountname= $_GET['accountname'];
$cashiername= $_GET['cashiername'];
$date= $_GET['date'];
$deposit = $_GET['deposit'];
$transaction= $_GET['transaction'];
$accountbalance= $_GET['accountbalance'];
$modeofpayment= $_GET['modeofpayment'];
$depositdate= $_GET['depositdate'];
$debit= $_GET['debit'];
$credit= $_GET['credit'];
$ids= $_GET['ids'];
$branch= $_GET['branch'];
$sql="INSERT into Savings(SavingsID,AccountNo,AccountName,CashierName,Date,Deposit,Transactions,Accountbalance,ModeOfPayment,DepositDate,Debit,Credit,TransactionID,Branch)
VALUES('$savingsid','$accountno','$accountname','$cashiername','$date','$deposit','$transaction','$accountbalance','$modeofpayment','$depositdate','$debit','$credit','$ids','$branch')";
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