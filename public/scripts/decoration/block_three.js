var page_block_3 = 1, url_block_3 = '';

function add_block_3(){
    $('#form-decoration').load(baseUrl + '/block_three/form');
    $('#modal-decoration').modal('show');
    url_block_3 = baseUrl + '/block_three/add';
}

function edit_block_3(idh){
    $('#form-decoration').load(baseUrl + '/block_three/form?id='+btoa(idh));
    $('#modal-decoration').modal('show');
    url_block_3 = baseUrl + '/block_three/update?id='+btoa(idh);
}

function del_block_3(idh){
    var data_str = "id="+btoa(idh);
    del_data(data_str, "Bạn có chắc chắn muốn xóa bảng ghi này?", baseUrl + '/block_three/del', '#content-decoration', baseUrl + '/block_three/json?page='+page_block_3);
}

function change_block_3(idh,status){
    var data_str = "id="+btoa(idh)+'&status='+status;
    del_data(data_str, "Bạn có chắc chắn muốn cập nhật trạng thái cho bảng ghi này?", baseUrl + '/block_three/change', '#content-decoration', baseUrl + '/block_three/json?page='+page_block_3);
}

function view_page_block_3(pages){
    page_block_3 = pages;
    $('#content-decoration').load(baseUrl + '/block_three/json?page='+page_block_3);
}

function save_block_3(){
    var required = $('#fm-block-3 input, #fm-block-3 textarea, #fm-block-3 select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm-block-3', url_block_3, '#modal-decoration', '#content-decoration',  baseUrl+'/block_three/json?page='+page_block_3); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function check_size_block_3(){
    var fileUpload = document.getElementById("image_block_3_global");
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
                    if (height != 700 || width != 1920){
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

function save_block_3_global(){
    var required = $('#fm-block-3-global input, #fm-block-3-global textarea, #fm-block-3-global select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm-block-3-global', baseUrl + '/block_three/update_global', '#modal-decoration', '#content-decoration',  baseUrl+'/block_three/json?page='+page_block_3); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}