/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) { 
    config.filebrowserBrowseUrl = 'http://localhost:8080/php/MobileShop/public/templateEditor/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'http://localhost:8080/php/MobileShop/public/templateEditor/ckfinder/ckfinder.html?Type=Images';
    config.filebrowserUploadUrl = 'http://localhost:8080/php/MobileShop/public/templateEditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'http://localhost:8080/php/MobileShop/public/templateEditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserWindowWidth  = '1000';
    config.filebrowserWindowHeight  = '700';
};