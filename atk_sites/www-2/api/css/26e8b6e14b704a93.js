!function(a,b,c,d){var e="scroll-lock",f=xtag.query(b,"[scroll-lock]").map(function(a){if("true"==a.getAttribute("scroll-footerstop"))var b=document.querySelector("footer").clientHeight;return{top:Number(a.getAttribute("scroll-lock")),elem:a,stop:Number(b||0)}});a.onscroll=function(){var c=(a.pageYOffset||b.scrollTop)-(b.clientTop||0);f.forEach(function(a){if(c>=a.top){if(!xtag.hasClass(a.elem,e)){xtag.fireEvent(a.elem,"scroll-lock-on");var b=a.elem.offsetTop||a.elem.offsetParent.offsetTop;a.elem.style.top=b-a.top+"px",xtag.addClass(a.elem,e)}}else xtag.hasClass(a.elem,e)&&(xtag.removeClass(a.elem,e),xtag.fireEvent(a.elem,"scroll-lock-off"),a.elem.style.top=null)})}}(window,document,document.body,document.documentElement),function(){xtag.register("jump-nav",{lifecycle:{created:function(){if(this.innerHTML="",""!=this.target){var a=this,b=document.getElementById(this.target),c=this.labels||"h1,h2,h3,h4,h5,56",d=[],e=null,f=null;xtag.query(b,c).forEach(function(b){var c=Number(b.tagName.replace("H",""));if(0==d.length||d[d.length-1]<c){d.push(c);var g=document.createElement("ul");null!=e&&"UL"==e.tagName&&null!=f?(f.appendChild(g),xtag.addClass(f,"jmp-toggle"),e.appendChild(f)):(e||a).appendChild(g),e=g}else d.length>0&&d[d.length-1]>c&&(e=e.parentNode.parentNode,d.pop());var h=document.createElement("li");if(b.id){var i=b.getAttribute("id");b.removeAttribute("id");var j=document.createElement("a");xtag.addClass(j,"shift-a"),j.setAttribute("id",i),b.parentNode.insertBefore(j,b);var k=document.createElement("a");k.setAttribute("href","#"+i),k.textContent=b.textContent,h.appendChild(k)}else h.textContent=b.textContent;xtag.addClass(h,"k"+c),e.appendChild(h),f=h}),xtag.query(this,"ul").forEach(function(a){a.setAttribute("height",a.offsetHeight+"px")}),this.collapse=this.collapse||"h2"}},removed:function(){this.innerHTML=""}},events:{"tap:delegate(li)":function(a){var b=(a.currentTarget,this),c=xtag.query(b,"ul")[0];if(c){var d="closed";if(xtag.hasClass(this,d))c.style.height=c.getAttribute("height"),xtag.removeClass(this,d);else{var e=c.hasAttribute("height")?c.getAttribute("height"):c.offsetHeight+"px";c.style.height=e,c.setAttribute("height",e),xtag.addClass(this,d),xtag.skipFrame(function(){c.style.height=null})}}}},accessors:{target:{attribute:{},set:function(a){}},labels:{attribute:{}},collapse:{attribute:{},set:function(a){a="."+a.toLowerCase().replace(/h/g,"k").split(",").join(",."),xtag.query(this,a).forEach(function(a){var b=xtag.query(a,"ul")[0];b&&(b.style.height=null),xtag.addClass(a,"closed")})}}}})}(),function(){var a=document.querySelector("[scroll-lock]");xtag.addEvents(a,{"scroll-lock-on":function(){this.style.left=this.offsetLeft+"px"},"scroll-lock-off":function(){this.style.left="0px"}})}();