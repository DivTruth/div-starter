<?php 
/**
 * Social Icon Styles
 */
?>

body {
	background-color: #<?php the_field('flicker','options'); ?>;
}

/*Change icons size here*/
.social-icons .fa {
	font-size: 1.0em;
}
/*Change icons circle size and color here*/
.social-icons .fa {
	width: 35px;
	height: 35px;
	line-height: 35px;
	text-align: center;
	color: #FFF;
	color: rgba(255, 255, 255, 0.8);
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-ms-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
}

.social-icons.icon-circle .fa{ 
	border-radius: 50%;
}
.social-icons.icon-rounded .fa{
	border-radius:5px;
}
.social-icons.icon-flat .fa{
	border-radius: 0;
}

.social-icons .fa:hover, .social-icons .fa:active {
	color: #FFF;
	-webkit-box-shadow: 1px 1px 3px #333;
	-moz-box-shadow: 1px 1px 3px #333;
	box-shadow: 1px 1px 3px #333; 
}
.social-icons.icon-zoom .fa:hover, .social-icons.icon-zoom .fa:active { 
 	-webkit-transform: scale(1.1);
	-moz-transform: scale(1.1);
	-ms-transform: scale(1.1);
	-o-transform: scale(1.1);
	transform: scale(1.1); 
}
.social-icons.icon-rotate .fa:hover, .social-icons.icon-rotate .fa:active { 
	-webkit-transform: scale(1.1) rotate(360deg);
	-moz-transform: scale(1.1) rotate(360deg);
	-ms-transform: scale(1.1) rotate(360deg);
	-o-transform: scale(1.1) rotate(360deg);
	transform: scale(1.1) rotate(360deg);
}
 
.social-icons .fa-adn{background-color:#504e54;} 
.social-icons .fa-apple{background-color:#aeb5c5;} 
.social-icons .fa-android{background-color:#A5C63B;}  
.social-icons .fa-bitbucket,.social-icons .fa-bitbucket-square{background-color:#003366;} 
.social-icons .fa-bitcoin,.social-icons .fa-btc{background-color:#F7931A;} 
.social-icons .fa-css3{background-color:#1572B7;} 
.social-icons .fa-dribbble{background-color:#F46899;}  
.social-icons .fa-dropbox{background-color:#018BD3;}
.social-icons .fa-facebook,.social-icons .fa-facebook-square{background-color:#3C599F;}  
.social-icons .fa-flickr{background-color:#FF0084;}
.social-icons .fa-foursquare{background-color:#0086BE;}
.social-icons .fa-github,.social-icons .fa-github-alt,.social-icons .fa-github-square{background-color:#070709;} 
.social-icons .fa-google-plus,.social-icons .fa-google-plus-square{background-color:#CF3D2E;} 
.social-icons .fa-html5{background-color:#E54D26;}
.social-icons .fa-instagram{background-color:#A1755C;}
.social-icons .fa-linkedin,.social-icons .fa-linkedin-square{background-color:#0085AE;} 
.social-icons .fa-linux{background-color:#FBC002;color:#333;}
.social-icons .fa-maxcdn{background-color:#F6AE1C;}
.social-icons .fa-pagelines{background-color:#241E20;color:#3984EA;}
.social-icons .fa-pinterest,.social-icons .fa-pinterest-square{background-color:#CC2127;} 
.social-icons .fa-renren{background-color:#025DAC;}
.social-icons .fa-skype{background-color:#01AEF2;}
.social-icons .fa-stack-exchange{background-color:#245590;}
.social-icons .fa-stack-overflow{background-color:#FF7300;}
.social-icons .fa-trello{background-color:#265A7F;}
.social-icons .fa-tumblr,.social-icons .fa-tumblr-square{background-color:#314E6C;} 
.social-icons .fa-twitter,.social-icons .fa-twitter-square{background-color:#32CCFE;} 
.social-icons .fa-vimeo-square{background-color:#229ACC;}
.social-icons .fa-vk{background-color:#375474;}
.social-icons .fa-weibo{background-color:#D72B2B;}
.social-icons .fa-windows{background-color:#12B6F3;}
.social-icons .fa-xing,.social-icons .fa-xing-square{background-color:#00555C;} 
.social-icons .fa-youtube,.social-icons .fa-youtube-play,.social-icons .fa-youtube-square{background-color:#C52F30;}
 