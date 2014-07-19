<div id="maincolumn">

	<h2 class="main rss"><?php echo config_item('module_rss_name'); ?></h2>

	<div class="subtitle">

		<!-- About this module -->
		<p class="lite">
			<?php echo lang('module_rss_about'); ?>
		</p>

		<p><a href="<?php echo base_url() . $uri; ?>" target="_blank"><?php echo base_url() . $uri; ?></a><br/>
		
		<?php foreach(Settings::get_languages() as $lang): ?>
		
			<a href="<?php echo base_url() . $uri . '/feed/' . $lang['lang']; ?>" target="_blank"><?php echo base_url() . $uri . '/feed/' . $lang['lang']; ?></a><br/>
			
		<?php endforeach; ?>
		</p>
		
	</div>
	
	<!-- Tabs -->
	<div id="rssTab" class="mainTabs">
		
		<ul class="tab-menu">
			
			<li id="rssConfigTab"><a><?php echo lang('module_rss_settings'); ?></a></li>
			<li  id="rssPagesTab"><a><?php echo lang('module_rss_pages'); ?></a></li>

		</ul>
		
		<div class="clear"></div>
	
	</div>

	<div id="rssTabContent">
	
		<!-- RSS Settings Form tab content -->
		<div class="tabcontent">
		
			<form id="rssSettingsForm" name="rssSettingsForm" method="post">
			
				<!-- RSS feed title -->
				<dl>
					<dt><label for="module_rss_feed_title"><?php echo lang('module_rss_label_feed_title'); ?></label></dt>
					<dd>
						<input class="inputtext w240" type="text" name="module_rss_feed_title" id="module_rss_feed_title" value="<?php echo config_item('module_rss_feed_title'); ?>" />
					</dd>
				</dl>	
		
				<!-- RSS feed description -->
				<dl>
					<dt><label for="module_rss_feed_description"><?php echo lang('module_rss_label_feed_description'); ?></label></dt>
					<dd>
						<input class="inputtext w240" type="text" name="module_rss_feed_description" id="module_rss_feed_description" value="<?php echo config_item('module_rss_feed_description'); ?>" />
					</dd>
				</dl>	
		
				<!-- RSS feed author (email, optional) -->
				<dl>
					<dt><label for="module_rss_feed_author"><?php echo lang('module_rss_label_feed_author'); ?></label></dt>
					<dd>
						<input class="inputtext w240" type="text" name="module_rss_feed_author" id="module_rss_feed_author" value="<?php echo config_item('module_rss_feed_author'); ?>" />
					</dd>
				</dl>	
		
				<!-- Submit button  -->
				<dl class="last">
					<dt>&#160;</dt>
					<dd>
						<input id="submit_config" type="submit" class="submit" value="<?php echo lang('ionize_button_save'); ?>" />
					</dd>
				</dl>
		
			</form>

		</div>
	
		<!-- RSS Pages to use tab content -->

		<div class="tabcontent">

			<p><?php echo lang('ionize_label_drop_page_here'); ?></p>

			<div id="rssPagesContainer" class="droppable dropPage">

			</div>


		</div>
		
	</div>
	
</div>

<script type="text/javascript">

// Init the panel toolbox is mandatory !!!
ION.initToolbox('empty_toolbox');


// Tabs
var rssTab = new TabSwapper({
	tabsContainer: 'rssTab',
	sectionsContainer: 'rssTabContent',
	selectedClass: 'selected',
	deselectedClass: '',
	tabs: 'li',
	clickers: 'li a',
	sections: 'div.tabcontent',
	cookieName: 'rssTab'
});

// Send Form (XHR)
ION.setFormSubmit(
	'rssSettingsForm',				// ID of the form to send
	'submit_config',				// ID of the submit button to put the send action on
	'module/rss/rss/save_config' 	// URL of the controller's method which process data
);

// Curent used pages
ION.HTML(admin_url + 'module/rss/rss/get_pages', {}, {'update': 'rssPagesContainer'});

// Page Drop
$('rssPagesContainer').onDrop = function(element, droppable, event)
{
	if (element.getProperty('data-type') == 'page')
	{
		ION.JSON(
			ION.adminUrl + 'module/rss/rss/add_page',
			{
				'id_page': element.getProperty('data-id')
			}
		);
	}
	else
	{
		ION.notification('error', Lang.get('module_rss_error_only_pages'));
	}
};

</script>
