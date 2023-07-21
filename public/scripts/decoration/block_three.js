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