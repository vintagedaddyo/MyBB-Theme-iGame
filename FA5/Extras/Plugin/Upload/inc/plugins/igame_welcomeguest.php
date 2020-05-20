<?php
/*
 * MyBB: iGame Welcome Guest
 *
 * File: igame_welcomeguest.php
 * 
 * Author: Vintagedaddyo
 *
 * MyBB Version: 1.8
 *
 * Plugin Version: 1.2
 *
 * 
 */

// Disallow direct access to this file for security reasons

if (!defined("IN_MYBB"))
  {
    die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
  }

$plugins->add_hook('index_start', 'igame_welcomeguest');

$plugins->add_hook('portal_start', 'igame_welcomeguest');

function igame_welcomeguest_info()
  {
    
    global $lang;
    $lang->load("igame_welcomeguest");
    
    $lang->igame_welcomeguest_Desc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' . '<input type="hidden" name="cmd" value="_s-xclick">' . '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' . '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' . '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' . '</form>' . $lang->igame_welcomeguest_Desc;
    
    return Array(
        'name' => $lang->igame_welcomeguest_Name,
        'description' => $lang->igame_welcomeguest_Desc,
        'website' => $lang->igame_welcomeguest_Web,
        'author' => $lang->igame_welcomeguest_Auth,
        'authorsite' => $lang->igame_welcomeguest_AuthSite,
        'version' => $lang->igame_welcomeguest_Ver,
        'compatibility' => $lang->igame_welcomeguest_Compat
    );
  }

