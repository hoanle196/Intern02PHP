$('button.delete').click(function(e) {
    var dataHref = $(this).attr('data-href');
    $('#exampleModal a').attr('href', dataHref);
});
// const filesUpload = document.querySelector(".uploadfile");
// const input = document.querySelector("#uploadfile")
// filesUpload.addEventListener("click", function() {
//     input.click();
// });
$("#uploadFile").change(function(event) {
    $('.images').remove();
    const {
        files
    } = event.target;
    // debugger;
    for (arr of files) {
        const url = window.URL.createObjectURL(arr);
        $('#uploadFile').after(`
        <img src="${url}" class = "images" alt="">`);
    }
});
// $('form').click(function (e) { 
//         e.preventDefault();
//         alert('oke');
//     });
$('#provinces').on('change', function() {
    var province_id = $(this).val();
    // console.log('http://'+ajaxUrl+'?a=APIgetDataDistrict');
    // console.log(`http://${domainUrl}?a=ApiGetDataDistrict`);
    if (province_id != '') {
        $.ajax({
            url: `http://${domainUrl}?a=ApiGetDataDistrict`,
            type: 'GET',
            data: { province: province_id },
            success: function(response) {
                console.log(response);
                // Xóa danh sách huyện hiện tại
                $('#districts').find('option').remove();

                // Thêm danh sách huyện mới
                $('#districts').append('<option value="">Chọn huyện</option>');
                $.each(response, function(index, districts) {
                    $('#districts').append('<option value="' + districts.id + '">' + districts.name + '</option>');
                });

                // Xóa danh sách xã hiện tại
                $('#wards').find('option').remove();
                $('#wards').append('<option value="">Chọn xã</option>');

            }
        });
    }
});
$('#districts').on('change', function() {
    var ward_id = $(this).val();
    // console.log(ajaxUrl);
    if (ward_id != '') {
        $.ajax({
            url: `http://${domainUrl}?a=ApiGetDataWard`,
            type: 'GET',
            data: { ward: ward_id },
            success: function(response) {
                console.log(response);
                // Xóa danh sách huyện hiện tại
                $('#wards').find('option').remove();

                // Thêm danh sách huyện mới
                $('#wards').append('<option value="">Chọn xã</option>');
                $.each(response, function(index, wards) {
                    $('#wards').append('<option value="' + wards.id + '">' + wards.name + '</option>');
                });

                // Xóa danh sách xã hiện tại
                // $('#Wards').find('option').remove();
            }
        });
    }
});
$(function() {
    console.log(dataBooking);
            $(".daterange").daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: "Clear",
                },
                minDate: moment().subtract(0, "days"),
                isInvalidDate: function(date) {
                    // dataBooking.forEach( (e, i)=> {
                    //     console.log(e, 'in for each');
                    //     var startDate = moment(e.start_date, "YYYY-MM-DD");
                    //     var endDate = moment(e.end_date, "YYYY-MM-DD");
                    //     console.log(startDate, 'startDate');
                    //     // console.log(moment(date, "YYYY-MM-DD"), 'datedatedatedatedate');
                    //     console.log(endDate, 'endDateendDateendDateendDate');
                    //     console.log(i, 'indexxxxxxxxxxxxxxxxxxxxxxxxxxx');
                    //     // Kiểm tra xem ngày được chọn có nằm trong khoảng thời gian thanh toán không
                    //     if (date.isBetween(startDate, endDate, 'day', '[]')) {
                    //         console.log('betwwen');
                    //         // Nếu có trả về true để vô hiệu hóa ngày đó trong date range picker
                    //         return true;
                    //     }
                    // })
                    for (var i = 0; i < dataBooking.length; i++) {
                        console.log(dataBooking[i], 'in forrrrrrrrr');
                        // console.log(i, 'indexxxxxxxxxxxxxxxxxxxxxxxxxxx');
                        // Lấy ngày bắt đầu và ngày kết thúc của khoảng thời gian cấm sử dụng
                        var startDate = moment(dataBooking[i].start_date, "YYYY-MM-DD");
                        var endDate = moment(dataBooking[i].end_date, "YYYY-MM-DD");
                        // console.log(startDate);
                        //     console.log(endDate);
                        // Kiểm tra xem ngày được chọn có nằm trong khoảng thời gian cấm sử dụng không
                        if (date.isBetween(startDate, endDate, 'day', '[]')) {
                            // Nếu có trả về true để vô hiệu hóa ngày đó trong date range picker
                            return true;
                        }
                    }
                    
                
                    return false;
                }
            });
            $(".daterange").on("apply.daterangepicker", function(ev, picker) {
                $('input[name="start"]').val(picker.startDate.format("YYYY-MM-DD"));
                $('input[name="end"]').val(picker.endDate.format("YYYY-MM-DD"));
            });
            $('input[name="start"], input[name="end"]').on(
                "cancel.daterangepicker",
                function(ev, picker) {
                    $(this).val("");
                }
            );
        });
        