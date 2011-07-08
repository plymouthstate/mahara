{include file="header.tpl"}

{if $messages}
<table id="messagethread" class="fullwidth fixwidth listing">
    <tbody>
    {foreach from=$messages item=message}
        <tr class="{cycle values='r0,r1'}">
          <td style="width: 20px;">
            <img src="{profile_icon_url user=$user maxwidth=20 maxheight=20}" alt="">
          </td>
          <td>
            <h5>
        {if $message->from == $user->id}
              {$user|display_name|escape}
        {else}
              {$USER|display_name|escape}
        {/if}
              <span class="postedon">{$message->ctime|strtotime|format_date}</span>
            </h5>
            <div class="messagebody">{$message->message}</div>
          </td>
        </tr>
    {/foreach}
    </tbody>
</table>
{/if}

{$form|safe}

{include file="footer.tpl"}
