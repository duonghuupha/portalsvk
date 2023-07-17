var page = 1, url= '', keyword = '';
$(function(){
    $('#list-data').load(baseUrl + '/users/json');
});

function add(){
    $('#username, #fullname, #pass, #repass').val(null);
    $('#modal-data').modal('show');
    url = baseUrl + '/users/add';
}

function edit(idh){
    $('#fullname_edit').val($('#full_'+idh).text()); $('#username_edit').val($('#user_'+idh).text());
    $('#cancel_edit, #save_edit').prop("disabled", false);
    url = baseUrl +'/users/update?id='+btoa(idh);
}

function edit_pass(idh){
    $('#username_pass').val($('#user_'+idh).text());
    $('#cancel_pass, #save_passs').prop("disabled", false);
    url = baseUrl +'/users/update_pass?id='+btoa(idh);
}

function del(idh){
    var data_str = "id="+btoa(idh);
    del_data(data_str, "Bạn có chắc chãn muốn xóa bản ghi này?", baseUrl + '/users/del', '#list-data', baseUrl + '/users/json?page='+page+'&q='+keyword);
}

function save(){
    var required = $('#fm input, #fm textarea, #fm select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-data', '#list-data',  baseUrl+'/users/json?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function save_pass(){
    var required = $('#fm-pass input, #fm-pass textarea, #fm-pass select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_reject('#fm-pass', url, baseUrl + '/users'); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function save_update(){
    var required = $('#fm-update input, #fm-update textarea, #fm-update select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_reject('#fm-update', url, baseUrl + '/users'); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function change(idh, status){
    var data_str = "id="+btoa(idh)+'&status='+status;
    del_data(data_str, "Bạn có chắc chãn muốn xóa bản ghi này?", baseUrl + '/users/change', '#list-data', baseUrl + '/users/json?page='+page+'&q='+keyword);
}

function search(){
    var q = $('#nav-search-input').val();
    keyword = (q.length != 0) ? q.replaceAll(" ", "$", 'g') : '';
    $('#list-data').load(baseUrl + '/users/json?page=1&q='+keyword);
}

function view_page_user(pages){
    page= pages;
    $('#list-data').load(baseUrl + '/users/json?page='+page+'&q='+keyword);
}