    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Basic PasswordBox - jQuery EasyUI Demo</title>
        <link rel="stylesheet" type="text/css" href="/jeasyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="/jeasyui/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="/jeasyui/demo/demo.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/jeasyui/jquery.easyui.min.js"></script>
    </head>

    <body>
        <h2>Basic PasswordBox</h2>
        <p>The passwordbox allows a user to enter passwords.</p>
        <div style="margin:20px 0;"></div>
        <div class="easyui-panel" style="width:400px;padding:50px 60px">
            <div style="margin-bottom:20px">
                <input class="easyui-textbox" prompt="Username" iconWidth="28" style="width:100%;height:34px;padding:10px;">
            </div>
            <div style="margin-bottom:20px">
                <input class="easyui-passwordbox" prompt="Password" iconWidth="28" style="width:100%;height:34px;padding:10px">
            </div>
        </div>
    </body>

    </html>