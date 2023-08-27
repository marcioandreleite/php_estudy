<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('About Server'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('Information About'); ?> <?php echo $this->config->config_entry('main|servername'); ?>
						<div class="float-right">
						<?php
							foreach($this->website->server_list() as $key => $server){
								if($server['visible'] == 1){
						?>
									<a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>about/stats/<?php echo $key; ?>"><?php echo $server['title']; ?> <?php echo __('Statistics'); ?></a>
						<?php
								}
							}
						?>
					</h2>	
				</div>	
			</div>
			</div>
									<div class="about-server" style="color: #D3D3D3" ;="">     
                        PvP MU Online - A private NON-RESET server for the international audience. Created and maintained by a group of hardcore gamers with a passion for Mu Online MMORG. Using PREMIUM FILES by IGCN, who are actively developing the Mu Online simulator up to the latest available season.                        <br><br>
                        The project is young and committed to running long-term. Quality gameplay and high-level support are guaranteed. Together we will rise and keep the old memories alive that made long-life friends and continue creating new ones.                    </div>
						<br>
						<br>
						<table class="table table-condensed table-striped table-bordered" style="color: #D3D3D3;">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align: center;">Our Staff Members</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:10%;">Stell</td>
                                <td style="width:90%;">Mu Online player from the first Season released, from Global to multiple private servers. Responsible for Transactions and directly responsible for the game.</td>
                            </tr>
                            <tr>
                                <td style="width:10%;">Logs</td>
                                <td style="width:90%;">Mu Online player from the first Season released, from Global to multiple private servers. Responsible for the overall gameplay settings.</td>
                            </tr>
                            <tr>
                                <td style="width:10%;">Stell.</td>
                                <td style="width:90%;">Server Administrator. Responsible for server stability, network, and security.</td>
                            </tr>
                        </tbody>
                    </table>
					<br>
					<br>
					<table class="table table-condensed table-striped table-bordered" style="color: #D3D3D3;">
						<thead>
							<tr>
								<th colspan="3" style="text-align: center;">General Information</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width:33.33%;">PvPMu Season 18 Part 1-3</td>
								<td style="width:33.33%; text-align: center;">Free</td>
								<td style="width:33.33%; text-align: center;">VIP</td>
							</tr>
							<tr>
								<td style="width:33.33%;">Offlevel</td>
								<td style="width:33.33%;">48H</td>
								<td style="width:33.33%;">72H</td>
							</tr>
							<tr>
								<td style="width:33.33%;">NoPvP Server</td>
								<td style="width:33.33%;">-10% EXP</td>
								<td style="width:33.33%;">-10% EXP</td>
							</tr>
							<tr>
								<td style="width:33.33%;">Chaos Machine</td>
								<td style="width:33.33%;">Check About Status</td>
								<td style="width:33.33%;">Check About Status</td>
							</tr>
							<tr>
								<td style="width:33.33%;">Normal Experience</td>
								<td style="width:33.33%;">75x</td>
								<td style="width:33.33%;">90x</td>
							</tr>
							<tr>
								<td style="width:33.33%;">Master Experience</td>
								<td style="width:33.33%;">25x</td>
								<td style="width:33.33%;">35x</td>
							</tr>
							<tr>
								<td style="width:33.33%;">Majestic Experience</td>
								<td style="width:33.33%;">25x</td>
								<td style="width:33.33%;">35x</td>
							</tr>
							<tr>
								<td style="width:33.33%;">Drop Rate</td>
								<td style="width:33.33%;">20%</td>
								<td style="width:33.33%;">40%</td>
							</tr>
							<tr>
								<td style="width:33.33%;">Elemental System</td>
								<td style="width:33.33%;">Check About Status</td>
								<td style="width:33.33%;">Check About Status</td>
							</tr>
						</tbody>
					</table>
			</div>
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>