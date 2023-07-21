var page_block_6 = 1, url_block_6 = '';

function add_block_6(){
    $('#form-decoration').load(baseUrl + '/block_six/form');
    $('#modal-decoration').modal('show');
    url_slide = baseUrl + '/block_six/add';
}

function edit_block_6(idh){
    $('#form-decoration').load(baseUrl + '/block_six/form?id='+btoa(idh));
    $('#modal-decoration').modal('show');
    url_slide = baseUrl + '/block_six/update?id='+btoa(idh);
}

function del_block_6(idh){
    var data_str = "id="+btoa(idh);
    del_data(data_str, "Bạn có chắc chắn muốn xóa bảng ghi này?", baseUrl + '/block_six/del', '#content-decoration', baseUrl + '/block_six/json?page='+page_block_6);
}

function change_block_6(idh,status){
    var data_str = "id="+btoa(idh)+'&status='+status;
    del_data(data_str, "Bạn có chắc chắn muốn cập nhật trạng thái cho bảng ghi này?", baseUrl + '/block_six/change', '#content-decoration', baseUrl + '/block_six/json?page='+page_block_6);
}

function view_page_block_6(pages){
    page_block_6 = pages;
    $('#content-decoration').load(baseUrl + '/block_six/json?page='+page_block_6);
}

function check_size_block_6(){
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
                    if (height != 334 || width != 370){
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

function save_block_6(){
    var required = $('#fm-block-6 input, #fm-block-6 textarea, #fm-block-6 select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm-block-6', url_slide, '#modal-decoration', '#content-decoration',  baseUrl+'/block_six/json?page='+page_block_6); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function save_block_6_global(){
    var required = $('#fm-block-6-global input, #fm-block-6-global textarea, #fm-block-6-global select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm-block-6-global', baseUrl + '/block_six/update_global', '#modal-decoration', '#content-decoration',  baseUrl+'/block_six/json?page='+page_block_6); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}


