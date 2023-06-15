<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin') {
    if (isset($_GET['code'])) {
        $query = "select * from Users where username='$_GET[code]'";
        $res = DB::findOneFromQuery($query);
?>
        <script type='text/javascript'>
            $(document).ready(function() {
                $('#username').focus(function() {
                    $('#username').tooltip('show');
                });
                $('#username').blur(function() {
                    $('#username').tooltip('hide');
                });
            });
        </script>
        <div class="text-center page-header">
            <h1>Users Settings - <?php echo $_GET['code']; ?></h1>
        </div>
        <form method='post' class='form-horizontal' action='<?php echo SITE_URL; ?>/process.php'>
            <input type="hidden" value="<?php echo $res['uid']; ?>" name="uid" />
            <div class='form-group'>
                <label for='username' class="control-label col-lg-2">User Name</label>
                <div class='col-md-4'><input class="form-control" type='text' name='username' id='username' data-placement='right' title='Only alphabets numbers _ and @ are allowed' value="<?php echo $res['username']; ?>" /></div>
            </div>
            <div class='form-group'>
                <label class="control-label col-lg-2" for='password'>Password</label>
                <div class='col-md-4'><input class="form-control" type='text' name='password' id='password' value='<?php echo $res['pass']; ?>' /></div>
            </div>
            <div class='form-group'>
                <label class="control-label col-lg-2" for='status'>Status</label>
                <div class='col-md-4'>
                    <select class="form-control" name='status' id='status'>
                        <option value="Normal" <?php if ($res['status'] == "Normal") echo "selected='selected'"; ?>>Normal</option>
                        <option value="Waiting" <?php if ($res['status'] == "Waiting") echo "selected='selected'"; ?>>Waiting</option>
                        <option value="Suspended" <?php if ($res['status'] == "Suspended") echo "selected='selected'"; ?>>Suspended</option>
                        <option value="Deleted" <?php if ($res['status'] == "Deleted") echo "selected='selected'"; ?>>Deleted</option>
                        <option value="Admin" <?php if ($res['status'] == "Admin") echo "selected='selected'"; ?>>Admin</option>
                    </select>
                </div>
            </div>
            <div class='form-group'>
                <label class="control-label col-lg-2" for='group'>Group</label>
                <div class='col-md-4'>
                    <select class="form-control" name="group" id="group">
                        <?php
                        $query = 'select * from groups';
                        $result = DB::findAllFromQuery($query);
                        foreach ($result as $row) {
                            echo "<option value='$row[gid]'" . (($res['gid'] == $row['gid']) ? ("selected='selected'") : ("")) . ")>$row[groupname]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>





            <div class='form-group'>
                <label class='control-label col-lg-2'></label>
                <div class='col-md-8'><input type='submit' name='updateteam' value='Update User' class='btn btn-primary btn-large' /></div>
            </div>
        </form>
<?php
    } else {
        $query = "select uid, username, gid, status from Users";
        $res = DB::findAllFromQuery($query);
        echo "<div class='text-center page-header'><h1>List of Teams</h1></div><table class='table table-hover'><thead><tr><th>ID</th><th>Name</th><th>Group ID</th><th>Status</th><th>Options</th></tr></thead>";
        foreach ($res as $row) {
            echo "<tr><td>$row[uid]</td><td>$row[username]</td><td>$row[gid]</td><td>$row[status]</td><td><a class='btn btn-primary' href='" . SITE_URL . "/adminteam/$row[username]'><i class='glyphicon glyphicon-edit'></i> Edit</a></td></tr>";
        }
        echo "</table>";
    }
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