<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>VATSIM United Kingdom</title>

    <!--Site CSS-->
    @section('styles')
        {{ HTML::style('http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.css') }}
        {{ HTML::style("assets/style/site/v2/main.css") }}
        {{ HTML::style("assets/style/site/v2/message-boxes.css") }}
    @show


    @section('scripts')
        {{ HTML::script('http://code.jquery.com/jquery-1.9.1.min.js') }}
        {{ HTML::script('assets/jquery/js/jquery.cookie.js') }}
        {{ HTML::script('http://code.jquery.com/ui/1.10.1/jquery-ui.js') }}
        {{ HTML::script('assets/js/site/main.js') }}
    @show
</head>

<body>
<div class="top"></div>
<div class="banner">
    <div class="bannerLeft">
        <a href="http://www.vatsim-uk.co.uk/">
            {{ HTML::image("assets/style/global/images/logo.png", "Logo", ["height" => "50px"]) }}
        </a>
    </div>
    <div class="bannerRight">
        {{ HTML::image("assets/style/global/images/slogan-large.png", "Slogan", ["top" => "-5px", "right" => "10px", "width" => "400px"]) }}
        <a href="http://www.facebook.com/vatsimuk" target="_blank">{{ HTML::image("assets/style/global/images/fb-icon.png", "Facebook Link") }}</a>

        <div class="bannerNavSupWrapper rtr rtl">
            <div class="bannerNavSubWrapper rtr rtl">
                <a href="#" class="bannerFirstLink">My link</a> &middot;
                <a href="#">My link</a> &middot;
                <a href="#">My link</a> &middot;
                <a href="#">My link</a> &middot;
                <a href="#">My link</a> &middot;
                <a href="#" class="bannerLastLink">My link</a>
            </div>
        </div>
    </div>
    <div class="clearBoth"></div>
</div>
<div class="superWrapper rtl rbr rbl">
    <div class="subWrapper rtl rbr rbl">
        <div class="colLeft rtl rbl">
            <div class="menuWrapper rtl">
                <h2 id="navTitle">NAVIGATION</h2>
                <ul class="menuWrapperMainLinks">
                    <a href="#">
                        <strong><u>Section 1</u></strong>
                    </a>

                    <li>
                        <a href="#"> <strong>&rsaquo;</strong> Page 1 </a>
                        <a href="#"> <strong>&rsaquo;</strong> Page 2 </a>
                        <a href="#"> <strong>&rsaquo;</strong> Page 3 </a>
                        <a href="#"> <strong>&rsaquo;</strong> Page 4 </a>
                        <a href="#"> <strong>&rsaquo;</strong> Page 5 </a>
                        <a href="#"> <strong>&rsaquo;</strong> Page 6 </a>
                        <a href="#"> <strong>&rsaquo;</strong> Page 7 </a>
                        <a href="#"> <strong>&rsaquo;</strong> Page 8 </a>
                    </li>
                    <br />
                </ul>
            </div>
        </div>
        <!-- colLeft -->
        <div class="colRight">
            <div class="contentWrapper">
                <div id="breadcrumb">
                    <p id="login-link">Not logged in.  [<a href="#">Login</a>]</p>

                    <a class="breadCrumbLink" href="#">BC 1</a> /
                    <a class="breadCrumbLink" href="#">BC 2</a> /
                    <a class="breadCrumbLink" href="#">BC 3</a>
                </div>
                <h1>{{ $_pageTitle }}</h1>
                {{ $content->content }}
            </div>
        </div>
        <!-- colRight -->
        <div class="clearBoth"></div>
    </div>
    <!-- subWrapper -->
</div>
<!-- supWrapper -->
<div class="footerWrapper">
    <div class="footerLeft">
        Version x-commit, released y-m-d H:i:s -
        &copy; VATSIM-UK <?=(date("Y") == 2010) ? "2010" : "2010 - ".date("Y");?>
    </div>
    <div class="footerRight">All information on this website is to be used with VATSIM <strong>only</strong>.
    </div>
    <div class="footerMiddle">
        <br/><br/>
        This website uses cookies. We use cookies as a means of tracking only vital user data across
        the VATSIM-UK domain. By continuing to use this website or any of the sites hosted under the
        www.vatsim-uk.co.uk domain we will assume you agree to our use of cookies. VATSIM-UK is otherwise
        governed by the VATSIM Privacy Policy.
    </div>
    <div class="clearBoth"></div>
</div>
<script type="text/javascript" class="cc-onconsent-inline-analytics">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript" class="cc-onconsent-analytics">
    try {
        var pageTracker = _gat._getTracker("UA-13128412-2");
        pageTracker._trackPageview();
    } catch (err) {
    }
</script>
</body>
</html>