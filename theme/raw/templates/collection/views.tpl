{include file="header.tpl"}
{if !$views}
        <div class="message">{str tag=noviews section=collection}</div>
{else}
<table id="collectionviews" class="fullwidth">
    <tbody>
        {foreach from=$views.views item=view}
            <tr class="{cycle values='r0,r1'}">
                <td><label><a href="{$WWWROOT}view/view.php?id={$view->view}">{$view->title}</a></label></td>
                <td><div class="fr s">{$view->remove|safe}</div></td>
                {if $views.count > 1}
                <td class="displayordercontrols" width="40">
                    {if $view->displayorder == $views.min}
                        <div id="viewdisplayorder_{$view->view}">
                            <a href="{$displayurl}&amp;view={$view->view}&amp;direction=down"><img src="{theme_url filename='images/move-block-down.png'}" alt="" ></a>
                        </div>
                    {elseif $view->displayorder == $views.max}
                        <div id="viewdisplayorder_{$view->view}">
                            <a href="{$displayurl}&amp;view={$view->view}&amp;direction=up"><img src="{theme_url filename='images/move-block-up.png'}" alt="" ></a>
                        </div>
                    {else}
                        <div id="viewdisplayorder_{$view->view}">
                            <a href="{$displayurl}&amp;view={$view->view}&amp;direction=up"><img src="{theme_url filename='images/move-block-up.png'}" alt="" ></a>
                            <a href="{$displayurl}&amp;view={$view->view}&amp;direction=down"><img src="{theme_url filename='images/move-block-down.png'}" alt="" ></a>
                        </div>
                    {/if}
                </td>
                {else}
                    <td>&nbsp;</td>
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>
{/if}
<fieldset>
<legend>{str tag=addviewstocollection section=collection}</legend>
{if $viewsform}
    {$viewsform|safe}
{else}
    {str tag=noviewsavailable section=collection}
{/if}
</fieldset>
{if $nextform}
  {$nextform|safe}
{/if}
{include file="footer.tpl"}
