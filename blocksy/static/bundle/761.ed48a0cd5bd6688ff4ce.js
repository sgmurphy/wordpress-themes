"use strict";(self.blocksyJsonP=self.blocksyJsonP||[]).push([[761],{761:function(t,e,n){n.r(e),n.d(e,{mount:function(){return s}});var i=n(222);const a=function(t,e){const n=t.getBoundingClientRect().height;t.style.height=`${n}px`,t.style.opacity="1",t.classList.add("is-animating"),requestAnimationFrame((function(){t.style.height="0px",t.style.opacity="0",(0,i.k)(t,(function(){t.classList.remove("is-animating"),t.removeAttribute("style"),e()}))}))},s=function(t,e){let{event:n}=e;n.stopPropagation(),n.preventDefault();const s=document.querySelector(t.dataset.target);if(!s)return;if("false"===s.getAttribute("aria-hidden"))a(s,(function(){t.setAttribute("aria-expanded","false"),s.setAttribute("aria-hidden","true")}));else{if(void 0!==t.dataset.closeOthers){t.closest(".ct-accordion-tab").parentNode.querySelectorAll('.ct-expandable-trigger[aria-expanded="true"]').forEach((function(t){const e=document.querySelector(t.dataset.target);e&&a(e,(function(){t.setAttribute("aria-expanded","false"),e.setAttribute("aria-hidden","true")}))}))}t.setAttribute("aria-expanded","true"),s.setAttribute("aria-hidden","false"),function(t){const e=t.getBoundingClientRect().height;t.style.height="0px",t.style.opacity="0",requestAnimationFrame((function(){t.classList.add("is-animating"),requestAnimationFrame((function(){t.style.height=`${e}px`,t.style.opacity="1",(0,i.k)(t,(function(){t.classList.remove("is-animating"),t.removeAttribute("style")}))}))}))}(s)}}},222:function(t,e,n){function i(t,e){const n=function(i){i.target===t&&(t.removeEventListener("transitionend",n),e())};t.addEventListener("transitionend",n)}n.d(e,{k:function(){return i}})}}]);