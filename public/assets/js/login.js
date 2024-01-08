const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener(
            "mouseenter",
            Swal.stopTimer
        );
        toast.addEventListener(
            "mouseleave",
            Swal.resumeTimer
        );
    },
});



// اگر ورود ناموفق بود، پیغام خطا نمایش داده می‌شود
// Swal.fire({
//     icon: "error",
//     title: "خطا",
//     text: response.message,
// });