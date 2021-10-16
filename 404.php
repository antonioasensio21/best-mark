<?php
include 'frontend/pagina_head.php';
?>

<body>
    <style>
        body {
            font-family: 'inter', sans-serif;
        }

        main {
            margin-top: 20px;
        }
        p{
            text-align: center;
            color: #666;
        }
        article{
            padding: 35px 0;
        }
        h1{
            font-weight: 600;
            color: #444;
        }
    </style>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="text-center">
                        <img class="ui centered medium rounded image" src="https://mageblueskytech.com/dukamarket/media/wysiwyg/404-page_dukamarket.png" alt="">
                        <div class="col-12">
                            <article>
                                <h1> Page Not Found </h1>
                                <p>Lo siento por los inconvenientes ocasionados. <br> Vaya a nuestra página de inicio.</p>
                                <a class="button rounded button-danger" href="/"> Return to Home </a>
                            </article>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </main>

<?php
include 'frontend/pagina_footer.php';
?>