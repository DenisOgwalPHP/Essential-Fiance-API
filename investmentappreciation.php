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
$depositid = test_input($_GET['depositid']);
$accountno = test_input($_GET['accountno']);
$accountname = test_input($_GET['accountname']);
$date= test_input($_GET['date']);
$deposit= test_input($_GET['deposit']);
$appreciationamount= test_input($_GET['appreciationamount']);
$accountbalance = test_input($_GET['accountbalance']);
$nextappreciationdate= test_input($_GET['nextappreciationdate']);
$paidout= test_input($_GET['paidout']);
$interestrate= test_input($_GET['interestrate']);
$interval= test_input($_GET['interval']);
$debit= test_input($_GET['debit']);
$credit= test_input($_GET['credit']);
$appreciated= test_input($_GET['appreciated']);
$paymentmode= test_input($_GET['paymentmode']);
$installment= test_input($_GET['installment']);
$ids= test_input($_GET['ids']);
$branch= test_input($_GET['branch']);
			$sql1="SELECT * FROM investmentappreciation where TransactionID ='$ids' and Branch='$branch'";
			$result1=mysqli_query($link,$sql1);
if (mysqli_num_rows($result1) == 1) {
	$sql = "UPDATE investmentappreciation SET SavingsID='$savingsid',DepositID='$depositid',AccountNo='$accountno',AccountName='$accountname',Date='$date',Deposit='$deposit',AppreciationAmount='$appreciationamount',Accountbalance='$accountbalance',NextAppreciationDate='$nextappreciationdate',PaidOut='$paidout',InterestRate='$interestrate',InstallmentInterval='$interval',Debit='$debit',Credit='$credit',Appreciated='$appreciated',PaymentMode='$paymentmode',Installment='$installment' WHERE TransactionID='$ids' and Branch='$branch'";
	$result = mysqli_query($link, $sql);
} else {
	$sql = "INSERT into investmentappreciation(SavingsID,DepositID,AccountNo,AccountName,Date,Deposit,AppreciationAmount,Accountbalance,NextAppreciationDate,PaidOut,InterestRate,InstallmentInterval,Debit,Credit,Appreciated,PaymentMode,Installment,TransactionID,Branch) VALUES('$savingsid','$depositid','$accountno','$accountname','$date','$deposit','$appreciationamount','$accountbalance','$nextappreciationdate','$paidout','$interestrate','$interval','$debit','$credit','$appreciated','$paymentmode','$installment','$ids','$branch')";
	$result = mysqli_query($link, $sql);
}

$response = array();
if ($result) 
{
$messages='Correct Info';
 $response['error'] =$messages;
 $response['created_at'] = $timeregistered;
 echo json_encode($response);
}else{
	$messages='Something Un Expected Happened, Try Again Later';
	$response['error'] =$date  ." ".$deposit." ".$appreciationamount." ".$accountbalance." ".$nextappreciationdate." ".$paidout." ".$interestrate." ".$interval;
   echo json_encode($response);
}