$(document).ready(function(){
    $('#AddProduct').submit(function(event){
        console.log("validation works");
        var select_main = $('name="pMainCat"');
        var select_sub = $('name="psubCat"');
        var select_brand = $('name="pBrand"');
        var select_sup = $('name="pSupplier"');
        var product_name = $.trim($('input[name="pName"]'));
        var product_desc = $.trim($('textarea[name="pDesc"]'));
        var product_UnitPrice = $.trim($('input[name="pUnitPrice"]'));
        var product_SellingPrice = $.trim($('input[name="pSalePrice"]'));

        $('.myinputText').removeClass('is-invalid');
        $('.myselect').removeClass('is-invalid');
        $('.myinputTextArea').removeClass('is-invalid');
        restError();
        var isValid_select_main = true;
        var isValid_select_sub = true;
        var isValid_select_brand = true;
        var isValid_select_sup = true;
        var isValid_product_name = true;
        var isValid_product_desc = true;
        var isValid_product_UnitPrice = true;
        var isValid_product_SellingPrice = true;

        if(parseInt(select_main.val()) === 0){
            $('.myselect').addClass('is-invalid');
            $('#strMainError').html('Please select a Main Category');
            isValid_select_main = false;
        }

        if(parseInt(select_sub.val()) === 0){
            $('.myselect').addClass('is-invalid');
            $('#strSubError').html('Please select a Sub Category');
            isValid_select_sub = false;
        }

        if(parseInt(select_brand.val()) === 0){
            $('.myselect').addClass('is-invalid');
            $('#strBrandError').html('Please select a Brand');
            isValid_select_brand = false;
        }

        if(parseInt(select_sup.val()) === 0){
            $('.myselect').addClass('is-invalid');
            $('#strSupError').html('Please select a Supplier');
            isValid_select_sup = false;
        }

        if(product_name.val() === ''){
            $('.myinputText').addClass('is-invalid');
            $('#strPNameError').html('This field is required');
            isValid_product_name = false;
        }
        if(product_desc.val() === ''){
            $('.myinputTextArea').addClass('is-invalid');
            $('#strPDescError').html('This field is required');
            isValid_product_desc = false;
        }

        if(product_UnitPrice.val() === ''){
            $('.myinputText').addClass('is-invalid');
            $('#strPUnitError').html('This field is required');
            isValid_product_UnitPrice = false;
        }else if(parseFloat(product_UnitPrice.val()) || parseInt(product_UnitPrice.val())){
            isValid_product_UnitPrice = true;
        }else{
            $('.myinputText').addClass('is-invalid');
            $('#strPUnitError').html('Invalid values entered');
            isValid_product_UnitPrice = false;
        }

        if(product_SellingPrice.val() === ''){
            $('.myinputText').addClass('is-invalid');
            $('#strPSellError').html('This field is required');
            isValid_product_SellingPrice = false;
        }else if(parseFloat(product_SellingPrice.val()) || parseInt(product_SellingPrice.val())){
            isValid_product_SellingPrice = true;
        }else{
            $('.myinputText').addClass('is-invalid');
            $('#strPSellError').html('Invalid values entered');
            isValid_product_SellingPrice = false;
        }

        if(isValid_select_main && isValid_select_sub && isValid_select_brand && isValid_select_sup && isValid_product_name && isValid_product_desc && isValid_product_UnitPrice && isValid_product_SellingPrice){
            
        }else{
            event.preventDefault();
        }
        

    });
});

function restError(){
    $('#strMainError').html('');
    $('#strSubError').html('');
    $('#strBrandError').html('');
    $('#strSupError').html('');
    $('#strPNameError').html('');
    $('#strPDescError').html('');
    $('#strPUnitError').html('');
    $('#strPSellError').html('');
}