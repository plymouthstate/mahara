{if $align == 'center'}
<div style="width:{$width}px;padding:5px;margin-left:auto;margin-right:auto;" id="linkedin-full-profile">
	<link href="{$WWWROOT}blocktype/linkedinprofile/linkedin.css" type="text/css" rel="stylesheet">
	<div style="width:100%;margin-bottom:5px;text-align:right;"><img src="http://s4.licdn.com/scds/common/u/img/logos/logo_linkedin_92x22.png" border="0"></div>
	{$profile|safe}
</div>
{else}
<div style="width:{$width}px;padding:5px;float:{$align};" id="linkedin-full-profile">
	<link href="{$WWWROOT}blocktype/linkedinprofile/linkedin.css" type="text/css" rel="stylesheet">
	<div style="width:100%;margin-bottom:5px;text-align:right;"><img src="http://s4.licdn.com/scds/common/u/img/logos/logo_linkedin_92x22.png" border="0"></div>
	{$profile|safe}
</div>
{/if}