<?php
$siteName = 'SiteKit';
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $siteName; ?></title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="http://localhost/sitekit/style.css">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand visible-xs" href="#"><?php echo $siteName; ?></a>
                    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="https://themes.gohugo.io/theme/minimal/">Ping</a></li>
                        <li><a href="https://themes.gohugo.io/theme/minimal/post/">Posts</a></li>
                        <li><a href="https://themes.gohugo.io/theme/minimal/project/">Projects</a></li>
                    </ul>
                    <!-- <ul class="nav navbar-nav navbar-right">
                        <li class="navbar-icon"><a href="mailto:me@example.com"><i class="fa fa-envelope-o"></i></a></li>
                        <li class="navbar-icon"><a href="https://github.com/username/"><i class="fa fa-github"></i></a></li>
                        <li class="navbar-icon"><a href="https://twitter.com/username/"><i class="fa fa-twitter"></i></a></li>
                        <li class="navbar-icon"><a href="https://www.linkedin.com/in/username/"><i class="fa fa-linkedin"></i></a></li>
                        <li class="navbar-icon"><a href="https://www.stackoverflow.com/username/"><i class="fa fa-stack-overflow"></i></a></li>
                    </ul> -->
                </div>
            </div>
        </nav>
        <div class="container">
