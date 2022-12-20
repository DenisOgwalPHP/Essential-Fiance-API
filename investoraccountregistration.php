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
$accountno = test_input($_GET['accountno']);
$accountnames = test_input($_GET['accountnames']);
$registrationdate = test_input($_GET['registrationdate']);
$maritalstatus= test_input($_GET['maritalstatus']);
$gender= test_input($_GET['gender']);
$dob = test_input($_GET['dob']);
$nationality= test_input($_GET['nationality']);
$nationalitystatus= test_input($_GET['nationalitystatus']);
$idform= test_input($_GET['idform']);
$clientid= test_input($_GET['clientid']);
$contactno= test_input($_GET['contactno']);
$contactno1 = test_input($_GET['contactno1']);
$officeno= test_input($_GET['officeno']);
$physicaladdress= test_input($_GET['physicaladdress']);
$email= test_input($_GET['email']);
$postaladdress= test_input($_GET['postaladdress']);
$bankname = test_input($_GET['bankname']);
$bankaccountname = test_input($_GET['bankaccountname']);
$bankaccountnumber= test_input($_GET['bankaccountnumber']);
$nokname= test_input($_GET['nokname']);
$nokcontactno= test_input($_GET['nokcontactno']);
$nokaddreess= test_input($_GET['nokaddreess']);
$nokrelationship= test_input($_GET['nokrelationship']);
$ids = test_input($_GET['ids']);
$branch= test_input($_GET['branch']);
$sql="INSERT into investoraccount(AccountNumber,AccountNames,RegistrationDate,Gender,DOB,MaritalStatus ,Nationality,NationalityStatus,IDForm,ClientID,ContactNo,ContactNo1,OfficeNo,Email,PhysicalAddress,PostalAddress,BankName,BankAccountName,BankAccountNumber,NOKName,NOKContactNo,NOKAddress,NOKRelationship,TransactionID,Branch)
VALUES('$accountno','$accountnames','$registrationdate','$gender','$dob','$maritalstatus','$nationality','$nationalitystatus','$idform','$clientid','$contactno','$contactno1','$officeno','$email','$physicaladdress','$postaladdress','$bankname','$bankaccountname','$bankaccountnumber','$nokname','$nokcontactno','$nokaddreess','$nokrelationship','$ids','$branch')";
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