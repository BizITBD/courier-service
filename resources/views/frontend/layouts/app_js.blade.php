    <!-- Proper Js -->
    <script src='/frontend-assets/assets/js/popper.min.js'></script>
    <!-- Jquery Slim Js -->
    <script src='/frontend-assets/assets/js/jquery-3.2.1.slim.min.js'></script>
    <!-- Jquery Js -->
    <script src='/frontend-assets/assets/js/jquery.min.js'></script>
    <!-- Bootstrap Js -->
    <script src='/frontend-assets/assets/js/bootstrap.min.js'></script>
    <!-- Main JS -->
    <script src='/frontend-assets/assets/js/main.js'></script>

    {{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
    <script src="/assets/toastr.min.js"></script>

    <script type="text/javascript">
    	$(document).ready(function() {
            $("#scroll-down").click(function(e){
                e.preventDefault();
                console.log('ok');
                $("html, body").animate({
                    scrollTop: $(
                      'html, body').get(0).scrollHeight
                }, 2000);
            });
		   //Dropdown when hover
			$('ul.navbar-nav li.dropdown').hover(function() {
				  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
				}, function() {
				  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
			});
		})
        function scrollDown(){

        }
    </script>
    @yield('script')
{!! Toastr::message() !!}
