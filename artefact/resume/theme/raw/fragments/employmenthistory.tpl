<fieldset>{if !$hidetitle}<legend class="resumeh3">{str tag='employmenthistory' section='artefact.resume'}
{if $controls} 
    {contextualhelp plugintype='artefact' pluginname='resume' section='addemploymenthistory'}
{/if}
</legend>{/if}
<table id="employmenthistorylist{$suffix}" class="tablerenderer resumefive resumecomposite">
    <colgroup width="25%" span="2"></colgroup>
    <thead>
        <tr>
            <th class="resumedate">{str tag='startdate' section='artefact.resume'}</th>
            <th class="resumedate">{str tag='enddate' section='artefact.resume'}</th>
            <th>{str tag='position' section='artefact.resume'}</th>
            {if $controls}
            <th class="resumecontrols"></th>
            <th class="resumecontrols"></th>
            <th class="resumecontrols"></th>
            {/if}
        </tr>
    </thead>
    <tbody>
        {foreach from=$rows item=row}
        <tr class="{cycle values='r0,r1'}">
            <td>{$row->startdate}</td>
            <td>{$row->enddate}</td>
            <td><div class="jstitle">{$row->jobtitle}: {$row->employer}</div>
            <div class="jsdescription">{$row->positiondescription}</div></td>
        </tr>
        {/foreach}
    </tbody>
</table>
{if $controls}
<div>
    <div id="employmenthistoryform" class="hidden">{$compositeforms.employmenthistory|safe}</div>
    <button id="addemploymenthistorybutton" class="submit" onclick="toggleCompositeForm('employmenthistory');">{str tag='add'}</button>
</div>
{/if}
</fieldset>
