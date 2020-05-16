$(document).ajaxStart(function() { Pace.restart(); });
$('body').tooltip({ selector: '[data-toggle=tooltip]' }); 
$(()=>{
    $('form').submit(function(){
        Pace.restart();
    });
});

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function swalToast(type, msg){
    Toast.fire({
        icon: type,
        title: msg
    })
}

function swalConfirm(callback,msg="You won't be able to revert this!") {
    Swal.fire({
        title: 'Are you sure?',
        text: msg,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            callback()
        }
    })
}

function swalShortConfirm(callback) {
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
    }).then((result) => {
        if (result.value) {
            callback()
        }
    })
}



function swalSuccess(title,message=null) {
    Swal.fire({
        title : title,
        text: message,
        icon : 'success'
    });
}

function swalInfo(title,message=null) {
    Swal.fire({
        title : title,
        text: message,
        icon : 'info'
    });
}

function swalError(title,message=null) {
    Swal.fire({
        title : title,
        text: message,
        icon : 'error'
    });
}