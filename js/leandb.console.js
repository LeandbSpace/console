$(function(){

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/iplastic");
    editor.session.setMode("ace/mode/json");
    editor.setOption("showPrintMargin", false);
    editor.setFontSize(14);
    editor.container.style.lineHeight = 1.5;
    editor.renderer.updateFontSize();

    var db_output = ace.edit("db_output");
    db_output.setTheme("ace/theme/iplastic");
    db_output.session.setMode("ace/mode/json");
    db_output.setOption("showPrintMargin", false);
    db_output.setOption("readOnly", true);
    db_output.setFontSize(14);
    db_output.container.style.lineHeight = 1.5;
    db_output.renderer.updateFontSize();

    var exec_cmd = $('a.run_cmd');
    exec_cmd.on('click', function(e){
        e.preventDefault();
        try {
            var queryData = JSON.parse(editor.getValue());
        } catch (error) {
            var queryData = false;
        }

        if( queryData != false ){
            $.post(
                'leandb_adapter.php',
                {
                    cmd: queryData,
                    ip: $('div.ipwrapper input.ip').val()
                },
                function(data) {
                    db_output.setValue( JSON.stringify(JSON.parse(data), null, 4) );
                }
            );
        } else {
            alert("leanDB query is not a valid json");
        }
        

    });

});