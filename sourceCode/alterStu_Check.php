<?php
  $clubID = $_GET['id'];

  $class = '0'.$_POST['class'];
  $num = $_POST['num'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  for($i=1;$i<=6;$i++){
    if($_POST['ans_'.$i]!=null) $ans_{$i} = str_replace("'","/",nl2br($_POST['ans_'.$i]));
    else $ans_{$i}="";
  }
  if($num<10) $num = '0'.$num;
  $stuID = '1'.$class.$num;


  include $_SERVER['DOCUMENT_ROOT'].'/databaseConnection_bongClub.php';

  $sql_r = "DELETE FROM clubans WHERE stuID = {$stuID}";
  mysqli_query($dbConnect,$sql_r);
  $sql_c = "SELECT * FROM clubans WHERE stuID = {$stuID}";
  $result_c = mysqli_query($dbConnect,$sql_c);
  $sql = "INSERT INTO clubans(stuID,name,clubID,ans_1,ans_2,ans_3,ans_4,ans_5,ans_6,password) VALUES ('$stuID','$name','$clubID','$ans_[1]','$ans_[2]','$ans_[3]','$ans_[4]','$ans_[5]','$ans_[6]','$password') ON DUPLICATE KEY UPDATE clubID='$clubID', name='$name', ans_1='$ans_[1]', ans_2='$ans_[2]', ans_3='$ans_[3]', ans_4='$ans_[4]', ans_5='$ans_[5]', ans_6='$ans_[6]', password='$password'";
  $result = mysqli_query($dbConnect,$sql);
  echo $sql;
  if($result){
    echo '<script>alert("수정완료"); location.href="club?mir=false";</script>';
  }
  else{
    echo'<script>alert("오류 발생. 미르에 문의주세요.");</script>';
    mysqli_connect_errno($dbConnect);
  }
?>
<!DOCTYPE HTML>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <style>
  </style>
</head>
<body>
  <br><br>
  <span>복사해가세요!!</span><br><span>--------------------------------------</span><br><br>
  <span><?echo $ans_[1].'<br><br>'.$ans_[2].'<br><br>'.$ans_[3].'<br><br>'.$ans_[4].'<br><br>'.$ans_[5].'<br><br>'.$ans_[6];?></span><br><br>
  <button value="메인 페이지로 돌아가기" onclick=location.href="club?mir=false">메인 페이지로 돌아가기</button>
  <!--<textarea type="text" id="write" value=""></textarea>
  <script>
  var copyText = document.getElementById("write");
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
</script>-->
</body>
</html>
