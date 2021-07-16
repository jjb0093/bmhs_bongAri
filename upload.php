<!DOCTYPE HTML>
<html lang="ko">
<head>
  <title>봉아리_업로드</title>
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
    #main #logoPreview{
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 15px;
      background-color: yellow;
      padding: 0 10px 0 10px;
      cursor: pointer;
      display: none;
    }
    #main label{
      display: inline-block;
      font-size: 20px;
      width: 15%;
      font-family: 'Noto Sans KR', sans-serif;
      margin-top: 1%;
      margin-left: 5%;
    }
    #main textarea{
      display: inline-block;
      margin-top: 1%;
      font-family: 'Noto Sans KR', sans-serif;
      font-size: 20px;
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
    #clubImg_div{
      display: inline-block;
      margin-top: 1%;
    }
    #clubImg_div input[type="file"]{
      display: inline-block;
      margin-top: 2%;
    }
    #footer{
      width: 100%;
      height: 5%;
      position: absolute;
      bottom: 0;
      background-color: rgba(245,255,197);
    }
    #footer div{
      width: 100%;
      height: 100%;
      position: relative;
    }
    #footer div span{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      font-family: 'Noto Sans KR', sans-serif;
    }
  </style>
</head>
<body>
  <div id="intro">

  </div>
  <div id="header">
    <span>봉아리_업로드</span>
  </div>
  <div id="main">
    <form method="post" action="upload_Check" enctype="multipart/form-data">
      <label for="name">동아리 이름</label>
        <input style="margin-top: 3%;" type="text" id="name" name="name" placeholder="동아리 이름" required><br>
      <label for="field">활동 분야</label>
        <input type="text" id="field" name="field" placeholder="활동 분야" required><br>
      <label for="adName">부장 이름</label>
        <input type="text" id="adName" name="adName" placeholder="부장 이름" required><br>
      <label for="teacher">담당 선생님</label>
        <input type="text" id="teacher" name="teacher" placeholder="담당 선생님" required><br>
      <label for="logo">동아리 로고</label>
        <input type="file" id="logo" name="logo" value="동아리 로고" onchange="setLogoPreview();" required>&nbsp;<span id="logoPreview" onclick="logoPreview();">미리보기</span> <!--<span style="color:red">로고 이미지는 1대1 비율 정사각형으로 업로드</span>--><br>
      <label for="clubIntro" style="vertical-align:top">동아리 소개</label>
        <textarea id="clubIntro" name="clubIntro" placeholder="동아리 소개 문구" rows="5" required></textarea><br>
      <label>활동 사진</label>
        <div id="clubImg_div" style="vertical-align:top">
          <input type="file" id="clubImg_1" name="clubImg_1"><br>
          <input type="file" id="clubImg_2" name="clubImg_2"><br>
          <input type="file" id="clubImg_3" name="clubImg_3"><br>
          <input type="file" id="clubImg_4" name="clubImg_4"><br>
          <input type="file" id="clubImg_5" name="clubImg_5">
        </div><br>
      <label for="teacher">비밀번호</label>
        <input type="text" id="password" name="password" placeholder="비밀번호(수정용)" required><br>
      <center><input type="submit" value="DAUM" onclick="return confirm('등록하시겠습니까?')"></center>
    </form>
  </div>
  <br><br>
  <!--<div id="footer">
    <div><span>"어림도 없지"</span></div>
  </div>-->
  <script>
    function setLogoPreview(){
      //document.getElementById("logoPreview").style.display = 'inline-block';
    }
  </script>
</body>
</html>
