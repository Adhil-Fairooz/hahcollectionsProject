$(document).ready(function(){
    $('.my-modal-content').on('click','.minus',function(e){
        e.preventDefault();
        console.log('clicked')
        let currentValue = parseInt($("#qty").val());
        if(currentValue === 1){
            $("#qty").val(currentValue);
        }else{
            let decreasedValue = currentValue - 1;
            $("#qty").val(decreasedValue);
        }
        
    });
    $('.my-modal-content').on('click','.plus',function(e){
        e.preventDefault();
        console.log('clicked')
        let currentValue = parseInt($("#qty").val());
        let increasedValue = currentValue + 1;
        $("#qty").val(increasedValue);
    });
});
