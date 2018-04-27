<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyek 1</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
     <link href="{{ URL::asset('css/core.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ URL::asset('css/components.css') }}" rel="stylesheet" type="text/css">
       <link href="{{ URL::asset('css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ URL::asset('js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/ui/nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/ui/drilldown.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/ui/fab.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ URL::asset('js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/pages/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/ui/ripple.min.js') }}"></script>
   
    <!-- /theme JS files -->

</head>

<body class="navbar-bottom">

    <!-- Page header -->
    <div class="page-header page-header-inverse bg-indigo">

        <!-- Main navbar -->
        <div class="navbar navbar-inverse navbar-transparent">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html"><img src="images/logo-ugm.png" alt=""></a>

                <ul class="nav navbar-nav pull-right visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-grid3"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <p class="navbar-text"><span class="label bg-success-400">E Commerce</span></p>

                <ul class="nav navbar-nav">
                    <li><a href="#">Testing</a></li>
                </ul>

                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-bell2"></i>
                                <span class="visible-xs-inline-block position-right">Activity</span>
                                <span class="status-mark border-pink-300"></span>
                            </a>

                            <div class="dropdown-menu dropdown-content">
                                <div class="dropdown-content-heading">
                                    Activity
                                    <ul class="icons-list">
                                        <li><a href="#"><i class="icon-menu7"></i></a></li>
                                    </ul>
                                </div>

                                <ul class="media-list dropdown-content-body width-350">
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i class="icon-mention"></i></a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
                                            <div class="media-annotation">4 minutes ago</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-xs"><i class="icon-paperplane"></i></a>
                                        </div>
                                        
                                        <div class="media-body">
                                            Special offers have been sent to subscribed users by <a href="#">Donna Gordon</a>
                                            <div class="media-annotation">36 minutes ago</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn bg-blue btn-rounded btn-icon btn-xs"><i class="icon-plus3"></i></a>
                                        </div>
                                        
                                        <div class="media-body">
                                            <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch in <span class="text-semibold">Limitless</span> repository
                                            <div class="media-annotation">2 hours ago</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn bg-purple-300 btn-rounded btn-icon btn-xs"><i class="icon-truck"></i></a>
                                        </div>
                                        
                                        <div class="media-body">
                                            Shipping cost to the Netherlands has been reduced, database updated
                                            <div class="media-annotation">Feb 8, 11:30</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn bg-warning-400 btn-rounded btn-icon btn-xs"><i class="icon-bubble8"></i></a>
                                        </div>
                                        
                                        <div class="media-body">
                                            New review received on <a href="#">Server side integration</a> services
                                            <div class="media-annotation">Feb 2, 10:20</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs"><i class="icon-spinner11"></i></a>
                                        </div>
                                        
                                        <div class="media-body">
                                            <strong>January, 2016</strong> - 1320 new users, 3284 orders, $49,390 revenue
                                            <div class="media-annotation">Feb 1, 05:46</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-bubble8"></i>
                                <span class="visible-xs-inline-block position-right">Messages</span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-content width-350">
                                <div class="dropdown-content-heading">
                                    Messages
                                    <ul class="icons-list">
                                        <li><a href="#"><i class="icon-menu7"></i></a></li>
                                    </ul>
                                </div>

                                <ul class="media-list dropdown-content-body">
                                    <li class="media">
                                        <div class="media-left">
                                            <img src="images/placeholder.jpg" class="img-circle img-sm" alt="">
                                            <span class="badge bg-danger-400 media-badge">5</span>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="media-heading">
                                                <span class="text-semibold">James Alexander</span>
                                                <span class="media-annotation pull-right">04:58</span>
                                            </a>

                                            <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <img src="images/placeholder.jpg" class="img-circle img-sm" alt="">
                                            <span class="badge bg-danger-400 media-badge">4</span>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="media-heading">
                                                <span class="text-semibold">Margo Baker</span>
                                                <span class="media-annotation pull-right">12:16</span>
                                            </a>

                                            <span class="text-muted">That was something he was unable to do because...</span>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left"><img src="images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                        <div class="media-body">
                                            <a href="#" class="media-heading">
                                                <span class="text-semibold">Jeremy Victorino</span>
                                                <span class="media-annotation pull-right">22:48</span>
                                            </a>

                                            <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left"><img src="images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                        <div class="media-body">
                                            <a href="#" class="media-heading">
                                                <span class="text-semibold">Beatrix Diaz</span>
                                                <span class="media-annotation pull-right">Tue</span>
                                            </a>

                                            <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left"><img src="images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                        <div class="media-body">
                                            <a href="#" class="media-heading">
                                                <span class="text-semibold">Richard Vango</span>
                                                <span class="media-annotation pull-right">Mon</span>
                                            </a>
                                            
                                            <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="dropdown dropdown-user">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/placeholder.jpg" alt="">
                                <span>Victoria</span>
                                <i class="caret"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                                <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                                <li><a href="#"><span class="badge bg-blue pull-right">26</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                                <li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /main navbar -->


        <!-- Page header content -->
        <div class="page-header-content">
            <div class="page-title">
                <h4>HOME 
                <small>
    
                <?php
                $t = date("G");

                if ($t >= "6" || $t <= "11" ) {
                    echo "Selamat Pagi";    
                }
                            
                else if($t >= "11" || $t <= "14"){
                    echo "Selamat Siang";
                }
                else if($t >= "14" || $t <= "18"){
                    echo "Selamat Sore";
                }
                else {
                    echo "Selamat Malam";
                }
                ?>
                </small>
                </h4>
            </div>

            <div class="heading-elements">
                <ul class="breadcrumb heading-text">
                    <li><a href="index.html"><i class="icon-home2 position-left"></i>HOME</a></li>
                    <li class="active">HOME</li>
                </ul>
            </div>
        </div>
        <!-- /page header content -->


        <!-- Second navbar -->
        <div class="navbar navbar-inverse navbar-transparent" id="navbar-second">
            <ul class="nav navbar-nav visible-xs-block">
                <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>

            <div class="navbar-collapse collapse" id="navbar-second-toggle">
                <ul class="nav navbar-nav navbar-nav-material">
                    <li class="active"><a href="index.html">T-Shirt</a></li>

                <ul class="dropdown-menu width-250">
                            <li class="dropdown-header">Apps</li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-task"></i> Task manager</a>
                                <ul class="dropdown-menu width-200">
                                    <li class="dropdown-header highlight">Options</li>
                                    <li><a href="task_manager_grid.html">Task grid</a></li>
                                    <li><a href="task_manager_list.html">Task list</a></li>
                                    <li><a href="task_manager_detailed.html">Task detailed</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-cash3"></i> Invoicing</a>
                                <ul class="dropdown-menu width-200">
                                    <li class="dropdown-header highlight">Options</li>
                                    <li><a href="invoice_template.html">Invoice template</a></li>
                                    <li><a href="invoice_grid.html">Invoice grid</a></li>
                                    <li><a href="invoice_archive.html">Invoice archive</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-header">User</li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-people"></i> User pages</a>
                                <ul class="dropdown-menu width-200">
                                    <li class="dropdown-header highlight">Basic</li>
                                    <li><a href="user_pages_cards.html">User cards</a></li>
                                    <li><a href="user_pages_list.html">User list</a></li>
                                    <li class="dropdown-header highlight">Profiles</li>
                                    <li><a href="user_pages_profile.html">Simple profile</a></li>
                                    <li><a href="user_pages_profile_cover.html">Profile with cover</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-user-plus"></i> Login &amp; registration</a>
                                <ul class="dropdown-menu width-200">
                                    <li class="dropdown-header highlight">Basic</li>
                                    <li><a href="login_simple.html">Simple login</a></li>
                                    <li><a href="login_advanced.html">More login info</a></li>
                                    <li><a href="login_registration.html">Simple registration</a></li>
                                    <li><a href="login_registration_advanced.html">More registration info</a></li>
                                    <li><a href="login_validation.html">With validation</a></li>
                                    <li><a href="login_tabbed.html">Tabbed form</a></li>
                                    <li><a href="login_modals.html">Inside modals</a></li>
                                    <li class="dropdown-header highlight">Service</li>
                                    <li><a href="login_unlock.html">Unlock user</a></li>
                                    <li><a href="login_password_recover.html">Reset password</a></li>
                                    <li class="dropdown-header highlight">Other</li>
                                    <li><a href="login_hide_navbar.html">Hide navbar</a></li>
                                    <li><a href="login_transparent.html">Transparent box</a></li>
                                    <li><a href="login_background.html">Background option</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-header">Kits</li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-search4"></i> Search</a>
                                <ul class="dropdown-menu width-200">
                                    <li class="dropdown-header highlight">Basic</li>
                                    <li><a href="search_basic.html">Basic search results</a></li>
                                    <li><a href="search_users.html">User search results</a></li>
                                    <li class="dropdown-header highlight">Media</li>
                                    <li><a href="search_images.html">Image search results</a></li>
                                    <li><a href="search_videos.html">Video search results</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-images2"></i> Gallery</a>
                                <ul class="dropdown-menu width-200">
                                    <li class="dropdown-header highlight">Options</li>
                                    <li><a href="gallery_grid.html">Media grid</a></li>
                                    <li><a href="gallery_titles.html">Media with titles</a></li>
                                    <li><a href="gallery_description.html">Media with description</a></li>
                                    <li><a href="gallery_library.html">Media library</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-header">Tools</li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-lifebuoy"></i> Support</a>
                                <ul class="dropdown-menu width-200">
                                    <li class="dropdown-header highlight">Chats</li>
                                    <li><a href="support_conversation_layouts.html">Conversation layouts</a></li>
                                    <li><a href="support_conversation_options.html">Conversation options</a></li>
                                    <li class="dropdown-header highlight">Knowledgebase</li>
                                    <li><a href="support_knowledgebase.html">Knowledgebase</a></li>
                                    <li><a href="support_faq.html">FAQ page</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#"><i class="icon-warning"></i> Error pages</a>
                                <ul class="dropdown-menu width-200">
                                    <li class="dropdown-header highlight">Options</li>
                                    <li><a href="error_403.html">Error 403</a></li>
                                    <li><a href="error_404.html">Error 404</a></li>
                                    <li><a href="error_405.html">Error 405</a></li>
                                    <li><a href="error_500.html">Error 500</a></li>
                                    <li><a href="error_503.html">Error 503</a></li>
                                    <li><a href="error_offline.html">Offline page</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            MEN <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-200">
                            <li class="dropdown-header">Basic layouts</li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-grid2"></i> Columns</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header highlight">Options</li>
                                    <li><a href="starters/1_col.html">One column</a></li>
                                    <li><a href="starters/2_col.html">Two columns</a></li>
                                    <li class="dropdown-submenu">
                                        <a href="#">Three columns</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-header highlight">Sidebar position</li>
                                            <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                                            <li><a href="starters/3_col_double.html">Double sidebars</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="starters/4_col.html">Four columns</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-paragraph-justify3"></i> Navbars</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header highlight">Fixed navbars</li>
                                    <li><a href="starters/layout_navbar_fixed_main.html">Fixed main navbar</a></li>
                                    <li><a href="starters/layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
                                    <li><a href="starters/layout_navbar_fixed_both.html">Both navbars fixed</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-header">Optional layouts</li>
                            <li><a href="starters/layout_boxed.html"><i class="icon-align-center-horizontal"></i> Fixed width</a></li>
                            <li><a href="starters/layout_sidebar_sticky.html"><i class="icon-flip-vertical3"></i> Sticky sidebar</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-nav-material navbar-right">
                    <li>
                        <a href="changelog.html">
                            <span class="status-mark status-mark-inline border-success-300 position-left"></span>
                            Changelog
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cog3"></i>
                            <span class="visible-xs-inline-block position-right">Settings</span>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                            <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                            <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /second navbar -->


        <!-- Floating menu -->
        <ul class="fab-menu fab-menu-top-right" data-fab-toggle="click">
            <li>
                <a class="fab-menu-btn btn bg-pink-300 btn-float btn-rounded btn-icon">
                    <i class="fab-icon-open icon-plus3"></i>
                    <i class="fab-icon-close icon-cross2"></i>
                </a>

                <ul class="fab-menu-inner">
                    <li>
                        <div data-fab-label="Compose email">
                            <a href="#" class="btn btn-default btn-rounded btn-icon btn-float">
                                <i class="icon-pencil"></i>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div data-fab-label="Conversations">
                            <a href="#" class="btn btn-default btn-rounded btn-icon btn-float">
                                <i class="icon-bubbles7"></i>
                            </a>
                            <span class="badge bg-primary-400">5</span>
                        </div>
                    </li>
                    <li>
                        <div data-fab-label="Chat with Jack">
                            <a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-float">
                                <img src="images/placeholder.jpg" class="img-responsive" alt="">
                            </a>
                            <span class="status-mark border-pink-400"></span>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /floating menu -->

    </div>
    <!-- /page header -->


    <!-- Page container -->
     <div class="page-container"> 

        

    </div>
    <!-- /page container -->


    <!-- Footer -->
    <div class="navbar navbar-default navbar-fixed-bottom footer">
        <ul class="nav navbar-nav visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="footer">
            <div class="navbar-text">
                &copy; 2017. <a href="#" class="navbar-link">E-Commerce Testing</a> by <a href="http://themeforest.net/user/Kopyov" class="navbar-link" target="_blank">Muhamad Reza Basuki</a>
            </div>

            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /footer -->

</body>
</html>
