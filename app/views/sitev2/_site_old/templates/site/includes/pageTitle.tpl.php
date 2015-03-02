<div id="breadcrumb">
    <?php /*if($memberID): ?>
        <p id="logout-link">Logged in as: <?=$member->name?>. [<a href="<?=Registry::get("URIGenerator")->generate("session", "logout", "ucp")?>">Logout</a>]</p>
    <?php else: ?>
        <p id="login-link">Not logged in.  [<a href="<?=Registry::get("URIGenerator")->generate("session", "login", "ucp")?>">Login</a>]</p>
    <?php endif;*/ ?>

    <?php foreach($breadcrumb as $key => $bc){ ?>
        
        <a class="breadCrumbLink" href="<?=Registry::get("URIGenerator")->generate($bc["link"])?>"><?=$bc["title"]?></a>
        <?=(($key != count($breadcrumb)-1) ? ' &gt; ' : '')?>
    <?php } ?>
</div>
<h1><?=$pageTitle?></h1>