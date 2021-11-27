
			const $body = $('body');
			const $menuOpen = $('.menu-toggle');
			const $menuClose = $('.cancel-btn');
			const $btnSearch = $('.search-toggle');
			$(function () {
			    $menuOpen.click(function() {
			        $body.addClass('menu-open');   
			    });
			    $menuClose.click(function() {
			        $body.removeClass('menu-open');
			    });

				$btnSearch.click(function() {
					$body.toggleClass('search-open');
				});

			});