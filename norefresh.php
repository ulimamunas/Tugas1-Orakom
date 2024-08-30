<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#konten').load('home.php');
            var refreshid = setInterval(function(){
                $('#konten').load('home.php');
            },0);
            //$.ajaxSetup({cache:false});
        })
    </script>
</head>
<body>
    <div id="konten"></div>
</body>
</html>