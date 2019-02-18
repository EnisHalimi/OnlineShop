
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/autocomplete.js';
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('example-component', require('./components/ExampleComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app'
});

var myvar = [''];
function getData() {
  $.ajax({
    url: "../search", 
    success: function(data){
      myvar=jQuery.makeArray(data);
      $( "#search" ).autocomplete({
        source:  function(request, response) {
          var results = $.ui.autocomplete.filter(myvar, request.term);
          response(results.slice(0, 15));
      },
        minLength: 2,
        classes: {
          "ui-autocomplete": "highlight"
        }
      });
      $( "#aksionPID" ).autocomplete({
        source:  function(request, response) {
          var results = $.ui.autocomplete.filter(myvar, request.term);
          response(results.slice(0, 15));
      },
        minLength: 2,
        classes: {
          "ui-autocomplete": "highlight"
        }
      });
    }});
}

var myvar2 = [''];
function getData2() {
  $.ajax({
    url: "subjekt", 
    success: function(data){
        myvar2=jQuery.makeArray(data);
      $( "#porosiSubjekti" ).autocomplete({
        source:  function(request, response) {
          var results = $.ui.autocomplete.filter(myvar2, request.term);
          response(results.slice(0, 15));
      },
        minLength: 2,
        classes: {
          "ui-autocomplete": "highlight"
        }
      });
    }});
}
getData2();
getData();
$(document).ready(function(){
    if(!localStorage.View)
    {
        localStorage.View = 1;
    }
    else
    {
        if(localStorage.View == 1){
            $("#table-view-toggle").attr("disabled", "disabled");
            $("#card-view-toggle").removeAttr("disabled", "disabled");
            $("#card-view").hide();
        }
        else
        {
            $("#card-view-toggle").attr("disabled", "disabled");
            $("#table-view-toggle").removeAttr("disabled", "disabled");   
            $("#products").hide();   
        }    
    }
    $("#card-view-toggle").click(function(){
                $("#card-view-toggle").attr("disabled", "disabled");
                $("#table-view-toggle").removeAttr("disabled", "disabled");
                $("#products").hide();
                $("#card-view").show();
                localStorage.View = 2;
    });
    $("#table-view-toggle").click(function(){
                $("#table-view-toggle").attr("disabled", "disabled");
                $("#card-view-toggle").removeAttr("disabled", "disabled");
                $("#products").show();
                $("#card-view").hide();
                localStorage.View = 1;
    });

    $("#sel1").change(function() {
        var value = $(this).val().toLowerCase();
        $("#products tr").filter(function() {
            if(value == "brendi")
                $("#products tr").show();
            else
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});