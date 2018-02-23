<!-- Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/guide/guide.css?adsf1asdf3asasddsasdfadfasdfasdf3" type="text/css" />

<div class="wrap about-wrap">

    <div class="col-md-12">
        <h1 class="display-4">Hello, ProLease</h1>
    </div>
    <div class="col-md-7">
        <p class="lead">This is your website's Content Manager, or CMS. It makes it easy to add, edit, or update content on your website.</p>
        <div class="logo col-xs-6 col-md-4">
        	<img src="<?php bloginfo('template_directory'); ?>/images/logo.png">
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-3">
    	<div class="alert alert-info" role="alert">
    		<p class="text-center"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></p>
        	<p>On the left side of the page is the admin menu. Use it to navigate around the different sections of your website.</p>
        </div>
    </div>
    <div class="col-md-2">
    	<div class="alert alert-success" role="alert">
    		<p class="text-center"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></p>
    		<p>For help on using this CMS, refer to this guide.<br><br></p>
    	</div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="col-sm-4 col-md-3 col-lg-2" id="navigation" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
    
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <li role="presentation" class="active"><a href="#introduction" aria-controls="introduction" role="tab" data-toggle="tab">Introduction</a></li>
            <li role="presentation"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">Content Types</a></li>
            <li role="presentation"><a href="#creating" aria-controls="creating" role="tab" data-toggle="tab">Creating & Deleting Content</a></li>
            <li role="presentation"><a href="#editor" aria-controls="editor" role="tab" data-toggle="tab">Using the Editor</a></li>
            <li role="presentation"><a href="#resources" aria-controls="resources" role="tab" data-toggle="tab">Uploading Resources</a></li>
            <li role="presentation"><a href="#forms" aria-controls="forms" role="tab" data-toggle="tab">Managing Forms</a></li>
            <li role="presentation"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Managing Users</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Managing Site Settings</a></li>
            <li role="presentation"><a href="#navs" aria-controls="navs" role="tab" data-toggle="tab">Managing Website Navigation</a></li>
        </ul>
        
    </div>
    
    <div class="col-sm-8 col-md-9 col-lg-10" id="guide">
    
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="introduction">
                <?php include 'guide/introduction.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="content">
                <?php include 'guide/content.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="creating">
                <?php include 'guide/creating.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="editor">
                <?php include 'guide/editor.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="resources">
                <?php include 'guide/resources.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="forms">
                <?php include 'guide/forms.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="users">
                <?php include 'guide/users.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
                <?php include 'guide/settings.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="navs">
                <?php include 'guide/menus.php'; ?>
            </div>
        </div>
    
    </div>

</div>