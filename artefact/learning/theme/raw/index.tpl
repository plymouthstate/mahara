{include file="header.tpl"}
<div id="learningwrap">
<p>{str tag="multipleintelligencesdesc" section="artefact.learning"}</p>
{$multipleintelligences|safe}
{contextualhelp plugintype='artefact' pluginname='learning' section='addmultipleintelligences'}
<br>
<p>{str tag="learningstylesdesc" section="artefact.learning"}</p>
{$learningstyles|safe}
{contextualhelp plugintype='artefact' pluginname='learning' section='addlearningstyles'}
</div>
{include file="footer.tpl"}
