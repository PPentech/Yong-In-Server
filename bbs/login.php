<?php
include_once('./_common.php');

$g5['title'] = '로그인';
include_once(G5_PATH.'/head.php');
include_once(''.G5_PATH.'/header.php');
include_once(''.G5_PATH.'/sub_header.php');

$url = $_GET['url'];

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
if ($is_member) {
	echo "<script>alert('이미 로그인 하셨습니다.');history.back();</script>";
	exit;
}

$login_url        = login_url($url);
$login_action_url = G5_HTTPS_BBS_URL."/login_check.php";

// 로그인 스킨이 없는 경우 관리자 페이지 접속이 안되는 것을 막기 위하여 기본 스킨으로 대체
$login_file = $member_skin_path.'/login.skin.php';
if (!file_exists($login_file))
    $member_skin_path   = G5_SKIN_PATH.'/member/basic';

include_once($member_skin_path.'/login.skin.php');

include_once(''.G5_PATH.'/sub_footer.php');
include_once(''.G5_PATH.'/footer.php');
?>
