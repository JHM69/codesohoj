<?php
include_once 'functions.php';
function loginbox()
{
    if (!isset($_SESSION['loggedin'])) {
?>
        <div class="panel-heading text-center">
            <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body text-center">

            <form action="<?php echo SITE_URL; ?>/process.php" method="post" role="form">
                <div class="input-group" style="margin-bottom: -1px;">
                    <span class="input-group-addon" style="border-bottom-left-radius: 0;"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" style="border-bottom-right-radius: 0;" type="text" name="teamname" placeholder="Teamname" required />
                </div>
                <div class="input-group">
                    <span style="border-top-left-radius: 0;" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input style="border-top-right-radius: 0;" class="form-control" type="password" name="password" placeholder="Password" required />
                </div><br />
                <input type="submit" name="login" value="Log In" class="btn btn-primary btn-block" />
            </form>
            <a href='<?php echo SITE_URL; ?>/register'>New Team? Register Here.</a>
        </div>
    <?php
    } else {
    ?>
        <div class="panel-heading text-center">
            <h3 class="panel-title">Team</h3>
        </div>
        <div class="panel-body text-center">

            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Overall Rank</th>
                    </tr>
                </thead>
                <?php
                $query = "SELECT count(*)+1 as rank, (select score from Users where tid = " . $_SESSION['team']['id'] . ") as sco FROM `Users` WHERE (score > (select score from Users where tid = " . $_SESSION['team']['id'] . ") and status = 'Normal') or (score = (select score from Users where tid = " . $_SESSION['team']['id'] . ") and penalty < (select penalty from Users where tid = " . $_SESSION['team']['id'] . ") and status='Normal') ";
                $res = DB::findOneFromQuery($query);
                echo "<tr><td><a href='" . SITE_URL . "/Users/" . $_SESSION['team']['name'] . "'>" . $_SESSION['team']['name'] . "</a></td><td>$res[sco]</td><td style='text-align: center'>$res[rank]</td></tr>";
                ?>
            </table>
        </div>
    <?php
    }
}

function pagination($noofpages, $url, $page, $maxcontent)
{
    if ($noofpages > 1) {
        if ($page - ($maxcontent / 2) > 0)
            $start = $page - 5;
        else
            $start = 1;
        if ($noofpages >= $start + $maxcontent)
            $end = $start + $maxcontent;
        else
            $end = $noofpages;
    ?>
        <div align='center'>
            <ul class="pagination">
                <?php if ($page > 1) { ?>
                    <li><a href="<?php echo $url . "&page=1"; ?>">First</a></li>
                    <li><a href="<?php echo $url . "&page=" . ($page - 1); ?>">Prev</a></li>
                <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                ?>
                    <li <?php echo ($i == $page) ? ("class='disabled'") : (''); ?>><a href="<?php echo ($i != $page) ? ($url . "&page=" . $i) : ("#"); ?>"><?php echo $i; ?></a></li>
                <?php
                }
                if ($page < $noofpages) {
                ?>
                    <li><a href="<?php echo $url . "&page=" . ($page + 1); ?>">Next</a></li>
                    <li><a href="<?php echo $url . "&page=" . $noofpages; ?>">Last</a></li>
                <?php } ?>
            </ul>
        </div>
<?php
    }
}


function errorMessageHTML($msg)
{
    return '<br /><div class="alert alert-danger" role="alert">' . $msg . '</div>';
}

function doCompetitionCheck()
{
    //Automates starting of planned contests
    //No need for a cron job since nobody's gunna push code if they're not on the site anyways
    $query = "select value from admin where variable = 'mode'";
    $result = DB::findOneFromQuery($query);
    if ($result['value'] == 'Passive') {
        $curTime = time();
        $query = "select endtime from contest where endtime >= $curTime and starttime<=$curTime";
        $result = DB::findOneFromQuery($query);
        if (isset($result['endtime'])) {
            $admin = array();
            $admin['mode'] = 'Active';
            $admin['endtime'] = $result['endtime'];
            foreach ($admin as $key => $val) {
                $query = "update admin set value = '$val' where variable = '$key'";
                DB::query($query);
            }
        }
    }
}

?>