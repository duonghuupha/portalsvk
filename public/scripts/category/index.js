var page = 1, url = '', keyword = '';
$(function(){
    $('#list_data').load(baseUrl + '/category/json');
});

function add(){
    $('#modal-data').modal('show'); $('#title, #description, #image').val(null);
    $('.file_attach').ace_file_input('reset_input');
    url = baseUrl + '/category/add';
}

function edit(idh){
    $('#modal-data').modal('show'); $('#title').val($('#title_'+idh).text());
    $('#description').val($('#desc_'+idh).text()); $('#image_old').val($('#image_'+idh).text());
    $('.file_attach').ace_file_input('reset_input');
    url = baseUrl + '/category/update?id='+btoa(idh);
}

function del(idh){
    var data_str = 'id='+btoa(idh);
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/category/del', '#list_data', baseUrl + '/category/json?page='+page+'&q='+keyword);
}

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-data', '#list_data',  baseUrl+'/category/json?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function search(){
    var q = $('#nav-search-input').val();
    keyword = (q.length != 0) ? q.replaceAll(" ", "$", 'g') : '';
    $('#list_data').load(baseUrl + '/category/json?page=1&q='+keyword);
}

function view_page_category(pages){
    page = pages;
    $('#list_data').load(baseUrl + '/category/json?page='+page+'&q='+keyword);
}

function change(idh, status){
    var data_str = 'id='+btoa(idh)+'&status='+status;
    del_data(data_str, "Bạn có chắc chắn muốn cập nhật trạng thái bản ghi này?", baseUrl + '/category/change', '#list_data', baseUrl + '/category/json?page='+page+'&q='+keyword);
}