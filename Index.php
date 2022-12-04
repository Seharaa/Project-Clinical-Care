<?php
   $Basic_Salary = 1000;
  
   if ($Basic_Salary <= 1000){
       $HRA = $Basic_Salary * 0.2;
       $DA = $Basic_Salary * 0.8;
   }elseif($Basic_Salary >= 10001 and $Basic_Salary <= 20000){
       $HRA = $Basic_Salary * 0.25;
       $DA = $Basic_Salary*0.9;
   }elseif($Basic_Salary >= 20001){
       $HRA = $Basic_Salary * 0.3;
       $DA = $Basic_Salary * 0.95;
   }

   $Gross_Salary = $Basic_Salary+$HRA+$DA;

   echo 'Salary :',$Gross_Salary,'<br>';

?>

<?php
    function findbmi($weight,$height){
        $bmi = $weight/($height*$height);
        echo 'BMI :',$bmi;
    }

    findbmi(80,1.7);
?>
