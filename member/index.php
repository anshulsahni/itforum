<html>
<head>
	<title>IT Association Forum</title>
	<script type="text/javascript" src='../js/size.js'></script>
	<script type="text/javascript" src='../js/jquery.js'></script>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$('#left_intro').css("left","0px");
			$('#right_section').css("left",window.innerWidth-175+"px");
			$('#forum_container').css("width",window.innerWidth-175-175+'px');
		});
	</script>
</head>
<body>
	<div id='wrapper'>
		<?php require_once('../include/header.inc'); ?>
		<div id='container'>
			<div id='left_intro' class='left member_element'>
				<div id='intro_content_container'>
					<ul>
						<li><div id='dp' class='img_container intro_element'><img src=""></div>		</li>
						<li><div id='name' class='intro_element'>Anshul Sahni</div>					</li>
						<li><div id='reg' class='intro_element'>1081210269</div>					</li>
						<li><div id='yr' class='intro_element'>2<sup>nd</sup> Year</div>			</li>
						<li><div id='section' class='introl_element'>In 'D' Section</div>			</li>
					</ul>
				</div>
			</div>
			<div id='forum_container' class='member_element'>
				<div id='forum_menu'>
					<ul>
						<li>
							<div id='academic_menu' class='forum_menu_elements'>
								<div class='img_container forum_menu_img_container'><img src="../imgs/member/academic.png"></div>
								<div class='itm_desc'>
									<h3>Academics..</h3>
									has to be shared on every front inspite competition at every instance in your academics
								</div>
							</div>
						</li>
						<li>
							<div id='techn_menu' class='forum_menu_elements'>
								<div class='img_container forum_menu_img_container'><img src="../imgs/member/tech.png"></div>
								<div class='itm_desc'>
									<h3>Technical...</h3>
									be involved in and therefore we bring you platform for you wehere you can discuss wevery bit of kno
								</div>
							</div>
						</li>
						<li>
							<div id='non_tech_menu' class='forum_menu_elements'>
								<div class='img_container forum_menu_img_container'><img src="../imgs/member/non_tech.png"></div>
								<div class='itm_desc'>
									<h3>Non-Techical</h3>
									academics and nothing else in our life it involves somehting else in us the X-factor that we shou
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div id='right_section' class='right member_element'>
				<div id='latest_entries' class='latest_member_elements'>
					<ul>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
					</ul>
				</div>
			</div>
		</div>
		<?php require_once('../include/footer.inc'); ?>
	</div>
</body>
</html>