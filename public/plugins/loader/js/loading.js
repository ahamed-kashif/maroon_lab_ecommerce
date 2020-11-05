$.loading = {
    start: function (loadingTips='') {
        let _LoadingHtml = '<div class="spin spin-lg spin-spinning">' +
                                '<span class="spin-dot spin-dot-spin">' +
                                    '<i class="spin-dot-item"></i>' +
                                    '<i class="spin-dot-item"></i>' +
                                    '<i class="spin-dot-item"></i>' +
                                    '<i class="spin-dot-item"></i>' +
                                '</span>' +
                                '<span class="tips">'+loadingTips+'</span>'+
                           '</div>'

        $('body').append(_LoadingHtml);
    },
    end: function () {
        $(".spin").remove();
    }
}