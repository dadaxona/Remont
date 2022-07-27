<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="jquery-3.6.0/dist/jquery.min.js"></script>
</head>
<body>   
    <h1>Telegram</h1>
    <script>
        function srok()
        {
            $.ajax({
                url: "https://api.telegram.org/bot5473083753:AAGZa2nwaz0Ndj53tJskF--Owqxe-ApZdnA/sendMessage",
                type: "GET",
                data: {
                    chat_id: 849506057,
                    text: "Dadaxon"
                },
                success: function(data) {
                    console.log(data);
                }
            });
        }
        srok();
        setInterval(function() {
            srok();
        }, 3000);
    </script>
</body>
</html>