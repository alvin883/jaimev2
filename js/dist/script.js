"use strict";jQuery(document).ready(function(){var t=jQuery;t(".header-slider").slick({arrows:!0,dots:!1,autoplay:!0,autoplaySpeed:7e3,swipeToSlide:!0}),function(e="just_anonym883"){var a={};function s(t){return t>1e3&&(t=t/1e3-parseInt(t/1e3)>0?parseFloat(t/1e3).toFixed(1):parseInt(t/1e3),t+="k"),t}if(!t("#instagram_slider").length)return!1;(n=e,fetch("https://www.instagram.com/"+n+"/").then(t=>t.text()).then(t=>{t;const e=function(t){return(new DOMParser).parseFromString(t,"text/html")}(t),a=function(t){const e=Array.from(t.querySelectorAll("script")).filter(t=>t.textContent.indexOf("_sharedData")>-1)[0];if(e){const t=e.textContent.trim().match(/\=\ (.*);/)[1];let a;try{a=JSON.parse(t)}catch(e){console.log("Failed to parse Instagram data. See `window.__FAIL_TXT`"),window.__FAIL_TXT=t}return a}}(e);return a}).catch(t=>{console.log("Was unable to reach Instagram"),console.debug(t)})).then(e=>{var n=e.entry_data.ProfilePage[0].graphql.user;return a.DOM=n.edge_owner_to_timeline_media.edges.reduce((t,e)=>t+'<div class="item" data-url="https://www.instagram.com/p/'+e.node.shortcode+'" onclick="gotoURL(this)">\n\t\t\t\t\t\t\t<img src="'+e.node.thumbnail_src+'"/>\n\t\t\t\t\t\t\t<div class="detail">\n\t\t\t\t\t\t\t\t<span><i class="fas fa-heart"></i></span><span>'+s(e.node.edge_liked_by.count)+'</span>\n\t\t\t\t\t\t\t\t<span class="divider"></span>\n\t\t\t\t\t\t\t\t<span><i class="fas fa-comment"></i></span><span>'+s(e.node.edge_media_to_comment.count)+"</span>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>",""),a.followers=s(n.edge_followed_by.count),a.posts=s(n.edge_owner_to_timeline_media.count),t("#instagram_slider").find(".content").html(a.DOM),t("#instagram_posts").html(a.posts),t("#instagram_followers").html(a.followers),!0}).then(()=>{t(".instagram-slider").slick({arrows:!0,dots:!1,autoplay:!0,slidesToShow:1,variableWidth:!0,autoplaySpeed:7e3,swipeToSlide:!0})});var n}("danielkordan"),t("#search-submit").click(function(){if(!t("#searchstring").val())return!1}),t("input,textarea").on("blur",function(){var e=t(this).val();e&&""!=e?t(this).addClass("active"):t(this).removeClass("active")}),t(".js__to-top-page").click(function(){t("html, body").animate({scrollTop:0},300)}),t(".js__toggle-searchbar").click(function(){return t("#searchpage").hasClass("active")?t("#searchpage").removeClass("active"):(t("#searchstring").trigger("focus"),t("#searchpage").addClass("active"))}),t(".js__popup-close").click(function(){t("#popup").removeClass("active")}),t("#subscribe-email").submit(function(e){e.preventDefault();var a=t("#subscribe-email");t.ajax({url:a.attr("action").replace("/post?","/post-json?").concat("&c=?"),data:a.serialize(),cache:!1,dataType:"json",contentType:"application/json; charset=utf-8",error:function(e){t("#popup").find(".title").html("Error !"),t("#popup").find(".message").html("There is a problem, please try again !"),t("#popup").outerHeight(),t("#popup").addClass("active")},success:function(e){var a,s;console.log(e),"success"!=e.result?(a="Error !",s=e.msg.indexOf("enter a value")>-1?"Please fill the form":e.msg):(a="Success !",s="Thank you for subscribing my newsletter :)"),t("#popup").find(".title").html(a),t("#popup").find(".message").html(s),t("#popup").outerHeight(),t("#popup").addClass("active")}})})});