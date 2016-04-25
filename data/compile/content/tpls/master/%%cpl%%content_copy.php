<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<?php $this->_compileInclude('menu'); ?>
		</div>
		<div class="span10" id="datacontent">
<?php } ?>
			<ul class="breadcrumb">
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a> <span class="divider">/</span></li>
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-contents&page=<?php echo $this->tpl_var['page']; ?>">内容管理</a> <span class="divider">/</span></li>
				<li class="active">复制内容</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">复制内容</a>
				</li>
				<li class="pull-right">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-contents&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">内容管理</a>
				</li>
			</ul>
			<form action="index.php?content-master-contents-lite" method="post" class="form-horizontal">
				<div class="control-group">
		            <label class="control-label">内容ID</label>
		            <div class="controls">
	        			<input type="text" name="contentids" value="<?php echo $this->tpl_var['contentids']; ?>" needle="needle" msg="您必须输入标题" readonly>
		        	</div>
		        </div>
		        <div class="control-group">
        			<label class="control-label">目标分类</label>
        			<div class="controls">
	        			<select msg="您必须选择一个目标分类" needle="needle" class="autocombox input-medium" name="targetcatid" refUrl="index.php?content-master-category-ajax-getchildcategory&catid={value}">
			            	<option value="">选择一级分类</option>
			            	<?php $cid = 0;
 foreach($this->tpl_var['parentcat'] as $key => $cat){ 
 $cid++; ?>
			            	<option value="<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></option>
			            	<?php } ?>
			            </select>
					</div>
		        </div>
		        <div class="control-group">
		            <div class="controls">
			            <button class="btn btn-primary" type="submit">提交</button>
			            <a class="btn btn-primary" href="index.php?content-master-contents&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">取消</a>
			            <?php $sid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $sid++; ?>
			            <input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
			            <?php } ?>
			            <input type="hidden" name="copycategory" value="1">
			            <input type="hidden" name="catid" value="<?php echo $this->tpl_var['catid']; ?>">
					</div>
		        </div>
			</form>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>