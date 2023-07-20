var page_block_10 = 1, url_block_10 = '';

function add_block_10(){
    $('#form-decoration').load(baseUrl + '/block_ten/form');
    $('#modal-decoration').modal('show');
    url_slide = baseUrl + '/block_ten/add';
}

function edit_block_10(idh){
    $('#form-decoration').load(baseUrl + '/block_ten/form?id='+btoa(idh));
    $('#modal-decoration').modal('show');
    url_slide = baseUrl + '/block_ten/update?id='+btoa(idh);
}

function del_block_10(idh){
    var data_str = "id="+btoa(idh);
    del_data(data_str, "Bạn có chắc chắn muốn xóa bảng ghi này?", baseUrl + '/block_ten/del', '#content-decoration', baseUrl + '/block_ten/json?page='+page_block_10);
}

function change_block_10(idh,status){
    var data_str = "id="+btoa(idh)+'&status='+status;
    del_data(data_str, "Bạn có chắc chắn muốn cập nhật trạng thái cho bảng ghi này?", baseUrl + '/block_ten/change', '#content-decoration', baseUrl + '/block_ten/json?page='+page_block_10);
}

function view_page_block_10(pages){
    page_block_10 = pages;
    $('#content-decoration').load(baseUrl + '/block_ten/json?page='+page_block_10);
}

function check_size_block_10(){
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
                    if (height != 92 || width != 122){
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

function save_block_10(){
    var required = $('#fm-block-10 input, #fm-block-10 textarea, #fm-block-10 select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm-block-10', url_slide, '#modal-decoration', '#content-decoration',  baseUrl+'/block_ten/json?page='+page_block_10); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}