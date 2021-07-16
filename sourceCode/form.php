<?php $clubID = $_GET['id']; ?>
<!DOCTYPE HTML>
<html lang="ko">
<head>
  <title>봉아리_자기소개서_서식</title>
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
    #intro{
      position: absolute;
      width: 100%;
      height: 100%;
      display: none;
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
    #main{
      width: 100%;
      height: auto;
    }
    #main span{
      display: inline-block;
      color: red;
      font-family: 'Noto Sans KR', sans-serif;
      margin-top: 1%;
      margin-left: 5%;
    }
    #main label{
      display: inline-block;
      font-size: 20px;
      width: 10%;
      font-family: 'Noto Sans KR', sans-serif;
      margin-top: 1%;
      margin-left: 5%;
      vertical-align:top;
    }
    #main textarea{
      display: inline-block;
      margin-top: 1%;
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 17px;
      height: 50%;
      width: 70%;
    }
    #main input[type="text"]{
      display: inline-block;
      font-size: 15px;
      font-family: 'Noto Sans KR', sans-serif;
    }
    #main input[type="submit"]{
      display: inline-block;
      width: 80%;
      padding: 1%;
      border-radius: 20px;
      margin-top: 2%;
      font-family: 'Noto Sans KR', sans-serif;
      cursor: pointer;
      transition: all 1s;
    }
    #main input[type="submit"]:hover{
      background-color: rgba(217,239,255);
    }
  </style>
</head>
<body>
  <div id="intro">

  </div>
  <div id="header">
    <span>봉아리_자기소개서_서식</span>
  </div>
  <div id="main">
    <form method="post" action="form_Check?id=<? echo $clubID; ?>">
      <span>자기 소개서 질문은 신중히, 진지하게 정해주세요!!<br>질문 앞에 번호 붙이지 마세요!&nbsp;&nbsp;1) <- 이런거<br>질문 1개는 필수!&nbsp;&nbsp;추가 질문 없으면 공백으로 남겨두세요~</span><br>
      <label for="ques_1" style="margin-top: 2%;">질문 1</label>
        <textarea style="margin-top: 2%;" id="ques_1" name="ques_1" cols="3" required></textarea><br>
      <label for="ques_1">질문 2</label>
        <textarea id="ques_2" name="ques_2" cols="3"></textarea><br>
      <label for="ques_1">질문 3</label>
        <textarea id="ques_3" name="ques_3" cols="3"></textarea><br>
      <label for="ques_1">질문 4</label>
        <textarea id="ques_4" name="ques_4" cols="3"></textarea><br>
      <label for="ques_1">질문 5</label>
        <textarea id="ques_5" name="ques_5" cols="3"></textarea><br>
      <label for="ques_1">질문 6</label>
        <textarea id="ques_6" name="ques_6" cols="3"></textarea><br>
      <center><input type="submit" value="DAUM" onclick="return confirm('등록하시겠습니까?')"></center>
    </form>
  </div><br><br>
</body>
</html>
