<script>
    
    var form=document.querySelector('.form-alta-empleados');
    var nodes=form.getElementsByTagName("input");
    var alta_swiper, emp_data_swiper, emp_seguimiento_swiper;
    
    $( document ).ready(function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

        alta_swiper = new Swiper(".alta-swiper", {
            modules: [eventsAltaSwiper],
            // keyboard: {
            //     enabled: true,
            // },
            hashNavigation: {
                watchState: true,
            },
            debugger: true,
            allowTouchMove: false,
        });

        emp_data_swiper = new Swiper(".emp-data-swiper", {
            modules: [eventsEmpDataSwiper],
            // keyboard: {
            //     enabled: true,
            // },
            hashNavigation: {
                watchState: true,
            },
            debugger: true,
            allowTouchMove: false
        });

        emp_seguimiento_swiper = new Swiper(".emp-seguimiento-swiper", {
            modules: [eventsEmpSeguimientoSwiper],
            // keyboard: {
            //     enabled: true,
            // },
            hashNavigation: {
                watchState: true,
            },
            debugger: true,
            allowTouchMove: false
        });

        $('.modal-alta').modal();
        autoFillAltaEmpleado();
        createButtonContainer();
        createTabs();

        getId('btn-save-alta').addEventListener("click", saveAltaEmpleado);

        for(var i=0; i<=nodes.length-1; i++){
            document.getElementById(nodes[i].id).addEventListener("change", validInputs);
        }

        $("#modal-form-alta-empleado").modal({
            onCloseEnd: loadSaveBtn_reverse
        });
    });

    function eventsAltaSwiper({ swiper, extendParams, on }) {
        extendParams({
          debugger: false,
        });

        on('slideChange', () => {
            if (!swiper.params.debugger) return;
            if(swiper.activeIndex>=1){
                console.log('COMPLETADO');
            }else{
                console.log('INICIO');
            }    
        });
    }


    function eventsEmpDataSwiper({ swiper, extendParams, on }) {
        var sections_head=document.querySelector('.sections-head');
        var counter_li=sections_head.getElementsByTagName('li');
        var iteration=counter_li.length;
        extendParams({
            debugger: false,
        });
        
        on('slideChange', () => {
            if (!swiper.params.debugger) return;
            for(var i=0; i<=iteration-1; i++){
                if(i==swiper.activeIndex){
                    counter_li[i].classList.add('sections-head-li-active');
                    counter_li[i].classList.remove('sections-head-hover');
                }else{
                    counter_li[i].classList.remove('sections-head-li-active');
                    counter_li[i].classList.add('sections-head-hover');
                }
            }
        });
    }

    function eventsEmpSeguimientoSwiper({ swiper, extendParams, on }) {
        var tabs_head=document.querySelector('.tabs-data');
        var counter_li=tabs_head.getElementsByTagName('li');
        var iteration=counter_li.length;

        extendParams({
          debugger: false,
        });

        on('slideChange', () => {
            if (!swiper.params.debugger) return;
            for(var i=0; i<=iteration-1; i++){
                if(i==swiper.activeIndex){
                    counter_li[i].classList.add('tab-li-active');
                    counter_li[i].classList.remove('tab-li-hover');
                }else{
                    counter_li[i].classList.remove('tab-li-active');
                    counter_li[i].classList.add('tab-li-hover');
                }
            }
        });
    }

    function slideToIndex(instance, index, timer){
        instance.slideTo(index, timer);
    }

    function getIdValue(nameId){
        return document.getElementById(nameId).value;
    }

    function getId(nameId){
        return document.getElementById(nameId);
    }


    function autoFillAltaEmpleado(){
        document.getElementById('name').value="Brandon"
        document.getElementById('second_name').value=""
        document.getElementById('last_name_1').value="Sáenz"
        document.getElementById('last_name_2').value="Gazpar"
        document.getElementById('job_name').value="Desarrollador Web"
        document.getElementById('dept_name').value="Sistemas"
        document.getElementById('phone').value="+52 664 532 7355"
        document.getElementById('email').value="programador@grupovalcas.mx"
    }
    
    function fillVoid(){
        for(var i=0; i<=nodes.length-1; i++){
            document.getElementById(nodes[i].id).value='';
        }
    }

    //CREANDO BOTON DE GUARDADO CON ANIMACION DE CONFIRMACION
    //ESTA ANIMACION ESTÁ SINCRONIZADA CON LOS EVENTOS DE AJAX
    function createButtonContainer(){
        var button_container=document.querySelector('.button-container');
        var text_btn=document.createElement('span'); 
        var loader_btn=document.createElement('div'); 
        var icon_loader_btn=document.createElement('div'); 
        var icon_loader_btn_2=document.createElement('div'); 

        var line_1=document.createElement('div'); 
        var line_2=document.createElement('div'); 


        text_btn.className='sfs-1';
        text_btn.innerHTML=button_container.getAttribute('data-target');

        loader_btn.className='loader-button-container';
        icon_loader_btn.className='icon-loader-button';
        icon_loader_btn_2.className='icon-loader-button-2';
        line_1.className='line-1';
        line_2.className='line-2';

        icon_loader_btn_2.appendChild(line_1);
        icon_loader_btn_2.appendChild(line_2);


        button_container.appendChild(text_btn);
        button_container.appendChild(loader_btn);
        button_container.appendChild(icon_loader_btn);
        button_container.appendChild(icon_loader_btn_2);
    }

    function createTabs(){
        var tabs=document.querySelector('.tabs-data');
        var li=tabs.getElementsByTagName('li');

        
        for(var i=0; i<=tabs.children.length-1; i++){
            var arrow_1=document.createElement('div'); arrow_1.classList.add('div-arrowForm-1');
            var arrow_2=document.createElement('div'); arrow_2.classList.add('div-arrowForm-2');
            var span=document.createElement('span'); span.className='text-center sfs-076';
            var tab_content_progress=document.createElement('div'); tab_content_progress.className='tab-content-progress';
            var tab_progress=document.createElement('div'); tab_progress.className='tab-progress';
            tab_progress.id='tab-progress-'+i;
            var span_progress=document.createElement('span'); span_progress.className='span-progress sfs-07 blue_gv';
            span_progress.innerHTML='0%';
            span_progress.id='span-tab-progress-'+i;

            span.innerHTML=li[i].id;
            tab_content_progress.appendChild(tab_progress);
            tab_progress.appendChild(span_progress);
            li[i].appendChild(arrow_1);
            li[i].appendChild(arrow_2);
            li[i].appendChild(span);
            li[i].appendChild(tab_content_progress);
        }
    }


    function validInputs(){
        var form=document.querySelector('.form-alta-empleados');
        var nodes=form.getElementsByTagName("input");
        for(var i=0; i<=nodes.length-1; i++){
            if(nodes[i].value==''){
                console.log('Input: '+nodes[i].id+' - Está vacio');
                if(nodes[i].id=='second_name'){}
                else{
                    inputNoEditable(false);
                    document.getElementById(nodes[i].id).classList.remove('input-valid');
                    document.getElementById(nodes[i].id).classList.add('input-required');
                }
            }else{
                if(nodes[i].id=='second_name'){}
                else{
                    inputNoEditable(false);
                    document.getElementById(nodes[i].id).classList.remove('input-required');
                    document.getElementById(nodes[i].id).classList.add('input-valid');
                    //loadSaveBtn_reverse();
                }
            }
        }
    }

    function loadSaveBtn_status(status){
        var button_container=document.querySelector('.button-container');
        var icon_loader_btn=status=='done'?document.querySelector('.icon-loader-button'):document.querySelector('.icon-loader-button-2'); 

        button_container.childNodes[0].style.opacity='0';
        setTimeout(function(){
            button_container.classList.add('button-container-done');
            button_container.classList.add('background-'+status);
            button_container.classList.remove('pointer');
            button_container.classList.remove('theme-btn-save-hover');
            empleados.listener_form=='fail'?validInputs():function(){};

            setTimeout(function(){
                icon_loader_btn.classList.add('icon-loader-button-'+status);
                if(status=='done'){
                    getId('btn-save-alta').removeEventListener("click", saveAltaEmpleado);
                }else{
                    getId('btn-save-alta').removeEventListener("click", saveAltaEmpleado);
                    getId('btn-save-alta').addEventListener("click", loadSaveBtn_reverse);
                }
            }, 500);
        }, 300);
    }

    function loadSaveBtn_reverse(){
        var form=document.querySelector('.form-alta-empleados');
        var nodes=form.getElementsByTagName("input");
        var button_container=document.querySelector('.button-container');
        var loader_btn=document.querySelector('.loader-button-container'); 
        var icon_loader_btn=empleados.statusPost=='done'?document.querySelector('.icon-loader-button'):document.querySelector('.icon-loader-button-2'); 

        button_container.childNodes[0].style.opacity='1';
        button_container.classList.remove('button-container-done');
        loader_btn.classList.remove('loader-button-container-'+empleados.statusPost);
        icon_loader_btn.classList.remove('icon-loader-button-'+empleados.statusPost);
        button_container.classList.add('pointer');
        button_container.classList.add('theme-btn-save-hover');
        console.log('empleados.statusPost: '+empleados.statusPost);
        button_container.classList.remove('background-'+empleados.statusPost);
        loader_btn.style.width='0%';

        getId('btn-save-alta').addEventListener("click", saveAltaEmpleado);
        inputNoEditable(false);
        empleados.statusPost=='fail'?function(){}:fillVoid();

        form.style.opacity='1';
        slideToIndex(alta_swiper, 0, 1);

        for(var i=0; i<=nodes.length-1; i++){
            document.getElementById(nodes[i].id).classList.remove('input-required');
            document.getElementById(nodes[i].id).classList.add('input-valid');
        }
    }

    function inputNoEditable(status){
        getId('name').readOnly = status;
        getId('second_name').readOnly = status;
        getId('last_name_1').readOnly = status;
        getId('last_name_2').readOnly = status;
        getId('job_name').readOnly = status;
        getId('dept_name').readOnly = status;
        getId('phone').readOnly = status;
        getId('email').readOnly = status;
    }

    
    function saveAltaEmpleado(){
        let name = getIdValue('name');
        let second_name = getIdValue('second_name');
        let last_name_1 = getIdValue('last_name_1');
        let last_name_2 = getIdValue('last_name_2');
        let job_name = getIdValue('job_name');
        let dept_name = getIdValue('dept_name');
        let phone = getIdValue('phone');
        let email = getIdValue('email');
                
        var loader_btn=document.querySelector('.loader-button-container'); 

        var form=document.querySelector('.form-alta-empleados');


        $.ajax({ 
            type: "POST",
            url: '/empleados/alta',
            data: { 
                name: name,
                second_name: second_name==''?'null':second_name,
                last_name_1: last_name_1,
                last_name_2: last_name_2,
                job_name: job_name,
                dept_name: dept_name,
                phone: phone,
                email: email,
                status: "new",
                type_register: "alta"
            },
            beforeSend: function (params) {
                inputNoEditable(true);
                loader_btn.style.width='100%'
            },
            success: function(data){
                loader_btn.classList.add('loader-button-container-done');
                
                setTimeout(function(){
                    loadSaveBtn_status('done');
                    form.style.opacity='0';
                    slideToIndex(alta_swiper, 1, 700);
                },200);
                empleados.listener_form='done';
                empleados.statusPost='done';
            },
            complete:function(){
                empleados.listener_form=='fail'?function(){}:fillVoid();
            },
            error:function(data){
                loader_btn.classList.add('loader-button-container-fail');

                setTimeout(function(){
                    loadSaveBtn_status('fail');
                },200);
                empleados.listener_form='fail';
                empleados.statusPost='fail';
            }  
        });
    }

    function setDropdownElement(){
        var card_options = document.querySelectorAll('.dropdown-trigger');
        var dropdown_options = {'inDuration': 100,'constrainWidth': false}
        M.Dropdown.init(card_options,dropdown_options);
    }

    var empleados = new Vue({
        el: '#empleados',
        name: 'empleados',
        data() {
            return {
                altasEmpleados: [
                    // {
                    //     name: 'Brandon',
                    //     second_name: '',
                    //     last_name_1: 'Sáenz',
                    //     last_name_2: 'Gazpar',
                    //     job_name: 'Programador',
                    //     dept_name: 'Sistemas',
                    //     phone: '+52 664 532 73 55',
                    //     email: 'programador@grupovalcas.mx',
                    //     created_at: '06/09/2022'
                    // }
                ],
                progreso_depts: [
                    {percent: 57},// PORCENTAJE RH
                    {percent: 100},// PORCENTAJE MERCADOCTENÍA
                    {percent: 100},// PORCENTAJE SISTEMAS
                    {percent: 100},// PORCENTAJE LEGAL
                    {percent: 100},// PORCENTAJE NÓMINAS
                    {percent: 100}// PORCENTAJE PROCESOS
                ],
                label_registros: true,
                listener_form: "void",
                statusPost: "null",
                counter: ""
            }
        }, 
        created() {
            this.loadData();  
        },
        watch:{
            "listener_form"(newValue, oldValue){
                if(newValue=='done'){
                    this.loadData(); 
                    this.statusPost='done';
                    this.listener_form='void';
                }else{
                }
            },
            "counter"(newValue, oldValue){
                if(newValue!=''){
                    setTimeout(() => {setDropdownElement()}, 1);
                }
            }
        },
        methods:{
            //CANTIDAD TOTAL DE EMPLEADOS NUEVOS REGISTRADOS
            setTitleCountPage(){
                var title_page_alta_empleados=document.getElementById('title-page-alta-empleados');
                var count=this.altasEmpleados;
                title_page_alta_empleados.innerHTML=count.length+' Empleados nuevos';  
                this.counter=count.length+' Empleados registrados';

                if(this.altasEmpleados.length>0){
                    this.label_registros= false;
                }else{
                    this.label_registros= true;
                }
            },
            loadData(callback) {
                const VUETHIS_SUB = this;
                $.get("/empleados/consulta")
                .done(function(response) {
                    let json_response;
                    try {
                        json_response = JSON.parse(response);
                    } catch (error) {
                        json_response = null;
                        console.log('ERROR: '+json_response);
                    }
                    if(json_response) {
                        VUETHIS_SUB.altasEmpleados = json_response;
                        if(callback)
                            callback();
                            VUETHIS_SUB.setTitleCountPage();
                        } else {
                            console.log('ERROR EN VUE 1'+JSON.stringify(json_response));
                        }
                }).fail(function() {
                    console.log('ERROR EN VUE 2');
                });
            },
            addModalDetails: function(){
                var modal_right=document.querySelector('.modal-right');
                var modal_overlay=document.querySelector('#modal_overlay');

                modal_overlay.style.zIndex='1000';
                modal_overlay.style.display='block';
                modal_overlay.style.opacity='0.5';
                modal_right.style.left='40%';
            },
            progressGlobal: function(percentage){
                var progress_svg=document.querySelector('.progress-svg');
                var progress_percentage=document.querySelector('.progress-percentage');
                var val_stroke_array=281;

                var result=(val_stroke_array-((percentage/100)*val_stroke_array));
                progress_svg.style.strokeDashoffset=result+'%';
                progress_percentage.innerHTML=percentage.toFixed(0)+'%';
            },
            progressTab: function(percentage, num_id){
                var tab_progress=document.getElementById('tab-progress-'+num_id);
                var span_tab_progress=document.getElementById('span-tab-progress-'+num_id);
                var real_w=85;

                var result=(percentage/100)*real_w;
                tab_progress.style.width=result+'%';
                span_tab_progress.innerHTML=percentage.toFixed(0)+'%';
            },
            showDetails: function(id){
                this.addModalDetails();
                var sumatoria=0;
                for(let x in this.progreso_depts){
                    sumatoria += this.progreso_depts[x].percent;
                    this.progressTab(this.progreso_depts[x].percent, x);
                }
                var progress_global=((sumatoria)/600)*100;

                this.progressGlobal(progress_global);

                // var user_show_name=document.getElementById('user-show-name'); 
                // user_show_name.innerHTML=empleados.altasEmpleados[id].name;
            },
            copy: function(element){
                var aux = document.createElement("input");
                aux.setAttribute("value", document.getElementById(element).innerHTML);
                document.body.appendChild(aux);
                aux.select();
                document.execCommand("copy");
                document.body.removeChild(aux);

                M.toast({html: 'Se copió el contenido al portapapeles', classes: 'rounded toast_gv', displayLength: '2000'});
            }
        }
    });
</script>