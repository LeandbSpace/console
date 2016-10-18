<?php require_once( "./inc/template/header.php" ) ?>

<div class="container-fluid header_wrapper">
    <div class="col-sm-12">
        <header>
            <b>{ leanDB Console }</b>
        </header>
    </div>
</div>

<div class="container-fluid">
    <div class="col-sm-6">
        <div class="console_label">leanDB Query <span style="color:#aaa">(JSON)</span></div>
        <div class="console_input" id="editor"></div>
        <div class="console_btn">
            <a href="#" class="run_cmd def_btn">Execute Command</a>
            <div class="ipwrapper">
                <input type="text" class="ip" value="<?php echo file_get_contents('./inc/ip.db'); ?>" title="If you change default IP or its port then update this IP and port too.">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="console_label">leanDB Output</div>
        <div class="console_output" id="db_output"></div>
    </div>
</div>

<?php require_once( "./inc/template/footer.php" ) ?>