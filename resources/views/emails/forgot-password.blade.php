<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <meta name='viewport'
        content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />
    <meta http-equiv='X-UA-Compatible' content='ie=edge' />
    <title>Forgot Password</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
</head>
<style>
    body {
        background: #FAFAFA;
        font-family: inherit;
        font-weight: 400;
        font-size: 14px;
        color: #262626;
    }

    p {
        font-weight: 400;
        font-size: 14px;
        color: #262626;
    }

    .wrapper {
        width:600px;
        margin: 0 auto;
        padding: 50px;
    }

    .header {
        text-align: center;
    }

    .section {
        background-color: #ffffff;
        width:550px;
        margin: 0px auto;
        padding: 25px;
        padding: 26px;
    }

    span {
        color: #FF7000
    }

    .footer {
        text-align: center;
        font-weight: 400;
        font-size: 12px;
        line-height: 20px;
        margin-top: 20px;
    }
</style>
<body>
  
    <div class='wrapper'>
        <div class="header"><img src="https://nepalbarcouncil.org.np/wp-content/uploads/2018/11/2.jpg" width="200" height="100"
                alt="LOGO"> </div>
        <div class="section">
            <p>
                Hi
                <b>{{$user->name}}</b>,
                <br />
            <p>We received a request to reset your account password.</p>
            <p>Please use the OTP <span>{{ $otp }}</span> to confirm reset.</p>
            <i>If you think that you shouldn't have received this email, you can safely ignore it.</i>
            </p>
            <p>Thank You ! <br /><b>Technical Ransaini</b> </p>
        </div>
        <div class="footer">
        <p>© Technical Ransaini. All rights reserved. </p>
        <p>If you have any questions please contact us <a href="mailto:info@nepalbarcouncil.org.np">info@nepalbarcouncil.org.np</a> </p>

        </div>
    </div>
</body>

</html>