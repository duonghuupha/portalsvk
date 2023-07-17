var url = '', page = 1;
$(function(){
    $('#list-data').load(baseUrl + '/decoration/json');
});

function add(){
    $('#modal-data').modal('show');
    url = baseUrl + '/decoration/add';
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
        save_form_modal('#fm', url, '#modal-data', '#list-data',  baseUrl+'/decoration/json'); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_decoration(pages){
    page = pages;
    $('#list-data').load(baseUrl + '/decoration/json?page='+page);
}

function change(idh, status){
    var data_str = "id="+btoa(idh)+'&status='+status+'&type=1';
    del_data(data_str, "Bạn có chắc chắn muốn cập nhật trạng thái cho bảng ghi này?", baseUrl + '/decoration/change', '#list-data', baseUrl + '/decoration/json?page='+page);
}
/////////////////////////////////////////////////////////////////////////////////////////////////
function edit_cell(idh, value){
    $('#orderblock_'+idh).hide(); $('#btn_edit_'+idh).hide(); 
    $('#order_'+idh).show(); $('#btn_save_'+idh).show(); 
}

function save_cell(idh){
    var data_str = "id="+btoa(idh)+'&value='+$('#order_'+idh).val()+'&type=2';
    del_data(data_str, "Bạn có chắc chắn muốn thay đổi vị trí của block?", baseUrl + '/decoration/change', '#list-data', baseUrl + '/decoration/json?page='+page);
}