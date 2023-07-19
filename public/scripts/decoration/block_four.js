function save_block_4(){
    var required = $('#fm-block-4 input, #fm-block-4 textarea, #fm-block-4 select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_reject('#fm-block-4', baseUrl + '/block_four/update', baseUrl+'/decoration'); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}