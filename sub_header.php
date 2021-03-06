<!-- 비주얼 섹션 -->
<section id="visual" class="login-visual2">
	<div>
		<h2>
			<span>YONG IN UNIVERSITY SOCIAL SERVICE CENTER</span>
		</h2>
	</div>
</section>
<!-- 비주얼 섹션 끝 -->

<!-- 컨텐츠 -->
<div id="content">
	<?php
		if (isset($midx)) {
			$title = "센터 소개";
		} else{
			if (isset($bo_table)) {
				switch ($bo_table) {
					case 'recruitment': $title = "모집공고"; break;
					case 'vlt': $title = "수업 게시판"; break;
					case 'qna': $title = "Q&A"; break;
					case 'gallery': $title = "센터 소개"; break;
					case 'calander': $title = "센터 소개"; break;
					case 'introduce': $title = "센터 소개"; break;
				}
			} else{
				$title = $g5['title'];
				echo $title;
			}
		}
				$sca = urldecode($_GET['sca']);
				$fir = $db->query("SELECT * FROM g5_write_introduce where ca_name='교육지원 사업' order by wr_id asc")->fetch();
				$sec = $db->query("SELECT * FROM g5_write_introduce where ca_name='건강증진 사업' order by wr_id asc")->fetch();
				$thr = $db->query("SELECT * FROM g5_write_introduce where ca_name='커뮤니티 사업' order by wr_id asc")->fetch();
				$is_category = false; 
				$category_option = ''; 
				if ($board['bo_use_category']) { 
				    $is_category = true; 
				    $category_href = G5_BBS_URL.'/board.php?bo_table='.$bo_table; 

				    $category_option .= '<li><a href="'.$category_href.'"'; 
				    if ($sca=='' && !$wr_id) 
				        $category_option .= '</a></li>'; 

				    $categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음 
				    for ($i=0; $i<count($categories); $i++) { 
				        $category = trim($categories[$i]); 
				        if ($category=='') continue; 
				        if ($bo_table == "introduce") {
					        $category_option .= '<li><a href="'.$category_href.'&amp;wr_id='.$fir['wr_id'].'&amp;sca='.$sca.'"'; 
				        } else {
					        $category_option .= '<li><a href="'.($category_href."&amp;sca=".urlencode($category)).'"'; 
				        }
				        
				        if ($category==$sca || $category==$category_name) { // 현재 선택된 카테고리라면 
				            $category_option .= ' class="active"'; 
				            $category_msg = '<span class="sound_only">열린 분류 </span>'; 
				        } 
				        $category_option .= '>'.$category_msg.$category.'</a></li>'; 
				    } 
				}
				$intro = $db->query("SELECT * FROM g5_sub_menu where page='1' order by number asc")->fetch();
				$active = "";
	?>
	<!-- 로그인 -->

	<div id="left-nav">
		<div class="left-title">
			<?php if ($title != ""): ?>
			<?php echo $title; ?>	
			<?php else: ?>
			<?php echo mb_substr($g5['title'], 0,5); ?>
			<?php endif ?>
			<div class="ham">
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
			<ul>
				<?php if ($is_category): ?>
				<?php if ($bo_table != "introduce"): ?>
				<?php echo $category_option; ?>
				<?php endif ?>
				<?php endif ?>
				<?php if ($sidx || $bo_table == "gallery" || $bo_table == "calander" || $bo_table == "introduce"): ?>
				<li><a href="<?php echo G5_URL."/1/1" ?>">사회봉사센터는</a></li>
				<li>
					<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=introduce&amp;wr_id=<?php echo $fir['wr_id'] ?>&amp;sca=<?php echo $fir['ca_name']; ?>">프로그램 소개</a>
					<?php if ($bo_table == "introduce"): ?>
					<ul class="intro-list">
						<li><a href="<?php echo "".G5_BBS_URL."/board.php?bo_table=introduce&amp;wr_id={$fir['wr_id']}&amp;sca={$fir['ca_name']}" ?>"><?php print_r($fir['ca_name']) ?></a></li>
						<li><a href="<?php echo "".G5_BBS_URL."/board.php?bo_table=introduce&amp;wr_id={$sec['wr_id']}&amp;sca={$sec['ca_name']}" ?>"><?php print_r($sec['ca_name']) ?></a></li>
						<li><a href="<?php echo "".G5_BBS_URL."/board.php?bo_table=introduce&amp;wr_id={$thr['wr_id']}&amp;sca={$thr['ca_name']}" ?>"><?php print_r($thr['ca_name']) ?></a></li>
					</ul>
					<?php endif ?>
				</li>
				<li><a href="<?php echo G5_BBS_URL."/board.php?bo_table=calander&wr_id=1"?>">프로그램 시간표</a></li>
				<li><a href="<?php echo G5_BBS_URL."/board.php?bo_table=gallery" ?>">프로그램 진행사진</a></li>
				<?php endif ?>
				<?php if (!isset($sidx) && !isset($_GET['sca']) && $bo_table == ""): ?>
				<li><a href="#!" class="active"><?php echo mb_substr($g5['title'], 0,5); ?></a></li>
				<?php endif ?>
		</ul>
	</div>