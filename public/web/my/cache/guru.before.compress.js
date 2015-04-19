$(function(){$("[data-method]:not(:has(form))").append(function(){return"\n<form action='"+$(this).attr("href")+"' method='POST' style='display:none'>\n   <input type='hidden' name='_method' value='"+$(this).attr("data-method")+"'>\n   <input type='hidden' name='datum' class='datum' value='"+$(this).attr("data-datum")+"'>\n</form>\n"}).removeAttr("href").attr("style","cursor:pointer;").attr("onclick",'$(this).find("form").submit();')});
/*
 HTML5 Shiv prev3.7.1 | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed
*/
window.Modernizr=function(h,e,n){function m(d,b){return typeof d===b}function D(d,b){for(var v in d){var a=d[v];if(!~(""+a).indexOf("-")&&g[a]!==n)return"pfx"==b?a:!0}return!1}function c(d,b,v){var a=d.charAt(0).toUpperCase()+d.slice(1),e=(d+" "+E.join(a+" ")+a).split(" ");if(m(b,"string")||m(b,"undefined"))return D(e,b);e=(d+" "+F.join(a+" ")+a).split(" ");a:{d=e;for(var f in d)if(a=b[d[f]],a!==n){b=!1===v?d[f]:m(a,"function")?a.bind(v||b):a;break a}b=!1}return b}function J(){f.input=function(d){for(var b=
0,a=d.length;b<a;b++)r[d[b]]=!!(d[b]in k);r.list&&(r.list=!(!e.createElement("datalist")||!h.HTMLDataListElement));return r}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" "));f.inputtypes=function(d){for(var b=0,a,q,f=d.length;b<f;b++){k.setAttribute("type",q=d[b]);if(a="text"!==k.type)k.value=":)",k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(q)&&k.style.WebkitAppearance!==n?(l.appendChild(k),a=e.defaultView,a=a.getComputedStyle&&
"textfield"!==a.getComputedStyle(k,null).WebkitAppearance&&0!==k.offsetHeight,l.removeChild(k)):/^(search|tel)$/.test(q)||(a=/^(url|email)$/.test(q)?k.checkValidity&&!1===k.checkValidity():":)"!=k.value);G[d[b]]=!!a}return G}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var f={},l=e.documentElement,a=e.createElement("modernizr"),g=a.style,k=e.createElement("input"),H={}.toString,w=" -webkit- -moz- -o- -ms- ".split(" "),E=["Webkit","Moz","O","ms"],
F=["webkit","moz","o","ms"],a={},G={},r={},y=[],z=y.slice,x,p=function(d,b,a,q){var f,h,c=e.createElement("div"),k=e.body,g=k||e.createElement("body");if(parseInt(a,10))for(;a--;)f=e.createElement("div"),f.id=q?q[a]:"modernizr"+(a+1),c.appendChild(f);a=['&#173;<style id="smodernizr">',d,"</style>"].join("");c.id="modernizr";(k?c:g).innerHTML+=a;g.appendChild(c);k||(g.style.background="",g.style.overflow="hidden",h=l.style.overflow,l.style.overflow="hidden",l.appendChild(g));d=b(c,d);k?c.parentNode.removeChild(c):
(g.parentNode.removeChild(g),l.style.overflow=h);return!!d},I=function(){var d={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return function(b,a){a=a||e.createElement(d[b]||"div");b="on"+b;var f=b in a;f||(a.setAttribute||(a=e.createElement("div")),a.setAttribute&&a.removeAttribute&&(a.setAttribute(b,""),f=m(a[b],"function"),m(a[b],"undefined")||(a[b]=n),a.removeAttribute(b)));return f}}(),A={}.hasOwnProperty,B;B=m(A,"undefined")||m(A.call,"undefined")?
function(d,a){return a in d&&m(d.constructor.prototype[a],"undefined")}:function(d,a){return A.call(d,a)};Function.prototype.bind||(Function.prototype.bind=function(d){var a=this;if("function"!=typeof a)throw new TypeError;var f=z.call(arguments,1),e=function(){if(this instanceof e){var c=function(){};c.prototype=a.prototype;var c=new c,g=a.apply(c,f.concat(z.call(arguments)));return Object(g)===g?g:c}return a.apply(d,f.concat(z.call(arguments)))};return e});a.flexbox=function(){return c("flexWrap")};
a.flexboxlegacy=function(){return c("boxDirection")};a.canvas=function(){var a=e.createElement("canvas");return!(!a.getContext||!a.getContext("2d"))};a.canvastext=function(){return!(!f.canvas||!m(e.createElement("canvas").getContext("2d").fillText,"function"))};a.webgl=function(){return!!h.WebGLRenderingContext};a.touch=function(){var a;"ontouchstart"in h||h.DocumentTouch&&e instanceof DocumentTouch?a=!0:p(["@media (",w.join("touch-enabled),("),"modernizr){#modernizr{top:9px;position:absolute}}"].join(""),
function(b){a=9===b.offsetTop});return a};a.geolocation=function(){return"geolocation"in navigator};a.postmessage=function(){return!!h.postMessage};a.websqldatabase=function(){return!!h.openDatabase};a.indexedDB=function(){return!!c("indexedDB",h)};a.hashchange=function(){return I("hashchange",h)&&(e.documentMode===n||7<e.documentMode)};a.history=function(){return!(!h.history||!history.pushState)};a.draganddrop=function(){var a=e.createElement("div");return"draggable"in a||"ondragstart"in a&&"ondrop"in
a};a.websockets=function(){return"WebSocket"in h||"MozWebSocket"in h};a.rgba=function(){g.cssText="background-color:rgba(150,255,150,.5)";return!!~(""+g.backgroundColor).indexOf("rgba")};a.hsla=function(){g.cssText="background-color:hsla(120,40%,100%,.5)";return!!~(""+g.backgroundColor).indexOf("rgba")||!!~(""+g.backgroundColor).indexOf("hsla")};a.multiplebgs=function(){g.cssText="background:url(https://),url(https://),red url(https://)";return/(url\s*\(.*?){3}/.test(g.background)};a.backgroundsize=
function(){return c("backgroundSize")};a.borderimage=function(){return c("borderImage")};a.borderradius=function(){return c("borderRadius")};a.boxshadow=function(){return c("boxShadow")};a.textshadow=function(){return""===e.createElement("div").style.textShadow};a.opacity=function(){var a=w.join("opacity:.55;")+"";g.cssText=a;return/^0.55$/.test(g.opacity)};a.cssanimations=function(){return c("animationName")};a.csscolumns=function(){return c("columnCount")};a.cssgradients=function(){var a=("background-image:-webkit-gradient(linear,left top,right bottom,from(#9f9),to(white));background-image:"+
w.join("linear-gradient(left top,#9f9, white);background-image:")).slice(0,-17);g.cssText=a;return!!~(""+g.backgroundImage).indexOf("gradient")};a.cssreflections=function(){return c("boxReflect")};a.csstransforms=function(){return!!c("transform")};a.csstransforms3d=function(){var a=!!c("perspective");a&&"webkitPerspective"in l.style&&p("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,f){a=9===b.offsetLeft&&3===b.offsetHeight});return a};
a.csstransitions=function(){return c("transition")};a.fontface=function(){var a;p('@font-face {font-family:"font";src:url("https://")}',function(b,f){var c=e.getElementById("smodernizr"),c=(c=c.sheet||c.styleSheet)?c.cssRules&&c.cssRules[0]?c.cssRules[0].cssText:c.cssText||"":"";a=/src/i.test(c)&&0===c.indexOf(f.split(" ")[0])});return a};a.generatedcontent=function(){var a;p('#modernizr{font:0/0 a}#modernizr:after{content:":)";visibility:hidden;font:3px/1 a}',function(b){a=3<=b.offsetHeight});return a};
a.video=function(){var a=e.createElement("video"),b=!1;try{if(b=!!a.canPlayType)b=new Boolean(b),b.ogg=a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),b.h264=a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),b.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,"")}catch(c){}return b};a.audio=function(){var a=e.createElement("audio"),b=!1;try{if(b=!!a.canPlayType)b=new Boolean(b),b.ogg=a.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),
b.mp3=a.canPlayType("audio/mpeg;").replace(/^no$/,""),b.wav=a.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),b.m4a=(a.canPlayType("audio/x-m4a;")||a.canPlayType("audio/aac;")).replace(/^no$/,"")}catch(c){}return b};a.localstorage=function(){try{return localStorage.setItem("modernizr","modernizr"),localStorage.removeItem("modernizr"),!0}catch(a){return!1}};a.sessionstorage=function(){try{return sessionStorage.setItem("modernizr","modernizr"),sessionStorage.removeItem("modernizr"),!0}catch(a){return!1}};
a.webworkers=function(){return!!h.Worker};a.applicationcache=function(){return!!h.applicationCache};a.svg=function(){return!!e.createElementNS&&!!e.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect};a.inlinesvg=function(){var a=e.createElement("div");a.innerHTML="<svg/>";return"http://www.w3.org/2000/svg"==(a.firstChild&&a.firstChild.namespaceURI)};a.smil=function(){return!!e.createElementNS&&/SVGAnimate/.test(H.call(e.createElementNS("http://www.w3.org/2000/svg","animate")))};a.svgclippaths=
function(){return!!e.createElementNS&&/SVGClipPath/.test(H.call(e.createElementNS("http://www.w3.org/2000/svg","clipPath")))};for(var C in a)B(a,C)&&(x=C.toLowerCase(),f[x]=a[C](),y.push((f[x]?"":"no-")+x));f.input||J();f.addTest=function(a,b){if("object"==typeof a)for(var c in a)B(a,c)&&f.addTest(c,a[c]);else{a=a.toLowerCase();if(f[a]!==n)return f;b="function"==typeof b?b():b;l.className+=" "+(b?"":"no-")+a;f[a]=b}return f};g.cssText="";a=k=null;(function(a,b){function c(){var a=u.elements;return"string"==
typeof a?a.split(" "):a}function f(a){var b=r[a._html5shiv];b||(b={},p++,a._html5shiv=p,r[p]=b);return b}function e(a,c,d){c||(c=b);if(t)return c.createElement(a);d||(d=f(c));c=d.cache[a]?d.cache[a].cloneNode():m.test(a)?(d.cache[a]=d.createElem(a)).cloneNode():d.createElem(a);return!c.canHaveChildren||l.test(a)||c.tagUrn?c:d.frag.appendChild(c)}function g(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag());a.createElement=function(c){return u.shivMethods?
e(c,a,b):b.createElem(c)};a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+c().join().replace(/[\w\-]+/g,function(a){b.createElem(a);b.frag.createElement(a);return'c("'+a+'")'})+");return n}")(u,b.frag)}function k(a){a||(a=b);var c=f(a);if(u.shivCSS&&!n&&!c.hasCSS){var d,e=a;d=e.createElement("p");e=e.getElementsByTagName("head")[0]||e.documentElement;d.innerHTML="x<style>article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}</style>";
d=e.insertBefore(d.lastChild,e.firstChild);c.hasCSS=!!d}t||g(a,c);return a}var h=a.html5||{},l=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,m=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,n,p=0,r={},t;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>";n="hidden"in a;var c;if(!(c=1==a.childNodes.length)){b.createElement("a");var d=b.createDocumentFragment();c="undefined"==typeof d.cloneNode||"undefined"==
typeof d.createDocumentFragment||"undefined"==typeof d.createElement}t=c}catch(e){t=n=!0}})();var u={elements:h.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:"3.7.0",shivCSS:!1!==h.shivCSS,supportsUnknownElements:t,shivMethods:!1!==h.shivMethods,type:"default",shivDocument:k,createElement:e,createDocumentFragment:function(a,d){a||(a=b);if(t)return a.createDocumentFragment();
d=d||f(a);for(var e=d.frag.cloneNode(),g=0,h=c(),k=h.length;g<k;g++)e.createElement(h[g]);return e}};a.html5=u;k(b)})(this,e);f._version="2.8.3";f._prefixes=w;f._domPrefixes=F;f._cssomPrefixes=E;f.mq=function(a){var b=h.matchMedia||h.msMatchMedia;if(b)return b(a)&&b(a).matches||!1;var c;p("@media "+a+" { #modernizr { position: absolute; } }",function(a){c="absolute"==(h.getComputedStyle?getComputedStyle(a,null):a.currentStyle).position});return c};f.hasEvent=I;f.testProp=function(a){return D([a])};
f.testAllProps=c;f.testStyles=p;f.prefixed=function(a,b,e){return b?c(a,b,e):c(a,"pfx")};l.className=l.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(" js "+y.join(" "));return f}(this,this.document);