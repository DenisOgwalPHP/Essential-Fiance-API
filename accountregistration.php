<?php
require_once('connect.php');
//if (isset($_)) {
$accountno = $_GET['accountno'];
$accountnames = $_GET['accountnames'];
$registrationdate = $_GET['registrationdate'];
$maritalstatus= $_GET['maritalstatus'];
$gender= $_GET['gender'];
$dob = $_GET['dob'];
$nationality= $_GET['nationality'];
$nationalitystatus= $_GET['nationalitystatus'];
$idform= $_GET['idform'];
$clientid= $_GET['clientid'];
$contactno= $_GET['contactno'];
$contactno1 = $_GET['contactno1'];
$officeno= $_GET['officeno'];
$physicaladdress= $_GET['physicaladdress'];
$email= $_GET['email'];
$postaladdress= $_GET['postaladdress'];
$bankname = $_GET['bankname'];
$bankaccountname = $_GET['bankaccountname'];
$bankaccountnumber= $_GET['bankaccountnumber'];
$nokname= $_GET['nokname'];
$nokcontactno= $_GET['nokcontactno'];
$nokaddreess= $_GET['nokaddreess'];
$nokrelationship= $_GET['nokrelationship'];
$designation= $_GET['designation'];
$employerName= $_GET['employerName'];
$ids = $_GET['ids'];
$branch= $_GET['branch'];
$sql="INSERT into account(AccountNumber,AccountNames,RegistrationDate,Gender,DOB,MaritalStatus ,Nationality,NationalityStatus,IDForm,ClientID,ContactNo,ContactNo1,OfficeNo,Email,PhysicalAddress,PostalAddress,BankName,BankAccountName,BankAccountNumber,NOKName,NOKContactNo,NOKAddress,NOKRelationship,Designation,EmployerName,TransactionID,Branch)
VALUES('$accountno','$accountnames','$registrationdate','$gender','$dob','$maritalstatus','$nationality','$nationalitystatus','$idform','$clientid','$contactno','$contactno1','$officeno','$email','$physicaladdress','$postaladdress','$bankname','$bankaccountname','$bankaccountnumber','$nokname','$nokcontactno','$nokaddreess','$nokrelationship','$designation','$employerName','$ids','$branch')";
$result=mysqli_query($link,$sql);

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