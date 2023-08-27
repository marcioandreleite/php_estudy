<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __($about['name']); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __($about['user_description']); ?>
						<nav class="nav nav-pills justify-content-center float-right">
						<?php
							foreach($plugin_config as $key => $servers):
								if($servers['active'] == 1){
									$selectd = ($firstKey == $key) ? 'class="selected"' : '';
									?>
									<a class="nav-item nav-link <?php echo $selectd;?>" href="<?php echo $this->config->base_url . $this->request->get_controller() .'/'.$this->request->get_method().'/index/' . $key; ?>"><?php echo $this->website->get_title_from_server($key); ?></a>
									<?php
								}
							endforeach;
						?>
						</nav>
					</h2>
					<?php
					if(isset($error)){
                        echo '<div class="alert alert-primary" role="alert">' . $error . '</div>';
                    } 
					else{
						if(isset($js)):
						?>
						<script src="<?php echo $js; ?>"></script>
						<?php
						endif;
						?>
						<script>
							var monsterKill = new monsterKill();
							monsterKill.setUrl('<?php echo $this->config->base_url . $this->request->get_controller();?>/<?php echo $this->request->get_method();?>');
							$(document).ready(function () {
							  
							  
								monsterKill.populateRanking('<?php echo $firstKey; ?>');	
							   $('div[id^="rank_by_npc"] a').each(function(){
									$(this).on("click", function(e){
										e.preventDefault();
										var c_npc = $(this).attr("id").split("_")[2],
											server = $(this).attr("id").split("_").slice(3).join('_');
										monsterKill.populateRanking(server, c_npc);
									});
								});
							});
						</script>	
                       <div id="top_list" class="rankings">	
							<div id="rank_by_npc" style="text-align:center;">
								<a href="javascript:;" class="btn btn-primary" id="monster_rankings_all_<?php echo $firstKey; ?>">All</a>
								<?php 
								$monsters = explode(',', $plugin_config[$firstKey]['monsters']); 
								foreach($monsters AS $val):
								?>
								<a href="javascript:;" class="btn btn-primary" id="monster_rankings_<?php echo $val; ?>_<?php echo $firstKey; ?>"><?php echo $this->npc->name_by_id($val); ?></a>
								<?php	
								endforeach;
								?>														
							</div>
							<br />
							<div id="plugin_rankings_content_<?php echo $firstKey; ?>" style="padding: 10px;"></div>
						</div>
                    <?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>	
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>

