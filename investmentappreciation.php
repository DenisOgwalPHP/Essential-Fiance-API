<?php
require_once('connect.php');
//if (isset($_)) {
$savingsid = $_GET['savingsid'];
$depositid = $_GET['depositid'];
$accountno = $_GET['accountno'];
$accountname = $_GET['accountname'];
$date= $_GET['date'];
$deposit= $_GET['deposit'];
$appreciationamount= $_GET['appreciationamount'];
$accountbalance = $_GET['accountbalance'];
$nextappreciationdate= $_GET['nextappreciationdate'];
$paidout= $_GET['paidout'];
$interestrate= $_GET['interestrate'];
$interval= $_GET['interval'];
$debit= $_GET['debit'];
$credit= $_GET['credit'];
$appreciated= $_GET['appreciated'];
$paymentmode= $_GET['paymentmode'];
$installment= $_GET['installment'];
$ids= $_GET['ids'];
$branch= $_GET['branch'];
			$sql1="SELECT * FROM investmentappreciation where TransactionID ='$ids' and Branch='$branch'";
			$result1=mysqli_query($link,$sql1);
			if (mysqli_num_rows($result1) == 1)
			{
				$sql="UPDATE investmentappreciation SET SavingsID='$savingsid',DepositID='$depositid',AccountNo='$accountno',AccountName='$accountname',Date='$date',Deposit='$deposit',AppreciationAmount='$appreciationamount',Accountbalance='$accountbalance',NextAppreciationDate='$nextappreciationdate',PaidOut='$paidout',InterestRate='$interestrate',InstallmentInterval='$interval',Debit='$debit',Credit='$credit',Appreciated='$appreciated',PaymentMode='$paymentmode',Installment='$installment' WHERE TransactionID='$ids' and Branch='$branch'";
				$result=mysqli_query($link,$sql);
			}
			}else{
				$sql="INSERT into investmentappreciation(SavingsID,DepositID,AccountNo,AccountName,Date,Deposit,AppreciationAmount,Accountbalance,NextAppreciationDate,PaidOut,InterestRate,InstallmentInterval,Debit,Credit,Appreciated,PaymentMode,Installment,TransactionID,Branch)
				VALUES('$savingsid','$depositid','$accountno','$accountname','$date','$deposit','$appreciationamount','$accountbalance','$nextappreciationdate','$paidout','$interestrate','$interval','$debit','$credit','$appreciated','$paymentmode','$installment','$ids','$branch')";
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
	$response['error'] =$date  ." ".$deposit." ".$appreciationamount." ".$accountbalance." ".$nextappreciationdate." ".$paidout." ".$interestrate." ".$interval;
   echo json_encode($response);
}
*/
//}