<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url; ?>admincp">Home</a> <span class="divider">/</span></li>
            <li><a href="<?php echo $this->config->base_url; ?>admincp/add-drop">Add Drop</a> <span
                        class="divider"></li>
        </ul>
    </div>
    <div class="row-fluid">
        <div class="box span9">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i>Add Drop</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php
                    if(isset($error)){
                        echo '<div class="alert alert-error">' . $error . '</div>';
                    }
                    if(isset($success)){
                        echo '<div class="alert alert-success">' . $success . '</div>';
                    }
                ?>
                <form class="form-horizontal" method="post" action="">
                    <input type="hidden" name="add_guide" value="1"/>
                    <fieldset>
                        <legend></legend>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Title</label>

                            <div class="controls">
                                <input type="text" class="input-xlarge" name="title" id="title" value=""/>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="cat">Category </label>

                            <div class="controls">
                                <select id="cat" name="cat">
                                    <?php
                                        foreach($cats as $key => $cat):
                                            echo '<option value="' . $key . '">' . $cat . '</option>' . "\n";
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="news_lang">Language </label>

                            <div class="controls">
                                <select id="lang" name="lang">
                                    <?php
                                        $languages = $this->website->lang_list();
                                        krsort($languages);
                                        foreach($languages as $key => $lang):
                                            echo '<option value="' . $key . '">' . $lang . '</option>' . "\n";
                                        endforeach;
                                    ?>
                                </select>

                                <p class="help-block">For which translation.</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="guide">Text</label>

                            <div class="controls">
                                <textarea class="cleditor" id="guide" name="guide" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="box span3">
            <div class="box-header well">
                <h2><i class="icon-edit"></i> Drops Manager</h2>
            </div>
            <div class="box-content">
                <?php
                    $this->load->view('admincp' . DS . 'view.panel_drops_manager');
                ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var editorName = $('.cleditor').attr('name');
            CKEDITOR.replace(editorName);
        });
    </script>
</div>