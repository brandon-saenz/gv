<script>
        $( document ).ready(function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
        });
        var cards_data = new Vue({
            el: '#elem_altas',
            name: 'altas_empleados',
            data() {
                return {
                    altasEmpleados: [
                        {
                            name: 'SAENZ',
                            puesto: 'Desarrollador',
                            status: 'alta-complete',
                            dept: 'Sistemas',
                            init_date: '05/09/2022',
                            email: 'programador@grupovalcas.mx',
                            phone: '+52 664 532 7355'
                        },
                        {
                            name: 'GAZPAR',
                            puesto: 'User Experience',
                            status: 'alta-process',
                            dept: 'Sistemas',
                            init_date: '06/09/2022',
                            email: 'dev@grupovalcas.mx',
                            phone: '+52 664 783 6605'
                        }
                    ]
                }
            }, 
            created() {
                var title_page_alta_empleados=document.getElementById('title-page-alta-empleados');
                var count=this.altasEmpleados;
                title_page_alta_empleados.innerHTML=count.length+' Empleados nuevos';    
            },
            methods:{
                modalUserShowData: function(id){
                    var modal_right=document.querySelector('.modal-right');
                    var modal_overlay=document.querySelector('#modal_overlay');

                    var user_show_name=document.getElementById('user-show-name'); user_show_name.innerHTML=cards_data.altasEmpleados[id].name;

                    modal_overlay.style.zIndex='1000';
                    modal_overlay.style.display='block';
                    modal_overlay.style.opacity='0.5';

                    modal_right.style.left='45%';
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
        })
    </script>