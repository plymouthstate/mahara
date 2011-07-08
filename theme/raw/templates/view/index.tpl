{include file="header.tpl"}

{if $GROUP}<h2>{str tag=groupviews section=view}</h2>
{/if}
            <div class="rbuttons{if $GROUP} pagetabs{/if}">
                {$createviewform|safe}
                <form method="post" action="{$WWWROOT}view/choosetemplate.php">
                    <input type="submit" class="submit" value="{str tag="copyaview" section="view"}">
{if $GROUP}
                    <input type="hidden" name="group" value="{$GROUP->id}" />
{elseif $institution}
                    <input type="hidden" name="institution" value="{$institution}">
{/if}
                </form>
            </div>
{if $institution}                {$institutionselector|safe}{/if}

{if $views}
            <table id="myviews" class="fullwidth listing">
                <tbody>
{foreach from=$views item=view}
                    <tr class="{cycle values='r0,r1'}">
                        <td><div class="rel">
{if $view.type == 'profile'}
                            <h3><a href="{$WWWROOT}user/view.php">{str tag=profileviewtitle section=view}</a></h3>
{elseif $view.type == 'dashboard'}
                            <h3><a href="{$WWWROOT}">{str tag=dashboardviewtitle section=view}</a></h3>
{elseif $view.type == 'grouphomepage'}
                            <h3><a href="{$WWWROOT}group/view.php?id={$GROUP->id}">{str tag=grouphomepage section=view}</a></h3>
{else}
                            <h3><a href="{$WWWROOT}view/view.php?id={$view.id}">{$view.title}</a></h3>
{/if}
{if $view.submittedto}
                            <div class="submitted-viewitem">{$view.submittedto|clean_html|safe}</div>
{else}
                            {if $view.removable}<div class="rbuttons"><a href="{$WWWROOT}view/delete.php?id={$view.id}" class="btn-del">{str tag="deletethisview" section="view"}</a></div>{/if}
                            <div class="vi">
{if $view.type != 'profile' && $view.type != 'dashboard' && $view.type != 'grouphomepage'}
                                <h4><a href="{$WWWROOT}view/edit.php?id={$view.id}" id="editviewdetails">{str tag="edittitleanddescription" section="view"}</a></h4>
{/if}
{if $view.type == 'profile'}
                                <div class="videsc">{str tag=profiledescription}</div>
{elseif $view.type == 'dashboard'}
                                <div class="videsc">{str tag=dashboarddescription}</div>
{elseif $view.type == 'grouphomepage'}
                                <div class="videsc">{str tag=grouphomepagedescription section=view}</div>
{elseif $view.description}
                                <div class="videsc">{$view.description|clean_html|safe}</div>
{/if}
{if $view.tags}
                                <div class="tags"><label>{str tag=tags}:</label> {list_tags owner=$view.owner tags=$view.tags}</div>
{/if}
                            </div>
                            <div class="vi">
                                <h4><a href="{$WWWROOT}view/blocks.php?id={$view.id}" id="editthisview">{str tag ="editcontentandlayout" section="view"}</a></h4>
{if $view.artefacts}
                                <div class="artefacts"><label>{str tag="artefacts" section="view"}:</label>
                                {foreach from=$view.artefacts item=artefact name=artefacts}<a href="{$WWWROOT}view/artefact.php?artefact={$artefact.id}&amp;view={$view.id}" id="link-artefacts">{$artefact.title}</a>{if !$.foreach.artefacts.last}, {/if}{/foreach}</div>
{/if}
                            </div>
{/if}
                            <div class="vi">
{if $view.togglepublic}
                                {$view.togglepublic|safe}
{elseif $view.collection}
                                <div class="collection"><label>{str tag=Collection section=collection}:</label> <a href="{$WWWROOT}collection/views.php?id={$view.collection->id}">{$view.collection->name}</a></div>
{elseif $view.type != 'profile' && $view.type != 'dashboard' && $view.type != 'grouphomepage'}
                                <h4><a href="{$WWWROOT}view/access.php?id={$view.id}" id="editviewaccess">{str tag="editaccess" section="view"}</a></h4>
{/if}
{if $view.access}
                               <div class="videsc">{$view.access}</div>
{/if}
{if !$view.collection}
  {if $view.accessgroups}
                                  <div class="viewaccess"><label>{str tag="whocanseethisview" section="view"}:</label>
  {foreach from=$view.accessgroups item=accessgroup name=artefacts}{strip}
  {if $accessgroup.accesstype == 'loggedin'}
      {str tag="loggedinlower" section="view"}
  {elseif $accessgroup.accesstype == 'public'}
      {str tag="publiclower" section="view"}
  {elseif $accessgroup.accesstype == 'friends'}
      <a href="{$WWWROOT}user/myfriends.php" id="link-myfriends">{str tag="friendslower" section="view"}</a>
  {elseif $accessgroup.accesstype == 'group'}
      <a href="{$WWWROOT}group/view.php?id={$accessgroup.id}">{$accessgroup.name}</a>{if $accessgroup.role} ({$accessgroup.roledisplay}){/if}
  {elseif $accessgroup.accesstype == 'user'}
      <a href="{$WWWROOT}user/view.php?id={$accessgroup.id}">{$accessgroup.id|display_name|escape}</a>
  {elseif $accessgroup.accesstype == 'secreturl'}
      {str tag="peoplewiththesecreturl" section="view"}
  {/if}{/strip}{if !$.foreach.artefacts.last}, {/if}
  {/foreach}
  {if $view.template}<br>{str tag=thisviewmaybecopied section=view}{/if}
                                  </div>
  {else}
                                  <div class="videsc">{str tag="nobodycanseethisview2" section="view"}</div>
  {/if}
{/if}
                            </div>
{if $view.submitto && $view.type != 'profile' && $view.type != 'dashboard'}
                            <div class="submit-viewitem">{$view.submitto|safe}</div>
{/if}
                        </div></td>
                    </tr>
{/foreach}
                </tbody>
            </table>
{$pagination|safe}
{else}
            <div class="message">{if $GROUP}{str tag="noviewstosee" section="group"}{elseif $institution}{str tag="noviews" section="view"}{else}{str tag="youhavenoviews" section="view"}{/if}</div>
{/if}
{include file="footer.tpl"}
