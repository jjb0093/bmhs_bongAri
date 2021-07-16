<?php
  $clubID = $_GET['id'];

  include $_SERVER['DOCUMENT_ROOT'].'/databaseConnection_bongClub.php';
  $sql = "SELECT * FROM clubinfo WHERE clubID = {$clubID}";
  $result = mysqli_query($dbConnect,$sql);
  $row = mysqli_fetch_array($result);
  $imgCount = 1;
  if($row['clubImg_2']!=null) $imgCount=2; if($row['clubImg_3']!=null) $imgCount=3;
  if($row['clubImg_4']!=null) $imgCount=4; if($row['clubImg_5']!=null) $imgCount=5;
?>
<!DOCTYPE HTML>
<html lang="ko" oncontextmenu='return false' >
<head>
  <title>봉아리_소개 (<?echo $row['clubName'];?>)</title>
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
    #header button{
      height: 100%;
      width: auto;
      position: absolute;
      right: 0;
      font-family: 'Noto Sans KR', sans-serif;
      cursor: pointer;
      background-color: rgba(255,231,38);
    }
    #basic{
      width: 100%;
      height: 50%;
    }
    #basic .norm{
      width: 50%;
      height: 100%;
      float: left;
      position: relative;
    }
    #basic img{
      border-radius: 100%;
      height: 70%;
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%,-50%);
    }
    #norm_inner{
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%,-50%);
      width: 100%; height: auto;
    }
    #norm_inner .title{
      display: inline-block;
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 1.3em;
      width: 25%;
      text-align: right;
    }
    #norm_inner .info{
      display: inline-block;
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 1.3em;
      margin-left: 2%;
    }
    #norm_inner button{
      display: inline-block;
      margin-top: 2.5%;
      width: 55%;
      padding: 1% 0 1% 0;
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 1.3em;
    }
    #clubIntro{
      padding: 3%;
      text-align: center;
      background-color: rgba(255,227,0,0.4);
    }
    #clubIntro span{
      display: inline-block;
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 1.3em;
      margin-left: 2%;
    }
    #clubImg{
      display: inline-block;
      width: 100%;
      text-align: center;
      background-color: rgba(163,216,146,0.15);
      padding: 3% 0 5% 0;
    }
    #clubImg img{
      display: inline-block;
      margin-top: 2%;
      width: 80%;
    }
    #apply{
      position: fixed;
      top: 40%; right: 2%;
      transform: translate(0%,-50%);
      width: 9%;
      height: 22%;
      border: 1px solid black;
      background-color: rgba(224,133,254,0.8);
    }
    #apply div{
      width: 100%;
      height: 100%;
      position: relative;
    }
    #apply div button{
      display: inline-block;
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%,-50%);
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 1em;
      width: 60%;
    }
    #button{
      width: 100%;
      height: auto;
      text-align: center;
    }
    @media ( max-width: 1024px ) {
      #header{
        height: 140px;
      }
      #header span{
        font-size: 40px;
      }
      #header button{
        height: 100%;
        width: auto;
        font-size: 30px;
      }
      #basic{
        width: 100%;
        height: 30%;
      }
      #basic .norm{
        width: 50%;
        height: 100%;
        float: left;
        position: relative;
      }
      #basic img{
        border-radius: 100%;
        height: 70%;
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%,-50%);
      }
      #norm_inner{
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%,-50%);
        width: 100%; height: auto;
      }
      #norm_inner .title{
        display: inline-block;
        font-family: 'Noto Sans KR', sans-serif;
        font-size: 30px;
        width: 40%;
        text-align: right;
      }
      #norm_inner .info{
        display: inline-block;
        font-family: 'Noto Sans KR', sans-serif;
        font-size: 30px;
        margin-left: 2%;
      }
      #norm_inner button{
        display: inline-block;
        margin-top: 3%;
        width: 80%;
        padding: 4% 0 4% 0;
        font-family: 'Noto Sans KR', sans-serif;
        font-size: 1.8em;
      }
      #clubIntro{
        padding: 3% 0 3% 0;
        text-align: center;
        background-color: rgba(255,227,0,0.4);
      }
      #clubIntro span{
        display: inline-block;
        font-family: 'Noto Sans KR', sans-serif;
        font-size: 28px;
      }
      #clubImg{
        display: inline-block;
        width: 100%;
        text-align: center;
        background-color: rgba(163,216,146,0.15);
        padding: 3% 0 5% 0;
      }
      #clubImg img{
        display: inline-block;
        margin-top: 2%;
        width: 90%;
      }
    }
  </style>
</head>
<body>
  <div id="header">
    <span>봉아리_소개 (<?echo $row['clubName'];?>)</span>
    <button onclick=getPass();>동아리 관리</button>
  </div>
  <div id="basic">
    <div class="norm"><span><img src="<? echo 'logo/'.$row['logoImg']; ?>"</span></div>
    <div class="norm">
      <div id="norm_inner">
        <span class="title">동아리 이름 : </span><span class="info"> <?echo $row['clubName'];?></span><br>
        <span class="title">부장 : </span><span style="margin-top: 2%;" class="info"> <?echo $row['adName'];?></span><br>
        <span class="title">담당 선생님 : </span><span style="margin-top: 2%;"  class="info"> <?echo $row['teacher'];?> 선생님</span><br>
        <span class="title">활동 분야 :</span><span style="margin-top: 2%;"  class="info"> <?echo $row['field'];?></span><br>
        <button onclick=location.href="write?id=<?echo $row['clubID'];?>" placeholder="지원">지원</button>
      </div>
    </div>
  </div>
  <div id="clubIntro">
    <span><?echo $row['clubIntro'];?></span>
  </div>
  <div id="clubImg">
    <?
      for($i=1;$i<=$imgCount;$i++){
    ?>
    <img src="clubImg/<?echo $row['clubImg_'.$i];?>">
  <? } ?>
  </div>
  <div id="apply">
    <div><span><button onclick=location.href="write?id=<?echo $row['clubID'];?>" placeholder="지원">지원</button></span></div>
  </div>
  <script>
    function getPass(){
      var pass = prompt('비밀번호를 입력해주세요');
      if(pass!="")location.href="finally/applyList?id=<?echo $clubID;?>&password="+pass;
    }
  </script>
</body>
</html>
