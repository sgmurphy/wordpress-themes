var t;t={},t=_,wp.customize.bind("ready",function(){wp.customize.section.each(function(t){let e=jQuery("#sub-accordion-section-"+t.id),n=jQuery("#accordion-section-"+t.id);n.hasClass("control-section-wpbf-expanded")&&e.appendTo(n)}),wp.customize.sectionConstructor["wpbf-link"]=wp.customize.Section.extend({attachEvents:function(){},isContextuallyActive:function(){return!0}}),function(){wp.customize.bind("pane-contents-reflowed",function(){let t=[];wp.customize.section.each(function(e){"wpbf-nested"===e.params.type&&e.params.parentId&&t.push(e)}),t.sort(wp.customize.utils.prioritySort).reverse(),jQuery.each(t,function(t,e){e.headContainer&&jQuery("#sub-accordion-section-"+e.params.parentId).children(".section-meta").after(e.headContainer)})});let e=wp.customize.Section.prototype.embed,n=wp.customize.Section.prototype.isContextuallyActive,i=wp.customize.Section.prototype.attachEvents;wp.customize.Section=wp.customize.Section.extend({attachEvents:function(){let t=this;if("wpbf-nested"!==t.params.type||!t.params.parentId){i.call(t);return}i.call(t),t.expanded.bind(function(e){if(!t.params.parentId)return;let n=wp.customize.section(t.params.parentId);e?n.contentContainer?.addClass("current-section-parent"):n.contentContainer?.removeClass("current-section-parent")}),t.container?.find(".customize-section-back").off("click keydown").on("click keydown",function(e){!wp.customize.utils.isKeydownButNotEnterEvent(e)&&(e.preventDefault(),t.params.parentId&&t.expanded()&&wp.customize.section(t.params.parentId).expand(t.params))})},embed:function(){if("wpbf-nested"!==this.params.type||!this.params.parentId){e.call(this);return}e.call(this);let t=jQuery("#sub-accordion-section-"+this.params.parentId);this.headContainer&&t.append(this.headContainer)},isContextuallyActive:function(){var e;let i=this;if("wpbf-nested"!==i.params.type)return n.call(this);let o=0,a=i._children("section","control");return wp.customize.section.each(function(t){t.params.parentId&&t.params.parentId===i.id&&a.push(t)}),a.sort(wp.customize.utils.prioritySort),((e=t)&&e.__esModule?e.default:e)(a).each(function(t){void 0!==t.isContextuallyActive?t.active()&&t.isContextuallyActive()&&(o+=1):t.active()&&(o+=1)}),0!==o}})}()});
