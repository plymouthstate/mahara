{if $LEARNINGSTYLES}
<div class="learningstyles">
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="220" height="230" id="learningstyles" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="{$WWWROOT}/artefact/learning/swf/learningstyles.swf" />
	<param name="flashVars" value="color1={$color1}&color2={$color2}&color3={$color3}&values={$values}&legend={$legend}" />
	<param name="quality" value="high" />
	<param name="wmode" value="transparent" />
	<embed src="{$WWWROOT}artefact/learning/swf/learningstyles.swf" flashVars="color1={$color1}&color2={$color2}&color3={$color3}&values={$values}&legend={$legend}" quality="high" wmode="transparent" width="220" height="230" name="learningstyles" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<p>{str tag='dateadded' section='artefact.learning'} {$date}</p>
</div>
<div class="learningstyles legend">
<strong>{str tag='legend' section='artefact.learning'}</strong>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="15">&nbsp;</td>
<td width="15">{$legend[0]}.<br>{$legend[2]}.<br>{$legend[4]}.</td>
<td>
{str tag='learningtypeV' section='artefact.learning'}<br>
{str tag='learningtypeA' section='artefact.learning'}<br>
{str tag='learningtypeK' section='artefact.learning'}
</td>
</tr>
</table>
</div>
{/if}
