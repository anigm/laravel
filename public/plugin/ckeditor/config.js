/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.skin='office2013';
	//从word中粘贴内容时是否移除格式
	config.pasteFromWordRemoveStyles = true;
	//是否强制复制来的内容去除格式,false为不去除  
	config.forcePasteAsPlainText = true;
	config.image_previewText=' ';
	config.filebrowserImageUploadUrl = "/plugin/ckeditor/plugins/imgupload/imgupload.php";
	config.filebrowserBrowseUrl = "/plugin/ckeditor/plugins/imgbrowse/imgbrowse.html?imgroot=/ckeditor/";
	config.font_names='宋体/宋体, SimSun;'+'微软雅黑/微软雅黑, Microsoft YaHei;'+'黑体/黑体, SimHei;'+'楷体/楷体, 楷体_GB2312, SimKai;'+'隶书/隶书, SimLi;'+ config.font_names;
	config.defaultLanguage = 'zh-cn'
	config.font_defaultLabel = '宋体';
	config.height = 400;
	//去掉BR
	config.enterMode = CKEDITOR.ENTER_BR;
	//去掉P
	config.shiftEnterMode = CKEDITOR.ENTER_P;
	config.extraPlugins = 'clipboard，lineutils,widget,dialog,codesnippet';
};
