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
				<li class="active">附件管理</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">附件管理</a>
				</li>
			</ul>
			<form action="index.php?document-master-files" method="post">
				<table class="table">
					<thead>
		                <tr>
					        <th colspan="2">搜索</th>
					        <th></th>
					        <th></th>
					        <th></th>
					        <th></th>
		                </tr>
		            </thead>
					<tr>
						<td>
							附件ID：
						</td>
						<td>
							<input name="search[attid]" class="input-small" size="25" type="text" class="number" value="<?php echo $this->tpl_var['search']['attid']; ?>"/>
						</td>
						<td>
							上传时间：
						</td>
						<td>
							<input class="input-small datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" type="text" name="search[stime]" size="10" id="stime" value="<?php echo $this->tpl_var['search']['stime']; ?>"/> - <input class="input-small datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" size="10" type="text" name="search[etime]" id="etime" value="<?php echo $this->tpl_var['search']['etime']; ?>"/>
						</td>
						<td>
							文件类型：
						</td>
						<td>
			        		<select name="search[atttype]" class="input-medium">
				        		<option value="0">选择文件类型</option>
						  		<?php $aid = 0;
 foreach($this->tpl_var['attachtypes'] as $key => $att){ 
 $aid++; ?>
						  		<option value="<?php echo $att['atid']; ?>"<?php if($att['atid'] == $this->tpl_var['search']['atttype']){ ?> selected<?php } ?>><?php echo $att['attachtype']; ?></option>
						  		<?php } ?>
					  		</select>
			        	</td>
					</tr>
					<tr>
						<td>
							上传用户：
						</td>
			        	<td>
			        		<input class="input-small" name="search[username]" size="25" type="text" value="<?php echo $this->tpl_var['search']['username']; ?>"/>
			        	</td>
						<td colspan="2">
							<button class="btn btn-primary" type="submit">搜索</button>
							<input type="hidden" value="1" name="search[argsmodel]" />
						</td>
						<td colspan="2"></td>
					</tr>
				</table>
			</form>
			<form action="index.php?document-master-files-batdel" method="post">
				<fieldset>
					<table class="table table-hover">
			            <thead>
			                <tr>
			                    <th><input type="checkbox" class="checkall" target="delids"/></th>
			                    <th>ID</th>
						        <th>文件名</th>
						        <th>真实路径</th>
						        <th>录入时间</th>
						        <th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $aid = 0;
 foreach($this->tpl_var['attach']['data'] as $key => $attach){ 
 $aid++; ?>
					        <tr>
								<td><input type="checkbox" name="delids[<?php echo $attach['attid']; ?>]" value="1"></td>
								<td>
									<?php echo $attach['attid']; ?>
								</td>
								<td>
									<?php echo $attach['atttitle']; ?>
								</td>
								<td>
									<?php echo $attach['attpath']; ?>
								</td>
								<td>
									<?php echo date('Y-m-d',$attach['attinputtime']); ?>
								</td>
								<td>
									<div class="btn-group">
			                    		<a class="btn" href="index.php?document-master-files-modify&page=<?php echo $this->tpl_var['page']; ?>&attid=<?php echo $attach['attid']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="icon-edit"></em></a>
										<a class="btn confirm" href="index.php?document-master-files-del&page=<?php echo $this->tpl_var['page']; ?>&attid=<?php echo $attach['attid']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="icon-remove"></em></a>
			                    	</div>
								</td>
					        </tr>
					        <?php } ?>
			        	</tbody>
			        </table>
			        <div class="control-group">
			            <div class="controls">
				            <label class="radio inline">
				                <input type="radio" name="action" value="delete" checked/>删除
				            </label>
				            <?php $sid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $sid++; ?>
				            <input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
				            <?php } ?>
				            <label class="radio inline">
				            	<button class="btn btn-primary" type="submit">提交</button>
				            </label>
				            <input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
				        </div>
			        </div>
			        <div class="pagination pagination-right">
			            <ul><?php echo $this->tpl_var['attach']['pages']; ?></ul>
			        </div>
		        </fieldset>
			</form>
	        <div aria-hidden="true" id="modal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
					<h3 id="myModalLabel">
						试题详情
					</h3>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					 <button aria-hidden="true" class="btn" data-dismiss="modal">关闭</button>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>