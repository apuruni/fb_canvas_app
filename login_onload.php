<!DOCTYPE html>
<html>
<head>
  <title>Platform Test</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <script>
    function onLogin(response) {
      if (response.status == 'connected') {
        FB.api('/me?fields=first_name', function(data) {
          var welcomeBlock = document.getElementById('fb-welcome');
          welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';

          document.getElementById('fb-logged-in-only').style.display="block";
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

    window.fbAsyncInit = function() {
      FB.init({
        appId      : '1678528429025550',
        xfbml      : true,
        version    : 'v2.4'
      });

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
   <div id="fb-logged-in-only" style="display: none">
    <ui>
      <li><a href="token_gen_long_lived_token.php">Get Long-lived-token</a></li>
    </ui>
  </div>
 </body>
</html>
