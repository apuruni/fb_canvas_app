<!DOCTYPE html>
<html>
<head>
  <title>Platform Test</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <script>
    function invite() {
      FB.ui({method: 'apprequests',
        message: 'Come and play this game with me!',
      }, function(response){
          console.log(response);
      });
    }
  </script>
  <h1>Game requests</h1>
  <input type='button' onclick='invite();'>Invite Friends</input>
 </body>
</html>
