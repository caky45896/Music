/*
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
*/
(function($) {

	var	$window = $(window),
		$banner = $('#banner'),
		$body = $('body');

	// Breakpoints.
		breakpoints({
			default:   ['1681px',   null       ],
			xlarge:    ['1281px',   '1680px'   ],
			large:     ['981px',    '1280px'   ],
			medium:    ['737px',    '980px'    ],
			small:     ['481px',    '736px'    ],
			xsmall:    ['361px',    '480px'    ],
			xxsmall:   [null,       '360px'    ]
		});

	// Play initial animations on page load.
		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-preload');
			}, 100);
		});

	// Menu.
		$('#menu')
			.append('<a href="#menu" class="close"></a>')
			.appendTo($body)
			.panel({
				target: $body,
				visibleClass: 'is-menu-visible',
				delay: 500,
				hideOnClick: true,
				hideOnSwipe: true,
				resetScroll: true,
				resetForms: true,
				side: 'right'
			});
			
		toastr.options = {
			// 參數設定[註1]
			"closeButton": false, // 顯示關閉按鈕
			"debug": false, // 除錯
			"newestOnTop": false,  // 最新一筆顯示在最上面
			"progressBar": true, // 顯示隱藏時間進度條
			"positionClass": "toast-top-right", // 位置的類別
			"preventDuplicates": false, // 隱藏重覆訊息
			"onclick": null, // 當點選提示訊息時，則執行此函式
			"showDuration": "300", // 顯示時間(單位: 毫秒)
			"hideDuration": "1000", // 隱藏時間(單位: 毫秒)
			"timeOut": "5000", // 當超過此設定時間時，則隱藏提示訊息(單位: 毫秒)
			"extendedTimeOut": "1000", // 當使用者觸碰到提示訊息時，離開後超過此設定時間則隱藏提示訊息(單位: 毫秒)
			"showEasing": "swing", // 顯示動畫時間曲線
			"hideEasing": "linear", // 隱藏動畫時間曲線
			"showMethod": "fadeIn", // 顯示動畫效果
			"hideMethod": "fadeOut" // 隱藏動畫效果
			}
})(jQuery);