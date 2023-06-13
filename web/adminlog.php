<?php
if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin') {
?>
    <div class="text-center page-header">
        <h1>Request Logs</h1>
    </div>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#submit').click(function() {
                $(location).attr('href', '<?php echo SITE_URL; ?>/adminlog/' + $('#username').val());
            });
        });
    </script>
    <div class="text-center">
        <h3>Users</h3>
    </div>
    <div class='form-inline'>
        <div class='form-group'>
            Username Name :
        </div>
        <div class='form-group'>
            <input class='form-control' id='username' type='text' />
        </div>
        <div class='form-group'>
            <input id='submit' value='Search' type='button' class='btn btn-default' />
        </div>
    </div>
    <br />
<?php
    if (isset($_GET['page']))
        $page = $_GET['page'];
    else
        $page = 1;
    $body = "from logs";
    if (isset($_GET['code'])) {
        $body .= " where uid like '%[Users]%=>%" . $_GET['code'] . "%'";
    }
    $body .= " order by time desc";
    $result = DB::findAllWithCount("select *", $body, $page, 10);
    $data = $result['data'];
    echo "<table class='table table-condensed table-hover'><thead><tr><th>Time</th><th>IP</th><th>Session</th><th>Request</th></tr></thead>";
    foreach ($data as $row) {
        echo "<tr><td>" . date("d/m/Y h:i:sa", $row['time']) . "</td><td>$row[ip]</td><td><pre>$row[uid]</pre></td><td><pre>$row[request]</pre></td></tr>";
    }
    echo "</table>";
    pagination($result['noofpages'], SITE_URL . "/adminlog" . ((isset($_GET['code'])) ? ("/$_GET[code]") : ("")), $page, 10);
} else {
    $_SESSION['msg'] = "Access Denied: You need to be administrator to access that page.";
    redirectTo(SITE_URL . "/");
}
?>

<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo.svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
</head>