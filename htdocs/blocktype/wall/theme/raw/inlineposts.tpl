<div id="wall">
    {if $wallmessage}
        <p>{$wallmessage}</p>
    {/if}
    {if $wallposts}
        {foreach from=$wallposts item=wallpost}
            <div class="wallpost{if $wallpost->private} private{/if}">
                <div class="userinfo"><img src="{$WWWROOT}thumb.php?type=profileicon&maxwidth=25&maxheight=25&id={$wallpost->from}" alt="Profile Icon"> 
                	<div class="userinforight"><strong><a href="{$WWWROOT}user/view.php?id={$wallpost->userid|escape}">{$wallpost->displayname|escape}</a></strong><span class="postedon"> - {$wallpost->postdate|format_date}</span></div>
                </div>
                <div class="text">{$wallpost->text|parse_bbcode}</div>
                {*<div class="controls">
        {if $ownwall}
                    [ <a href="{$WWWROOT}blocktype/wall/wall.php?instance={$instanceid}&replyto={$wallpost->id}">{str tag='reply' section='blocktype.wall'}</a> ]
        {/if}
        {if $ownwall || $wallpost->from == $userid}
                    [ <a href="{$WWWROOT}blocktype/wall/deletepost.php?instance={$instanceid}&return={if $wholewall}wall{else}profile{/if}">
                        {str tag='delete' section='blocktype.wall'}
                    </a> ]
        {/if}
                </div>*}
            </div>
        {/foreach}
        {if !$wholewall}
            <div class="right"><strong><a href="{$WWWROOT}blocktype/wall/wall.php?id={$instanceid}">{str tag='wholewall' section='blocktype.wall'} &raquo;</a></strong></div>
        {/if}
    {/if}
</div>