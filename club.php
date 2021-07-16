<?php
  include $_SERVER['DOCUMENT_ROOT'].'/databaseConnection_bongClub.php';
  $sql = "SELECT * FROM clubinfo";
  $result = mysqli_query($dbConnect,$sql);
?>
<!DOCTYPE HTML>
<html lang="ko">
<head>
  <title>봉아리_2021</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap" rel="stylesheet">
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
    #notice{
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 25px;
      color: red;
      display: inline-block;
      padding: 2%;
      overflow: hidden;
    }
    #header span{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 25px;
    }
    #header div{
      height: 100%;
      width: auto;
      position: relative;
      font-family: 'Noto Sans KR', sans-serif;
      cursor: pointer;
    }
    #header button{
      height: 100%;
      width: auto;
      font-family: 'Noto Sans KR', sans-serif;
      cursor: pointer;
      background-color: rgba(255,231,38);
    }
    #serviceCenter{
      cursor: pointer;
      height: 8%;
      width: 100%;
      background-color: rgba(255,255,32,0.6);
      position: relative;
    }
    #serviceCenter span{
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      font-size: 1.1em;
      font-weight: bold;
    }
    #main{
      width: 100%;
      height: auto;
    }
    table{
      border: 1px solid black;
      width: 100%;
      height: auto;
      border-collapse: collapse;
    }
    table td[id="none"]{
      padding: 1.5%;
      border: 1px solid black;
      font-family: 'Sunflower', sans-serif;
      font-size: 20px;
      cursor: pointer;
    }
    table td[id="plus"]{
      padding: 1.5%;
      border: 1px solid black;
      font-family: 'Sunflower', sans-serif;
      font-size: 20px;
      cursor: pointer;
      background-color: rgba(255,0,0,0.4);
    }
    table td span{
      transition: all 0.8s;
    }
    table td:hover span{
      background-color: yellow;
    }
    @media ( max-width: 1024px ) {
      #header{
        height: 140px;
      }
      #header span{
        font-size: 40px;
      }
      #notice{
        font-size: 50px;
      }
      #header button{
        height: 100%;
        width: auto;
        font-size: 30px;
      }
      #serviceCenter{
        cursor: pointer;
        height: 100px;
        width: 100%;
        background-color: rgba(255,255,32,0.6);
        position: relative;
      }
      #serviceCenter span{
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.8em;
        font-weight: bold;
      }
      table td[id="none"]{
        padding: 1.5%;
        border: 1px solid black;
        font-family: 'Sunflower', sans-serif;
        font-size: 45px;
        padding: 30px;
        cursor: pointer;
      }
      table td[id="plus"]{
        padding: 1.5%;
        border: 1px solid black;
        font-family: 'Sunflower', sans-serif;
        font-size: 45px;
        padding: 30px;
        cursor: pointer;
        background-color: rgba(255,0,0,0.4);
      }
      #btn_2{
        position: absolute;
        left: 0;
      }
    }
  </style>
</head>
<body>
  <div id="header">
    <div>
      <button id="btn_2" onclick=location.href="alterInfo">지원 정보 수정</button>
    </div>
    <span>봉아리</span>
  </div>
  <div id="serviceCenter" onclick="location.href='#';">
    <span>질문용 카카오톡 방 (클릭)</span>
  </div>
  <div id="main">
    <table>
      <tbody>
        <? while($row = mysqli_fetch_array($result)){ $plus = $row['plus'];?>
          <?if($plus==0){?> <tr onclick=location.href="intro?id=<?echo $row['clubID'];?>"><td id="none"><span><?echo $row['clubName'];?> (<?echo $row['field'];?>)</span></td></tr> <?}?>
          <?if($plus==1) { ?> <tr onclick="alert('2차 지원이 불가능한 동아리입니다.');"><td id="plus"><span><?echo $row['clubName'];?> (<?echo $row['field'];?>)</span></td></tr> <?}?>
        <? } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
