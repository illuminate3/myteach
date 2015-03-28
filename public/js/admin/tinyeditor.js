(function(){
    tinyMCE.init({
        selector: "textarea#editor1",
        plugins: [
            "save",
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste jbimages"
        ],
        width : '980px',
        height : '480px',
        toolbar: "save | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        relative_urls: false,
        save_enablewhendirty : false,
        theme_advanced_buttons3_add : "save",
        save_onsavecallback: function() {console.log("Save");}
    });
}());
