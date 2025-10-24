<?php

include 'db.php';

if($_SERVER["REQUEST_METOD"]="POST")
{
    $stu_id=$_POST['student'];
    $month=$_POST['month'];
    $amt=$_POST['amount'];
}

$status='Unpaid';

$sql="SELECT amount FROM fees WHERE fee_id=1";

$result=$conn->query($sql);

$row=$result->fetch_assoc();

if($row['amount']>$amt)
{
    echo "Paid";
    $status='Part paid';
}
else if($row['amount']=$amt)
{
    $status='Fully Paid';
}
else
{
    $status='Unpaid';
}

$sql1="INSERT INTO fee_Payment VALUES ($stu_id,1,'$status',$amt,'$month')";

if ($conn->query($sql1) === TRUE) {
    header('Location: ../Frontend/fees_payment.html');
    exit();
}

?>