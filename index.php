<?php
include("model/db_info.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Музыкальный портал</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script>
        function showModal() {
            $('#myModal').modal({keyboard: true});
        }
    </script>
    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">Музыкальный портал</a>

            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <a href="#" class="navbar-link">Войти</a>
                    <a href="#" class="navbar-link" onclick="showModal();">Создать аккаунт</a>
                </p>
                <ul class="nav">
                    <li class="active"><a href="index.php">Главная страница</a></li>
                    <li><a href="#about">О Нас</a></li>
                    <li><a href="#contact">Контакты</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">Жанры</li>
                    <?php
                    include("model/getGenres.php")
                    ?>
                    <li class="nav-header">Типы</li>
                    <?php
                    include("model/getTypes.php");
                    ?>
                    <li class="nav-header">По рейтингу</li>
                    <li><a href="#">Новинки</a></li>
                    <li><a href="#">Популярный песни</a></li>
                    <li><a href="#">Рейтинг новинок по оценкам</a></li>
                </ul>
            </div>
            <!--/.well -->
        </div>
        <!--/span-->
        <div class="span9"> <!--main content-->

        </div>
        <!--/span-->
    </div>
    <!--/row-->

    <hr>

    <footer>
        <p>&copy; Company 2013</p>
    </footer>

</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Форма регистрация</h4>
            </div>
            <div class="modal-body" style="margin-left: 125px">
                <form class="form-horizontal" method="POST" action="model/addUser.php" id="regForm" name="regForm">
                    <!--Имя-->
                    <div class="form-group">
                        <label class="col-sm-5" for="inputName">Имя</label>

                        <div class="col-sm-10">
                            <input required="" class="form-control" type="text" id="inputName" placeholder="Введите имя"
                                   name="txtName">
                        </div>
                    </div>
                    <!--Фамилия-->
                    <div class="form-group">
                        <label class="col-sm-5" for="inputLastName">Фамилия</label>

                        <div class="col-sm-10">
                            <input required="text" class="form-control" type="text" id="inputLastName"
                                   placeholder="Введите фамилия" name="txtLastName">
                        </div>
                    </div>
                    <!--Email-->
                    <div class="form-group" id="divEmail">
                        <label class="col-sm-5" for="inputEmail">Email</label>

                        <div class="col-sm-10">
                            <input id="email" required="" class="form-control" type="email" placeholder="Email"
                                   name="txtEmail">

                            <div style="margin-bottom: -15px;color: #ffffff" id="isEmail">Этот email уже существуеть
                            </div>
                        </div>
                    </div>
                    <!--Парол-->
                    <div class="form-group">
                        <label class="col-sm-5" for="inputPassword">Парол</label>

                        <div class="col-sm-10">
                            <input type="password" required="" class="form-control" id="inputPassword"
                                   placeholder="Парол" name="password">
                        </div>
                    </div>
                    <!--Соли таваллуд-->
                    <div class="form-group">
                        <label class="col-sm-5" style="">Дата рождения</label>

                        <div class="col-sm-10">
                            <select style="width: 85px;" name="day" class="form-control">
                                <option>День</option>
                                <?php
                                for($i=1;$i<=31;$i++)
                                    echo "<option style='font-size: 12px'>$i</option>";
                                ?>
                            </select>
                            <select style="width: 125px" name="month" class="form-inline form-control">
                                <option>Месяц</option>
                                <?php
                                foreach ($month as $key => $value)
                                    echo '<option value=' . $key . '>' . $value . "</option>";
                                ?>
                            </select>

                            <select style="width: 83px;" name="year" class="form-inline form-control">
                                <option>Год</option>
                                <?php
                                for ($i = 2014; $i >= 1900; $i--)
                                    echo "<option>$i</option>";
                                ?>
                            </select>
                        </div>
                    </div>

                    <!--Чинс-->
                    <div class="form-group">
                        <label class="col-sm-5" for="">Пол</label>

                        <div class="col-sm-10">
                            <div id="gender">
                                <select style="width: 300px" class="form-inline form-control" name="gender">
                                    <option>
                                        ...
                                    </option>
                                    <option value="1">
                                        Мужской
                                    </option>
                                    <option value="2">
                                        Женской
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--Мамлакат-->
                    <div class="form-group">
                        <label class="col-sm-5">Страна</label>

                        <div class="col-sm-10">
                            <select style="width: 300px" name="country" class="form-control">
                                <option value="0">...</option>
                                <?php
                                //                                $countries = getCountries();
                                //                                foreach ($countries as $country)
                                //                                    echo "<option value='" . $country['idCountry'] . "'>" . $country['country_name_ru'] . " (" . $country['country_name_en'] . ")" . "</option>";
                                ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" id="saveData" name="saveData" class="btn btn-primary" value="Сохранить"/>
                </form> <!--  /Reg form-->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--/.fluid-container-->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap-transition.js"></script>
<script src="assets/js/bootstrap-alert.js"></script>
<script src="assets/js/bootstrap-modal.js"></script>
<script src="assets/js/bootstrap-dropdown.js"></script>
<script src="assets/js/bootstrap-scrollspy.js"></script>
<script src="assets/js/bootstrap-tab.js"></script>
<script src="assets/js/bootstrap-tooltip.js"></script>
<script src="assets/js/bootstrap-popover.js"></script>
<script src="assets/js/bootstrap-button.js"></script>
<script src="assets/js/bootstrap-collapse.js"></script>
<script src="assets/js/bootstrap-carousel.js"></script>
<script src="assets/js/bootstrap-typeahead.js"></script>

</body>
</html>
