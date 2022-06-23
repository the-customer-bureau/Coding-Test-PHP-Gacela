<?php
/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

require __DIR__ . '/vendor/autoload.php';

use Engineered\Application\Tasks;

$tasks = new Tasks();

if (isset($_POST))
{
    if (isset($_POST['txtTitle']))
    {
        $title = $_POST['txtTitle'];

        $task_response = $tasks->postTask($title);
    }
}

$tasks_response = $tasks->getTasks();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tasks</title>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
<link rel="stylesheet" type="text/css" href="public/css/styles.css" />
<script type="text/javascript">
    function fnValidateTask()
    {
        if (document.getElementById('idtxtTitle').value.trim() == "")
        {
            alert('Enter task title');
            return false;
        }
    }
</script>
</head>
<body>
    <div class="container">
        <?php
        if (isset($task_response))
        {
            ?>
            <div class="message <?php echo ($task_response['success'] == 1) ? "success" : "error"; ?>">
                <span><strong><?php echo ($task_response['success'] == 1) ? "Success" : "Error"; ?></strong><span>
                <span><?php echo $task_response['messages'][0]; ?></span>
            </div>
            <?php
        }
        ?>
        <h2>Tasks</h2>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Completed</th>
            <tr>
            <?php
            foreach($tasks_response['data']['tasks'] as $task)
            {
                ?>
                <tr>
                    <td><?php echo $task['id']; ?></td>
                    <td><?php echo $task['title']; ?></td>
                    <td><?php echo ($task['completed'] == 'N') ? "No" : "Yes"; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <div class="container">
        <h2>Add new task</h2>
        <form name="frmTask" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return fnValidateTask();" class="form">
            <div class="form-set">
                <div class="form-label">
                    <label>Enter task title</label>
                </div>
                <div class="form-field">
                    <input type="text" name="txtTitle" id="idtxtTitle" placeholder="Enter title" class="input" />
                </div>
                <div class="form-button">
                <input type="submit" value="Submit" class="button" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>