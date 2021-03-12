(function( $ ) {
	'use strict';

	// var fd = new FormData();
	// fd.append('action', 'slidesearch_upload_slides');
	var fileUploader = $("#slidesearch-fileuploader").uploadFile({
		url: slidsearch.ajaxurl,
		fileName: "slidesearchFile",
		sequential: true,
		sequentialCount: 1,
		acceptFiles:".ppt, .pptx",
		// showDone: true,
		showDelete: true,
		// showDownload: true,
		showAbort: true,
		// formdata: fd,
		// autoSubmit: false,
		// dynamicFormData: function() {
		// 	return fd
		// },
		uploadButtonClass: 'button button-primary file-upload-button',
		extraHTML:function() {
			var html = "<div class='add-tags'>"
					html += "<input type='hidden' name='action' value='slidesearch_upload_slides' />";
					html += "<label for='tags'>Add Tags:</label><input type='text' name='tags' value='' />";
					html += "<button class='button button-primary' onclick='fillTags()'>Add Tags</button>";
					html += "</div>";
			return html;
		},
		fillTags: function() {
			console.log('>> fill tags');
		},
		onSubmit:function(files) {
			console.log('>> files', fileUploader);
			// $.ajax({
			// 	url: slidsearch.ajaxurl,
			// 	type: 'POST',
			// 	data: ({ action: 'slidesearch_upload_slides', files: files }),
			// 	success: function (response) {
			// 		console.log("got this: " + response);
			// 		return 'file-uploaded'
			// 	}
			// });
			// $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Submitting:"+JSON.stringify(files));
			// return true;
		},
		onSuccess:function(files,data,xhr,pd) {
			console.log('>> onSuccess files', files );
			console.log('>> onSuccess data', data );
			console.log('>> onSuccess xhr', xhr );
			console.log('>> onSuccess pd', pd );
		},
		afterUploadAll:function(obj) {
			// console.log('>> afterUploadAll', obj );
		},
		onError: function(files,status,errMsg,pd) {
			// console.log('>> onError', status );
		},
		onCancel:function(files,pd) {
			// $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Canceled  files: "+JSON.stringify(files));
		}
	});

	fileUploader.getResponses( function ( res ) {
		console.log('>> getRes', res );
	});


	$("#start-uploading").click(function() {
		// console.log('>> data', fileUploader );
		// $.ajax({
		// 	url: slidsearch.ajaxurl,
		// 	type: 'POST',
		// 	data: (
		// 		{ action: 'slidesearch_upload_slides' }
		// 	),
		// 	success: function (response) {
		// 		console.log("got this: " + response);
		// 	}
		// });
		fileUploader.startUpload();
	});


	// const fileElement = document.getElementById("slidesearch-file");
	// fileElement.addEventListener("change", handleFiles, false);
	// function handleFiles() {
	// 	var fileList = this.files;
	// 	var data = new FormData();
	// 	for( var i = 0; i < fileList.length; i++ ) {
	// 		// data.append('files[' + i + ']', fileList[i]);
	// 		data.append('files[' + i + ']', fileList[i]);
	// 		data.append('action', 'slidesearch_upload_slides');
	// 		displayFiles( i, fileList[i] );
	// 		uploadFile( data );
	// 	}
	//
	// }
	//
	// function displayFiles( count, file ) {
	// 	console.log('>> files', file);
	// 	var html = '<div class="item">' +
	// 		// '<span>' + parseInt( count, 10) + 1 + '</span>' +
	// 		'<div class="title"><strong>' + file.name + '</strong> ' +
	// 		'<span>(' + bytesToMegaBytes(file.size) + 'MB)</span></div>' +
	// 		'<div class="progress"><span style="width: 1%"></span></div>' +
	// 		'</div>';
	//
	// 	document.getElementById('files-list').innerHTML += html;
	// }
	//
	// function uploadFile( data ) {
	// 	$.ajax({
	// 		url: slidsearch.ajaxurl,
	// 		xhr: function() {
	// 			var xhr = new window.XMLHttpRequest();
	// 			xhr.upload.addEventListener("progress", function(evt) {
	// 				if (evt.lengthComputable) {
	// 					var percentComplete = parseInt(((evt.loaded / evt.total) * 100));
	// 					// $("#progress-bar").width(percentComplete + '%');
	// 					// $("#progress-bar").html(percentComplete+'%');
	// 					console.log('>> precentage', percentComplete);
	// 				}
	// 			}, false);
	// 			return xhr;
	// 		},
	// 		type: 'POST',
	// 		data: data,
	// 		contentType: false,
	// 		processData: false,
	// 		complete: function() {
	// 			console.log('>> complete');
	// 		},
	// 		success: function(data) {
	// 			console.log('>> success', data);
	// 		},
	// 		error: function() {
	// 			console.log('>> error');
	// 		}
	// 	});
	// }
	//
	// function bytesToMegaBytes(bytes) {
	// 	return (bytes / (1024*1024)).toFixed(2);
	// }

})( jQuery );
