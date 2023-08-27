<?php
    $this->load->view('admincp' . DS . 'view.header');
    $this->load->view('admincp' . DS . 'view.sidebar');
?>
<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url; ?>admincp">Home</a> <span class="divider">/</span></li>
            <li><a href="<?php echo $this->config->base_url; ?>admincp/manage-plugins">Manage Plugins</a></li>
        </ul>
    </div>
    <?php $server_list = ($is_multi_server == 0) ? ['all' => ['title' => 'All']] : $this->website->server_list(); ?>
    <div class="row-fluid">
        <div class="span12">
            <ul class="nav nav-pills">
                <?php
                    $i = 0;
                    foreach($server_list AS $key => $val):
                        $i++;
                        ?>
                        <li role="presentation" <?php if($i == 1){ ?> class="active"<?php } ?>><a
                                href="#<?php echo $key; ?>" aria-controls="<?php echo $key; ?>" role="tab"
                                data-toggle="tab"><?php echo $val['title']; ?> Server Settings</a></li>
                    <?php endforeach; ?>
                <li><a href="#run" aria-controls="run" role="tab" data-toggle="tab">Convert Items</a></li>	
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php if(isset($js)): ?>
        <script src="<?php echo $js; ?>"></script>
        <script type="text/javascript">
            var convertItems = new convertItems();
			convertItems.setUrl('<?php echo $this->config->base_url . $this->request->get_controller();?>');
            $(document).ready(function () {
                $('form[id^="convert_items_settings_form_"]').on("submit", function (e) {
                    e.preventDefault();
                    convertItems.saveSettings($(this));
                });
				$('#run_conversion').on("submit", function (e) {
                    e.preventDefault();
                    convertItems.runConversion($(this));
                });
            });
        </script>
    <?php endif; ?>
    <div class="row-fluid">
        <div class="box span12">
            <div class="tab-content">
                <?php
                    $i = 0;
                    foreach($server_list AS $key => $data):
                        $val = ($is_multi_server == 0) ? $plugin_config : (isset($plugin_config[$key]) ? $plugin_config[$key] : false);
                        $i++;
                        ?>
                        <div role="tabpanel" class="tab-pane fade in <?php if($i == 1){ ?>active<?php } ?>"
                             id="<?php echo $key; ?>">
                            <div class="box-header well">
                                <h2><i class="icon-edit"></i> <?php echo $data['title']; ?> Server Settings</h2>
                            </div>
                            <div class="box-content">
                                <form class="form-horizontal" method="POST" action=""
                                      id="convert_items_settings_form_<?php echo $key; ?>">
                                    <input type="hidden" id="server" name="server" value="<?php echo $key; ?>"/>

                                    <div class="control-group">
                                        <label class="control-label" for="inventory_size">Inventory Size </label>

                                        <div class="controls">
                                            <input type="text" class="span3 typeahead" id="inventory_size"
                                                   name="inventory_size"
                                                   value="<?php echo $val['inventory_size']; ?>" required/>

                                            <p class="help-block">
                                                Before conversion
                                            </p>
                                        </div>
                                    </div>
									<div class="control-group">
                                        <label class="control-label" for="warehouse_size">Warehouse Size </label>

                                        <div class="controls">
                                            <input type="text" class="span3 typeahead" id="warehouse_size"
                                                   name="warehouse_size"
                                                   value="<?php echo $val['warehouse_size']; ?>" required/>

                                            <p class="help-block">
                                                Before conversion
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary"
                                                name="edit_convert_items_settings"
                                                id="edit_convert_items_settings">Save changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
					<div role="tabpanel" class="tab-pane fade in" id="run">
						<div class="box-header well">
							<h2>Run Conversion</h2>
						</div>
						<div class="box-content">
							<form class="form-horizontal" method="POST" action="" id="run_conversion">
                                    <div class="control-group">
                                        <label class="control-label" for="server">Server </label>

                                        <div class="controls">
                                            <select id="server" name="server" required>
                                                <?php foreach($server_list AS $key => $data):?>
												<option value="<?php echo $key;?>"><?php echo $data['title'];?></option>
												<?php endforeach;?>
                                            </select>

                                            <p class="help-block">Select server where conversion should be run.</p>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary" name="run_item_conversion"
                                                id="run_item_conversion">Run
                                        </button>
                                    </div>
                                </form>
						</div>
					</div>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view('admincp' . DS . 'view.footer');
?>
