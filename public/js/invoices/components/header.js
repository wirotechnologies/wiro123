import React from 'react';

function Header (props){
	const Form = props.form;
	console.log(Form);
	return (
		<header id="header">
			<div id="logo-group">

				<span id="logo"> <img src="/smartadmin/img/logo.png" alt="SmartAdmin"/> </span>

			</div>

			<div className="pull-right">

				<div id="hide-menu" className="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i className="fa fa-reorder"></i></a> </span>
				</div>

				<ul id="mobile-profile-img" className="header-dropdown-list hidden-xs padding-5">
					<li className="">
						<a href="#" className="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="/smartadmin/img/avatars/sunny.png" alt="John Doe" className="online" />  
						</a>
						<ul className="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" className="padding-10 padding-top-0 padding-bottom-0"><i className="fa fa-cog"></i> Setting</a>
							</li>
							<li className="divider"></li>
							<li>
								<a href="profile.html" className="padding-10 padding-top-0 padding-bottom-0"> <i className="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li className="divider"></li>
							<li>
								<a href="javascript:void(0);" className="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i className="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li className="divider"></li>
							<li>
								<a href="javascript:void(0);" className="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i className="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li className="divider"></li>
							<li>
								<a href="#" className="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i className="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<div id="logout" className="btn-header transparent pull-right">
					<span> <a href="javascript:load_content('logout.php', '')" title="Sign Out" data-action="userLogout" data-logout-msg="Esta seguro que desea cerrar la sesión?"><i className="fa fa-sign-out"></i></a> </span>
				</div>

				<div id="fullscreen" className="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i className="fa fa-arrows-alt"></i></a> </span>
				</div>

			</div>

		</header>
	)
}

export default Header;
