function createPreview(file) {
    var imgcode=URL.createObjectURL(file);
    var img=$(' <div class="FotoSubida" id="fotoPorDefecto" style="margin-top: 5%;"><img "height: 800px" width: "534px" src="'+ imgcode +'" " class="img-fluid ImagePerfil" alt="Sample image"></div>');
    $(img).insertAfter('#imagensi');
    
    
}