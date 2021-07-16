<?php
  include $_SERVER['DOCUMENT_ROOT'].'/databaseConnection_bongClub.php';

  $clubID = $_GET['id'];
  for($i=1;$i<=6;$i++){
    $ques_{$i} = nl2br($_POST['ques_'.$i]);
  }
  echo '<br>';
  $sql = "INSERT INTO clubques(clubID,ques_1,ques_2,ques_3,ques_4,ques_5,ques_6) VALUES ('$clubID','$ques_[1]','$ques_[2]','$ques_[3]','$ques_[4]','$ques_[5]','$ques_[6]') ON DUPLICATE KEY UPDATE ques_1='$ques_[1]', ques_2='$ques_[2]', ques_3='$ques_[3]', ques_4='$ques_[4]', ques_5='$ques_[5]', ques_6='$ques_[6]'";
  $result = mysqli_query($dbConnect,$sql);
  //echo $sql;
  if($result){
    echo '<script>alert("등록완료"); location.href="club"</script>';
  }
  else echo'<script>alert("오류 발생. 미르에 문의주세요.");</script>';
?>
