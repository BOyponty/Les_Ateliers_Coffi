<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Biographie de {{ $artist->name }}</title>
    <style>
        /* Marges de la page */
        @page {
            margin: 60px 50px;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 13px;
            color: #333333;
            line-height: 1.8;
        }

        /* En-tête avec logo et titre */
        .header {
            text-align: center;
            border-bottom: 2px solid #1a1a1a;
            padding-bottom: 20px;
            margin-bottom: 40px;
        }

        .header img {
            max-height: 70px;
            margin-bottom: 15px;
        }

        .header h1 {
            font-size: 28px;
            margin: 0 0 5px 0;
            color: #1a1a1a;
            font-weight: normal;
        }

        .header p {
            font-size: 14px;
            color: #666666;
            margin: 0;
            font-style: italic;
        }

        /* Contenu principal */
        .content {
            text-align: justify;
            margin-bottom: 50px;
        }

        /* Pied de page */
        .footer {
            position: fixed;
            bottom: -30px;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #888888;
            border-top: 1px solid #dddddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <!-- En-tête -->
    <div class="header">
        <!-- On insère le logo s'il existe -->
        @if(file_exists(public_path('images/logo.png')))
            <img src="{{ public_path('images/logo.png') }}" alt="Logo Les Ateliers Coffi">
        @endif

        <h1>{{ $artist->name }}</h1>
        <p>{{ $artist->specialty }}</p>
    </div>

    <!-- Biographie -->
    <div class="content">
        {!! nl2br(e($artist->biography)) !!}
    </div>

    <!-- Pied de page -->
    <div class="footer">
        Les Ateliers Coffi - Galerie d'Art Contemporain<br>
        Fidjrossè, Cotonou, Bénin - contact@atelierscoffi.com
    </div>

</body>
</html>
