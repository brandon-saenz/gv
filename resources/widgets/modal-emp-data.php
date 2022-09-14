<div id="modal_overlay" onclick="removeModalDetails()"></div>
<div id="emp-data" class="modal-right right-sheet">
    <div class="modal-hide div-center" onclick="removeModalDetails()">
        <i class="material-icons blue_gv_d sfs-3">chevron_right</i>
    </div>
    <!-- <div class="div-center">
        <p id="user-show-name" class="blue_gv sfs-25">DATA</p>
    </div> -->
    <div class="header-name">
        <div class="profile-emp">
            <img class="photo-emp" src="/assets/profile.png">
            <div class="emp-name-content">
                <p class="name_card sfs-12 montserrat-500">Brandon Sáenz Gazpar
                    <span class="emp-status sfs-07 pointer alta-new"></span>
                </p>
                <p class="emp-job sfs-09 montserrat-400">Sistemas - Desarrollador Web
                </p>
            </div>
            <div class="progress-draw">
                <svg data-name="progress-svg-fill" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <circle class="progress-svg-fill" cx="256" cy="256" r="229.21"/>
                </svg>
                <svg data-name="progress-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <circle class="progress-svg" cx="256" cy="256" r="229.21"/>
                </svg>
                <div class="div-center">
                    <label class="progress-percentage sfs-13 blue_gv">0%</label>
                </div>
            </div>
        </div>
    </div>
    <div class="sections-head">
        <ul class="row">
            <li class="col sfs-09 text-center montserrat-500 blue_gv sections-head-li-active" onclick="slideToIndex(emp_data_swiper, 0, 500)">DETALLES</li>
            <li class="col sfs-09 text-center montserrat-500 blue_gv" onclick="slideToIndex(emp_data_swiper, 1, 500)">DOCUMENTOS</li>
            <li class="col sfs-09 text-center montserrat-500 blue_gv" onclick="slideToIndex(emp_data_swiper, 2, 500)">SEGUIMIENTO</li>
            <!-- <li class="col sfs-09 text-center montserrat-500 blue_gv" onclick="slideToIndex(emp_data_swiper, 3, 500)">COMENTARIOS</li> -->
        </ul>
    </div>
    <div class="swiper emp-data-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="details-container"></div>
            </div>
            <div class="swiper-slide">
                <h5 class="blue_gv_d title">DOCUMENTOS</h5>
            </div>
            <div class="swiper-slide">
                <ul class="tabs-data row">
                    <li class="tab-li tab-li-hover tab-li-active col" onclick="slideToIndex(emp_seguimiento_swiper, 0, 500)" id="RECURSOS HUMANOS"></li>
                    <li class="tab-li tab-li-hover col" onclick="slideToIndex(emp_seguimiento_swiper, 1, 500)" id="MERCADOCTENÍA"></li>
                    <li class="tab-li tab-li-hover col" onclick="slideToIndex(emp_seguimiento_swiper, 2, 500)" id="SISTEMAS"></li>
                    <li class="tab-li tab-li-hover col" onclick="slideToIndex(emp_seguimiento_swiper, 3, 500)" id="LEGAL"></li>
                    <li class="tab-li tab-li-hover col" onclick="slideToIndex(emp_seguimiento_swiper, 4, 500)" id="NÓMINAS"></li>
                    <li class="tab-li tab-li-hover col" onclick="slideToIndex(emp_seguimiento_swiper, 5, 500)" id="PROCESOS"></li>
                </ul>
                <div class="swiper emp-seguimiento-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <h5 class="blue_gv_d title">RECURSOS HUMANOS</h5>
                        </div>
                        <div class="swiper-slide">
                            <h5 class="blue_gv_d title">MERCADOCTENÍA</h5>
                        </div>
                        <div class="swiper-slide">
                            <h5 class="blue_gv_d title">SISTEMAS</h5>
                        </div>
                        <div class="swiper-slide">
                            <h5 class="blue_gv_d title">LEGAL</h5>
                        </div>
                        <div class="swiper-slide">
                            <h5 class="blue_gv_d title">NÓMINAS</h5>
                        </div>
                        <div class="swiper-slide">
                            <h5 class="blue_gv_d title">PROCESOS</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="swiper-slide">
                <h5 class="blue_gv_d title">COMENTARIOS</h5>
            </div> -->
        </div>
    </div>
</div>