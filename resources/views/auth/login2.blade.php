
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HiLook</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">

  </head>

  <body class="container">
        <h1 id="box_header"></h1>
        <h4 id="Timer"></h4>


    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>     <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>     <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>     <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>

</body>
<script>
 function get_elapsed_time_string(total_seconds) {
  function pretty_time_string(num) {
    return ( num < 10 ? "0" : "" ) + num;
  }
  var hours = Math.floor(total_seconds / 3600);
  total_seconds = total_seconds % 3600;
  var minutes = Math.floor(total_seconds / 60);
  total_seconds = total_seconds % 60;
  var seconds = Math.floor(total_seconds);
  hours = pretty_time_string(hours);
  minutes = pretty_time_string(minutes);
  seconds = pretty_time_string(seconds);
  var currentTimeString = hours + ":" + minutes + ":" + seconds;

  return currentTimeString;
}

var elapsed_seconds = 0;
setInterval(function() {
  elapsed_seconds = elapsed_seconds + 1;
  $('#box_header').text(get_elapsed_time_string(elapsed_seconds));
}, 1000);

// function reflesh(){
//     location.reload(true);
// }

// setInterval(function() {
//     reflesh()
// }, 2000);
</script>

</html>
