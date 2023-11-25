$(document).on("click","#fotoPorDefecto",function () {
    $("#FotoPersona").click();
    
});

$(document).on("change","#FotoPersona",function () {
    
    console.log(this.files);
    var fil=this.files;
    var elemet;
    var Soportado=['image/jpeg','image/png','image/gif'];
    var seEncontro =false;

    for (var i = 0; i < fil.length; i++) {
         elemet = fil[i];

         if (Soportado.indexOf(elemet.type) !=-1) {
             createPreview(elemet);
             
         }
       
        

    }

    if (fil.length>0) {
        $("#fotos").remove();
    }else{
        var imghacer=$('<div id="fotoPorDefecto"> <img src="src/img/elijaPerfil.png" id="fotos" class="img-fluid ImagePerfil" alt="Sample image" id="Fotoperfil"> </div>');
        $(imghacer).insertAfter('#imagensi');
    }

    
    
    
   
});

$(document).on("click",".FotoSubida", function (e) {
    $(this).remove();
})
