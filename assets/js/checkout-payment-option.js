$( document ).ready(function() {
    // cod
    COD_ADDRESS_enable();
    COD_contact_enable();
    $('#COD_Address_edit').click(function(){
        COD_ADDRESS_disable();
    });
    $('#COD_Address_save').click(function(){
        COD_ADDRESS_enable();
    });
    $('#COD_Contact_edit').click(function(){
        COD_contact_disable();
    });
    $('#COD_Contact_save').click(function(){
        COD_contact_enable();
    });
    //*************************************** */
});
//COD
function COD_ADDRESS_enable(){
    $('textarea[name="deliveryCODAddress"]').prop('disabled',true);
    $('#COD_Address_edit').show();
    $('#COD_Address_save').hide();
}
function COD_ADDRESS_disable(){
    $('textarea[name="deliveryCODAddress"]').prop('disabled',false);
    $('#COD_Address_edit').hide();
    $('#COD_Address_save').show();
}
function COD_contact_enable(){
    $('input[name="CODContact"]').prop('disabled',true);
    $('#COD_Contact_edit').show();
    $('#COD_Contact_save').hide();
}
function COD_contact_disable(){
    $('input[name="CODContact"]').prop('disabled',false);
    $('#COD_Contact_edit').hide();
    $('#COD_Contact_save').show();
}
