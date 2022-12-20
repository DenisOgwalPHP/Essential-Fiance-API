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
$repaymentid = test_input($_GET['repaymentid']);
$ammountpaid = test_input($_GET['ammountpaid']);
$totalammount= test_input($_GET['totalammount']);
$balance= test_input($_GET['balance']);
$repaymonths= test_input($_GET['repaymonths']);
$cashierid = test_input($_GET['cashierid']);
$cashiername= test_input($_GET['cashiername']);
$loanid= test_input($_GET['loanid']);
$memberid= test_input($_GET['memberid']);
$membername= test_input($_GET['membername']);
$repaymentdate= test_input($_GET['repaymentdate']);
$year= test_input($_GET['year']);
$months= test_input($_GET['months']);
$interest= test_input($_GET['interest']);
$modeofpayment= test_input($_GET['modeofpayment']);
$ids= test_input($_GET['ids']);
$branch= test_input($_GET['branch']);
$sql1="SELECT * FROM loanrepayment where TransactionID ='$ids' and InsBranch='$branch'";
$result1=mysqli_query($link,$sql1);
if (mysqli_num_rows($result1) == 1) {
	$sql = "UPDATE loanrepayment SET RepaymentID='$repaymentid',AmmountPaid='$ammountpaid',Balance='$balance',RepayMonths='$repaymonths',CashierID='$cashierid',CashierName='$cashiername',LoanID='$loanid',MemberID='$memberid',Repaymentdate='$repaymentdate',Year='$year',Months='$months',Interest='$interest' WHERE TransactionID='$ids' and InsBranch='$branch'";
	$result = mysqli_query($link, $sql);
} else {
	$sql = "INSERT into loanrepayment(RepaymentID,AmmountPaid,Balance,RepayMonths,CashierID,CashierName,LoanID,MemberID,Repaymentdate,Year,Months,Interest,InsBranch)VALUES('$repaymentid','$ammountpaid','$balance','$repaymonths','$cashierid','$cashiername','$loanid','$memberid','$repaymentdate','$year','$months','$interest','$branch')";
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