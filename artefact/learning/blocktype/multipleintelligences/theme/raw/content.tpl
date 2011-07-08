{if $MULTIPLEINTELLIGENCES}
<div class="multipleintelligences" style="display:inline">
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="220" height="230" id="multipleintelligences" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="{$WWWROOT}/artefact/learning/swf/multipleintelligences.swf" />
	<param name="flashVars" value="color={$color}&values={$values}&legend={$legend}" />
	<param name="quality" value="high" />
	<param name="wmode" value="transparent" />
	<embed src="{$WWWROOT}artefact/learning/swf/multipleintelligences.swf" flashVars="color={$color}&values={$values}&legend={$legend}" quality="high" wmode="transparent" width="220" height="230" name="multipleintelligences" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<p>{str tag='dateadded' section='artefact.learning'} {$date}</p>
</div>
<div class="multipleintelligences legend" style="display:inline">
<strong>{str tag='legend' section='artefact.learning'}</strong>
<ol type="{$legend[0]}">
<li>{str tag='intelligenceA' section='artefact.learning'}</li>
<li>{str tag='intelligenceB' section='artefact.learning'}</li>
<li>{str tag='intelligenceC' section='artefact.learning'}</li>
<li>{str tag='intelligenceD' section='artefact.learning'}</li>
<li>{str tag='intelligenceE' section='artefact.learning'}</li>
<li>{str tag='intelligenceF' section='artefact.learning'}</li>
<li>{str tag='intelligenceG' section='artefact.learning'}</li>
<li>{str tag='intelligenceH' section='artefact.learning'}</li>
</ol>
</div>
{/if}
