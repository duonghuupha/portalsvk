function save_block_9(){
    var required = $('#fm-block-9 input, #fm-block-9 textarea, #fm-block-9 select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_reject('#fm-block-9', baseUrl + '/block_night/update', baseUrl+'/decoration'); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}