iGame Welcome Guest

Shows a welcome box to iGame guests on index and portal page.
 
To Install:

Upload The Files, And Go to Admin CP And Active IT!

~ Vintagedaddyo


* note this particular plugin was created and intended to be used using this theme and instruction:


https://github.com/vintagedaddyo/MyBB-Theme-iGame/tree/master/FA5


Edit game template: header_welcomeblock_guest

Find:

<div class="buttonwrap">
<span style="color:white;"><strong>Not a member yet? Why not Sign up today </strong></span>
<br />
<a class="button login" href="{$mybb->settings['bburl']}/member.php?action=login" onclick="$('#quick_login').modal({ fadeDuration: 250, keepelement: true }); return false;"><font color="white"><i style="font-size: 16px;" class="far fa-check-circle fa-fw"></i> {$lang->welcome_login}</font></a> 

<a class="button2 register" href="{$mybb->settings['bburl']}/member.php?action=register"><font color="white"><i style="font-size: 16px;" class="fas fa-plus-circle fa-fw"></i>  {$lang->welcome_register} &nbsp;</font></a></div>

Remove or comment out like so:

<!--<div class="buttonwrap">
<span style="color:white;"><strong>Not a member yet? Why not Sign up today </strong></span>
<br />
<a class="button login" href="{$mybb->settings['bburl']}/member.php?action=login" onclick="$('#quick_login').modal({ fadeDuration: 250, keepelement: true }); return false;"><font color="white"><i style="font-size: 16px;" class="far fa-check-circle fa-fw"></i> {$lang->welcome_login}</font></a> 

<a class="button2 register" href="{$mybb->settings['bburl']}/member.php?action=register"><font color="white"><i style="font-size: 16px;" class="fas fa-plus-circle fa-fw"></i>  {$lang->welcome_register} &nbsp;</font></a></div>-->

After installing and editing the theme, then install the plugin


