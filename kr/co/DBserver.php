<?php 
  function simpcodeapi_dbserver($dbserver,$dbname,$dbuser,$dbuser_pw,$dontshowerror,$helpyouornot)
  {
    if($helpyouornot == true){
      $output = "도움말을 요청하셨습니다!<br>simpcodeapi_dbserver() 함수는 다음과 같이 사용하실수 있습니다. simpcodeapi_dbserver('데이터베이스 서버 주소','데이터베이스 이름','데이터베이스 사용자명','데이터베이스 사용자 비밀번호','도움말 출력여부,에러코드 숨기기 (true 시 숨기고, 외에는 그냥 출력).(출력 희망시 true, 외에는 도움말이 출력되지 않음)');";
    }else{
    try{
    $servercon = new PDO('mysql:host='.$dbserver.';dbname='.$dbname.';charset=utf8',$dbuser,$dbuser_pw);
    $servercon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $output = "정상작동";
  }catch (PDOException $e){
    if($dontshowerror == true){
      $output = "데이터베이스 서버에 문제가 생긴것 같습니다. 관리자에게 문의해주세요";
    }else{
    $output = "비정상적작동! ".$e->getMessage();
  }
  }
}
?>
