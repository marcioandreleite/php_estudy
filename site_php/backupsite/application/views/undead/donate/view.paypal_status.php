<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Donate'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('With PayPal'); ?></h2>
					<div class="mb-5">
					<?php
                        if(isset($error)){
                            if(is_array($error)){
                                foreach($error as $er){
                                    echo '<div class="alert alert-danger" role="alert">' . $er . '</div>';
								}
                            } else{
                                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                            }
                        }
                        if(isset($success)){
                            echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                        }
                    ?>
					</div>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>