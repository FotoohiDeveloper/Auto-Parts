$(document).ready(function () {
    // وقتی دکمه "ورود" کلیک می‌شود
    $("#submitBtn").click(function (e) {
        e.preventDefault(); // از ارسال عادی فرم جلوگیری می‌کنیم

        // اطلاعات فرم را بدست می‌آوریم
        var formData = $("#formAuthentication").serialize();

        // ارسال درخواست Ajax
        $.ajax({
            url: "http://localhost:8000/api/v1/register", // آدرس سمت سرور برای پردازش فرم
            type: "POST",
            data: formData,
            dataType: "json", // نوع پاسخ را به JSON تعیین می‌کنیم
            success: function (response) {
                if (response.status === "success") {
                    // اگر ورود موفقیت آمیز بود، پیام موفقیت آمیز نمایش داده می‌شود
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

                    Toast.fire({
                        icon: "success",
                        title: response.message,
                    });

                    // ریدایرکت به صفحه مقصد بعد از 3 ثانیه
                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 3000);
                } else{
                    // اگر ورود ناموفق بود، پیغام خطا نمایش داده می‌شود
                    Swal.fire({
                        icon: "error",
                        title: "خطا",
                        text: response.message,
                    });
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
