/*! For license information please see alipay.js.LICENSE.txt */
!function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=8)}({8:function(e,t,r){e.exports=r("HToU")},HToU:function(e,t){function r(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}new function e(t){var n=this;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),r(this,"setupStripe",(function(){return n.stripe=Stripe(n.key),n})),r(this,"handle",(function(){var e={type:"alipay",amount:document.querySelector('meta[name="amount"]').content,currency:document.querySelector('meta[name="currency"]').content,redirect:{return_url:document.querySelector('meta[name="return-url"]').content}};document.getElementById("pay-now").addEventListener("submit",(function(t){t.preventDefault(),n.stripe.createSource(e).then((function(e){if(e.hasOwnProperty("source"))return window.location=e.source.redirect.url;this.errors.textContent="",this.errors.textContent=e.error.message,this.errors.hidden=!1}))}))})),this.key=t,this.errors=document.getElementById("errors")}(document.querySelector('meta[name="stripe-publishable-key"]').content).setupStripe().handle()}});