/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// Loaded before CoreUI app.js
import '../bootstrap';
import 'pace';
//import '@ckeditor/ckeditor5-build-classic/build/ckeditor.js';
//import '@ckeditor/ckeditor5-build-classic';
// Core - these two are required :-)
// import 'tinymce/tinymce';
// import 'tinymce/themes/silver/theme';

// // Plugins
// import 'tinymce/plugins/paste/plugin';
// import 'tinymce/plugins/link/plugin';
// import 'tinymce/plugins/autoresize/plugin';

import Quill from 'quill';
window.Quill = Quill;

import '../plugins';
