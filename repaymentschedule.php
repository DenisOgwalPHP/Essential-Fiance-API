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
$ammountpay= test_input($_GET['ammountpay']);
$interest= test_input($_GET['interest']);
$totalammount = test_input($_GET['totalammount']);
$paymentdate= test_input($_GET['paymentdate']);
$paymentstatus= test_input($_GET['paymentstatus']);
$months= test_input($_GET['months']);
$fines= test_input($_GET['fines']);
$waivered= test_input($_GET['waivered']);
$actualpaymentdate= test_input($_GET['actualpaymentdate']);
$ids= test_input($_GET['ids']);
$balanceexist= test_input($_GET['balanceexist']);
$beginningbalance= test_input($_GET['beginningbalance']);
$branch= test_input($_GET['branch']);
$sql1="SELECT * FROM repaymentschedule where TransactionID ='$ids' and InsBranch='$branch'";
$result1=mysqli_query($link,$sql1);
if (mysqli_num_rows($result1) == 1) {
	$sql = "UPDATE repaymentschedule SET LoanID='$loanid',AccountNo='$accountno',AccountName='$accountname',AmmountPay='$ammountpay',Interest='$interest',TotalAmmount='$totalammount',PaymentDate='$paymentdate',Months='$months',PaymentStatus='$paymentstatus',BalanceExist='$balanceexist',Fines='$fines',Waivered='$waivered',ActualPaymentDate='$actualpaymentdate' WHERE TransactionID='$ids' and InsBranch='$branch'";
	$result = mysqli_query($link, $sql);
} else {
	$sql = "INSERT into repaymentschedule(LoanID,AccountNo,AccountName,AmmountPay,Interest,TotalAmmount,PaymentDate,Months,PaymentStatus,BalanceExist,Fines,Waivered,ActualPaymentDate,TransactionID,InsBranch)
			VALUES('$loanid','$accountno','$accountname','$ammountpay','$interest','$totalammount','$paymentdate','$months','$paymentstatus','$balanceexist','$fines','$waivered','$actualpaymentdate','$ids','$branch')";
	$result = mysqli_query($link, $sql);
}

$response = array();
if ($result) {
	$messages = 'Correct Info';
	$response['error'] = $messages;
	$response['created_at'] = $timeregistered;
	echo json_encode($response);
}else {
	$messages = 'Something Un Expected Happened, Try Again Later';
	$response['error'] = $messages;
	echo json_encode($response);
}
//}