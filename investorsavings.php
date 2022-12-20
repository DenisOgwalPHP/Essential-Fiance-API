<?php
require_once('connect.php');
//if (isset($_)) {
$savingsid = $_GET['savingsid'];
$cashiername = $_GET['cashiername'];
$accountno = $_GET['accountno'];
$accountname = $_GET['accountname'];
$date= $_GET['date'];
$deposit= $_GET['deposit'];
$transactions= $_GET['transactions'];
$accountbalance = $_GET['accountbalance'];
$submittedby= $_GET['submittedby'];
$modeofpayment= $_GET['modeofpayment'];
$interestrate= $_GET['interestrate'];
$maturityperiod= $_GET['maturityperiod'];
$othermaturitydate= $_GET['othermaturitydate'];
$appreciated= $_GET['appreciated'];
$investmentplan= $_GET['investmentplan'];
$depositinterval= $_GET['depositinterval'];
$ids= $_GET['ids'];
$branch= $_GET['branch'];
			$sql1="SELECT * FROM investorsavings where TransactionID ='$ids' and Branch='$branch'";
			$result1=mysqli_query($link,$sql1);
			if (mysqli_num_rows($result1) == 1)
			{
			$sql="UPDATE investorsavings SET SavingsID='$savingsid',CashierName='$cashiername',AccountNo='$accountno',AccountName='$accountname',Date='$date',Deposit=$deposit',Transactions='$transactions',Accountbalance='$accountbalance',SubmittedBy='$submittedby',ModeOfPayment='$modeofpayment',InterestRate='$interestrate',MaturityPeriod='$maturityperiod',OtherMaturityDate='$othermaturitydate',Appreciated='$appreciated',InvestmentPlan='$investmentplan',DepositInterval='$depositinterval' WHERE TransactionID='$ids' and Branch='$branch'";
			$result=mysqli_query($link,$sql);
			}else{
			$sql="INSERT into investorsavings(SavingsID,CashierName,AccountNo,AccountName,Date,Deposit,Transactions,Accountbalance,SubmittedBy,ModeOfPayment,InterestRate,MaturityPeriod,OtherMaturityDate,Appreciated,InvestmentPlan,DepositInterval,TransactionID,Branch)
			VALUES('$savingsid','$cashiername','$accountno','$accountname','$date','$deposit','$transactions','$accountbalance','$submittedby','$modeofpayment','$interestrate','$maturityperiod','$othermaturitydate','$appreciated','$investmentplan','$depositinterval','$ids','$branch')";
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