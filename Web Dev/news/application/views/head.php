<nav class="navbar navbar-fixed-top" role="navigation" style="border-bottom-color: #ccc; background-color: #fff">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">				
			<a class="navbar-brand" href="#"> 
				
                                
			</a>
                    
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				
				<li><?php echo anchor('news/administration','ข่าวสาร'); ?></li>
				

			</ul>
		<div class="navbar-text navbar-right">
                    [Welcome: คุณ <?php 
                    $x = $this->session->all_userdata();
                    echo $x['account']['username'] ?>] 
			<?php echo anchor('member/logout','logout <i class="glyphicon glyphicon-log-out"></i>'); ?>
		</div>
		</div>
	<!-- /.navbar-header -->								
	</div>
	<!-- /.container-fluid -->
</nav>