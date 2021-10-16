<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700&display=swap" rel="stylesheet" />
    <link href="https://necolas.github.io/normalize.css/latest/normalize.css" rel="stylesheet" />
    <link href="css/zeynep.min.css" rel="stylesheet" />
    <link href="css/base.css" rel="stylesheet" />
    <link href="css/left.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">

    <title>zeynepjs - A lightweight multi-level jQuery side menu plugin</title>
</head>

<body>

    <div id="nav-menu" class="zeynep">
        <ul>
            <li style="background-color: #fff; border-bottom: 1px solid #efefef; font-weight:bold; color:#444;padding: 24.7px 20px; ">
                <span> Menu </span>
            </li>
            <li>
                <a href="/"><span class="icon-home icon-menu-css"></span> <span> Inicio
                    </span> </a>
            </li>

            <li class="has-submenu">
                <a href="#" data-submenu="categories"><span class="icon-list icon-menu-css"></span> <span> Categorias </span></a>

                <div id="categories" class="submenu">
                    <div style="padding: 24.7px 20px;" class="submenu-header">
                        <a href="#" data-submenu-close="categories">Main Menu</a>
                    </div>

                    <label>Categorias</label>

                    <ul>
                        <li class="has-submenu">
                            <a href="#" data-submenu="electronics">Electronics</a>

                            <div id="electronics" class="submenu">
                                <div class="submenu-header">
                                    <a href="#" style="padding: 24.7px 20px;" data-submenu-close="electronics">Categories</a>
                                </div>

                                <label>Electronics</label>

                                <ul>
                                    <li>
                                        <a href="#">Tv & Video</a>
                                    </li>

                                    <li>
                                        <a href="#">Computers & Accessories</a>
                                    </li>

                                    <li>
                                        <a href="#">Headphones</a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#">Books</a>
                        </li>

                        <li>
                            <a href="#">Video Games</a>
                        </li>

                        <li>
                            <a href="#">Computers</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="has-submenu">
                <a href="#" data-submenu="stores"><span class="icon-tag icon-menu-css"></span> <span> Nuevos </span> </a>

                <div id="stores" class="submenu">
                    <div class="submenu-header">
                        <a href="#" data-submenu-close="stores">Main Menu</a>
                    </div>

                    <label>Nuevos</label>

                    <ul>
                        <li>
                            <a href="#">Istanbul</a>
                        </li>

                        <li>
                            <a href="#">Mardin</a>
                        </li>

                        <li>
                            <a href="#">Amed</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li style="border-bottom: 1px solid #efefef;">
                <a href=""><span class="icon-shopping-bag icon-menu-css"></span> <span> Promocion </span></a>
            </li>
            <li>
                <a href=""><span class="icon-help-circle icon-menu-css"></span> <span> Acerca de </span></a>
            </li>
            <li>
                <a href="#"><span class="icon-info icon-menu-css"></span> <span> Contactenos </span></a>
            </li>
            <br>
            <li>
                <a href="">
                    <div style="width:100%; border:none;" class="cardd-bottom">Inicia sesión </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="zeynep-overlay"></div>

    <button type="button" class="btn-open first">Open!</button>

    <script src="js/query-s.js"></script>
    <script src="js/zeynep.js"></script>

    <script>
        $(function() {
            // init zeynepjs side menu
            var zeynep = $('.zeynep').zeynep({
                opened: function() {
                    // log
                    console.log('the side menu opened')
                },
                closed: function() {
                    // log
                    console.log('the side menu closed')
                }
            })

            // dynamically bind 'closing' event
            zeynep.on('closing', function() {
                // log
                console.log('this event is dynamically binded')
            })

            // handle zeynepjs overlay click
            $('.zeynep-overlay').on('click', function() {
                zeynep.close()
            })

            // open zeynepjs side menu
            $('.btn-open').on('click', function() {
                zeynep.open()
            })
        })
    </script>

</body>

</html>