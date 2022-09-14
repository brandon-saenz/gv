<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Registro de empleados</title>
        <?php include('../resources/widgets/head-html.php')?>        
    </head>

    <body>
        <div id="empleados">
        <!-- Modal Structure -->
            <?php include($url_widget.'modal-emp-data.php')?>
            <?php include($url_widget.'modal-alta.php')?>

            <?php include($url_widget.'side-nav.php')?>
            
            <div class="wrapper">
                <?php $title='Administración de empleados'; 
                include($url_widget.'title-content.php') ?>

                <div class="content">
                    <?php $boton_name='NUEVO EMPLEADO';
                    include($url_widget.'header-actions-main.php') ?>
                    <div class="div-center" v-if="label_registros">
                        <h3 class="sfs-3 blue_gv sm-v-15">Cargando registros...</h3>
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
                                    <!-- <label class="status_card card_status pointer init_col-3" :class="item.status"></label> -->
                                    <label class="card_status pointer init_col-3" :class="'alta-'+item.status"></label>
                                    <a class="dropdown-trigger options_card material-icons black-gray pointer init_col-4" href='#' v-bind:data-target="'dropdown-card'+i">more_horiz</a>
                                </div>
                                <div class="profile_card row" @click="showDetails(i)">
                                    <div class="div-center col s12">
                                        <img class="photo_card " src="/assets/profile.png" width="80px" height="80px">
                                    </div>
                                    <p v-bind:id="'name_card_'+i" class="name_card col s12 sfs-12 text-center montserrat-600">{{item.name}} {{item.last_name_1}}</p>
                                    <p v-bind:id="'job_card_'+i"  class="job_card col s12 sfs-12 text-center montserrat-400">{{item.job_name}}</p>
                                </div>
                                <div class="data_card none">
                                    <div class="row">
                                        <div class="col s6 sfs-07">
                                            <p class="dtc_dept">Departamento</p>
                                            <p v-bind:id="'lb_dtc_dept_'+i" class="lb_dtc_dept sfs-09 pointer" @click="copy('lb_dtc_dept_'+i)">{{item.dept_name}}</p>
                                        </div>
                                        <div class="col s6 sfs-07">
                                            <p class="dtc_date">Fecha de alta</p>
                                            <p v-bind:id="'lb_dtc_date_'+i" class="lb_dtc_date sfs-09 pointer" @click="copy('lb_dtc_date_'+i)">{{item.created_at}}</p>
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
        </div>
    </body>
    <?php include('scripts/empleados-js.php')?>
</html>
