var page_block_2 = 1, url_block_2 = '';

function add_block_2(){
    $('#form-decoration').load(baseUrl + '/block_two/form');
    $('#modal-decoration').modal('show');
    url_slide = baseUrl + '/block_two/add';
}

function edit_block_2(idh){
    $('#form-decoration').load(baseUrl + '/block_two/form?id='+btoa(idh));
    $('#modal-decoration').modal('show');
    url_slide = baseUrl + '/block_two/update?id='+btoa(idh);
}

function del_block_2(idh){
    var data_str = "id="+btoa(idh);
    del_data(data_str, "Bạn có chắc chắn muốn xóa bảng ghi này?", baseUrl + '/block_two/del', '#content-decoration', baseUrl + '/block_two/json?page='+page_block_2);
}

function change_block_2(idh,status){
    var data_str = "id="+btoa(idh)+'&status='+status;
    del_data(data_str, "Bạn có chắc chắn muốn cập nhật trạng thái cho bảng ghi này?", baseUrl + '/block_two/change', '#content-decoration', baseUrl + '/block_two/json?page='+page_block_2);
}

function view_page_block_2(pages){
    page_block_2 = pages;
    $('#content-decoration').load(baseUrl + '/block_two/json?page='+page_block_2);
}

function check_size_block_2(){
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
                    if (height != 234 || width != 362){
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

function save_block_2(){
    var required = $('#fm-block-2 input, #fm-block-2 textarea, #fm-block-2 select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm-block-2', url_slide, '#modal-decoration', '#content-decoration',  baseUrl+'/block_two/json?page='+page_block_2); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}