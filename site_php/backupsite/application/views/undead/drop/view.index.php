<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
    <div id="content">
        <div id="box1">
            <div class="title1">
                <h1><?php echo __('Drops'); ?></h1>
            </div>
            <div id="content_center">	
				<?php
				if(!empty($error)):
					echo '<div style="padding: 0 30px 0px 50px;"><div class="e_note">' . $error . '</div></div>';
				endif;
				?>
				<div class="box-style1" style="margin-bottom:25px;">
					<div class="entry">
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" crossorigin="anonymous">
						<style>
						.dropdown-menu > button.btn{
							padding:0!important
						}
						.dropdown-menu > li > a{
							display: block;
							padding: 3px 20px;
							clear: both;
							font-weight: 400;
							line-height: 1.42857143;
							color: #333;
							white-space: nowrap;
								text-decoration: none;
						}
						.dropdown-menu > li > a:hover{
							color: #fec16a !important
						}
						.dropdown-menu{
							max-height: 400px;
							overflow-y: auto;
						}
						*, ::before, ::after {
							-webkit-box-sizing: content-box;
							-moz-box-sizing: content-box;
							box-sizing: content-box;
						}	
						a {
							color: #6a2f3c;
							text-decoration: none;
						}
						</style>
						<div class="text-center">
						<?php if($config['drop_by_map'] == 1){ ?>
						<script>
						$(document).ready( function() {
						   $('#mapdrop').on('change', function(){
								location.href = $(this).val();
						   });							   
						});
						</script>
						<select class="form-control" style="display: inline-block;width: 150px;" id="mapdrop">
							<option><?php echo __('Map Drops');?></option>
							<?php $maps = $this->website->get_map_name(0, true);?>
							<?php foreach($maps AS $id => $map){ ?>
							<option value="<?php echo $this->config->base_url;?>drop/location/<?php echo $map;?>"><?php echo __($map);?></option>
							<?php } ?>
						</select>	
						<?php } ?>
						<?php if($config['drop_by_monster'] == 1){ ?>
						<script>
						$(document).ready( function() {
						   $('#monsterdrop').on('change', function(){
								location.href = $(this).val();
						   });							   
						});
						</script>
						<select class="form-control" style="display: inline-block;width: 150px;" id="monsterdrop">
							<option><?php echo __('Monster Drops');?></option>
							<?php foreach($monsters AS $id => $info){ ?>
							<option value="<?php echo $this->config->base_url;?>drop/monster/<?php echo $id;?>-<?php echo $this->website->seo_string($info);?>"><?php echo __($info);?></option>
							<?php } ?>
						</select>		
						<?php } ?>
						<?php if($config['drop_by_event'] == 1){ ?>
						<script>
						$(document).ready( function() {
						   $('#eventdrop').on('change', function(){
								location.href = $(this).val();
						   });							   
						});
						</script>
						<select class="form-control" style="display: inline-block;width: 150px;" id="eventdrop">
							<option><?php echo __('Event Drops');?></option>
							<?php foreach($events AS $id => $info){ ?>
							<option value="<?php echo $this->config->base_url;?>drop/event/<?php echo $id;?>-<?php echo $this->website->seo_string($info);?>"><?php echo __($info);?></option>
							<?php } ?>
						</select>	
						<?php } ?>
						</div>
						<br />
						<form id="drop_list_form" method="post" action="">
							<div class="form-group">
								<label for="item"><?php echo __('Item');?></label>
								<input type="text" class="form-control" name="item" id="item" placeholder="<?php echo __('Enter item name');?>" value="<?php if(isset($_POST['item'])){ echo $_POST['item']; } ?>" required />
							</div>
							<button type="submit" class="btn btn-s btn-danger"><?php echo __('Submit')?></button>
						</form>
						<?php if(isset($count_found) && $count_found > 1){ ?>
						<br />
						<div class="panel panel-default margin-top-1 panel-red-heading">
						<div class="panel-heading"><?php echo __('Found items');?></div>
						<div class="panel-body">
						<div class="row">
							<div class="table-responsive">
							<table class="table table-striped table-red-heading">
							<tbody>
							<?php foreach($items AS $cat => $item){ ?>
							<?php foreach($item AS $k => $v){ ?>
								<tr>
									<td><a href="<?php echo $this->config->base_url;?>drop/item/<?php echo $v['name'];?>-c<?php echo $cat;?>-i<?php echo $k;?>"><?php echo $v['name'];?></a></td>
								</tr>
							<?php } ?>	
							<?php } ?>	
							</tbody>
							</table>
							</div>
						</div>	
						</div>
						</div>
						<?php } ?>
						<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
					</div>
				</div>
            </div>
        </div>
    </div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>