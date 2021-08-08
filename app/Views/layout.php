<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=yes, minimal-ui, viewport-fit=cover">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#00399e">
        <title>eZoom Frontend Challenge</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500&family=Roboto:wght@700&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" href="/site.css">
        <link rel="stylesheet" href="/forms.css">
        <?php $this->renderSection('styles') ?>

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <meta name="mobile-web-app-capable" content="yes">

        

    </head>
    <body>
    
        <header>

            <div class='container'>

            <h1>SiteDemo</h1>

            <nav id="main-nav">

                <a href="#">Sobre</a>
                <a href="#">Preços</a>
                <a href="#">Desenvolvedores</a>

                <span spacer></span>

                <a href="#">
                    <label class='only-mobile'>Buscar&nbsp;</label>
                    <img src="/img/btn-search.png" />
                </a>

                <a href="#">Ajuda</a>
                <a href="#">Contato</a>
                <a class='btn-cta btn-secondary' href="#">Começar</a>

            </nav>

            <img id="hamburguer" class='only-mobile' src="/img/hamburguer.png" />

            </div>

        </header>

        <div id="content" class='<?= $contentClass ?>'>
        <?php $this->renderSection('content') ?>
        </div>

        <footer>

            <div class='container'>

                <h1>SiteDemo</h1>

                <nav>

                    <a href="#">Sobre</a>
                    <a href="#">Preços</a>
                    <a href="#">Desenvolvedores</a>
                    <a href="#">Ajuda</a>
                    <a href="#">Contato</a>
                    
                    <a class='phone'>+80 1234-56789</a>
                    <a class='email'>ola@sitedemo.com.br</a>

                </nav>

            </div>

        </footer>

        <?php $this->renderSection('scripts') ?>
        

    </body>

</html>
