<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <title>MediBhai</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" data-ca-mode="" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="cmsmagazine" content="7a30f4c74dfb81f1994167b8d9be19a8" />
    <meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="<?php echo base_url();?>css/Demo.css" />

    <link href="<?php echo base_url();?>front_css/images/logos/9/medibhai_final__2___5__vnpn-im.png" rel="shortcut icon" type="image/png" />

    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>front_css/var/cache/misc/assets/design/themes/thin_theme/css/standalone.cbf163654719fa67da5ded9bfb52a80a1555302207.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>front_css/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script type="text/javascript" data-no-defer>
        window.jsErrors = [];
        window.onerror = function(message, source, lineno, colno, error) {
            var verboseMessage = message;
            if (source) {
                verboseMessage = source + '@' + lineno + ':' + colno + "\n\n" + message;
            }

            console.error(verboseMessage);

            if (error && error.stack) {
                console.log(error.stack);
            }

            document.write('<pre data-ca-debug="1" style="border: 2px solid red; margin: 2px;">' + verboseMessage + "\n\n" + (error && error.stack ? error.stack : '') + '</pre>');
        };
    </script>

</head>

<body>

    <div class="ty-tygh  " id="tygh_container">
        <div id="ajax_overlay" class="ty-ajax-overlay"></div>
        <div id="ajax_loading_box" class="ty-ajax-loading-box"></div>
        <div class="cm-notification-container notification-container"></div>
        <div class="ty-helper-container" id="tygh_main_container">

            <div class="tygh-top-panel clearfix">
                <div class="container-fluid  top-grid">

                    <section class="ath_gird-section ">
                        <div class="ath_container clearfix">
                            <div class="row-fluid ">
                                <div class="span16 top-links-grid hidden-phone">
                                    <div class=" ty-float-right">
                                        <div id="currencies_77"></div>
                                    </div>
                                    <div class=" ty-float-right">
                                        <div id="languages_1"></div>
                                    </div>

                                    <div class=" hidden-phone ty-float-right">

                                        <div class="ty-text-links-wrapper">
                                            <span id="sw_text_links_248" class="ty-text-links-btn cm-combination visible-phone">
            <i class="ty-icon-short-list"></i>
            <i class="ty-icon-down-micro ty-text-links-btn__arrow"></i>
        </span>

                                            <ul id="text_links_248" class="ty-text-links cm-popup-box ty-text-links_show_inline">
                                                <li class="ty-text-links__item ty-level-0">
                                                    <a class="ty-text-links__a" href="index1ff8.html?dispatch=companies.vendor_plans">Become a partner</a>
                                                </li>
                                                <li class="ty-text-links__item ty-level-0">
                                                    <a class="ty-text-links__a" href="indexc252.html?dispatch=pages.view&amp;page_id=33">Articles</a>
                                                </li>
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

            <div class="tygh-header clearfix">
                <div class="container-fluid  header-grid">
                    <section class="ath_gird-section ">
                        <div class="ath_container clearfix">
                            <div class="row-fluid ">

                                <div class="span3 top-logo-grid">
                                    <div class=" top-logo">
                                        <div class="ty-logo-container">
                                            <a href="<?php echo base_url();?>" title="">
                                                <img src="<?php echo base_url();?>front_css/images/logos/9/medibhai_final__2___5___1_.png" width="98" height="87" alt="" class="ty-logo-container__image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="span12">
                                    <div class="ty-dropdown-box  th_your-account ty-float-right">

                                        <?php
										if($this->session->userdata('user_info'))
										{  ?>
									
									    <div id="sw_dropdown_253" class="ty-dropdown-box__title cm-combination unlogged">
                                        <a class="ty-account-info__title" href="#">
                                        <i class="icon-tt-user th_user__icon"></i>&nbsp;
                                        <span class="ty-account-info__title-txt">Hello.<br> <?php if(isset($this->session->userdata['user_info']['lastname'])){
											echo $this->session->userdata['user_info']['lastname'];
										}?></span>
                                        </a>
                                        </div>
									    
										
										<div id="dropdown_253" class="cm-popup-box ty-dropdown-box__content hidden">
										<div id="account_info_253">
										<ul class="ty-account-info">
                                        <li class="ty-account-info__item ty-dropdown-box__item">
										
										</li>
                                        </ul>
										
										<div class="ty-account-info__buttons buttons-container">
										<a href="<?php echo base_url();?>Home/logout" rel="nofollow" class="ty-btn ty-btn__primary" rel="nofollow">Logout</a>
										</div>
										
										</div>
										</div>
											 
										<?php }
										else
										{  ?>
									
									
									    <div id="sw_dropdown_253" class="ty-dropdown-box__title cm-combination unlogged">
                                        <a class="ty-account-info__title" href="#">
                                        <i class="icon-tt-user th_user__icon"></i>&nbsp;
                                        <span class="ty-account-info__title-txt">Hello.<br>Sign In</span>
                                        </a>
                                        </div>
										
										
										

                                        <div id="dropdown_253" class="cm-popup-box ty-dropdown-box__content hidden">
                                        
                                        <div id="account_info_253">

                                        <ul class="ty-account-info">
                                        <li class="ty-account-info__item ty-dropdown-box__item">
                                        <!--<a class="ty-account-info__a underlined" href="#" rel="nofollow">Claims</a>-->
                                        </li>
                                        </ul>

                                        <div class="ty-account-info__buttons buttons-container">
                                                    
										<a href="<?php echo base_url();?>Home/signin" rel="nofollow" class="ty-btn ty-btn__secondary">Sign in</a>
                                        <a href="<?php echo base_url();?>Home/Registeration" rel="nofollow" class="ty-btn ty-btn__primary">Register</a>
                                        
                                        </div>
                                        </div>

                                        </div>
									
									
									
											
										<?php } ?>
										
										
										
										
										
										
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="ath_gird-section tt_header-menu__section">
                        <div class="ath_container clearfix">
                            <div class="row-fluid ">
                                <div class="span16 ">
                                    <div class=" tt_header-menu ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>