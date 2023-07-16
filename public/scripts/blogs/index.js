var page = 1, keyword = '', url = '';
$(function(){
    $('#list_data').load(baseUrl + '/blogs/json'); $('#cate_id').load(baseUrl + '/other/combo_cate');
    CKEDITOR.replace('content');
});

function add(){
    $('#modal-data').modal('show'); $('#image').attr('required', true);
    $('#title').val(null); $('.file_attach').ace_file_input('reset_input'); 
    $('#description').val(null); CKEDITOR.instances['content'].setData(null);
    url = baseUrl + '/blogs/add';
}

function edit(idh){
    $('#modal-data').modal('show'); $('#image').attr('required', false);
    $.getJSON(baseUrl + '/blogs/info?id='+btoa(idh), function(data){
        $('#title').val(data.title); $('#description').val(data.description);
        CKEDITOR.instances['content'].setData(data.content); $('#image_old').val(data.image);
        $('#cate_id').val(data.cate_id).trigger('change');
        if(data.display_img_detail == 0){
            $('#display_img_detail').prop('checked', true);
        }else{
            $('#display_img_detail').prop('checked', false);
        }
    });
    $('.file_attach').ace_file_input('reset_input');
    url = baseUrl + '/blogs/update?id='+btoa(idh);
}

function del(idh){
    var data_str = 'id='+btoa(idh);
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/blogs/del', '#list_data', baseUrl + '/blogs/json?page='+page+'&q='+keyword);
}

function save(){
    var noidung =  CKEDITOR.instances['content'].getData(), image = $('#image').val(); 
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true, img = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(image.length > 0){
        if(check_image_ext(image)){
            img = true
        }else{
            img = false;
        }
    }else{
        img = true;
    }
    if(allRequired && noidung.length > 0 && img){
        $('#noidung').val(noidung);
        save_form_modal('#fm', url, '#modal-data', '#list_data',  baseUrl+'/blogs/json?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_blog(pages){
    page = pages;
    $('#list_data').load(baseUrl + '/blogs/json?page='+page+'&q='+keyword);
}

function search(){
    var q = $('#nav-search-input').val();
    keyword = (q.length != 0) ? q.replaceAll(" ", "$", 'g') : '';
    $('#list_data').load(baseUrl + '/blogs/json?page=1&q='+keyword);
}

function change(idh, status){
    var data_str = 'id='+btoa(idh)+'&status='+status;
    del_data(data_str, "Bạn có chắc chắn muốn cập nhật trạng thái cho bản ghi này?", baseUrl + '/blogs/change', '#list_data', baseUrl + '/blogs/json?page='+page+'&q='+keyword);
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function doThis() {
    x = $('#description').val();
    y = x.length;
    $('#count_char').text(y);
}