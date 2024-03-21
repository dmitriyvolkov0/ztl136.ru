var snowStorm=function(n,t){function u(n,t){return isNaN(t)&&(t=0),Math.random()*n+t}function et(n){return parseInt(u(2),10)===1?n*-1:n}function nt(){n.setTimeout(function(){i.start(!0)},20);i.events.remove(e?t:n,"mousemove",nt)}function tt(){i.excludeMobile&&rt||nt();i.events.remove(n,"load",tt)}this.autoStart=!0;this.excludeMobile=!0;this.flakesMax=128;this.flakesMaxActive=64;this.animationInterval=50;this.useGPU=!0;this.className=null;this.excludeMobile=!0;this.flakeBottom=null;this.followMouse=!1;this.snowColor="#fff";this.snowCharacter="&bull;";this.snowStick=!0;this.targetElement=null;this.useMeltEffect=!0;this.useTwinkleEffect=!1;this.usePositionFixed=!1;this.usePixelPosition=!1;this.freezeOnBlur=!0;this.flakeLeftOffset=0;this.flakeRightOffset=0;this.flakeWidth=8;this.flakeHeight=8;this.vMaxX=5;this.vMaxY=4;this.zIndex=0;var i=this,h,e=navigator.userAgent.match(/msie/i),it=navigator.userAgent.match(/msie 6/i),rt=navigator.userAgent.match(/mobile|opera m(ob|in)/i),ut=e&&t.compatMode==="BackCompat",c=ut||it,r=null,o=null,f=null,s=null,l=null,w=null,b=null,v=1,y=2,ft=6,a=!1,p=!1,k=function(){try{t.createElement("div").style.opacity="0.5"}catch(n){return!1}return!0}(),d=!1,g=t.createDocumentFragment();return h=function(){function s(t){n.setTimeout(t,1e3/(i.animationInterval||20))}function u(n){var t=f.style[n];return t!==undefined?n:null}var e,o=n.requestAnimationFrame||n.webkitRequestAnimationFrame||n.mozRequestAnimationFrame||n.oRequestAnimationFrame||n.msRequestAnimationFrame||s,f,r;return e=o?function(){return o.apply(n,arguments)}:null,f=t.createElement("div"),r={transform:{ie:u("-ms-transform"),moz:u("MozTransform"),opera:u("OTransform"),webkit:u("webkitTransform"),w3:u("transform"),prop:null},getAnimationFrame:e},r.transform.prop=r.transform.w3||r.transform.moz||r.transform.webkit||r.transform.ie||r.transform.opera,f=null,r}(),this.timer=null,this.flakes=[],this.disabled=!1,this.active=!1,this.meltFrameCount=20,this.meltFrames=[],this.setXY=function(n,t,u){if(!n)return!1;i.usePixelPosition||p?(n.style.left=t-i.flakeWidth+"px",n.style.top=u-i.flakeHeight+"px"):c?(n.style.right=100-t/r*100+"%",n.style.top=Math.min(u,l-i.flakeHeight)+"px"):i.flakeBottom?(n.style.right=100-t/r*100+"%",n.style.top=Math.min(u,l-i.flakeHeight)+"px"):(n.style.right=100-t/r*100+"%",n.style.bottom=100-u/f*100+"%")},this.events=function(){function i(n){var i=u.call(n),r=i.length;return t?(i[1]="on"+i[1],r>3&&i.pop()):r===3&&i.push(!1),i}function r(n,i){var r=n.shift(),u=[f[i]];t?r[u](n[0],n[1]):r[u].apply(r,n)}function e(){r(i(arguments),"add")}function o(){r(i(arguments),"remove")}var t=!n.addEventListener&&n.attachEvent,u=Array.prototype.slice,f={add:t?"attachEvent":"addEventListener",remove:t?"detachEvent":"removeEventListener"};return{add:e,remove:o}}(),this.randomizeWind=function(){var n;if(w=et(u(i.vMaxX,.2)),b=u(i.vMaxY,.2),this.flakes)for(n=0;n<this.flakes.length;n++)this.flakes[n].active&&this.flakes[n].setVelocities()},this.scrollHandler=function(){var r;if(s=i.flakeBottom?0:parseInt(n.scrollY||t.documentElement.scrollTop||(c?t.body.scrollTop:0),10),isNaN(s)&&(s=0),!a&&!i.flakeBottom&&i.flakes)for(r=0;r<i.flakes.length;r++)i.flakes[r].active===0&&i.flakes[r].stick()},this.resizeHandler=function(){n.innerWidth||n.innerHeight?(r=n.innerWidth-16-i.flakeRightOffset,f=i.flakeBottom||n.innerHeight):(r=(t.documentElement.clientWidth||t.body.clientWidth||t.body.scrollWidth)-(e?0:8)-i.flakeRightOffset,f=i.flakeBottom||t.documentElement.clientHeight||t.body.clientHeight||t.body.scrollHeight);l=t.body.offsetHeight;o=parseInt(r/2,10)},this.resizeHandlerAlt=function(){r=i.targetElement.offsetWidth-i.flakeRightOffset;f=i.flakeBottom||i.targetElement.offsetHeight;o=parseInt(r/2,10);l=t.body.offsetHeight},this.freeze=function(){if(i.disabled)return!1;i.disabled=1;i.timer=null},this.resume=function(){if(i.disabled)i.disabled=0;else return!1;i.timerInit()},this.toggleSnow=function(){i.flakes.length?(i.active=!i.active,i.active?(i.show(),i.resume()):(i.stop(),i.freeze())):i.start()},this.stop=function(){var r;for(this.freeze(),r=0;r<this.flakes.length;r++)this.flakes[r].o.style.display="none";i.events.remove(n,"scroll",i.scrollHandler);i.events.remove(n,"resize",i.resizeHandler);i.freezeOnBlur&&(e?(i.events.remove(t,"focusout",i.freeze),i.events.remove(t,"focusin",i.resume)):(i.events.remove(n,"blur",i.freeze),i.events.remove(n,"focus",i.resume)))},this.show=function(){for(var n=0;n<this.flakes.length;n++)this.flakes[n].o.style.display="block"},this.SnowFlake=function(n,e,o){var l=this;this.type=n;this.x=e||parseInt(u(r-20),10);this.y=isNaN(o)?-u(f)-12:o;this.vX=null;this.vY=null;this.vAmpTypes=[1,1.2,1.4,1.6,1.8];this.vAmp=this.vAmpTypes[this.type]||1;this.melting=!1;this.meltFrameCount=i.meltFrameCount;this.meltFrames=i.meltFrames;this.meltFrame=0;this.twinkleFrame=0;this.active=1;this.fontSize=10+this.type*2;this.o=t.createElement("div");this.o.innerHTML=i.snowCharacter;i.className&&this.o.setAttribute("class",i.className);this.o.style.color=i.snowColor;this.o.style.position=a?"fixed":"absolute";i.useGPU&&h.transform.prop&&(this.o.style[h.transform.prop]="translate3d(0px, 0px, 0px)");this.o.style.width=i.flakeWidth+"px";this.o.style.height=i.flakeHeight+"px";this.o.style.fontFamily="arial,verdana";this.o.style.cursor="default";this.o.style.overflow="hidden";this.o.style.fontWeight="normal";this.o.style.zIndex=i.zIndex;g.appendChild(this.o);this.refresh=function(){if(isNaN(l.x)||isNaN(l.y))return!1;i.setXY(l.o,l.x,l.y)};this.stick=function(){c||i.targetElement!==t.documentElement&&i.targetElement!==t.body?l.o.style.top=f+s-i.flakeHeight+"px":i.flakeBottom?l.o.style.top=i.flakeBottom+"px":(l.o.style.display="none",l.o.style.bottom="0%",l.o.style.position="fixed",l.o.style.display="block")};this.vCheck=function(){l.vX>=0&&l.vX<.2?l.vX=.2:l.vX<0&&l.vX>-.2&&(l.vX=-.2);l.vY>=0&&l.vY<.2&&(l.vY=.2)};this.move=function(){var n=l.vX*v,t;l.x+=n;l.y+=l.vY*l.vAmp;l.x>=r||r-l.x<i.flakeWidth?l.x=0:n<0&&l.x-i.flakeLeftOffset<-i.flakeWidth&&(l.x=r-i.flakeWidth-1);l.refresh();t=f+s-l.y+i.flakeHeight;t<i.flakeHeight?(l.active=0,i.snowStick?l.stick():l.recycle()):(i.useMeltEffect&&l.active&&l.type<3&&!l.melting&&Math.random()>.998&&(l.melting=!0,l.melt()),i.useTwinkleEffect&&(l.twinkleFrame<0?Math.random()>.97&&(l.twinkleFrame=parseInt(Math.random()*8,10)):(l.twinkleFrame--,k?l.o.style.opacity=l.twinkleFrame&&l.twinkleFrame%2==0?0:1:l.o.style.visibility=l.twinkleFrame&&l.twinkleFrame%2==0?"hidden":"visible")))};this.animate=function(){l.move()};this.setVelocities=function(){l.vX=w+u(i.vMaxX*.12,.1);l.vY=b+u(i.vMaxY*.12,.1)};this.setOpacity=function(n,t){if(!k)return!1;n.style.opacity=t};this.melt=function(){i.useMeltEffect&&l.melting?l.meltFrame<l.meltFrameCount?(l.setOpacity(l.o,l.meltFrames[l.meltFrame]),l.o.style.fontSize=l.fontSize-l.fontSize*(l.meltFrame/l.meltFrameCount)+"px",l.o.style.lineHeight=i.flakeHeight+2+i.flakeHeight*.75*(l.meltFrame/l.meltFrameCount)+"px",l.meltFrame++):l.recycle():l.recycle()};this.recycle=function(){l.o.style.display="none";l.o.style.position=a?"fixed":"absolute";l.o.style.bottom="auto";l.setVelocities();l.vCheck();l.meltFrame=0;l.melting=!1;l.setOpacity(l.o,1);l.o.style.padding="0px";l.o.style.margin="0px";l.o.style.fontSize=l.fontSize+"px";l.o.style.lineHeight=i.flakeHeight+2+"px";l.o.style.textAlign="center";l.o.style.verticalAlign="baseline";l.x=parseInt(u(r-i.flakeWidth-20),10);l.y=parseInt(u(f)*-1,10)-i.flakeHeight;l.refresh();l.o.style.display="block";l.active=1};this.recycle();this.refresh()},this.snow=function(){for(var r=0,t=null,n=0,f=i.flakes.length;n<f;n++)i.flakes[n].active===1&&(i.flakes[n].move(),r++),i.flakes[n].melting&&i.flakes[n].melt();r<i.flakesMaxActive&&(t=i.flakes[parseInt(u(i.flakes.length),10)],t.active===0&&(t.melting=!0));i.timer&&h.getAnimationFrame(i.snow)},this.mouseMove=function(n){if(!i.followMouse)return!0;var t=parseInt(n.clientX,10);t<o?v=-y+t/o*y:(t-=o,v=t/o*y)},this.createSnow=function(n,t){for(var r=0;r<n;r++)i.flakes[i.flakes.length]=new i.SnowFlake(parseInt(u(ft),10)),(t||r>i.flakesMaxActive)&&(i.flakes[i.flakes.length-1].active=-1);i.targetElement.appendChild(g)},this.timerInit=function(){i.timer=!0;i.snow()},this.init=function(){for(var r=0;r<i.meltFrameCount;r++)i.meltFrames.push(1-r/i.meltFrameCount);i.randomizeWind();i.createSnow(i.flakesMax);i.events.add(n,"resize",i.resizeHandler);i.events.add(n,"scroll",i.scrollHandler);i.freezeOnBlur&&(e?(i.events.add(t,"focusout",i.freeze),i.events.add(t,"focusin",i.resume)):(i.events.add(n,"blur",i.freeze),i.events.add(n,"focus",i.resume)));i.resizeHandler();i.scrollHandler();i.followMouse&&i.events.add(e?t:n,"mousemove",i.mouseMove);i.animationInterval=Math.max(20,i.animationInterval);i.timerInit()},this.start=function(u){if(d){if(u)return!0}else d=!0;if(typeof i.targetElement=="string"){var e=i.targetElement;if(i.targetElement=t.getElementById(e),!i.targetElement)throw new Error('Snowstorm: Unable to get targetElement "'+e+'"');}if(i.targetElement||(i.targetElement=t.body||t.documentElement),i.targetElement!==t.documentElement&&i.targetElement!==t.body&&(i.resizeHandler=i.resizeHandlerAlt,i.usePixelPosition=!0),i.resizeHandler(),i.usePositionFixed=i.usePositionFixed&&!c&&!i.flakeBottom,n.getComputedStyle)try{p=n.getComputedStyle(i.targetElement,null).getPropertyValue("position")==="relative"}catch(o){p=!1}a=i.usePositionFixed;r&&f&&!i.disabled&&(i.init(),i.active=!0)},i.autoStart&&i.events.add(n,"load",tt,!1),this}(window,document);