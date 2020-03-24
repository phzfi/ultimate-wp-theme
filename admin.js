/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/admin.js":
/*!****************************!*\
  !*** ./assets/js/admin.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

// FIXME: This is a workaround for enabling hero image button in the admin panel
if ($ === undefined) {
  var $ = jQuery;
}

$(function () {
  $('a[href*=#]').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top
    }, 500, 'linear');
  });
}); //User Image Uploader

upload = function upload(id) {
  tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');

  window.send_to_editor = function (html) {
    imgurl = jQuery('img', html).attr('src');
    id = '#' + id;
    jQuery(id).val(imgurl);
    tb_remove();
    $('body').append('<div id="temp_image">' + html + '</div>');
    var img = $('#temp_image').find('img');
    imgurl = img.attr('src');
    imgclass = img.attr('class');
    imgid = parseInt(imgclass.replace(/\D/g, ''), 10);
    $('#upload_image_id').val(imgid);
    $('#remove-hero_image').show();
  };

  return false;
};

uploadPost = function uploadPost(id, post_id) {
  // save the send_to_editor handler function
  window.send_to_editor_default = window.send_to_editor;
  $('#set-' + id).click(function () {
    // replace the default send_to_editor handler function with our own
    window.send_to_editor = window.attach_image;
    tb_show('', 'media-upload.php?post_id=' + post_id + '&amp;type=image&amp;TB_iframe=true');
    return false;
  }); // handler function which is invoked after the user selects an image from the gallery popup.
  // this function displays the image and sets the id so it can be persisted to the post meta

  window.attach_image = function (html) {
    // turn the returned image html into a hidden image element so we can easily pull the relevant attributes we need
    $('body').append('<div id="temp_image">' + html + '</div>');
    var img = $('#temp_image').find('img');
    imgurl = img.attr('src');
    imgclass = img.attr('class');
    imgid = parseInt(imgclass.replace(/\D/g, ''), 10);
    $('#' + id + '_input').val(imgid);
    $('#remove-' + id).show();
    $('img#' + id).attr('src', imgurl);

    try {
      tb_remove();
    } catch (e) {}

    ;
    $('#temp_image').remove();
  };
};

remove = function remove(id) {
  window.send_to_editor_default = window.send_to_editor;
  $('#' + id_ + '_input').val('');
  $('img').attr('src', '');
  $(this).hide();
  return false; // restore the send_to_editor handler function

  window.send_to_editor = window.send_to_editor_default;
};

/***/ }),

/***/ "./assets/scss/app.scss":
/*!******************************!*\
  !*** ./assets/scss/app.scss ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************!*\
  !*** multi ./assets/js/admin.js ./assets/scss/app.scss ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/timoaho/workspace/theme/ultimate-wp-theme/assets/js/admin.js */"./assets/js/admin.js");
module.exports = __webpack_require__(/*! /home/timoaho/workspace/theme/ultimate-wp-theme/assets/scss/app.scss */"./assets/scss/app.scss");


/***/ })

/******/ });