
$( document ).ready(function() {

    init();

    let ani_ss = localStorage.getItem('ani_ss');
    let dataSwitch=document.getElementById('dataSwitch');

    if(ani_ss==null){
        localStorage.setItem('ani_ss', '1');
        dataSwitch.value='1'; dataSwitch.checked=true;
    }

    console.log('Animation Splash Screen is: '+ani_ss);

    // if(ani_ss=='1' && ani_ss!=null){
    //     dataSwitch.value='1'; dataSwitch.checked=true;
    //     loading();
    // }else{
    //     dataSwitch.value='0'; dataSwitch.checked=false;
    //     var splash_screen=document.getElementById('splash_screen').style.display='none';
    // }

});


var fig_1=document.getElementsByClassName('fig_1');
var fig_2=document.getElementsByClassName('fig_2');

var i = -1; var j = -1;

function loading() {
    load_fig1();
}

function load_fig1(){
    setTimeout(function() {
        i++;            
        fig_1[i].style.opacity="1";
        if (i < fig_1.length-1) {           
            load_fig1();   
            if(i>=fig_1.length-2){
                load_fig2();
            }         
        } 
      }, 100)
}

function load_fig2(){
    setTimeout(function() {
        j++;            
        console.log(j);          
        fig_2[j].style.opacity="1";
        if (j < fig_2.length-1) {           
            load_fig2();  
        } 
        if(j==10){
            console.log('logrado '+j);
            var loading_=document.getElementById('loading');
            loading_.style.marginTop='0%';
            setTimeout(function(){
                var name_gv=document.getElementById('name_gv');
                var eslogan_gv=document.getElementById('eslogan_gv');
                name_gv.style.opacity='1';
                eslogan_gv.style.opacity='1';
                setTimeout(function(){
                    var ss=document.getElementById('splash_screen');
                    ss.style.opacity='0';
                    setTimeout(function(){
                        ss.style.display='none';
                    }, 600);
                }, 2000);
            }, 100);
        }
      }, 100);
}

function sizeChange(){
    var wallpaper = document.querySelector("#wallpaper");
    var currWidth = wallpaper.clientWidth;
    var currHeight = wallpaper.clientHeight;
    // console.log('IMG - W: '+currWidth+', H:'+currHeight);
    // console.log('WINDOW - W: '+window.innerWidth+', H:'+window.innerHeight);
    if(window.innerHeight>=currHeight){
        wallpaper.style.opacity='0';
    }else{
        wallpaper.style.opacity='1';        
    }
}

function switched(){    
    if (dataSwitch.value == '0') {
        dataSwitch.value = '1';
        localStorage.setItem('ani_ss', '1');
        console.log('SWITCH IS CHANGE '+dataSwitch.value);
    } else {
        localStorage.setItem('ani_ss', '0');
        dataSwitch.value = '0';
        console.log('SWITCH IS CHANGE '+dataSwitch.value);
    }
}


function init(){
    console.log('DOC SCRIPT OK');

    M.AutoInit();
}

function copy(element) {
    var aux = document.createElement("input");
    aux.setAttribute("value", document.getElementById(element).innerHTML);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);

    M.toast({html: 'Se copió el contenido al portapapeles', classes: 'rounded toast_gv', displayLength: '2000'});
}


function removeModalDetails(){
    var modal_right=document.querySelector('.modal-right');
    var modal_overlay=document.querySelector('#modal_overlay');

    modal_overlay.style.opacity='0';
    modal_overlay.style.zIndex='999';
    modal_overlay.style.display='none';

    modal_right.style.left='103%';
}