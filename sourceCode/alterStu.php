<?php
  if(!isset($_GET['id'])||!isset($_GET['stuID'])||!isset($_GET['password'])) echo'<script>alert("올바른 경로로 접근해주세요.");history.back();</script>';
  else{

  $class =
  $num = $_GET['num'];
  $clubID = $_GET['id'];
  $stuID = $_GET['stuID'];

  include $_SERVER['DOCUMENT_ROOT'].'/databaseConnection_bongClub.php';

  $sql_c = "SELECT * FROM clubans WHERE stuID = {$stuID}";
  $result_c = mysqli_query($dbConnect,$sql_c);
  $row_c = mysqli_fetch_array($result_c);
  if($_GET['password'] != $row_c['password']){
    echo '<script>alert("비밀번호가 올바르지 않습니다. 비밀번호가 기억나지 않으면 미르에 문의해주세요.");history.back();</script>';
  }



  $sql = "SELECT * FROM clubinfo WHERE clubID = {$clubID}";
  $result = mysqli_query($dbConnect,$sql);
  $row = mysqli_fetch_array($result);

  $sql_f ="SELECT * FROM clubques WHERE clubID = {$clubID}";
  $result_f = mysqli_query($dbConnect,$sql_f);
  $row_f = mysqli_fetch_array($result_f);
  $count_f = mysqli_num_rows($result_f);
  }
?>
<!DOCTYPE HTML>
<html lang="ko">
<head>
  <title>지원서 수정 (<?echo $row['clubName'];?>)</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Gamja+Flower&family=Nanum+Gothic&family=Noto+Sans+KR&family=Sunflower:wght@300&display=swap" rel="stylesheet">
  <style>
  /*
  font-family: 'Do Hyeon', sans-serif;
  font-family: 'Gamja Flower', cursive;
  font-family: 'Nanum Gothic', sans-serif;
  font-family: 'Noto Sans KR', sans-serif;
  font-family: 'Sunflower', sans-serif;
  */
    html, body{
      height: 100%;
      width: 100%;
    }
    body{
      margin: 0 0 0 0;
    }
    #header{
      height: 50px;
      position: relative;
      background-color: rgba(137,213,250,0.6);
    }
    #header span{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 25px;
    }
    form{
      width: 100%;
      height: auto;
    }
    form #stuInfo{
      width: 100%;
      padding: 2% 0 2% 0;
      text-align: center;
    }
    form #stuInfo label{
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 20px;
    }
    form #stuInfo select{
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 20px;
    }
    form #stuInfo input[type="text"]{
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 20px;
    }
    form #stuInfo input[type="text"][name="name"]{
      width: 130px;
    }
    form #stuInfo input[type="text"][name="password"]{
      width: 200px;
    }
    #form{
      width: 100%;
      padding: 2% 0 2% 0;
      height: auto;
      background-color: rgba(255,227,0,0.2);
    }
    #form .title{
      display: inline-block;
      margin-left: 3%;
      vertical-align: top;
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 22px;
      font-weight: bold;
    }
    #form textarea{
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 18px;
      display: inline-block;
      margin-left: 3%;
      margin-top: 1%;
      width: 94%;
    }
    #form input[type="submit"]{
      display: inline-block;
      width: 94%;
      padding: 2% 0 2% 0;
      border-radius: 20px;
      margin-top: 2%;
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 20px;
      cursor: pointer;
      transition: all 1s;
    }
    #form input[type="submit"]:hover{
      background-color: rgba(217,239,255);
    }
  </style>
</head>
<body>
  <div id="header">
    <span>지원서 작성 (<?echo $row['clubName'];?>)</span>
  </div>
  <form method="post" action="alterStu_Check?id=<?echo $clubID;?>">
    <div id="stuInfo">
      <label for="grade">학년</label>
        <select>
          <option value="어차피 수정 불가능하지롱">1학년</option>
        </select>&nbsp;&nbsp;
      <label for="class">반</label>
        <select name="class" required>
          <option disabled value> 반 선택 </option>
          <? for($i=1;$i<=9;$i++){ ?>
          <option <?if($_GET['class']==$i) echo 'selected';?> value="<?echo $i;?>"><?echo $i;?>반</option>
          <? } ?>
        </select>&nbsp;&nbsp;
      <label for="class">번호</label>
        <select name="num" required>
          <option disabled value> 번호 선택 </option>
          <? for($i=1;$i<=32;$i++){ ?>
          <option <?if($_GET['num']==$i) echo 'selected';?> value="<?echo $i;?>"><?echo $i;?>번</option>
          <? } ?>
        </select>&nbsp;&nbsp;
      <label for="name">이름</label>
        <input type="text" name="name" id="name" placeholder="이름" value="<?echo $row_c['name'];?>" required>&nbsp;&nbsp;
      <label for="password">비밀번호</label>
        <input type="text" name="password" id="password" placeholder="비밀번호(수정용)" value="<?echo $row_c['password'];?>" required>
    </div>
    <div id="form">
      <? for($i=1;$i<=6;$i++){ if($row_f['ques_'.$i]==null) break; ?>
        <span class="title"><? echo $i.') '.$row_f['ques_'.$i]; ?></span><br>
        <textarea required placeholder="항상 신중하고, 진지하게. 한 번 선택한 동아리가 1년의 생기부를 결정합니다." name="ans_<?echo $i?>" rows="5"><?echo str_replace("/",",",str_replace("<br />","",$row_c['ans_'.$i]));?></textarea><br><br><br>
      <? } ?>
      <center><input type="submit" value="제출" onclick="return confirm('등록하시겠습니까?')"></center>
    </div>
  </form>
</body>
</html>
