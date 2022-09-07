<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Use title if it's in the page YAML frontmatter -->
        <title>Registro de empleados</title>

        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
        <script
        src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk="
        crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        

        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js">Vue.config.silent = true</script>
        <!-- FRAMWORK MATERIALIZE CSS -->
        
        <link href="/css/materialize.css" rel="stylesheet" type="text/css" />
        <script src="/js/materialize.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <!-- ESTILOS Y FUNCIONES CUSTOM -->
        
        <link href="/css/styles.css" rel="stylesheet" type="text/css" />
        <script src="/js/scripts.js" type="text/javascript"></script>
        
        <!-- ASSETS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <link href="/assets/logo.png" rel="icon" type="image/png" />
        
        <link  href="/css/datepicker.css" rel="stylesheet">
        <script src="/js/datepicker.js"></script>
        
        
    </head>

    <body>
        <!-- Modal Structure -->
        <div id="modal_overlay" onclick="n_modal_user_data()"></div>
        <?php include('widgets/modal-user-data.php')?>
        <?php include('widgets/modal-alta.php')?>

        <nav class="side_gv">
            <div class="row sm-v-07 text-center">
                <a href="./">
                    <img alt="Logo" src="/assets/present_w.svg" height="100">
                </a>
            </div>
        </nav>
        <div class="wrapper">
            <div class="header">
                <p class="title montserrat-700 sfs-13">Registro de empleados</p>
                <div class="topbar"></div>
            </div>
            <div class="content">
                <div class="header_actions_main row">
                    <p id="title-page-alta-empleados" class="col s5 title montserrat-500 sfs-13">32 Empleados nuevos</p>
                    <div class="col s4"></div>
                    <div class="col s3 title">
                        <button class="btn btn_line_gv waves-effect sw-btn-14 modal-trigger" href="#modal-form-alta-empleado">
                            <i class="text-i green-dark sfs-1">NUEVO EMPLEADO</i><i class="material-icons green-dark">add</i>
                        </button>
                    </div>
                </div>

                <div id="elem_altas" class="elem_altas row">

                    <div class="content_card_gv col s6 m4 l3" v-for="(item, i) in altasEmpleados" :key="i">
                        <!-- DROPDOWN STRUCTURE -->
                        <ul v-bind:id="'dropdown-card'+i" class='dropdown-content'>
                            <li><a href="#!" class="blue_gv">Opcion 1</a></li>
                            <li><a href="#!" class="blue_gv">Opcion 2</a></li>
                        </ul>

                        <!-- CARD STRUCTURE -->
                        <div class="card_gv">
                            <div class="header_card">
                                <label class="status_card card_status pointer init_col-3" :class="item.status"></label>
                                <a class="options_card dropdown-trigger material-icons black-gray pointer init_col-4" href='#' v-bind:data-target="'dropdown-card'+i">more_horiz</a>
                            </div>
                            <div class="profile_card row" @click="modalUserShowData(i)">
                                <div class="div-center col s12">
                                    <img class="photo_card " src="/assets/profile.png" width="80px" height="80px">
                                </div>
                                <p v-bind:id="'name_card_'+i" class="name_card col s12 sfs-12 text-center montserrat-600">{{item.name}}</p>
                                <p v-bind:id="'job_card_'+i"  class="job_card col s12 sfs-12 text-center montserrat-400">{{item.puesto}}</p>
                            </div>
                            <div class="data_card">
                                <div class="row">
                                    <div class="col s6 sfs-07">
                                        <p class="dtc_dept">Departamento</p>
                                        <p v-bind:id="'lb_dtc_dept_'+i" class="lb_dtc_dept sfs-09 pointer" @click="copy('lb_dtc_dept_'+i)">{{item.dept}}</p>
                                    </div>
                                    <div class="col s6 sfs-07">
                                        <p class="dtc_date">Fecha de alta</p>
                                        <p v-bind:id="'lb_dtc_date_'+i" class="lb_dtc_date sfs-09 pointer" @click="copy('lb_dtc_date_'+i)">{{item.init_date}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="col s12" style="margin-top: -1%;">
                                        <i class="material-icons icon_card blue_gv_d">mail</i>
                                        <i v-bind:id="'lb_dtc_email_'+i" class="data_text_card blue_gv pointer" @click="copy('lb_dtc_email_'+i)">{{item.email}}</i>
                                    </p>
                                    <p class="col s12" style="margin-top: 1%;">
                                        <i class="material-icons icon_card blue_gv_d">phone</i>
                                        <i v-bind:id="'lb_dtc_phone_'+i" class="data_text_card blue_gv pointer" @click="copy('lb_dtc_phone_'+i)">{{item.phone}}</i>
                                    </p>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include('scripts/registro_empleados-js.php')?>
</html>
