tinymce.init({
    selector: "textarea",
    theme: "modern",
    content_css: ["../../../css/front.css", "../../../css/bootstrap.min.css"],
    mode: "exact",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons ",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ],
    style_formats: [
    {title: "Headers", items: [
        {title: "Header 1", format: "h1"},
        {title: "Header 2", format: "h2"},
        {title: "Header 3", format: "h3"},
        {title: "Header 4", format: "h4"},
        {title: "Header 5", format: "h5"},
        {title: "Header 6", format: "h6"}
        ]},
    {title: "Inline", items: [
        {title: "Bold", icon: "bold", format: "bold"},
        {title: "Italic", icon: "italic", format: "italic"},
        {title: "Underline", icon: "underline", format: "underline"},
        {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
        {title: "Superscript", icon: "superscript", format: "superscript"},
        {title: "Subscript", icon: "subscript", format: "subscript"},
        {title: "Code", icon: "code", format: "code"}
        ]},
    {title: "Blocks", items: [
        {title: "Paragraph", format: "p"},
        {title: "Blockquote", format: "blockquote"},
        {title: "Div", format: "div"},
        {title: "Pre", format: "pre"}
        ]},
    {title: "Alignment", items: [
        {title: "Left", icon: "alignleft", format: "alignleft"},
        {title: "Center", icon: "aligncenter", format: "aligncenter"},
        {title: "Right", icon: "alignright", format: "alignright"},
        {title: "Justify", icon: "alignjustify", format: "alignjustify"}
        ]},
    {title: "Private", items: [
        {title: "Zegar", block: "div", classes: 'clock'},
        {title: "Two", format: "aligncenter"},
        {title: "Three", format: "alignright"},
        {title: "Four", format: "alignjustify"}
        ]}
    ]
    // file_browser_callback :
    // function(field_name, url, type, win){
    //     var filebrowser = "filebrowser.php";
    //     filebrowser += (filebrowser.indexOf("?") < 0) ? "?type=" + type : "&type=" + type;
    //     tinymce.activeEditor.windowManager.open({
    //         title : "Insert File",
    //         width : 520,
    //         height : 400,
    //         url : 'loader'
    //     }, {
    //     window : win,
    //     input : field_name
    //     });
    //     return false;
    // }
});