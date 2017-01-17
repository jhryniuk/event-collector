$(function () {
    fckconfig_common = {
        skin: 'BootstrapCK-Skin',
        contentsCss: ['http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic&subset=latin,latin-ext', '/bundles/lsmain/css/editor.css'],
        bodyClass: 'editor',
        stylesSet: [
            {name: 'Normalny', element: 'p', attributes: {'class': ''}},
            {name: 'Nagłówek', element: 'p', attributes: {'class': 'header'}},
            {name: 'Pomarańczowy', element: 'span', attributes: {'class': 'orange'}},
            {name: 'Ciemny', element: 'span', attributes: {'class': 'dark'}}
        ],
        filebrowserBrowseUrl: '/bundles/lsadmin/kcfinder/browse.php?type=files',
        filebrowserImageBrowseUrl: '/bundles/lsadmin/kcfinder/browse.php?type=images',
        filebrowserFlashBrowseUrl: '/bundles/lsadmin/kcfinder/browse.php?type=flash',
        filebrowserUploadUrl: '/bundles/lsadmin/kcfinder/upload.php?type=files',
        filebrowserImageUploadUrl: '/bundles/lsadmin/kcfinder/upload.php?type=images',
        filebrowserFlashUploadUrl: '/bundles/lsadmin/kcfinder/upload.php?type=flash'
    };

    fckconfig = jQuery.extend(true, {
        height: '400px',
        width: 'auto'
    }, fckconfig_common);

    $('.wysiwyg').ckeditor(fckconfig);
});