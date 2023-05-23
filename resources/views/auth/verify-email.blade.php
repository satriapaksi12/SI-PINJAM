<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email</title>

    <style>
        .main {
            display: flex;
            justify-content: center;
        }
        .h6 {
            display: flex;
            justify-content: center;
            padding-top: 10px;
        }

        figure {
            width: 90%;
            /* 50% dari lebar kontainer */
            height: 400px;
            /* Tinggi tetap 200px */
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;

        }
    </style>
</head>

<body>


    <figure> @include('component.ikon_verif_email')</figure>


    <div class="main">

        <h2>Email verifikasi sudah dikirim ke email anda , untuk selanjutnya silakan melakukan verifikasi email untuk
            aktivasi akun</h2>
    </div>




</body>

</html>
