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

    window.fbAsyncInit = function() {
      FB.init({
        appId      : '1608578172737796',
        xfbml      : true,
        version    : 'v2.4'
      });
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>

  <h1>Game requests</h1>
  <input type='button' onclick='invite();' value='Invite Friends'/>
 </body>
</html>
