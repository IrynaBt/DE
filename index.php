<?php
    include('dataBase.php');
?>

<html>
<head>
    <title>DE task</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    <?php
    $db = new dataBase();
    $users = $db->getSimpleStatisticsUsers();

    ?>
    <table border="1" width="50%">
        <thead>
        <tr class="toplevel">
            <td><b>User name</b></td>
            <td><b>Date</b></td>
            <td>
                <b>Amount of lessons</b>
                <select id="idAmountLesson" onchange="showAmountLesson();"></select>
            </td>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($users as $user) { ?>
            <tr data-id="<?=$user[2]?>">
                <td><?=$user[0]?></td>
                <td><?=$user[1]?></td>
                <td><?=$user[2]?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<script>
    $( document ).ready(function() {
        showAmountLesson();
    });

    function showAmountLesson()
    {
        var selected = $( "#idAmountLesson option:selected" ).val();

        selectValues = {"0": "all", "2": "2", "3": "3" }; //get from db

        $('#idAmountLesson option').remove();
        $.each(selectValues, function(key, value) {
            $('#idAmountLesson')
                .append($('<option>', { value : key })
                    .text(value));
        });

        if (selected != undefined) {
            $('tr:not([class="toplevel"])').hide();
            $('tr:not([class="toplevel"])[data-id="' + selected + '"]').show();
        }
        $("#idAmountLesson option[value='" + selected +"']").prop('selected', true);
        
        if (selected == 0) {
            $('tr:not([class="toplevel"])').show();
        }
    }
</script>
</body>
</html>




