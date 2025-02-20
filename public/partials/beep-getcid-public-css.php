<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://beepcoder.com
 * @since      1.0.0
 *
 * @package    Beep_Getcid
 * @subpackage Beep_Getcid/public/partials
 */

$bc_panel_text_color = get_option('bc_panel_text_color', '#000000');
$bc_footer_bg_color = get_option('bc_footer_bg_color', '#f1f1f1');
$bc_panel_bg_color = get_option('bc_panel_bg_color', '#ffffff');
$bc_primary_bg_color = get_option('bc_primary_bg_color', '#0073aa');
$bc_button_hover_color = get_option('bc_button_hover_color', '#005a87');

$bc_custom_css = "
	.bc-box-title{
		color: {$bc_panel_text_color};
	}
	.bc-input-container label {
	    color: {$bc_panel_text_color};
	}
    .bc-box-wrapper {
        color: {$bc_panel_text_color};
        background-color: {$bc_panel_bg_color};
    }
    .bc-box-footer {
        background-color: {$bc_footer_bg_color};
        border: 1px solid {$bc_footer_bg_color};
    }
    .bc-btn{
        background-color: {$bc_primary_bg_color};
        color: #ffffff;
    }
    .bc-btn:hover {
        background-color: {$bc_button_hover_color};
    }
    .bc-input-area button:hover{
    	background-color: {$bc_button_hover_color};
    }
    .bc-input-area button{
    	background-color: {$bc_primary_bg_color};
        color: #ffffff;
    }
    .bc-footer-info span{
    	color: {$bc_panel_text_color};
    }
    .bc-input-container input:focus {
	    border-color: {$bc_primary_bg_color};
	    box-shadow: 0 0 4px {$bc_primary_bg_color};
	}
	.bc-input-area input:focus {
	    border-color: {$bc_primary_bg_color};
	    box-shadow: 0 0 4px {$bc_primary_bg_color};
	}
";
