<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/photo-gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:10:48 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
        <link rel="stylesheet" href="vendors/bower_components/lightgallery/dist/css/lightgallery.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
    </head>

    <body data-sa-theme="1">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>
            @include('admin/sidebar')

            <section class="content">
                <div class="content__inner">
                    <header class="content__title">
                        <h1>Photo Gallery</h1>

                        <div class="actions">
                            <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                            <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                            <div class="dropdown actions__item">
                                <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Refresh</a>
                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                    <a href="#" class="dropdown-item">Settings</a>
                                </div>
                            </div>
                        </div>
                    </header>

                    <div class="toolbar">
                        <div class="toolbar__label"><span class="hidden-xs-down">Total</span> 543 Photos</div>

                        <div class="actions">
                            <i class="actions__item zmdi zmdi-search" data-sa-action="toolbar-search-open"></i>
                            <a href="#" class="actions__item zmdi zmdi-time"></a>
                            <div class="dropdown actions__item">
                                <i class="zmdi zmdi-sort" data-toggle="dropdown"></i>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Last Modified</a>
                                    <a href="#" class="dropdown-item">Name</a>
                                    <a href="#" class="dropdown-item">Size</a>
                                </div>
                            </div>
                            <a href="#" class="actions__item zmdi zmdi-help-outline"></a>
                        </div>

                        <div class="toolbar__search">
                            <input type="text" placeholder="Search...">
                            <i class="toolbar__search__close zmdi zmdi-long-arrow-left" data-sa-action="toolbar-search-close"></i>
                        </div>
                    </div>

                    <div class="row lightbox photos">

                        <a href="demo/img/gallery/1.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/1.jpg" alt="" />
                            </div>
                        </a>

                        <a href="demo/img/gallery/2.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/2.jpg" alt="" />
                            </div>
                        </a>

                        <a href="demo/img/gallery/3.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/3.jpg" alt="" />
                            </div>
                        </a>

                        <a href="demo/img/gallery/4.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/4.jpg" alt="" />
                            </div>
                        </a>

                        <a href="demo/img/gallery/5.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/5.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/6.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/6.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/7.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/7.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/8.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/8.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/9.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/9.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/10.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/10.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/11.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/11.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/12.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/12.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/13.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/13.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/14.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/14.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/15.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/15.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/16.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/16.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/17.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/7.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/18.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/18.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/19.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/19.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/20.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/20.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/21.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/21.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/22.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/22.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/23.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/23.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/24.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/24.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/1.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/1.jpg" alt="" />
                            </div>
                        </a>

                        <a href="demo/img/gallery/2.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/2.jpg" alt="" />
                            </div>
                        </a>

                        <a href="demo/img/gallery/3.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/3.jpg" alt="" />
                            </div>
                        </a>

                        <a href="demo/img/gallery/4.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/4.jpg" alt="" />
                            </div>
                        </a>

                        <a href="demo/img/gallery/5.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/5.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/6.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/6.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/7.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/7.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/8.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/8.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/9.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/9.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/10.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/10.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/11.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/11.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/12.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/12.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/13.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/13.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/14.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/14.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/15.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/15.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/16.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/16.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/17.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/7.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/18.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/18.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/19.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/19.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/20.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/20.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/21.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/21.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/22.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/22.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/23.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/23.jpg" alt="" />
                            </div>
                        </a>
                        <a href="demo/img/gallery/24.jpg" class="col-md-2 col-4">
                            <div class="lightbox__item photos__item">
                                <img src="demo/img/gallery/thumbs/24.jpg" alt="" />
                            </div>
                        </a>
                    </div>
                </div>

                <footer class="footer hidden-xs-down">
                    <p>© Super Admin Responsive. All rights reserved.</p>

                    <ul class="nav footer__nav">
                        <a class="nav-link" href="#">Homepage</a>

                        <a class="nav-link" href="#">Company</a>

                        <a class="nav-link" href="#">Support</a>

                        <a class="nav-link" href="#">News</a>

                        <a class="nav-link" href="#">Contacts</a>
                    </ul>
                </footer>
            </section>
        </main>

        <!-- Older IE warning message -->
            <!--[if IE]>
                <div class="ie-warning">
                    <h1>Warning!!</h1>
                    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                    <div class="ie-warning__downloads">
                        <a href="http://www.google.com/chrome">
                            <img src="img/browsers/chrome.png" alt="">
                        </a>

                        <a href="https://www.mozilla.org/en-US/firefox/new">
                            <img src="img/browsers/firefox.png" alt="">
                        </a>

                        <a href="http://www.opera.com">
                            <img src="img/browsers/opera.png" alt="">
                        </a>

                        <a href="https://support.apple.com/downloads/safari">
                            <img src="img/browsers/safari.png" alt="">
                        </a>

                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                            <img src="img/browsers/edge.png" alt="">
                        </a>

                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="img/browsers/ie.png" alt="">
                        </a>
                    </div>
                    <p>Sorry for the inconvenience!</p>
                </div>
            <![endif]-->

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <!-- Light Gallery -->
        <script src="vendors/bower_components/lightgallery/dist/js/lightgallery-all.min.js"></script>

        <!-- App functions and actions -->
        <script src="js/app.min.js"></script>
    </body>

<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/photo-gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:12:14 GMT -->
</html>