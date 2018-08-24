<html>
<head>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<div>
    <form class="file_form" id="file_form" enctype="multipart/form-data" action="https://my.tdfort.ru/index.php?page=requests_edit_b&type=addFiles" method="POST">
        <input type="submit" value="Отправить файлы" /><br>
        <input type="file" multiple="multiple" name="0" /><br>
    </form>
</div>

<script>

    let $file_load = function () {

        $(document).on('change', 'input[type=file]', function() {

            console.log(this.value);

            let input = document.createElement('input');
            input.type = 'file';
            input.name = $('#file_form').find('input[type=file]').length;
            let br = document.createElement('br')
            document.getElementById('file_form').appendChild(input);
            document.getElementById('file_form').appendChild(br);
        });

    };

    $(document).ready(function () {
        $file_load();
    });

</script>

</body>
</html>

<?php
