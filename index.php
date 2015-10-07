<!DOCTYPE html>
<html>
<head>
  <title>Platform Test</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '1608578172737796',
        xfbml      : true,
        version    : 'v2.4'
      });

      function onLogin(response) {
        if (response.status == 'connected') {
          FB.api('/me?fields=first_name', function(data) {
            var welcomeBlock = document.getElementById('fb-welcome');
            welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
          });
        }
      }

      function checkLoginState() {
        FB.getLoginStatus(function(response) {
          // Check login status on load, and if the user is
          // already logged in, go directly to the welcome message.
          if (response.status == 'connected') {
            onLogin(response);
          } else {
            // Otherwise, show Login dialog first.
            FB.login(function(response) {
              onLogin(response);
            }, {scope: 'user_friends, email'});
          }
        });
      }

      checkLoginState();
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
   </script>

   <h1>Kun's Canvas App</h1>
   <h2 id="fb-welcome"></h2>
   </fb:login-button>
</body>
</html>