function igame_welcomeguest_activate()
  {
    
    require_once MYBB_ROOT . '/inc/adminfunctions_templates.php';
    find_replace_templatesets('index', '#' . preg_quote('{$igame_welcomeguest}
') . '#i', '', 0);
    find_replace_templatesets('portal', '#' . preg_quote('{$igame_welcomeguest}
') . '#i', '', 0);
    find_replace_templatesets('index', '#' . preg_quote('{$forums}') . '#i', '{$igame_welcomeguest}
{$forums}');
    find_replace_templatesets('portal', '#' . preg_quote('{$announcements}') . '#i', '{$igame_welcomeguest}
{$announcements}');
    
    // activate stylesheet
    
    global $db;
    
    $stylesheet = '@media only screen and (max-width: 400px) { 
.igame_welcome_msg {
 margin-bottom:48px;
}
}

.trow1.igame_welcome_body {
	background: #161616 url("images/igame_welcome/trow1-body1.png") no-repeat 50% 50%;
	background-size: cover;
	min-height: 220px;
	position: relative;
}

.igame_welcome_msg {
	padding: 5px;
	font-size: 14px;
	font-weight: bold;
	color: #ffffff;
}

.igame_welcome_stats {
	color: #3f9889;
}

.igame_welcome_stats a {
	color: #3f9889;
}

.igame_welcome_buttons {
 position: absolute;
 padding: 5px;
 right: 0;
 bottom: 0;	
}

.igame_welcome_question {
	font-weight: bold;
	color: #ffffff;
}

a.igame_welcome_button_login {
	background: #3f9889;
	color: #fff;
	text-shadow: rgba(0,0,0,0.4) 0px 1px 1px;
	-moz-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-webkit-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	display: inline-block;
	padding: 6px 8px;
	margin: 2px 2px 6px 2px;
	transition: text-shadow 3s;
	-moz-transition: text-shadow 3s;
	-webkit-transition: text-shadow 3s;
	-o-transition: text-shadow 3s;
	font-family: "Roboto Condensed", sans-serif;
	font-size: 14px;
	font-style: normal;
}

a.igame_welcome_button_login:hover {
	background: #646464;
	color: #fff;
	text-shadow: #82241f 0px 1px 1px;
	-moz-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-webkit-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	-webkit-transition: background-color 600ms linear, color 600ms linear;
	-moz-transition: background-color 600ms linear, color 600ms linear;
	-o-transition: background-color 600ms linear, color 600ms linear;
	-ms-transition: background-color 600ms linear, color 600ms linear;
	transition: background-color 600ms linear, color 600ms linear;
}

a.igame_welcome_button_register {
	background: #3f9889;
	color: #fff;
	text-shadow: rgba(0,0,0,0.4) 0px 1px 1px;
	-moz-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-webkit-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	display: inline-block;
	padding: 6px 8px;
	margin: 2px 2px 6px 2px;
	transition: text-shadow 3s;
	-moz-transition: text-shadow 3s;
	-webkit-transition: text-shadow 3s;
	-o-transition: text-shadow 3s;
	font-family: "Roboto Condensed", sans-serif;
	font-size: 14px;
	font-style: normal;
}

a.igame_welcome_button_register:hover {
	background: #646464;
	color: #fff;
	text-shadow: #82241f 0px 1px 1px;
	-moz-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-webkit-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	-webkit-transition: background-color 600ms linear, color 600ms linear;
	-moz-transition: background-color 600ms linear, color 600ms linear;
	-o-transition: background-color 600ms linear, color 600ms linear;
	-ms-transition: background-color 600ms linear, color 600ms linear;
	transition: background-color 600ms linear, color 600ms linear;
}

.igame_welcome_button_icon {
	font-size: 16px;
	color: #ffffff;
}';
    
    $new_stylesheet = array(
        'name' => 'igame_welcomeguest.css',
        'tid' => 1,
        'attachedto' => '',
        'stylesheet' => $stylesheet,
        'lastmodified' => TIME_NOW
    );
    
    $sid = $db->insert_query('themestylesheets', $new_stylesheet);
    
    $db->update_query('themestylesheets', array(
        'cachefile' => "css.php?stylesheet={$sid}"
    ), "sid='{$sid}'", 1);
    
    $query = $db->simple_select('themes', 'tid');
    
    while ($theme = $db->fetch_array($query))
      {
        
        require_once MYBB_ADMIN_DIR . 'inc/functions_themes.php';
        
        update_theme_stylesheet_list($theme['tid']);
        
      }
    
  }

function igame_welcomeguest_deactivate()
  {
    
    require_once MYBB_ROOT . '/inc/adminfunctions_templates.php';
    find_replace_templatesets('index', '#' . preg_quote('{$igame_welcomeguest}
') . '#i', '', 0);
    find_replace_templatesets('portal', '#' . preg_quote('{$igame_welcomeguest}
') . '#i', '', 0);
    
    // de-activate stylesheet
    
    global $db;
    $db->delete_query('themestylesheets', "name='igame_welcomeguest.css'");
    
    $query = $db->simple_select('themes', 'tid');
    
    while ($theme = $db->fetch_array($query))
      {
        
        require_once MYBB_ADMIN_DIR . 'inc/functions_themes.php';
        update_theme_stylesheet_list($theme['tid']);
        
      }
    
  }

function igame_welcomeguest_lang()
  {
    
    global $lang;
    $lang->load("igame_welcomeguest");
  }

function igame_welcomeguest_global()
  {

        global $mybb, $stats, $theme, $cache; 

   // start stats global for welcome

    $stats = $cache->read("stats");
    $stats['newest_user'] = build_profile_link($stats['lastusername'], $stats['lastuid']);
    $total_posts = my_number_format($stats['numposts']);
    $total_users = my_number_format($stats['numusers']);

  }

function igame_welcomeguest()
  {
    
    global $mybb;
    
    if ($mybb->user['usergroup'] == 1)
      {
        global $theme, $lang, $igame_welcomeguest, $stats;
        
        
        igame_welcomeguest_lang();
        igame_welcomeguest_global();

        $igame_welcomeguest = '
		<table border="0" cellspacing="' . $theme['borderwidth'] . '" cellpadding="' . $theme['tablespace'] . '" class="tborder">
	<thead>
		<tr>
			<td class="thead">
				<strong>' . $lang->igame_welcomeguest_hello . ' ' . $mybb->settings['bbname'] . '</strong>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="trow1 igame_welcome_body">
		<div class="igame_welcome_msg float_left"><h1>' . $lang->igame_welcomeguest_shout . '</h1>

' . $lang->igame_welcomeguest_message . '<br />
<br />
 ' . $lang->igame_welcomeguest_create . '
        <ul>
            <li>' . $lang->igame_welcomeguest_discuss . ' <span class="igame_welcome_stats"><a href="' . $mybb->settings['bburl'] . '/memberlist.php">' . $stats['numusers'] . '</a></span> ' . $lang->igame_welcomeguest_othermembers . '<span class="igame_welcome_stats">' . $stats['numthreads'] . '</span>' . $lang->igame_welcomeguest_topics . '</li>

            <li>' . $lang->igame_welcomeguest_browse . '<span class="igame_welcome_stats">' . $stats['numposts'] . '</span>' . $lang->igame_welcomeguest_posts . '</li>

            <li>' . $lang->igame_welcomeguest_newest_user . '<span class="igame_welcome_stats">' . $stats['newest_user'] . '</span></li><br />            
        </ul>
     </div>
    <br />
 <div class="float_right"> 
<span class="igame_welcome_buttons">    
 <span class="igame_welcome_question">' . $lang->igame_welcomeguest_question . '</span>
<br />
        <a class="igame_welcome_button_register" href="' . $mybb->settings['bburl'] . '/member.php?action=register"><i class="fas fa-plus-circle fa-fw igame_welcome_button_icon"></i> 
            ' . $lang->igame_welcomeguest_createacct . '
      </a>
        <a class="igame_welcome_button_login" href="' . $mybb->settings['bburl'] . '/member.php?action=login"onclick="$(\'#quick_login\').modal({ fadeDuration: 250, keepelement: true }); return false;"><i " class="fas fa-check-circle fa-fw igame_welcome_button_icon"></i> ' . $lang->igame_welcomeguest_loginacct . '</font>
      </a>
     </span>
    </div>
    <br />
   </td>
		</tr>
	</tbody>
</table>
<br />';
      }
  }

?>