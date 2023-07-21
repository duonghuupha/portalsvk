function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_reject('#fm', baseUrl + '/setting/update',  baseUrl+'/setting'); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}
