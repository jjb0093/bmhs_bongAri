<?php
  if(!isset($_GET['stuID'])) echo '<script>alert("정보가 입력되지 않았습니다. 올바른 경로로 접근해주세요");history.back();</script>';
  else{
    include $_SERVER['DOCUMENT_ROOT'].'/databaseConnection_bongClub.php';

    $stuID = $_GET['stuID'];
    $pass = $_GET['password'];
    $sql = "DELETE FROM clubans WHERE stuID='{$stuID}' AND password='{$pass}'";
    echo $sql;
    $result = mysqli_query($dbConnect,$sql);
    if($result){
      echo '<script>alert("삭제되었습니다. 다른 동아리에 지원해주세요.");location.href="club?mir=false";</script>';
    }
    else{
      echo '<script>alert("오류발생. 다시 시도해주세요");</script>';
    }
  }
?>
