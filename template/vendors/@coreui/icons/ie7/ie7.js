/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'CoreUI-Icons-Free\'">' + entity + '</span>' + html;
	}
	var icons = {
		'cui-apple': '&#xec0f;',
		'cui-birthday-cake': '&#xec10;',
		'cui-burger': '&#xec11;',
		'cui-coffee': '&#xe97d;',
		'cui-dinner': '&#xec12;',
		'cui-drink': '&#xec13;',
		'cui-drink-alcohol': '&#xec14;',
		'cui-fastfood': '&#xec15;',
		'cui-lemon': '&#xea0f;',
		'cui-mug': '&#xec17;',
		'cui-mug-tea': '&#xec18;',
		'cui-pizza': '&#xec19;',
		'cui-restaurant': '&#xec1a;',
		'cui-battery-0': '&#xe935;',
		'cui-battery-empty': '&#xe935;',
		'cui-battery-3': '&#xe9b4;',
		'cui-battery-5': '&#xe9d7;',
		'cui-battery-full': '&#xe9d7;',
		'cui-battery-alert': '&#xeccc;',
		'cui-battery-slash': '&#xecd3;',
		'cui-bolt': '&#xecd5;',
		'cui-fire': '&#xecd9;',
		'cui-cat': '&#xec1c;',
		'cui-dog': '&#xec1d;',
		'cui-flower': '&#xec1e;',
		'cui-leaf': '&#xec1f;',
		'cui-eco': '&#xec1f;',
		'cui-plant': '&#xec1f;',
		'cui-paw': '&#xec20;',
		'cui-animal': '&#xec20;',
		'cui-terrain': '&#xec21;',
		'cui-american-football': '&#xe900;',
		'cui-baseball': '&#xe927;',
		'cui-basketball': '&#xe929;',
		'cui-bowling': '&#xe92a;',
		'cui-football': '&#xe93a;',
		'cui-soccer': '&#xe93a;',
		'cui-golf': '&#xe942;',
		'cui-golf-alt': '&#xe977;',
		'cui-rowing': '&#xe984;',
		'cui-running': '&#xe998;',
		'cui-swimming': '&#xe999;',
		'cui-tennis': '&#xe99c;',
		'cui-tennis-ball': '&#xe9a6;',
		'cui-weightlifitng': '&#xe9b1;',
		'cui-browser': '&#xe947;',
		'cui-cast': '&#xec22;',
		'cui-cloud': '&#xe978;',
		'cui-cloud-download': '&#xe979;',
		'cui-cloud-upload': '&#xe97a;',
		'cui-data-transfer-down': '&#xe9a4;',
		'cui-data-transfer-up': '&#xe9a5;',
		'cui-ethernet': '&#xec2a;',
		'cui-external-link': '&#xe9c0;',
		'cui-https': '&#xec2d;',
		'cui-lan': '&#xec2e;',
		'cui-link': '&#xec2f;',
		'cui-link-alt': '&#xec30;',
		'cui-link-broken': '&#xe946;',
		'cui-newspaper': '&#xea37;',
		'cui-paper-plane': '&#xea3d;',
		'cui-send': '&#xea3d;',
		'cui-rss': '&#xea6b;',
		'cui-share': '&#xea74;',
		'cui-share-all': '&#xea75;',
		'cui-share-alt': '&#xec35;',
		'cui-share-boxed': '&#xea76;',
		'cui-sitemap': '&#xea7c;',
		'cui-stream': '&#xea94;',
		'cui-transfer': '&#xeaa3;',
		'cui-wifi-signal-0': '&#xec37;',
		'cui-wifi-signal-1': '&#xec38;',
		'cui-wifi-signal-2': '&#xec39;',
		'cui-wifi-signal-4': '&#xec3b;',
		'cui-wifi-signal-off': '&#xec41;',
		'cui-bank': '&#xe934;',
		'cui-bath': '&#xe959;',
		'cui-bathroom': '&#xe959;',
		'cui-beach-access': '&#xea03;',
		'cui-bed': '&#xeac9;',
		'cui-building': '&#xe94a;',
		'cui-casino': '&#xec45;',
		'cui-child-friendly': '&#xec46;',
		'cui-baby-carriage': '&#xec46;',
		'cui-pushchair': '&#xec46;',
		'cui-couch': '&#xec48;',
		'cui-sofa': '&#xec48;',
		'cui-door': '&#xec49;',
		'cui-elevator': '&#xe9b2;',
		'cui-fridge': '&#xec4a;',
		'cui-garage': '&#xec4b;',
		'cui-home': '&#xe9f9;',
		'cui-hospital': '&#xe9fa;',
		'cui-hot-tub': '&#xec4c;',
		'cui-house': '&#xec4e;',
		'cui-industry': '&#xec4f;',
		'cui-factory': '&#xec4f;',
		'cui-industry-slash': '&#xec50;',
		'cui-factory-slash': '&#xec50;',
		'cui-institution': '&#xec51;',
		'cui-library-building': '&#xec51;',
		'cui-medical-cross': '&#xec54;',
		'cui-pool': '&#xec55;',
		'cui-room': '&#xec56;',
		'cui-school': '&#xec58;',
		'cui-education': '&#xec58;',
		'cui-shower': '&#xec59;',
		'cui-smoke-free': '&#xec5a;',
		'cui-smoke-slash': '&#xec5a;',
		'cui-smoking-room': '&#xec5b;',
		'cui-smoke': '&#xec5b;',
		'cui-spa': '&#xec5c;',
		'cui-toilet': '&#xec5d;',
		'cui-wc': '&#xec5e;',
		'cui-window': '&#xec5f;',
		'cui-cloudy': '&#xe97b;',
		'cui-moon': '&#xea34;',
		'cui-rain': '&#xea62;',
		'cui-snowflake': '&#xea7f;',
		'cui-sun': '&#xea95;',
		'cui-alarm': '&#xeb02;',
		'cui-bell': '&#xe938;',
		'cui-bullhorn': '&#xe94b;',
		'cui-warning': '&#xeab8;',
		'cui-asterisk': '&#xea64;',
		'cui-asterisk-circle': '&#xecf3;',
		'cui-badge': '&#xe92c;',
		'cui-circle': '&#xe971;',
		'cui-drop1': '&#xecf4;',
		'cui-heart': '&#xe9f6;',
		'cui-puzzle': '&#xecf5;',
		'cui-rectangle': '&#xecf7;',
		'cui-scrubber': '&#xea72;',
		'cui-square': '&#xea8f;',
		'cui-star': '&#xea90;',
		'cui-star-half': '&#xea91;',
		'cui-triangle': '&#xeaa5;',
		'cui-barcode': '&#xe9db;',
		'cui-beaker': '&#xe9e1;',
		'cui-bluetooth': '&#xe9f3;',
		'cui-bug': '&#xea2b;',
		'cui-code': '&#xea2d;',
		'cui-devices': '&#xea47;',
		'cui-fax': '&#xea5f;',
		'cui-fork': '&#xea6f;',
		'cui-gamepad': '&#xea70;',
		'cui-input-hdmi': '&#xea7e;',
		'cui-input-power': '&#xea96;',
		'cui-keyboard': '&#xeaaa;',
		'cui-laptop': '&#xeaac;',
		'cui-lightbulb': '&#xeaad;',
		'cui-memory': '&#xeb78;',
		'cui-monitor': '&#xeb7a;',
		'cui-mouse': '&#xeb7b;',
		'cui-print': '&#xeb7d;',
		'cui-qr-code': '&#xeb80;',
		'cui-satelite': '&#xeb82;',
		'cui-screen-desktop': '&#xeb85;',
		'cui-screen-smartphone': '&#xeb8c;',
		'cui-signal-cellular-0': '&#xeb90;',
		'cui-signal-cellular-3': '&#xeb93;',
		'cui-signal-cellular-4': '&#xeb94;',
		'cui-tablet': '&#xeb9c;',
		'cui-task': '&#xeb9d;',
		'cui-terminal': '&#xeb9e;',
		'cui-watch': '&#xec05;',
		'cui-3d': '&#xe901;',
		'cui-aperture': '&#xe903;',
		'cui-blur': '&#xe906;',
		'cui-blur-circular': '&#xe907;',
		'cui-blur-linear': '&#xe908;',
		'cui-border-all': '&#xe90b;',
		'cui-border-bottom': '&#xe90c;',
		'cui-border-clear': '&#xe90d;',
		'cui-border-horizontal': '&#xe90e;',
		'cui-border-inner': '&#xe90f;',
		'cui-border-left': '&#xe910;',
		'cui-border-outer': '&#xe911;',
		'cui-border-right': '&#xe912;',
		'cui-border-style': '&#xe913;',
		'cui-border-top': '&#xe914;',
		'cui-border-vertical': '&#xe915;',
		'cui-brush': '&#xe916;',
		'cui-brush-alt': '&#xe917;',
		'cui-camera-roll': '&#xe918;',
		'cui-center-focus': '&#xe919;',
		'cui-color-border': '&#xe91b;',
		'cui-color-fill': '&#xe91c;',
		'cui-color-palette': '&#xe91d;',
		'cui-contrast': '&#xe91f;',
		'cui-crop': '&#xe920;',
		'cui-crop-rotate': '&#xe921;',
		'cui-cursor': '&#xe922;',
		'cui-cursor-move': '&#xe923;',
		'cui-drop': '&#xe924;',
		'cui-exposure': '&#xe926;',
		'cui-eyedropper': '&#xe930;',
		'cui-filter-frames': '&#xe93c;',
		'cui-filter-photo': '&#xe948;',
		'cui-flip': '&#xe952;',
		'cui-flip-to-back': '&#xe953;',
		'cui-flip-to-front': '&#xe954;',
		'cui-gif': '&#xe955;',
		'cui-gradient': '&#xe956;',
		'cui-grain': '&#xe960;',
		'cui-grid': '&#xe961;',
		'cui-grid-slash': '&#xe962;',
		'cui-hdr': '&#xe963;',
		'cui-healing': '&#xe99d;',
		'cui-image-broken': '&#xe99f;',
		'cui-image-plus': '&#xe9a0;',
		'cui-layers': '&#xe9ad;',
		'cui-line-style': '&#xe9af;',
		'cui-line-weight': '&#xe9b9;',
		'cui-object-group': '&#xe9bb;',
		'cui-object-ungroup': '&#xe9c3;',
		'cui-opacity': '&#xe9f4;',
		'cui-paint': '&#xe9f7;',
		'cui-paint-bucket': '&#xea06;',
		'cui-swap-horizontal': '&#xea0e;',
		'cui-swap-vertical': '&#xea11;',
		'cui-vector': '&#xea16;',
		'cui-vertical-align-bottom1': '&#xea35;',
		'cui-vertical-align-center1': '&#xea3a;',
		'cui-vertical-align-top1': '&#xea3b;',
		'cui-align-center': '&#xea40;',
		'cui-align-left': '&#xea41;',
		'cui-align-right': '&#xea42;',
		'cui-bold': '&#xea43;',
		'cui-copy': '&#xea44;',
		'cui-cut': '&#xea61;',
		'cui-delete': '&#xea85;',
		'cui-backspace': '&#xea85;',
		'cui-double-quote-sans-left': '&#xea86;',
		'cui-double-quote-sans-right': '&#xea87;',
		'cui-excerpt': '&#xea8a;',
		'cui-expand-down': '&#xea9c;',
		'cui-expand-left': '&#xea9d;',
		'cui-expand-right': '&#xea9e;',
		'cui-expand-up': '&#xeaa7;',
		'cui-font': '&#xeaae;',
		'cui-functions': '&#xeaaf;',
		'cui-functions-alt': '&#xeab0;',
		'cui-header': '&#xeb0e;',
		'cui-highlighter': '&#xeb0f;',
		'cui-highligt': '&#xeb10;',
		'cui-indent-decrease': '&#xeb11;',
		'cui-indent-increase': '&#xeb12;',
		'cui-info': '&#xeb13;',
		'cui-italic': '&#xeb14;',
		'cui-justify-center': '&#xeb15;',
		'cui-justify-left': '&#xeb16;',
		'cui-justify-right': '&#xeb17;',
		'cui-level-down': '&#xeb18;',
		'cui-level-up': '&#xeb19;',
		'cui-line-spacing': '&#xeb1a;',
		'cui-list': '&#xeb1b;',
		'cui-list-filter': '&#xeb1c;',
		'cui-list-high-priority': '&#xeb1d;',
		'cui-list-low-priority': '&#xeb1e;',
		'cui-list-numbered': '&#xeb1f;',
		'cui-list-rich': '&#xeb21;',
		'cui-notes': '&#xeb22;',
		'cui-paragraph': '&#xeb24;',
		'cui-pen-alt': '&#xeb26;',
		'cui-pen-nib': '&#xeb28;',
		'cui-pencil': '&#xeb29;',
		'cui-short-text': '&#xeb2a;',
		'cui-sort-alpha-down': '&#xeb2b;',
		'cui-sort-alpha-up': '&#xeb2c;',
		'cui-sort-ascending': '&#xeb2d;',
		'cui-sort-descending': '&#xeb2e;',
		'cui-sort-numeric-down': '&#xeb2f;',
		'cui-sort-numeric-up': '&#xeb30;',
		'cui-space-bar': '&#xeb31;',
		'cui-text': '&#xeb32;',
		'cui-text-shapes': '&#xeb3d;',
		'cui-text-size': '&#xeb3e;',
		'cui-text-square': '&#xeb3f;',
		'cui-text-strike': '&#xeb40;',
		'cui-strikethrough': '&#xeb40;',
		'cui-translate': '&#xeb42;',
		'cui-underline': '&#xeb43;',
		'cui-vertical-align-bottom': '&#xeb44;',
		'cui-vertical-align-center': '&#xeb45;',
		'cui-vertical-align-top': '&#xeb46;',
		'cui-wrap-text': '&#xeb47;',
		'cui-assistive-listening-system': '&#xe9d3;',
		'cui-blind': '&#xe9dc;',
		'cui-braille': '&#xe9dd;',
		'cui-deaf': '&#xe9de;',
		'cui-fingerprint': '&#xea1a;',
		'cui-life-ring': '&#xea1d;',
		'cui-lock-locked': '&#xea1e;',
		'cui-lock-unlocked': '&#xea24;',
		'cui-low-vision': '&#xea25;',
		'cui-mouth-slash': '&#xea27;',
		'cui-pregnant': '&#xea28;',
		'cui-shield-alt': '&#xea2f;',
		'cui-sign-language': '&#xea77;',
		'cui-wheelchair': '&#xea80;',
		'cui-disabled': '&#xea80;',
		'cui-account-logout': '&#xe964;',
		'cui-action-redo': '&#xe965;',
		'cui-action-undo': '&#xe966;',
		'cui-applications': '&#xe967;',
		'cui-apps': '&#xe967;',
		'cui-applications-settings': '&#xe968;',
		'cui-apps-settings': '&#xe968;',
		'cui-arrow-bottom': '&#xe969;',
		'cui-arrow-circle-bottom': '&#xe96a;',
		'cui-arrow-circle-left': '&#xe96b;',
		'cui-arrow-circle-right': '&#xe96c;',
		'cui-arrow-circle-top': '&#xe96d;',
		'cui-arrow-left': '&#xe96e;',
		'cui-arrow-right': '&#xe96f;',
		'cui-arrow-thick-bottom': '&#xe970;',
		'cui-arrow-thick-from-bottom': '&#xe981;',
		'cui-arrow-thick-from-left': '&#xe982;',
		'cui-arrow-thick-from-right': '&#xe983;',
		'cui-arrow-thick-from-top': '&#xe99b;',
		'cui-arrow-thick-left': '&#xe9a1;',
		'cui-arrow-thick-right': '&#xe9a2;',
		'cui-arrow-thick-to-bottom': '&#xe9bc;',
		'cui-arrow-thick-to-left': '&#xe9bd;',
		'cui-arrow-thick-to-right': '&#xe9bf;',
		'cui-arrow-thick-to-top': '&#xe9d4;',
		'cui-arrow-thick-top': '&#xe9be;',
		'cui-arrow-top': '&#xe9e4;',
		'cui-ban': '&#xe9e5;',
		'cui-brightness': '&#xe9e6;',
		'cui-caret-bottom': '&#xea2c;',
		'cui-caret-left': '&#xea30;',
		'cui-caret-right': '&#xea31;',
		'cui-caret-top': '&#xea3c;',
		'cui-check': '&#xea55;',
		'cui-chevron-bottom': '&#xea59;',
		'cui-chevron-circle-down-alt': '&#xecfc;',
		'cui-chevron-circle-left-alt': '&#xecfd;',
		'cui-chevron-circle-right-alt': '&#xecfe;',
		'cui-chevron-circle-up-alt': '&#xecff;',
		'cui-chevron-double-down': '&#xea6a;',
		'cui-chevron-double-left': '&#xea6e;',
		'cui-chevron-double-right': '&#xea73;',
		'cui-chevron-double-up': '&#xea8d;',
		'cui-chevron-double-up-alt': '&#xed03;',
		'cui-chevron-left': '&#xea8e;',
		'cui-chevron-right': '&#xea9a;',
		'cui-chevron-top': '&#xeabd;',
		'cui-clear-all': '&#xeabe;',
		'cui-clipboard': '&#xeac0;',
		'cui-clone': '&#xeac1;',
		'cui-columns': '&#xeb4b;',
		'cui-exit-to-app': '&#xeb4d;',
		'cui-filter': '&#xeb4e;',
		'cui-infinity': '&#xeb4f;',
		'cui-input': '&#xeb50;',
		'cui-magnifying-glass': '&#xeb51;',
		'cui-zoom': '&#xeb51;',
		'cui-search': '&#xeb51;',
		'cui-menu': '&#xed0b;',
		'cui-hamburger-menu': '&#xed0b;',
		'cui-minus': '&#xeb52;',
		'cui-move': '&#xeb56;',
		'cui-options': '&#xecdc;',
		'cui-options-horizontal': '&#xeb57;',
		'cui-ellipses': '&#xeb57;',
		'cui-ellipsis': '&#xeb57;',
		'cui-pin': '&#xeb5a;',
		'cui-plus': '&#xeb5b;',
		'cui-power-standby': '&#xeb5f;',
		'cui-reload': '&#xeb60;',
		'cui-resize-both': '&#xeb61;',
		'cui-resize-height': '&#xeb62;',
		'cui-resize-width': '&#xeb63;',
		'cui-save': '&#xeb65;',
		'cui-settings': '&#xeb68;',
		'cui-cog': '&#xeb68;',
		'cui-speedometer': '&#xeb69;',
		'cui-gauge': '&#xeb69;',
		'cui-spreadsheet': '&#xeb6a;',
		'cui-storage': '&#xeb6b;',
		'cui-sync': '&#xeb6c;',
		'cui-toggle-off': '&#xeb71;',
		'cui-touch-app': '&#xeb73;',
		'cui-trash': '&#xeb74;',
		'cui-view-column': '&#xebf6;',
		'cui-view-module': '&#xebf7;',
		'cui-view-quilt': '&#xebf8;',
		'cui-view-stream': '&#xebf9;',
		'cui-wallpaper': '&#xebfa;',
		'cui-window-maximize': '&#xebfc;',
		'cui-window-minimize': '&#xebfd;',
		'cui-window-restore': '&#xebfe;',
		'cui-x': '&#xebff;',
		'cui-x-circle': '&#xec00;',
		'cui-zoom-in': '&#xec02;',
		'cui-zoom-out': '&#xec03;',
		'cui-child': '&#xe97e;',
		'cui-baby': '&#xe97e;',
		'cui-face': '&#xe985;',
		'cui-face-dead': '&#xe986;',
		'cui-frown': '&#xe987;',
		'cui-sad': '&#xe987;',
		'cui-meh': '&#xe988;',
		'cui-mood-bad': '&#xe989;',
		'cui-mood-good': '&#xe98a;',
		'cui-mood-very-bad': '&#xe98b;',
		'cui-mood-very-good': '&#xe98c;',
		'cui-smile': '&#xe9c4;',
		'cui-happy': '&#xe9c4;',
		'cui-smile-plus': '&#xe9da;',
		'cui-4k': '&#xea81;',
		'cui-airplay': '&#xea82;',
		'cui-album': '&#xea83;',
		'cui-audio': '&#xea93;',
		'cui-audio-description': '&#xeaa2;',
		'cui-audio-spectrum': '&#xeaa8;',
		'cui-av-timer': '&#xeab1;',
		'cui-camera': '&#xeab2;',
		'cui-camera-control': '&#xeab3;',
		'cui-control': '&#xeab3;',
		'cui-closed-captioning': '&#xeab9;',
		'cui-cc': '&#xeab9;',
		'cui-compress': '&#xeb4a;',
		'cui-equalizer': '&#xeba0;',
		'cui-featured-playlist': '&#xec6c;',
		'cui-fullscreen': '&#xec73;',
		'cui-fullscreen-exit': '&#xec74;',
		'cui-hd': '&#xec75;',
		'cui-headphones': '&#xec76;',
		'cui-library-add': '&#xec7a;',
		'cui-loop': '&#xec7c;',
		'cui-loop-1': '&#xec7d;',
		'cui-loop-circular': '&#xec7e;',
		'cui-media-eject': '&#xec80;',
		'cui-media-pause': '&#xec83;',
		'cui-media-play': '&#xec86;',
		'cui-media-record': '&#xec89;',
		'cui-media-skip-backward': '&#xec8c;',
		'cui-media-skip-forward': '&#xec8f;',
		'cui-media-step-backward': '&#xec92;',
		'cui-media-step-forward': '&#xec95;',
		'cui-media-stop': '&#xec98;',
		'cui-microphone': '&#xec9b;',
		'cui-mic': '&#xec9b;',
		'cui-movie': '&#xec9f;',
		'cui-music-note': '&#xeca1;',
		'cui-playlist-add': '&#xeca6;',
		'cui-speaker': '&#xecb9;',
		'cui-tv': '&#xecbc;',
		'cui-video': '&#xecc0;',
		'cui-voice-over-record': '&#xecc7;',
		'cui-volume-high': '&#xecc9;',
		'cui-volume-low': '&#xecca;',
		'cui-volume-off': '&#xeccb;',
		'cui-at': '&#xe98f;',
		'cui-book': '&#xe990;',
		'cui-bookmark': '&#xe992;',
		'cui-description': '&#xeba6;',
		'cui-envelope-closed': '&#xe9b5;',
		'cui-envelope-letter': '&#xe9b6;',
		'cui-envelope-open': '&#xe9b7;',
		'cui-file': '&#xe9c5;',
		'cui-find-in-page': '&#xebaa;',
		'cui-folder': '&#xe9d8;',
		'cui-folder-open': '&#xe9d9;',
		'cui-image1': '&#xe9fe;',
		'cui-inbox': '&#xea00;',
		'cui-library': '&#xebb0;',
		'cui-paperclip': '&#xea3e;',
		'cui-tag': '&#xea97;',
		'cui-tags': '&#xea98;',
		'cui-address-book': '&#xec07;',
		'cui-people': '&#xec62;',
		'cui-user': '&#xec67;',
		'cui-user-female': '&#xec68;',
		'cui-user-follow': '&#xec69;',
		'cui-user-unfollow': '&#xec6b;',
		'cui-android': '&#xecdd;',
		'cui-angular': '&#xecde;',
		'cui-bootstrap': '&#xecdf;',
		'cui-codepen': '&#xece0;',
		'cui-copyright': '&#xece1;',
		'cui-facebook': '&#xece2;',
		'cui-git': '&#xece3;',
		'cui-github': '&#xece4;',
		'cui-github-circle': '&#xece5;',
		'cui-gitlab': '&#xece6;',
		'cui-instagram': '&#xece7;',
		'cui-linkedin': '&#xece8;',
		'cui-polymer': '&#xece9;',
		'cui-react': '&#xecea;',
		'cui-reddit': '&#xeceb;',
		'cui-registered': '&#xecec;',
		'cui-rights': '&#xecec;',
		'cui-skype': '&#xeced;',
		'cui-spotify': '&#xecee;',
		'cui-stackoverflow': '&#xecef;',
		'cui-trademark': '&#xecf0;',
		'cui-twitter': '&#xecf1;',
		'cui-vue': '&#xecf2;',
		'cui-airplane-mode': '&#xe904;',
		'cui-airplane-mode-off': '&#xe905;',
		'cui-contact': '&#xe933;',
		'cui-dialpad': '&#xe93f;',
		'cui-mobile': '&#xea48;',
		'cui-mobile-landscape': '&#xe944;',
		'cui-phone': '&#xe94f;',
		'cui-sim': '&#xe972;',
		'cui-bike': '&#xeae6;',
		'cui-boat-alt': '&#xeae9;',
		'cui-bus-alt': '&#xeaeb;',
		'cui-car-alt': '&#xeaee;',
		'cui-flight-takeoff': '&#xeaf2;',
		'cui-locomotive': '&#xeaf3;',
		'cui-taxi': '&#xeafa;',
		'cui-truck': '&#xeb00;',
		'cui-walk': '&#xeb01;',
		'cui-calendar': '&#xe994;',
		'cui-calendar-check': '&#xe995;',
		'cui-clock': '&#xe9aa;',
		'cui-compass': '&#xe9ab;',
		'cui-flag-alt': '&#xec0a;',
		'cui-globe-alt': '&#xea32;',
		'cui-history': '&#xe9f8;',
		'cui-language': '&#xea0c;',
		'cui-location-pin': '&#xea17;',
		'cui-map': '&#xea20;',
		'cui-balance-scale': '&#xeac6;',
		'cui-bar-chart': '&#xeaca;',
		'cui-basket': '&#xeacb;',
		'cui-briefcase': '&#xead0;',
		'cui-british-pound': '&#xebb9;',
		'cui-calculator': '&#xebbc;',
		'cui-cart': '&#xebc0;',
		'cui-chart': '&#xebc5;',
		'cui-chart-line': '&#xebc9;',
		'cui-chart-pie': '&#xebcb;',
		'cui-credit-card': '&#xebce;',
		'cui-dollar': '&#xebcf;',
		'cui-euro': '&#xebd4;',
		'cui-gem': '&#xeb48;',
		'cui-diamond': '&#xeb48;',
		'cui-gift': '&#xeb49;',
		'cui-graph': '&#xebd8;',
		'cui-money': '&#xec0d;',
		'cui-cash': '&#xec0d;',
		'cui-wallet': '&#xebe5;',
		'cui-yen': '&#xebe6;',
		'cui-chat-bubble': '&#xead1;',
		'cui-comment-bubble': '&#xead4;',
		'cui-comment-square': '&#xeadd;',
		'cui-speech': '&#xead2;',
		'cui-hand-point-down': '&#xe9ea;',
		'cui-hand-point-left': '&#xe9eb;',
		'cui-hand-point-right': '&#xe9ec;',
		'cui-hand-point-up': '&#xe9ed;',
		'cui-thumb-down': '&#xea9f;',
		'cui-thumb-up': '&#xeaa0;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/cui-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
