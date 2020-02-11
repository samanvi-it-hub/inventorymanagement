<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="" class="navbar-brand">
						<img src="images/dhadoom.png" alt="logo" style="height:60px;width:150px">
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">

								<a data-toggle="dropdown" href="#" class="dropdown-toggle" style="text-decoration:none">


									<h3 style="color:white">Welcome
									<i class="ace-icon fa fa-caret-down"></i></h3>
								</a>

								<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


									<li>
										<a href="logout">
											<i class="ace-icon fa fa-power-off"></i>
											Logout
										</a>
									</li>
								</ul>

				</div>
			</div><!-- /.navbar-container -->
		</div>


		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>



				<ul class="nav nav-list">
					<li class="">
						<a href="dashboard">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

                    <li class="">
						<a href="suppliers">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Suppliers </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-cart-arrow-down"></i>
							<span class="menu-text">
								Materials
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="rm_category">
									<i class="menu-icon fa fa-caret-right"></i>
									Categories
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ingradients">
									<i class="menu-icon fa fa-caret-right"></i>
									Ingredients
								</a>

								<b class="arrow"></b>
							</li>


						</ul>
					</li>


                    <li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-cubes"></i>
							<span class="menu-text">
								Products
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="product_category">
									<i class="menu-icon fa fa-caret-right"></i>
									Categories
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="end_products">
									<i class="menu-icon fa fa-caret-right"></i>
									End Products
								</a>

								<b class="arrow"></b>
							</li>


						</ul>
					</li>



					<li class="">
						<a href="inventory">
							<i class="menu-icon fa fa-calendar-check-o"></i>
							<span class="menu-text"> Inventory </span>
						</a>

						<b class="arrow"></b>
					</li>


					<li class="">
						<a href="payments">
							<i class="menu-icon fa fa-cc-mastercard"></i>
							<span class="menu-text"> Payments </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="operations">
							<i class="menu-icon fa fa-money"></i>
							<span class="menu-text"> Operations </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-cubes"></i>
								<span class="menu-text">
									Reports
								</span>
	
								<b class="arrow fa fa-angle-down"></b>
							</a>
	
							<b class="arrow"></b>
	
							<ul class="submenu">
	
								<li class="">
									<a href="reports_suppliers">
										<i class="menu-icon fa fa-caret-right"></i>
										Suppliers
									</a>
	
									<b class="arrow"></b>
								</li>
	
								<li class="">
									<a href="reports_payments">
										<i class="menu-icon fa fa-caret-right"></i>
										Payments
									</a>
	
									<b class="arrow"></b>
								</li>
	
	
							</ul>
						</li>




				</ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">




							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

