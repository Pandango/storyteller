

<div class="float col-md-4">
	<div class="ui card left " style="margin-bottom:5px;">
		<div class="image">
		    <img src="images\articleCover\default-cover.png">
		</div>
		<div class="content">
		    <a class="header"><?=$data['storyName'] ?></a>		   
			<div class="description">
			      <?=$data['storyDetial'] ?>
			</div>
		</div>
		<div class="extra content">
			<span class="right floated">
				<?=$data['storyDate'] ?>
			</span>
			<div class="left floated author">
			      <img class="ui avatar image" src="images\user\default.png"> <?=$data['username'] ?>
			</div>
		</div>		
	</div>
</div>