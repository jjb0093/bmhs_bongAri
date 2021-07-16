<!DOCTYPE HTML>
<html lang="ko">
<head>
  <title>지원 정보 수정</title>
  <meta charset='utf-8'>
  <style>
    #stuInfo{
      display: inline-block;
      width: 40%;
      padding: 2%;
      border: 1px solid black;
      margin-top: 2%;
      background-color: rgba(255,235,51,0.7);
    }
    #stuInfo span{
      display: inline-block;
      width: 50%;
      margin-left: 10%;
    }
  </style>
</head>
<body>
  <form method="post" action="alterInfo">
    <label for="grade">학년</label>
      <select>
        <option value="어차피 수정 불가능하지롱">1학년</option>
      </select>&nbsp;&nbsp;
    <label for="class">반</label>
      <select name="class" required>
        <option disabled selected value> 반 선택 </option>
        <? for($i=1;$i<=9;$i++){ ?>
        <option value="<?echo $i;?>"><?echo $i;?>반</option>
        <? } ?>
      </select>&nbsp;&nbsp;
    <label for="num">번호</label>
      <select name="num" required>
        <option disabled selected value> 번호 선택 </option>
        <? for($i=1;$i<=32;$i++){ ?>
        <option value="<?echo $i;?>"><?echo $i;?>번</option>
        <? } ?>
      </select>&nbsp;&nbsp;
    <label for="name">이름</label>
      <input type="text" name="name" id="name" placeholder="이름" required>&nbsp;&nbsp;
    <label for="password">비밀번호</label>
      <input type="text" name="password" id="password" placeholder="비밀번호(수정용)" required>
    <input type="submit" value="확인">
  </form>
  <?php
  if(isset($_POST['name'])){
    $class = $_POST['class'];
    $num = $_POST['num'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    if($num>=10) $stuID = '10'.$class.$num;
    else $stuID = '10'.$class.'0'.$num;

    include $_SERVER['DOCUMENT_ROOT'].'/databaseConnection_bongClub.php';

    $sql_c = "SELECT * FROM clubans WHERE stuID = {$stuID}";
    $result_c = mysqli_query($dbConnect,$sql_c);
    $row_c = mysqli_fetch_array($result_c);
    if(mysqli_num_rows($result_c)==0){
      echo '<script>alert("일치하는 정보가 없습니다.");</script>';
    }
    else if(mysqli_num_rows($result_c)>1){
      echo '<script>alert("오류발생. 미르에 문의해주세요");</script>';
    }
    else if(mysqli_num_rows($result_c)==1){
      if($password != $row_c['password']){
        echo '<script>alert("비밀번호가 올바르지 않습니다. 비밀번호가 기억나지 않으면 미르에 문의해주세요.");</script>';
      }
      else{
  ?>
  <div id="stuInfo">
    <?
      $clubID = $row_c['clubID'];
      $sql = "SELECT clubName FROM clubinfo WHERE clubID = {$clubID}";
      $result = mysqli_query($dbConnect,$sql);
      $row = mysqli_fetch_array($result);
    ?>
    <span><?echo $row['clubName'];?></span>
    <button onclick=location.href="removeStu?stuID=<?echo $stuID;?>&password=<?echo $password;?>" onclick="return confirm('삭제하시겠습니까?')">삭제</button>
    <button onclick=location.href="alterStu?class=<?echo $class;?>&num=<?echo $num;?>&stuID=<?echo $stuID;?>&password=<?echo $password;?>&id=<?echo $clubID;?>" onclick="return confirm('수정하시겠습니까?')">수정</button>
  </div>
  <?
        }
      }
    }
  ?>
  <br><br>
  <span>비밀번호 등의 정보가 기억나지 않으면<br><a href="#">#</a> 으로 연락주세요.</span>
</body>
</html>
