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
				<li class="active">文件类型</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">文件类型</a>
				</li>
				<li class="pull-right">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-attachtype-add">添加文件类型</a>
				</li>
			</ul>
	        <form action="index.php?<?php echo $this->tpl_var['_app']; ?>-master-attachtype-batdel" method="post">
		        <table class="table table-hover">
		            <thead>
		                <tr>
		                    <th><input type="checkbox" class="checkall"/></th>
		                    <th>类型ID</th>
					        <th>类型名称</th>
					        <th>允许上传扩展名</th>
					        <th>操作</th>
		                </tr>
		            </thead>
		            <tbody>
		                <?php $tid = 0;
 foreach($this->tpl_var['types'] as $key => $type){ 
 $tid++; ?>
				        <tr>
							<td>
								<input type="checkbox" name="delids[<?php echo $type['atid']; ?>]" value="1"/>
							</td>
							<td>
								<?php echo $type['atid']; ?>
							</td>
							<td>
								<?php echo $type['attachtype']; ?>
							</td>
							<td>
								<?php echo $type['attachexts']; ?>
							</td>
							<td>
								<div class="btn-group">
									<a class="btn" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-attachtype-modify&page=<?php echo $this->tpl_var['page']; ?>&atid=<?php echo $type['atid']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="icon-edit"></em></a>
									<a class="btn confirm" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-attachtype-del&atid=<?php echo $type['atid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="icon-remove"></em></a>
								</div>
							</td>
				        </tr>
				        <?php } ?>
		        	</tbody>
		        </table>
		        <div class="control-group">
		            <div class="controls">
		            	<button class="btn btn-primary" type="submit">删除</button>
		            </div>
				</div>
			</form>
	        <div class="pagination pagination-right">
				<ul><?php echo $this->tpl_var['basics']['pages']; ?></ul>
	        </div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>