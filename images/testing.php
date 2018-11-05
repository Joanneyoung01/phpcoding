<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
function HE($str)
{
        $HE = "";
        $HE = $HEE . htmlentities($str);
        echo $HE;
}

$error = "";
// Create connection
// DATABASE SERVER, DATABASE USER, DATABASE PASSWORD, DATABASE NAME
$con = mysqli_connect("localhost" ,"b200548738", "cs10jy", "studenthands");

// Check connection
if (mysqli_connect_errno($con))
{
$error = "Failed to connect to MySQL: " . mysqli_connect_error();
}

$CLIENT_NAME = $_POST["CLIENT_NAME"];

if ($CLIENT_NAME != "")
{
        $result = mysqli_query($con, "SELECT location FROM
jobs WHERE location LIKE '%".$CLIENT_SEARCH."%';");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <title>Client Database</title>

                <style type="text/css">
                <!--
                        body
                        {
                                font-family: arial;
                        }
                        h1
                        {
                                font-size: 1.5em;
                                font-weight: bold
                        }
                -->
                </style>
        </head>
        <body>
                <h1>
                        Client Search
                </h1>
                <?
                if ($error != "")
                {
                        echo("<p>". $error ."</p>");
                }
                ?>
                <form name="CLIENT_SEARCH" method="post" target="_self"
action="joanne.php">
                        <label>Client Name:</label>
                        <input type="text" name="SEARCH"
value="<?php HE($CLIENT_SEARCH); ?>" />
                        <input type="submit" value="Search" />
                </form>
                <table>
                        <tr>
                                <td width="50">
                                        <strong>ID</strong>
                                </td>
                                <td>
                                        <strong>CLIENT NAME</strong>
                                </td>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>
                        <tr>
                                <td width="50">
                                        <?php HE($row["CLIENT_SEARCH"]); ?>
                                </td>
                                <td>
                                        <?php HE($row["CLIENT_SEARCH"]);
?>
                                </td>
                        </tr>
                        <?php
                        }
                        ?>
                </table>
        </body>
</html>
<?php
mysqli_close($con);
?>