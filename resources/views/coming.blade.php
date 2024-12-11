<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- website logo -->
    <link rel="Website Icon" type="png"
          href="{{ asset('storage/uploads/settings/'.app('settings')->getValue('general','site_logo'))}}">

    <title>{{app('settings')->getValue('general','site_name')}}</title>
    <style>
        body {
            background: #00091B;
            color: #fff;
        }


        @keyframes fadeIn {
            from {
                top: 20%;
                opacity: 0;
            }
            to {
                top: 100px;
                opacity: 1;
            }

        }

        @-webkit-keyframes fadeIn {
            from {
                top: 20%;
                opacity: 0;
            }
            to {
                top: 100px;
                opacity: 1;
            }

        }

        .wrapper {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            animation: fadeIn 1000ms ease;
            -webkit-animation: fadeIn 1000ms ease;

        }

        h1 {
            font-size: 50px;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 0;
            line-height: 1;
            font-weight: 700;
            text-align: center;
        }

        .dot {
            color: #4FEBFE;
            border-radius: 50%;
        }

        p {
            text-align: center;
            margin: 18px;
            font-family: 'Muli', sans-serif;
            font-weight: normal;

        }

        @media only screen and (min-width: 800px) {
            h1 {
                font-size: 5em;
            }

            p {
                font-size: 1.3em;
            }
        }

        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 50px;
            }

            p {
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
<div class="wrapper">
    <h1>{{app('settings')->getValue('general','site_name')}} Coming Soon<span class="dot">.</span></h1>
    <p>The website is under construction and will be available soon.</p>
</div>

</body>

</html>
