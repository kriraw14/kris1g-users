<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Please Confirm Your Email Address</h2>
<div>
    Thanks for creating an account at Gladeye test.

    Please click the link below to confirm your email address

    {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>

</div>
</body>
</html>