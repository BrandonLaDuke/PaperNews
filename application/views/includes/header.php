<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Paper News</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" src="<?php echo site_url("/"); ?>bower_components/normalize.css/normalize.css">"/>
        
        Polymer
        <script src="<?php echo site_url("/"); ?>bower_components/webcomponentsjs/webcomponents.min.js"></script>
        <link rel="import" href="<?php echo site_url("/"); ?>bower_components/polymer/polymer.html">
        <link rel="import" href="<?php echo site_url("/"); ?>elements/elements.html"/>
        
        <link rel="stylesheet" href="<?php echo site_url("/"); ?>css/myCSS.css"/>
        
        <style is="custom-style">

    body {
      margin: 0;
      background-color: #eee;
    }

    app-header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 400px;
      color: #fff;
      background-color: #196eef;
      --app-header-background-front-layer: {
        background-image: url(http://static1.squarespace.com/static/51609147e4b0715db61d32b6/521b97cee4b05f031fd12dde/5519e33de4b06a1002802805/1431718693701/%253Fformat%253D1500w);
        background-position: center;
      };
    }

    paper-icon-button {
      --paper-icon-button-ink-color: white;
    }

    app-toolbar.tall {
      height: 500px;
    }

    [main-title] {
      font-weight: ;
      margin-left: 140px;
      text-shadow: 0.1em 0.1em 0.3em black;
      margin-top: 1.33em;
    }
    
    [main-title] span {
      font-size: 0.7em;
    }

    [condensed-title] {
      font-weight: lighter;
      margin-left: 30px;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-top: 1.33em;
    }

    [condensed-title] i {
      font-weight: 200;
      font-style: normal;
    }

    @media (max-width: 639px) {
      [main-title] {
        margin-left: 50px;
        font-size: 30px;
      }
      [condensed-title] {
        font-size: 15px;
      }
      [main-title] span {
        display: none;
      }
    }

  </style>
        
    </head>
    <body fullbleed unresolved>
        <app-drawer-layout fullbleed force-narrow>
            <app-drawer swipe-Open style="z-index:1;">
                <div style="height: 100%; overflow: auto;">
                    <a href="<?php echo site_url("index.php/site/"); ?>"><paper-item>Home<paper-ripple></paper-ripple></paper-item></a>
                    <a href="<?php echo site_url("index.php/site/about"); ?>"><paper-item>About<paper-ripple></paper-ripple></paper-item></a>
                    <a href="<?php echo site_url("index.php/site/Editor"); ?>"><paper-item>Editor<paper-ripple></paper-ripple></paper-item></a>
                    <a href="<?php echo site_url("index.php/site/createTables"); ?>"><paper-item>Create Tables<paper-ripple></paper-ripple></paper-item></a>
                    <a href="<?php echo site_url("index.php/site/logon"); ?>"><paper-item>Login<paper-ripple></paper-ripple></paper-item></a>
                </div>
            </app-drawer>
            <app-header-layout class="flex" mode="waterfall" main>
                <app-header effects="waterfall resize-title blend-background parallax-background" condenses reveals>
                    <app-toolbar>
                        <paper-icon-button icon="menu" drawer-toggle></paper-icon-button>
                        <h4 condensed-title>Paper News</h4>
                        <ul>
                            <li><a href="<?php echo site_url("index.php/site/"); ?>">Home</a></li>
                            <li><a href="<?php echo site_url("index.php/site/about"); ?>">About</a></li>
                            <li><a href="<?php echo site_url("index.php/site/Editor"); ?>">Editor</a></li>
                            <li><a href="<?php echo site_url("index.php/site/createTables"); ?>">Create Tables</a></li>
                            <li><a href="<?php echo site_url("index.php/site/logon"); ?>">Login</a></li>
                        </ul>
                    </app-toolbar>
                    <app-toolbar class="tall">
                        <h1 main-title>Paper News</h1>
                    </app-toolbar>
                </app-header>
<?php
    if (!isset($_SESSION["userId"])) {
        $tmp = $this->uri->segment(2);
        if ($this->uri->segment(2) != "logon") {
            redirect(site_url("index.php/site/logon"));
        }
    }
?>
<section style="clear:both;">