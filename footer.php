
<!-- 푸터 -->
<footer id="footer">
	<img src="<?php echo G5_IMG_URL?>/small-logo.png" alt="img">
	<p>경기도 용인시 처인구 용인대학로 134 용인대학교 사회봉사센터 TEL: 031-8020-3397  FAX : 031-8020-3400<br>COPYRIGHT(C) YONG IN UNIVERSITY SOCIAL SERVICE CENTER</p>
</footer>
<script>
	$(function(){
		<?php if (isset($sidx)): ?>
			var sidx = <?php echo $sidx; ?>;
				$(".intro-list > li > a").removeClass("active");
			<?php if (isset($_GET['page'])): ?>
				var page = <?php echo $_GET['page']; ?>;
				$(".intro-list > li:nth-child("+page+") > a").addClass("active");
			<?php endif ?>
			switch(sidx){
				case 1: $("#left-nav > ul > li:nth-child(1) > a").addClass("active"); break;
				case 5: $("#left-nav > ul > li:nth-child(3) > a").addClass("active"); break;
			}
		<?php endif ?>
		<?php if ($bo_table == "gallery"): ?>
			$("#left-nav > ul > li:nth-child(4) > a").addClass("active");
		<?php endif ?>
		<?php if ($bo_table == "introduce"): ?>
			var sca = '<?php echo $_GET['sca']; ?>';
			switch (sca){
				case "교육지원 사업": $("#left-nav > ul > li > ul > li:nth-child(1) > a").addClass("active"); break;
				case "건강증진 사업": $("#left-nav > ul > li > ul > li:nth-child(2) > a").addClass("active"); break;
				case "커뮤니티 사업": $("#left-nav > ul > li > ul > li:nth-child(3) > a").addClass("active"); break;
			}
			$("#left-nav > ul > li:nth-child(2) > a").addClass("active");
		<?php endif ?>
		<?php if ($bo_table == "calander"): ?>
			$("#left-nav > ul > li:nth-child(3) > a").addClass("active");
		<?php endif ?>
		$("#smart_editor2").removeAttr("style");
	})
</script>