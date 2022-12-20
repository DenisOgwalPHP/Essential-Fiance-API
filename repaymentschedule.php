<?php
require_once('connect.php');
//if (isset($_)) {
$loanid = $_GET['loanid'];
$accountno = $_GET['accountno'];
$accountname= $_GET['accountname'];
$ammountpay= $_GET['ammountpay'];
$interest= $_GET['interest'];
$totalammount = $_GET['totalammount'];
$paymentdate= $_GET['paymentdate'];
$paymentstatus= $_GET['paymentstatus'];
$months= $_GET['months'];
$fines= $_GET['fines'];
$waivered= $_GET['waivered'];
$actualpaymentdate= $_GET['actualpaymentdate'];
$ids= $_GET['ids'];
$balanceexist= $_GET['balanceexist'];
$beginningbalance= $_GET['beginningbalance'];
$branch= $_GET['branch'];
			$sql1="SELECT * FROM repaymentschedule where TransactionID ='$ids' and InsBranch='$branch'";
			$result1=mysqli_query($link,$sql1);
			if (mysqli_num_rows($result1) == 1)
			{
			$sql="UPDATE repaymentschedule SET LoanID='$loanid',AccountNo='$accountno',AccountName='$accountname',AmmountPay='$ammountpay',Interest='$interest',TotalAmmount='$totalammount',PaymentDate='$paymentdate',Months='$months',PaymentStatus='$paymentstatus',BalanceExist='$balanceexist',Fines='$fines',Waivered='$waivered',ActualPaymentDate='$actualpaymentdate' WHERE TransactionID='$ids' and InsBranch='$branch'";
			$result=mysqli_query($link,$sql);
			}else{
			$sql="INSERT into repaymentschedule(LoanID,AccountNo,AccountName,AmmountPay,Interest,TotalAmmount,PaymentDate,Months,PaymentStatus,BalanceExist,Fines,Waivered,ActualPaymentDate,TransactionID,InsBranch)
			VALUES('$loanid','$accountno','$accountname','$ammountpay','$interest','$totalammount','$paymentdate','$months','$paymentstatus','$balanceexist','$fines','$waivered','$actualpaymentdate','$ids','$branch')";
			$result=mysqli_query($link,$sql);
			}
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