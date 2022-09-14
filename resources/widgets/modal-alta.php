<div id="modal-form-alta-empleado" class="modal modal-alta">
    <div class="icon-modal-close" onclick="$('.modal-alta').modal('close')">
        <i class="material-icons sfs-3">close</i>
    </div>
<meta name="_token" content="{!! csrf_token() !!}"/>
    <div class="modal-content" style="margin-bottom: -5%;">
        <h5 class="blue_gv_d title">Alta de empleado nuevo</h5>
        <div class="swiper alta-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="row form-alta-empleados">
                        <div class="col s6 input-container">
                            <input id="name" name="name" type="text" class="input-valid" required>
                            <label class="sfs-1">Primer nombre</label>
                        </div>
                        <div class="col s6 input-container">
                            <input id="second_name" name="second_name" type="text" class="input-valid" required>
                            <label class="sfs-1">Segundo nombre</label>
                        </div>
                        <div class="col s6 input-container">
                            <input id="last_name_1" name="last_name_1" type="text" class="input-valid" required>
                            <label class="sfs-1">Apellido paterno</label>
                        </div>
                        <div class="col s6 input-container">
                            <input id="last_name_2" name="last_name_2" type="text" class="input-valid" required>
                            <label class="sfs-1">Apellido materno</label>
                        </div>
                        <div class="col s4 input-container">
                            <input id="job_name" name="job_name" type="text" class="input-valid" required>
                            <label class="sfs-1">Puesto</label>
                        </div>
                        <div class="col s4 input-container">
                            <input id="dept_name" name="dept_name" type="text" class="input-valid" required>
                            <label class="sfs-1">Departamento</label>
                        </div>
                        <div class="col s4 input-container">
                            <input id="phone" name="phone" type="text" class="input-valid" required>
                            <label class="sfs-1">Teléfono</label>
                        </div>
                        <div class="col s7 input-container">
                            <input id="email" name="email" type="text" class="input-valid" required>
                            <label class="sfs-1">Corre electrónico</label>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <h5 class="blue_gv_d title">Completado</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer row" style="position: relative; margin-bottom: 5%;">
        <div class="col s12 div-center">
            <button id="btn-save-alta" class="button-container pointer theme-btn-save grid-btn-1" data-target="Guardar y Continuar">
            </button>
        </div>
    </div>
</div>