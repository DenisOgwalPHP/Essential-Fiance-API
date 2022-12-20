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
$investmentid = test_input($_GET['investmentid']);
$accountno = test_input($_GET['accountno']);
$accountname= test_input($_GET['accountname']);
$ammountpay= test_input($_GET['ammountpay']);
$interestearned= test_input($_GET['interestearned']);
$cumulation = test_input($_GET['cumulation']);
$paymentdate= test_input($_GET['paymentdate']);
$paymentstatus= test_input($_GET['paymentstatus']);
$months= test_input($_GET['months']);
$accrualmonths= test_input($_GET['accrualmonths']);
$ids= test_input($_GET['ids']);
$branch= test_input($_GET['branch']);
$sql1="SELECT * FROM investmentschedule where TransactionID ='$ids' and Branch='$branch'";
$result1=mysqli_query($link,$sql1);
if (mysqli_num_rows($result1) == 1) {
	$sql = "UPDATE investmentschedule SET InvestmentID='$investmentid',AccountNo='$accountno',AccountName='$accountname',AmmountPay='$ammountpay',InterestEarned='$interestearned',Cumulation='$cumulation',PaymentDate='$paymentdate',Months='$months',AccrualMonths='$accrualmonths',PaymentStatus='$paymentstatus' WHERE TransactionID='$ids' and Branch='$branch'";
	$result = mysqli_query($link, $sql);

} else {
	$sql = "INSERT into investmentschedule(InvestmentID,AccountNo,AccountName,AmmountPay,InterestEarned,Cumulation,PaymentDate,Months,AccrualMonths,PaymentStatus,TransactionID,Branch)
			VALUES('$investmentid','$accountno','$accountname','$ammountpay','$interestearned','$cumulation','$paymentdate','$months','$accrualmonths','$paymentstatus','$ids','$branch')";
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
	$response['error'] = $messages;
	echo json_encode($response);
}

//}