
<!--begin::Main-->

		<!--[html-partial:include:{"file":"layouts.partials/_header-mobile.html"}]/-->
		@include("layouts.partials.header-mobile")
		<div class="d-flex flex-column flex-root">

			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">

				<!--[html-partial:include:{"file":"layouts.partials/_aside.html"}]/-->
				@include("layouts.partials.aside")
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

					<!--[html-partial:include:{"file":"layouts.partials/_header.html"}]/-->
					@include("layouts.partials.header")
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						 @yield("content")
						<!--Content area here-->
					</div>

					<!--end::Content-->
				</div>

				<!--end::Wrapper-->
			</div>

			<!--end::Page-->
		</div>

		<!--end::Main-->