<?php
  include $_SERVER['DOCUMENT_ROOT'].'/databaseConnection_bongClub.php';

  $name = $_POST['name'];
  $field = $_POST['field'];
  $adName = $_POST['adName'];
  $teacher = $_POST['teacher'];
  $logo = $_FILES['logo'];
  $clubIntro = nl2br($_POST['clubIntro']);
  $clubImg_1 = $_FILES['clubImg_1'];
  $clubImg_2 = $_FILES['clubImg_2'];
  $clubImg_3 = $_FILES['clubImg_3'];
  $clubImg_4 = $_FILES['clubImg_4'];
  $clubImg_5 = $_FILES['clubImg_5'];
  $password = $_POST['password'];

  $allow = true;

  $logo_fileType = pathinfo($logo['name'])['extension'];
  if($logo_fileType!='png'&&$logo_fileType!='jpg'&&$logo_fileType!='jpeg'){
     $allow = false;
     echo '<script>alert("지원하지 않는 확장자입니다.('.$logo_fileType.')");</script>';
     echo '<script>history.back();</script>';
  }
  else{
     $logo_name = $logo['name'];
     move_uploaded_file($logo['tmp_name'], 'logo/'.$logo_name);
  }

  $clubImg_1_fileType = pathinfo($clubImg_1['name'])['extension'];
  if($clubImg_1_fileType!='png'&&$clubImg_1_fileType!='jpg'&&$clubImg_1_fileType!='jpeg'){
     $allow = false;
     echo '<script>alert("지원하지 않는 확장자입니다.('.$clubImg_1_fileType.')");</script>';
     echo '<script>history.back();</script>';
  }
  else{
    $clubImg_1_name = $clubImg_1['name'];
    move_uploaded_file($clubImg_1['tmp_name'], 'clubImg/'.$clubImg_1_name);
  }

  if($clubImg_2['name']!=null){
    $clubImg_2_fileType = pathinfo($clubImg_2['name'])['extension'];
    if($clubImg_2_fileType!='png'&&$clubImg_2_fileType!='jpg'&&$clubImg_2_fileType!='jpeg'){
       $allow = false;
       echo '<script>alert("지원하지 않는 확장자입니다.('.$clubImg_2_fileType.')");</script>';
       echo '<script>history.back();</script>';
    }
    else{
      $clubImg_2_name = $clubImg_2['name'];
      move_uploaded_file($clubImg_2['tmp_name'], 'clubImg/'.$clubImg_2_name);
    }
  }
  else $clubImg_2_name = "";

  if($clubImg_3['name']!=null){
    $clubImg_3_fileType = pathinfo($clubImg_3['name'])['extension'];
    if($clubImg_3_fileType!='png'&&$clubImg_3_fileType!='jpg'&&$clubImg_3_fileType!='jpeg'){
       $allow = false;
       echo '<script>alert("지원하지 않는 확장자입니다.('.$clubImg_3_fileType.')");</script>';
       echo '<script>history.back();</script>';
    }
    else{
      $clubImg_3_name = $clubImg_3['name'];
      move_uploaded_file($clubImg_3['tmp_name'], 'clubImg/'.$clubImg_3_name);
    }
  }
  else $clubImg_3_name = "";

  if($clubImg_4['name']!=null){
    $clubImg_4_fileType = pathinfo($clubImg_4['name'])['extension'];
    if($clubImg_4_fileType!='png'&&$clubImg_4_fileType!='jpg'&&$clubImg_4_fileType!='jpeg'){
       $allow = false;
       echo '<script>alert("지원하지 않는 확장자입니다.('.$clubImg_4_fileType.')");</script>';
       echo '<script>history.back();</script>';
    }
    else{
      $clubImg_4_name = $clubImg_4['name'];
      move_uploaded_file($clubImg_4['tmp_name'], 'clubImg/'.$clubImg_4_name);
    }
  }
  else $clubImg_4_name = "";

  if($clubImg_5['name']!=null){
    $clubImg_5_fileType = pathinfo($clubImg_5['name'])['extension'];
    if($clubImg_5_fileType!='png'&&$clubImg_5_fileType!='jpg'&&$clubImg_5_fileType!='jpeg'){
       $allow = false;
       echo '<script>alert("지원하지 않는 확장자입니다.('.$clubImg_5_fileType.')");</script>';
       echo '<script>history.back();</script>';
    }
    else{
      $clubImg_5_name = $clubImg_5['name'];
      move_uploaded_file($clubImg_5['tmp_name'], 'clubImg/'.$clubImg_5_name);
    }
  }
  else $clubImg_5_name = "";

  if($allow){
    $sql = "INSERT INTO clubinfo(clubName,field,adName,teacher,logoImg,clubIntro,clubImg_1,clubImg_2,clubImg_3,clubImg_4,clubImg_5,password) VALUES ('$name','$field','$adName','$teacher','$logo_name','$clubIntro','$clubImg_1_name','$clubImg_2_name','$clubImg_3_name','$clubImg_4_name','$clubImg_5_name','$password')";
    $result = mysqli_query($dbConnect, $sql);
    if(!$result){ echo '<script>alert("오류가 발생했습니다. 다시 시도해주세요."); </script>'; echo '<br>'; mysqli_connect_errno($dbConnect); echo '<br>'; echo $sql;}
    else{
      $sql_f = "SELECT clubID FROM clubinfo WHERE clubName = '{$name}'";
      $result_f = mysqli_query($dbConnect,$sql_f);
      $row_f = mysqli_fetch_array($result_f);
      $clubID = $row_f['clubID'];
      echo '<script>location.href="form?id='.$clubID.'"</script>';
    }
  }
?>
<!DOCTYPE HTML>
<html lang="ko">
<head>
  <meta charset="utf-8">
</head>
</html>
