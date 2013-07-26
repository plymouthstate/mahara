{if $align == 'center'}
<div style="width:{$width}px;padding:5px;margin-left:auto;margin-right:auto;" id="linkedin-profile-summary">
	<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
	<script type="IN/MemberProfile"	data-id="{$profileurl}" data-format="inline" data-width="{$width}"{if $related == false} data-related="false"{/if}></script>
</div>
{else}
<div style="width:{$width}px;padding:5px;float:{$align};" id="linkedin-profile-summary">
	<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
	<script type="IN/MemberProfile"	data-id="{$profileurl}" data-format="inline" data-width="{$width}"{if $related == false} data-related="false"{/if}></script>
</div>
{/if}