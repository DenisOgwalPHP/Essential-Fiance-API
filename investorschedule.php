<?php
require_once('connect.php');
//if (isset($_)) {
$investmentid = $_GET['investmentid'];
$accountno = $_GET['accountno'];
$accountname= $_GET['accountname'];
$ammountpay= $_GET['ammountpay'];
$interestearned= $_GET['interestearned'];
$cumulation = $_GET['cumulation'];
$paymentdate= $_GET['paymentdate'];
$paymentstatus= $_GET['paymentstatus'];
$months= $_GET['months'];
$accrualmonths= $_GET['accrualmonths'];
$ids= $_GET['ids'];
$branch= $_GET['branch'];
			$sql1="SELECT * FROM investmentschedule where TransactionID ='$ids' and Branch='$branch'";
			$result1=mysqli_query($link,$sql1);
			if (mysqli_num_rows($result1) == 1)
			{
			$sql="UPDATE investmentschedule SET InvestmentID='$investmentid',AccountNo='$accountno',AccountName='$accountname',AmmountPay='$ammountpay',InterestEarned='$interestearned',Cumulation='$cumulation',PaymentDate='$paymentdate',Months='$months',AccrualMonths='$accrualmonths',PaymentStatus='$paymentstatus' WHERE TransactionID='$ids' and Branch='$branch'";
			$result=mysqli_query($link,$sql);

			}else{
			$sql="INSERT into investmentschedule(InvestmentID,AccountNo,AccountName,AmmountPay,InterestEarned,Cumulation,PaymentDate,Months,AccrualMonths,PaymentStatus,TransactionID,Branch)
			VALUES('$investmentid','$accountno','$accountname','$ammountpay','$interestearned','$cumulation','$paymentdate','$months','$accrualmonths','$paymentstatus','$ids','$branch')";
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

//}