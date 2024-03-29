function embedSelectedShortcode() {
        var shortcodeHTML;
	var shortcode_panel = document.getElementById('shortcode_panel');
	var current_shortcode = shortcode_panel.className.indexOf('current');
	if (current_shortcode != -1) {
		
		// SHORTCODE SELECT
		var shortcode_select = document.getElementById('shortcode-select').value;
		
		/////////////////////////////////////////
		////	SHORTCODE OPTION VARIABLES
		/////////////////////////////////////////
		//Staff
		var staff_title = document.getElementById('staff-title').value;
		var staff_count = document.getElementById('staff-number').value;
		var staff_category = document.getElementById('staff-category').value;
		var staff_orderby = document.getElementById('staff-orderby').value;
		var staff_order = document.getElementById('staff-order').value;
		
		//Google Map
		var map_address = document.getElementById('map-address').value;
		
		//Gallery
		var gallery_title = document.getElementById('gallery-title').value;
		var gallery_category = document.getElementById('gallery-category').value;
		var gallery_count = document.getElementById('gallery-count').value;
		var gallery_column = document.getElementById('gallery-column').value;
		
		//Agents
		var testimonial_count = document.getElementById('testimonial-number').value;
		
		// Button
		var button_type = document.getElementById('button-type').value;
		var button_colour = document.getElementById('button-colour').value;
		var button_text = document.getElementById('button-text').value;
		var button_url = document.getElementById('button-url').value;
		var button_extraclass = document.getElementById('button-extraclass').value;
		var button_size = document.getElementById('button-size').value;
		var button_target = "";
		
		
			
		if (document.getElementById('button-target').checked) {
			button_target = "_blank";
		} else {
			button_target = "_self";
		}
		
		// Secondary bar
		var bar_title = document.getElementById('bar-title').value;
		var bar_title_url = document.getElementById('bar-url').value;
		var bar_btn_title = document.getElementById('bar-btn-title').value;
		var bar_btn_url = document.getElementById('bar-btn-url').value;
		var bar_icon = document.getElementById('bar-btn-image').value;
		
		// Icons
		var icon_image = document.getElementById('icon-image').value;
		
		// Icons Box
		var icon_box_image = document.getElementById('icon-box-image').value;
		var icon_title = document.getElementById('icon-title').value;
		var icon_description = document.getElementById('icon-description').value;
		var icon_type = document.getElementById('icon-type').value;
        var icon_box_type = document.getElementById('icon-box-type').value;
		var icon_link = document.getElementById('icon-link').value;
		var icon_target = document.getElementById('icon-target').value;
		
		// Typography
		var typography_type = document.getElementById('typography-type').value;
		
		// Anchor Tags
		var anchor_href = document.getElementById('anchor-href').value;
		var anchor_xclass = document.getElementById('anchor-xclass').value;
		
		// Paragraph Tags
		var paragraph_xclass = document.getElementById('paragraph-xclass').value;
		
		// Span Tags
		var span_xclass = document.getElementById('span-xclass').value;
		
		//Section Tags
		section_xclass = document.getElementById('section-xclass').value;		
		
		// Heading Tags
		var heading_size = document.getElementById('heading-size').value;
		var heading_extra = document.getElementById('heading-extra').value;
		var heading_icon = document.getElementById('heading-icon').value;
		var heading_type = document.getElementById('heading-type').value;
		
		// Container Tags
		var container_xclass = document.getElementById('container-xclass').value;
		
		// Div Tags
		var div_extra_class = document.getElementById('div-extra-class').value;
		
		// Hr Tags
		var hr_extra_class = document.getElementById('hr-extra-class').value;
		
		// Divider Tags
		var divider_extra = document.getElementById('divider-extra').value;
		
		// Alert Box Tags
		var alert_type = document.getElementById('alert-type').value;
		var alert_close = document.getElementById('alert-close').checked;
			
		
		
		// Blockquote Box Tags
		var blockquote_name = document.getElementById('blockquote-name').value;	
		
		// Dropcap Box Tags
		var dropcap_type = document.getElementById('dropcap-type').value;
		
		// Code Box Tags
		var code_type = document.getElementById('code-type').value;				
		
		// Label Tags
		var label_type = document.getElementById('label-type').value;
		
		// Columns
		var column_options = document.getElementById('column-options').value;
		var column_xclass = document.getElementById('column-xclass').value;
		var column_animation = document.getElementById('column-animation').value;
			
		// Progress Bar
		var progressbar_percentage = document.getElementById('progressbar-percentage').value;
		var progressbar_text = document.getElementById('progressbar-text').value;
		var progressbar_value = document.getElementById('progressbar-value').value;
		var progressbar_type = document.getElementById('progressbar-type').value;
		var progressbar_colour = document.getElementById('progressbar-colour').value;
		
		// Counters
		var count_to = document.getElementById('count-to').value;
		var count_subject = document.getElementById('count-subject').value;
		var count_speed = document.getElementById('count-speed').value;
		var count_image = document.getElementById('count-image').value;
		var count_textstyle = document.getElementById('count-textstyle').value;
		
		// Tooltip
		var tooltip_text = document.getElementById('tooltip-text').value;
		var tooltip_link = document.getElementById('tooltip-link').value;
		var tooltip_direction = document.getElementById('tooltip-direction').value;
		
		// Tabs Tags
		var tabs_size = document.getElementById('tabs-size').value;
		var tabs_id = document.getElementById('tabs-id').value;
		var tab_type = document.getElementById('tab-type').value;
		var tab_full_col = document.getElementById('full-col').value;
		
		// Accordion Tags
		var accordion_size = document.getElementById('accordion-size').value;
		var accordion_id = document.getElementById('accordion-id').value;	
		
		// Toggle Tags
		var toggle_size = document.getElementById('toggle-size').value;
		var toggle_id = document.getElementById('toggle-id').value;		
		
		// Table
		var table_type = document.getElementById('table-type').value;
		var table_head = document.getElementById('table-head').value;
		var table_columns = document.getElementById('table-columns').value;
		var table_rows = document.getElementById('table-rows').value;
		
		//Pricing Table
		var pricing_table_columns = document.getElementById('pricing-table-columns').value;
		var pricing_table_active = document.getElementById('pricing-table-active').value;
		var pricing_table_rows = document.getElementById('pricing-table-rows').value;
		var pricing_table_currency = document.getElementById('pricing-currency').value;
		
		// Lists
		var list_type = document.getElementById('list-type').value;
		var list_icon = document.getElementById('list-icon').value;
		var list_items = document.getElementById('list-items').value;
		var list_extra = document.getElementById('list-extra').value;
				
		// Modal Box
		var modal_id = document.getElementById('modal-id').value;
		var modal_title = document.getElementById('modal-title').value;
		var modal_text = document.getElementById('modal-text').value;
		var modal_button = document.getElementById('modal-button').value;	
		 // Calendar  Event Category
		var calendar_event_category = document.getElementById('calendar_event_category').value;
		var calendar_filter = document.getElementById('calendar-filter').value;
		var calendar_preview = document.getElementById('calendar-preview').value;
	    // Fullscreen Video
		var fwvideo_videourl = document.getElementById('fwvideo-videourl').value;	
		/////////////////////////////////////////
                 // Form Email
		var form_email = document.getElementById('form_email').value;	
		var form_title = document.getElementById('form-title').value;	
		////	AGENT SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-staff') {
			shortcodeHTML = '<br/>[staff title="'+staff_title+'" category="'+staff_category+'" number="'+staff_count+'" orderby="'+staff_orderby+'" order="'+staff_order+'"]<br/>';	
		}
		
		/////////////////////////////////////////
		////	TESTIMONIAL SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-testimonial') {
			shortcodeHTML = '<br/>[testimonial number="'+testimonial_count+'"]<br/>';	
		}
		
		/////////////////////////////////////////
		////	GOOGLE MAP SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-gmap') {
			shortcodeHTML = '<br/>[gmap address="'+map_address+'"]<br/>';	
		}
		
		/////////////////////////////////////////
		////	BUTTON SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-buttons') {
			shortcodeHTML = '<br/>[imic_button colour="'+button_colour+'" type="'+button_type+'" link="'+button_url+'" target="'+button_target+'" extraclass="'+button_extraclass+'" size="'+button_size+'"]'+button_text+'[/imic_button]<br/>';	
		}
		/////////////////////////////////////////
		////	SECONDARY BAR SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-secondary-bar') {
			shortcodeHTML = '<br/>[secondary_bar icon="'+bar_icon+'" title="'+bar_title+'" titleurl="'+bar_title_url+'" button="'+bar_btn_title+'" buttonurl="'+bar_btn_url+'"]<br/>';	
		}
               /////////////////////////////////////////
		////	FORM SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-form') {
			shortcodeHTML = '<br/>[imic_form form_email="'+form_email+'" form_title="'+form_title+'"]<br/>';	
		}
                 /////////////////////////////////////////
		////	Calendar SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-calendar') {
			shortcodeHTML = '<br/>[event_calendar category_id="'+calendar_event_category+'" filter="'+calendar_filter+'" preview="'+calendar_preview+'"]<br/>';
                       
		}
		
		/////////////////////////////////////////
		////	Gallery SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-gallery') {
			shortcodeHTML = '<br/>[galleries title="'+gallery_title+'" category="'+gallery_category+'" count="'+gallery_count+'" column="'+gallery_column+'"]<br/>';
                       
		}
		
		/////////////////////////////////////////
		////	ICON SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-icons') {
			shortcodeHTML = '[icon image="'+icon_image+'"]';	
		}
		
		/////////////////////////////////////////
		////	ICON BOX SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-icons-box') {
			shortcodeHTML = '[icon_box icon_image="'+icon_box_image+'" title="'+icon_title+'" description="'+icon_description+'" type="'+icon_type+'" icon_box="'+icon_box_type+'" url="'+icon_link+'" target="'+icon_target+'"]';	
		}
		
		/////////////////////////////////////////
		////	TYPOGRAPHY SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-typography') {
			switch (typography_type){
				case 'typo-anchor':	shortcodeHTML = '<br/>[anchor href="'+anchor_href+'" extra="'+anchor_xclass+'"][/anchor]<br/>'; break;
				case 'typo-paragraph':	shortcodeHTML = '<br/>[paragraph extra="'+paragraph_xclass+'"][/paragraph]<br/>'; break;
				case 'typo-thematic-break':	shortcodeHTML = '<br/>[thematic_break]<br/>'; break;
				case 'typo-divider':	shortcodeHTML = '<br/>[divider extra="'+divider_extra+'"]<br/>'; break;
				case 'typo-heading':	shortcodeHTML = '<br/>[heading icon="'+heading_icon+'" type="'+heading_type+'" size="'+heading_size+'" extra="'+heading_extra+'"][/heading]<br/>'; break;
				case 'typo-alert':	shortcodeHTML = '<br/>[alert type="'+alert_type+'" close="'+alert_close+'"][/alert]<br/>'; break;
				case 'typo-blockquote':	shortcodeHTML = '<br/>[blockquote name="'+blockquote_name+'"][/blockquote]<br/>'; break;
				case 'typo-dropcap':	shortcodeHTML = '<br/>[dropcap type="'+dropcap_type+'"][/dropcap]<br/>'; break;
				case 'typo-code':	shortcodeHTML = '<br/>[code type="'+code_type+'"][/code]<br/>'; break;
				case 'typo-label':	shortcodeHTML = '<br/>[label type="'+label_type+'"][/label]<br/>'; break;
				case 'typo-container':	shortcodeHTML = '<br/>[container extra="'+container_xclass+'"][/container]<br/>'; break;
				case 'typo-spacer':	shortcodeHTML = '<br/>[spacer size="'+spacer_size+'"]<br/>'; break;
				case 'typo-span':	shortcodeHTML = '<br/>[span extra="'+span_xclass+'"][/span]<br/>'; break;
				case 'typo-section':	shortcodeHTML = '<br/>[section extra="'+section_xclass+'"][/section]<br/>'; break;
				case 'typo-div':	shortcodeHTML = '<br/>[div extra="'+div_extra_class+'"][/div]<br/>'; break;
				case 'typo-hr':	shortcodeHTML = '<br/>[hr extra="'+div_extra_class+'"]<br/>'; break;
			}	
		}
		
		/////////////////////////////////////////
		////	COLUMNS SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-columns' && column_options == 'one_full') {
			shortcodeHTML = '<br/>[one_full extra="'+ column_xclass +'" anim="'+column_animation+'"]1 Text[/one_full]<br/>';	
		}
		if (shortcode_select == 'shortcode-columns' && column_options == 'two_halves') {
			shortcodeHTML = '<br/>[one_half extra="'+ column_xclass +'" anim="'+column_animation+'"]1/2 Text[/one_half]<br/>[one_half extra="'+ column_xclass +'" anim="'+column_animation+'"]1/2 Text[/one_half]<br/>';	
		}
		if (shortcode_select == 'shortcode-columns' && column_options == 'three_thirds') {
			shortcodeHTML = '<br/>[one_third extra="'+ column_xclass +'" anim="'+column_animation+'"]1/3 Text[/one_third]<br/>[one_third extra="'+ column_xclass +'" anim="'+column_animation+'"]1/3 Text[/one_third]<br/>[one_third extra="'+ column_xclass +'" anim="'+column_animation+'"]1/3 Text[/one_third]<br/>';	
		}
		if (shortcode_select == 'shortcode-columns' && column_options == 'four_quarters') {
			shortcodeHTML = '<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>';	
		}
		if (shortcode_select == 'shortcode-columns' && column_options == 'six_one_sixths') {
			shortcodeHTML = '<br/>[one_sixth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/6 Text[/one_sixth]<br/>[one_sixth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/6 Text[/one_sixth]<br/>[one_sixth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/6 Text[/one_sixth]<br/>[one_sixth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/6 Text[/one_sixth]<br/>[one_sixth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/6 Text[/one_sixth]<br/>[one_sixth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/6 Text[/one_sixth]<br/>';	
		}
               
                if (shortcode_select == 'shortcode-columns' && column_options == 'one_halves_two_quarters') {
			shortcodeHTML = '<br/>[one_half extra="'+ column_xclass +'" anim="'+column_animation+'"]1/2 Text[/one_half]<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>';	
		}
                if (shortcode_select == 'shortcode-columns' && column_options == 'three_two_thirds') {
			shortcodeHTML = '<br/>[one_third extra="'+ column_xclass +'" anim="'+column_animation+'"]1/3 Text[/one_third]<br/>[two_third extra="'+ column_xclass +'" anim="'+column_animation+'"]2/3 Text[/two_third]<br/>';	
		}
                if (shortcode_select == 'shortcode-columns' && column_options == 'two_thirds_one_thirds') {
			shortcodeHTML = '<br/>[two_third extra="'+ column_xclass +'" anim="'+column_animation+'"]2/3 Text[/two_third]<br/>[one_third extra="'+ column_xclass +'" anim="'+column_animation+'"]1/3 Text[/one_third]<br/>';	
		}
                if (shortcode_select == 'shortcode-columns' && column_options == 'two_quarters_one_halves') {
			shortcodeHTML = '<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>[one_half extra="'+ column_xclass +'" anim="'+column_animation+'"]1/2 Text[/one_half]<br/>';	
		}
                if (shortcode_select == 'shortcode-columns' && column_options == 'one_quarters_one_halves_one_quarters') {
			shortcodeHTML = '<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>[one_half extra="'+ column_xclass +'" anim="'+column_animation+'"]1/2 Text[/one_half]<br/>[one_fourth extra="'+ column_xclass +'" anim="'+column_animation+'"]1/4 Text[/one_fourth]<br/>';	
		}
				
		/////////////////////////////////////////
		////	MODAL BOX SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-modal') {
			shortcodeHTML = '<br/>[modal_box id="'+modal_id+'" title="'+modal_title+'" text="'+modal_text+'" button="'+modal_button+'"]<br/>';	
		}
		
		
		/////////////////////////////////////////
		////	PROGRESS BAR SHORTCODE OUTPUT
		/////////////////////////////////////////
				
		if (shortcode_select == 'shortcode-progressbar') {
		
			shortcodeHTML = '<br/>[progress_bar percentage="' + progressbar_percentage + '" name="' + progressbar_text + '" value="' + progressbar_value + '" type="' + progressbar_type + '" colour="' + progressbar_colour + '"]<br/>';
		
		}
		
		/////////////////////////////////////////
		////	COUNTERS SHORTCODE OUTPUT
		/////////////////////////////////////////
				
		if (shortcode_select == 'shortcode-counters') {
		
			shortcodeHTML = '<br/>[imic_count to="' + count_to + '" speed="' + count_speed + '" icon="' + count_image + '" textstyle="' + count_textstyle + '" subject="' + count_subject + '"]<br/>';
		
		}
		
		/////////////////////////////////////////
		////	TOOLTIP SHORTCODE OUTPUT
		/////////////////////////////////////////
				
		if (shortcode_select == 'shortcode-tooltip') {
		
			shortcodeHTML = '<br/>[imic_tooltip link="' + tooltip_link + '" direction="' + tooltip_direction + '" title="'+ tooltip_text +'"]TEXT HERE[/imic_tooltip]<br/>';
		
		}
		
		
		
		/////////////////////////////////////////
		////	TABLE SHORTCODE OUTPUT
		/////////////////////////////////////////
	
		if (shortcode_select == 'shortcode-tables') {
			
			shortcodeHTML = '<br/>[htable type="' + table_type + '"]<br/>';
			
			if (table_head == "yes") {
				shortcodeHTML += '[thead]<br/>[trow]<br/>';
				for ( var hc = 0; hc < table_columns; hc++ ) {
					shortcodeHTML += '[thcol]HEAD COL ' + parseInt(hc + 1) + '[/thcol]<br/>';
				}
				shortcodeHTML += '[/trow]<br/>[/thead]<br/>';
			}
			shortcodeHTML += '[tbody]<br/>';
			
			for ( var r = 0; r < table_rows; r++ ) {
				shortcodeHTML += '[trow]<br/>';
				for ( var nc = 0; nc < table_columns; nc++ ) {
					shortcodeHTML += '[tcol]ROW ' + parseInt(r + 1) + ' COL ' + parseInt(nc + 1) + '[/tcol]<br/>';
				} 
				shortcodeHTML += '[/trow]<br/>';
			}
			
			shortcodeHTML += '[/tbody]<br/>';
			
			shortcodeHTML += '[/htable]<br/>';
		}
		
		/////////////////////////////////////////
		////	PRICING TABLE SHORTCODE OUTPUT
		/////////////////////////////////////////
	
		if (shortcode_select == 'shortcode-pricing-table') {
			
			shortcodeHTML = '<br/>[pricingtable column="'+pricing_table_columns+'"]';
			
				for ( var hc = 0; hc < pricing_table_columns; hc++ ) {
					active = "";
					reason = "";
					if(hc+1==pricing_table_active) { active = pricing_table_active; reason += '[reason]Most Popular[/reason]'; }
					shortcodeHTML += '[headingss active="'+active+'"]HEADING ' + parseInt(hc + 1)+'<br/>';
					shortcodeHTML += reason;
					shortcodeHTML += '[price currency="'+pricing_table_currency+' "]'+(hc * 100+99)+'<br/>';
					shortcodeHTML += '[interval]Per Month[/interval]';
					//for ( var r = 0; r < pricing_table_rows; r++ ) {
				for ( var nc = 0; nc < pricing_table_columns; nc++ ) {
					shortcodeHTML += '[row]ROW ' + parseInt(nc + 1) + '<br/>[/row]';
					if(pricing_table_columns==nc+1) { shortcodeHTML += '[url]http://www.imithemes.com[/url]'; }
				} 
			//}
				}
				shortcodeHTML += '[/pricingtable]';
		}
		
		/////////////////////////////////////////
		////	LIST SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-lists') {
			shortcodeHTML = '<br/>[list type='+ list_type +' extra='+ list_extra +']<br/>';
			
			for ( var li = 0; li < list_items; li++ ) {
				if((list_type == 'icon')||(list_type == 'inline')){
					shortcodeHTML += '[list_item icon="'+ list_icon +'" type="'+ list_type +'"]Item text '+ parseInt(li + 1) +'[/list_item]<br/>';
				}else if(list_type == 'desc'){
					shortcodeHTML += '[list_item_dt]Item text '+ parseInt(li + 1) +'[/list_item_dt][list_item_dd]Item text '+ parseInt(li + 1) +'[/list_item_dd]<br/>';
				}else{
					shortcodeHTML += '[list_item]Item text '+ parseInt(li + 1) +'[/list_item]<br/>';			
				}
			}
			
			shortcodeHTML += '[/list]<br/>';	
		}
		/////////////////////////////////////////
		////	ACCORDION SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-accordion') {
			
			shortcodeHTML = '<br/>[accordions id="'+ accordion_id +'"]<br/>';
			
			index = 0;
			for ( var hc = 0; hc < accordion_size; hc++ ) {
				if(index==0){ accordionClass='active'; accordionIn='in'; }else{ accordionClass=''; accordionIn='';}
				
				shortcodeHTML += '[accgroup]<br/>';
				shortcodeHTML += '[acchead id="'+ accordion_id + '" tab_id="'+ accordion_id + hc +'" class="'+ accordionClass +'"]Accordion Panel #' + parseInt(hc + 1) + '[/acchead]<br/>';
				shortcodeHTML += '[accbody tab_id="'+ accordion_id + hc +'" in="'+ accordionIn +'"]Accordion Body #' + parseInt(hc + 1) + '[/accbody]<br/>';
				shortcodeHTML += '[/accgroup]<br/>';
				index++;
			}
			
			shortcodeHTML += '[/accordions]<br/>';
		}
		
		/////////////////////////////////////////
		////	TOGGLE SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-toggle') {
			
			shortcodeHTML = '<br/>[toggles id="'+ toggle_id +'"]<br/>';
			
			for ( var hc = 0; hc < toggle_size; hc++ ) {
				shortcodeHTML += '[togglegroup]<br/>';
				shortcodeHTML += '[togglehead id="'+ toggle_id + '" tab_id="'+ toggle_id + hc +'"]Toggle Panel #' + parseInt(hc + 1) + '[/togglehead]<br/>';
				shortcodeHTML += '[togglebody tab_id="'+ toggle_id + hc +'"]Toggle Body #' + parseInt(hc + 1) + '[/togglebody]<br/>';
				shortcodeHTML += '[/togglegroup]<br/>';
			}
			
			shortcodeHTML += '[/toggles]<br/>';
		}
		/////////////////////////////////////////
		////	TABS SHORTCODE OUTPUT
		/////////////////////////////////////////
		if (shortcode_select == 'shortcode-tabs') {
			shortcodeHTML = '<br/>[tabs type="'+tab_type+'" full="'+tab_full_col+'"]<br/>';
			
			shortcodeHTML += '[tabh type="'+tab_type+'"]<br/>';
			index = 0;
			for ( var hc = 0; hc < tabs_size; hc++ ) {
				if(index==0){ tabClass='active'; }else{ tabClass=''; }
				shortcodeHTML += '[tab id="'+ tabs_id + hc +'" class="'+ tabClass +'"]TAB HEAD ' + parseInt(hc + 1) + '[/tab]<br/>';
				index++;
			}
			shortcodeHTML += '[/tabh]<br/>';
			
			shortcodeHTML += '[tabc]<br/>';
			flag = 0;
			for ( var r = 0; r < tabs_size; r++ ) {
				if(flag==0){ tabCClass='active'; }else{ tabCClass=''; }
				shortcodeHTML += '[tabrow id="'+ tabs_id + r +'" class="'+ tabCClass +'"]TAB CONTENT'+ parseInt(r + 1) +'[/tabrow]<br/>';
				flag++;
			}
			shortcodeHTML += '[/tabc]<br/>';
			
			shortcodeHTML += '[/tabs]<br/>';
		}
	}
	
	/////////////////////////////////////////
	////	Full video SHORTCODE OUTPUT
	/////////////////////////////////////////
	if (shortcode_select == 'shortcode-fwvideo') {
		shortcodeHTML = '[fullscreenvideo  videourl="'+ fwvideo_videourl +'"]<br/>';
	}
	/////////////////////////////////////////
	////	TinyMCE Callback & Embed
	/////////////////////////////////////////
	var tmce_ver=window.tinyMCE.majorVersion;
	if (current_shortcode != -1) {
		activeEditor = window.tinyMCE.activeEditor.id;
		if (tmce_ver >= 4) {
		parent.tinyMCE.execCommand('mceInsertContent', 
false,shortcodeHTML);
		parent.tinyMCE.activeEditor.windowManager.close(); }
		else {
		window.tinyMCE.execInstanceCommand(activeEditor, 'mceInsertContent', false, shortcodeHTML);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		}
       tinyMCEPopup.close();   
	} else {
		tinyMCEPopup.close();		
	}
	return;
}