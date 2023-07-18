var page_slide = 1, url_slide = '';

function add_slide(){
    $('#form-decoration').load(baseUrl + '/slide/form');
    $('#modal-decoration').modal('show');
    url_slide = baseUrl + '/slide/add';
}

function edit_slide(idh){
    $('#form-decoration').load(baseUrl + '/slide/form?id='+btoa(idh));
    $('#modal-decoration').modal('show');
    url_slide = baseUrl + '/slide/update?id='+btoa(idh);
}

function del_slide(idh){
    var data_str = "id="+btoa(idh);
    del_data(data_str, "Bạn có chắc chắn muốn xóa bảng ghi này?", baseUrl + '/slide/del', '#content-decoration', baseUrl + '/slide/json?page='+page_slide);
}

function change_slide(idh,status){
    var data_str = "id="+btoa(idh)+'&status='+status;
    del_data(data_str, "Bạn có chắc chắn muốn cập nhật trạng thái cho bảng ghi này?", baseUrl + '/slide/change', '#content-decoration', baseUrl + '/slide/json?page='+page_slide);
}

function view_page_slide(pages){
    page_slide = pages;
    $('#content-decoration').load(baseUrl + '/slide/json?page='+page_slide);
}

function check_size(){
    var fileUpload = document.getElementById("image_slide");
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
        if (typeof (fileUpload.files) != "undefined") {
            var reader = new FileReader();
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e){
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height != 655 || width != 1920){
                        show_message("error", "Kích thước ảnh không đúng");
                        $('.file_attach').ace_file_input('reset_input'); 
                    }
                    return true;
                };
            }
        }else{
            show_message("error", "Trình duyệt này không hỗ trợ HTML5.");
            $('.file_attach').ace_file_input('reset_input'); 
        }
    }else{
        show_message("error", "Định dạng file không chính xác");
        $('.file_attach').ace_file_input('reset_input'); 
    }
}

function save_slide(){
    var required = $('#fm-slide input, #fm-slide textarea, #fm-slide select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm-slide', url_slide, '#modal-decoration', '#content-decoration',  baseUrl+'/slide/json?page='+page_slide); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}