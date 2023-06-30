$(document).ready(function(){
    $('.add-offer-private').click(function(){      
        $.ajax({
            url: "addOffer.php",
            type : "POST",
            data: {value:"private"},
            success: function(response){
                $(".modal-content").html(response);
                $("#add-Offer-modal").modal('show');
            }
        });
    });
});

$(document).ready(function(){
    $('.add-offer-public').click(function(){      
        $.ajax({
            url: "addOffer.php",
            type : "POST",
            data: {value:"public"},
            success: function(response){
                $(".modal-content").html(response);
                $("#add-Offer-modal").modal('show');
            }
        });
    });
});

function preview(){
    let btnAdd = document.getElementById("btnAdd");
    let fileInput = document.getElementById("file-input");
    let imageContainer = document.getElementById("images");
    let strError = document.getElementById("strErr");
    strError.style.color = "red";
    if(fileInput.files.length < 1){
        document.getElementById("btnAdd").disabled = true;
        fileInput.setAttribute("class","form-control myChooseFile is-invalid ");
        strError.innerHTML = "you must select a image";
        
    }else if(fileInput.files.length > 1){
        document.getElementById("btnAdd").disabled = true;
        fileInput.setAttribute("class","form-control myChooseFile is-invalid ");
        strError.innerHTML = "Maximum images you could select is 1";
    }else{
        document.getElementById("btnAdd").disabled = false;
        fileInput.setAttribute("class","form-control myChooseFile");
        strError.style.color = "green";
        strError.innerHTML = "looks good !";
        imageContainer.innerHTML = "";
        var x = 1;
        for(i of fileInput.files){
            
            let reader = new FileReader();
            let figure = document.createElement("div");
            let figCap = document.createElement("figcaption");
            figCap.innerText = "image "+x;
            x++;
            figure.appendChild(figCap);
            figure.setAttribute("class","col");
            reader.onload=()=>{
                let img = document.createElement("img");
                img.setAttribute("src",reader.result);
                img.setAttribute("class","img img-file");
                figure.insertBefore(img,figCap);
            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }

}