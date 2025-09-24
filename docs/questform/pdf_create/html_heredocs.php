<?php
$heredoc_complete = <<<'EOF'
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="shortcut icon" href="/favicon.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="theme-color" content="#000000" />
<!--
  manifest.json provides metadata used when your web app is added to the
  homescreen on Android. See https://developers.google.com/web/fundamentals/web-app-manifest/
-->
<link rel="manifest" href="/manifest.json" />
<!--
  Notice the use of  in the tags above.
  It will be replaced with the URL of the `public` folder during the build.
  Only files inside the `public` folder can be referenced from the HTML.

  Unlike "/favicon.ico" or "favicon.ico", "/favicon.ico" will
  work correctly both with client-side routing and a non-root public URL.
  Learn how to configure a non-root public URL by running `npm run build`.
-->
<title>React App</title>
<style type="text/css">
    body {
        margin: 0;
        padding: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans',
            'Droid Sans', 'Helvetica Neue', sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    code {
        font-family: source-code-pro, Menlo, Monaco, Consolas, 'Courier New', monospace;
    }
</style>
<style type="text/css">
    /* Chart.js */
    @-webkit-keyframes chartjs-render-animation {
        from {
            opacity: 0.99;
        }
        to {
            opacity: 1;
        }
    }
    @keyframes chartjs-render-animation {
        from {
            opacity: 0.99;
        }
        to {
            opacity: 1;
        }
    }
    .chartjs-render-monitor {
        -webkit-animation: chartjs-render-animation 0.001s;
        animation: chartjs-render-animation 0.001s;
    }
</style>
<style type="text/css">
    .App {
        text-align: center;
    }

    .App-logo {
        -webkit-animation: App-logo-spin infinite 20s linear;
        animation: App-logo-spin infinite 20s linear;
        height: 40vmin;
    }

    .App-header {
        background-color: #282c34;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: calc(10px + 2vmin);
        color: white;
    }

    .App-link {
        color: #61dafb;
    }
    @media (min-width: 800px) {
        .chart-container {
            height: 300px;
        }
    }
    .chart-container {
        width: 100%;
        height: 400px;
    }

    @-webkit-keyframes App-logo-spin {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes App-logo-spin {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @media print {
        h2 {
            visibility: hidden !important;
        }
        body {
            width: 210mm;
        }
        body * {
            visibility: hidden;
            -webkit-print-color-adjust: exact !important;
        }

        .printButton {
            visibility: hidden !important;
        }

        .chart-container {
            /* width: 100vw !important; */
            height: 400px !important;
        }

        .chartjs-render-monitor {
            height: 400px !important;
        }

        .printContent * {
            visibility: visible;
            /* text-align: left; */
            -webkit-print-color-adjust: exact !important;
        }
    }

    .divToPrintWrapper {
        width: 0;
        height: 0;
        overflow: hidden;
    }

    .divToPrint {
        width: 210mm;
    }

    .chartToBase__wrapper {
        width: 0;
        height: 0;
        overflow: hidden;
    }

    .chartToBase {
        width: 210mm;
        height: 400px;
    }

    .imagebla {
        height: 250mm;
        width: auto;
    }
</style>
<style type="text/css">
    /*
* contextMenu.js v 1.4.0
* Author: Sudhanshu Yadav
* s-yadav.github.com
* Copyright (c) 2013 Sudhanshu Yadav.
* Dual licensed under the MIT and GPL licenses
**/

    .iw-contextMenu {
        box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.1) !important;
        border: 1px solid #c8c7cc !important;
        border-radius: 11px !important;
        display: none;
        z-index: 1000000132;
        max-width: 300px !important;
        width: auto !important;
    }

    .dark-mode .iw-contextMenu,
    .TnITTtw-dark-mode.iw-contextMenu,
    .TnITTtw-dark-mode .iw-contextMenu {
        border-color: #747473 !important;
    }

    .iw-cm-menu {
        background: #fff !important;
        color: #000 !important;
        margin: 0px !important;
        padding: 0px !important;
        overflow: visible !important;
    }

    .dark-mode .iw-cm-menu,
    .TnITTtw-dark-mode.iw-cm-menu,
    .TnITTtw-dark-mode .iw-cm-menu {
        background: #525251 !important;
        color: #fff !important;
    }

    .iw-curMenu {
    }

    .iw-cm-menu li {
        font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Arial, Ubuntu, sans-serif !important;
        list-style: none !important;
        padding: 10px !important;
        padding-right: 20px !important;
        border-bottom: 1px solid #c8c7cc !important;
        font-weight: 400 !important;
        cursor: pointer !important;
        position: relative !important;
        font-size: 14px !important;
        margin: 0 !important;
        line-height: inherit !important;
        border-radius: 0 !important;
        display: block !important;
    }

    .dark-mode .iw-cm-menu li,
    .TnITTtw-dark-mode .iw-cm-menu li {
        border-bottom-color: #747473 !important;
    }

    .iw-cm-menu li:first-child {
        border-top-left-radius: 11px !important;
        border-top-right-radius: 11px !important;
    }

    .iw-cm-menu li:last-child {
        border-bottom-left-radius: 11px !important;
        border-bottom-right-radius: 11px !important;
        border-bottom: none !important;
    }

    .iw-mOverlay {
        position: absolute !important;
        width: 100% !important;
        height: 100% !important;
        top: 0px !important;
        left: 0px !important;
        background: #fff !important;
        opacity: 0.5 !important;
    }

    .iw-contextMenu li.iw-mDisable {
        opacity: 0.3 !important;
        cursor: default !important;
    }

    .iw-mSelected {
        background-color: #f6f6f6 !important;
    }

    .dark-mode .iw-mSelected,
    .TnITTtw-dark-mode .iw-mSelected {
        background-color: #676766 !important;
    }

    .iw-cm-arrow-right {
        width: 0 !important;
        height: 0 !important;
        border-top: 5px solid transparent !important;
        border-bottom: 5px solid transparent !important;
        border-left: 5px solid #000 !important;
        position: absolute !important;
        right: 5px !important;
        top: 50% !important;
        margin-top: -5px !important;
    }

    .dark-mode .iw-cm-arrow-right,
    .TnITTtw-dark-mode .iw-cm-arrow-right {
        border-left-color: #fff !important;
    }

    .iw-mSelected > .iw-cm-arrow-right {
    }

    /*context menu css end */
</style>
<style type="text/css">
    @-webkit-keyframes load4 {
        0%,
        100% {
            box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em,
                -3em 0 0 -1em, -2em -2em 0 0;
        }
        12.5% {
            box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em,
                -2em -2em 0 -1em;
        }
        25% {
            box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em,
                -2em -2em 0 -1em;
        }
        37.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em,
                -3em 0em 0 -1em, -2em -2em 0 -1em;
        }
        50% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0,
                -3em 0em 0 -1em, -2em -2em 0 -1em;
        }
        62.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0,
                -2em -2em 0 -1em;
        }
        75% {
            box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0,
                -3em 0em 0 0.2em, -2em -2em 0 0;
        }
        87.5% {
            box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0,
                -2em -2em 0 0.2em;
        }
    }

    @keyframes load4 {
        0%,
        100% {
            box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em,
                -3em 0 0 -1em, -2em -2em 0 0;
        }
        12.5% {
            box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em,
                -2em -2em 0 -1em;
        }
        25% {
            box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em,
                -2em -2em 0 -1em;
        }
        37.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em,
                -3em 0em 0 -1em, -2em -2em 0 -1em;
        }
        50% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0,
                -3em 0em 0 -1em, -2em -2em 0 -1em;
        }
        62.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0,
                -2em -2em 0 -1em;
        }
        75% {
            box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0,
                -3em 0em 0 0.2em, -2em -2em 0 0;
        }
        87.5% {
            box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0,
                -2em -2em 0 0.2em;
        }
    }
</style>
<style type="text/css">
    /* This is not a zero-length file! */
</style>
</head>

    <body>
          <div class="divToPrint"><h2>Radar Example</h2><img class="imagebla" src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img src="https://peopledotcom.files.wordpress.com/2016/08/nic-cage-435.jpg" alt="bild"><img id="url" alt="chart" src="data:image/png;base64,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"><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</p></div>
    </body>
</html>

EOF;

$heredoc_complete_real = <<<'EOF'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
    <!--
      manifest.json provides metadata used when your web app is added to the
      homescreen on Android. See https://developers.google.com/web/fundamentals/web-app-manifest/
    -->
    <link rel="manifest" href="/manifest.json">
    <!--
      Notice the use of  in the tags above.
      It will be replaced with the URL of the `public` folder during the build.
      Only files inside the `public` folder can be referenced from the HTML.

      Unlike "/favicon.ico" or "favicon.ico", "/favicon.ico" will
      work correctly both with client-side routing and a non-root public URL.
      Learn how to configure a non-root public URL by running `npm run build`.
    -->
    <title>Questionnaire</title>
    <script>
        window.__INITIAL_STATE__ = {};
        window.__INITIAL_STATE__.QUESTIONNAIRE__LANGUAGE = "en";
        // window.__INITIAL_STATE__.XML__SOURCE = "http://mahara.learningrebus.net/questionnaires/php/quality_quest.php";
        window.__INITIAL_STATE__.XML__SOURCE = "http://lh72/learningstyle/xml/rest_quest.php";
    </script>
  <style type="text/css">body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
}
</style><style type="text/css">@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 100;
  src: local("lato100"), url(/static/media/lato100.13fa4c60.woff) format("woff");
  src: local("lato100"), url(/static/media/lato100.ded71877.woff2) format("woff2"); }

@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 300;
  src: local("lato300"), url(/static/media/lato300.90301aa0.woff) format("woff");
  src: local("lato300"), url(/static/media/lato300.3e86c494.woff2) format("woff2"); }

@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  src: local("lato400"), url(/static/media/lato400.27bd77b9.woff) format("woff");
  src: local("lato400"), url(/static/media/lato400.6748e0e1.woff2) format("woff2"); }

@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 700;
  src: local("lato700"), url(/static/media/lato700.d878b6c2.woff) format("woff");
  src: local("lato700"), url(/static/media/lato700.649e18eb.woff2) format("woff2"); }

@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 900;
  src: local("lato900"), url(/static/media/lato900.f80bda6a.woff) format("woff");
  src: local("lato900"), url(/static/media/lato900.f377f443.woff2) format("woff2"); }

@font-face {
  font-family: "foundation-icons";
  src: url(/static/media/foundation-icons.92827f08.eot);
  src: url(/static/media/foundation-icons.92827f08.eot?#iefix) format("embedded-opentype"), url(/static/media/foundation-icons.a188c2f7.woff) format("woff"), url(/static/media/foundation-icons.e20945d7.ttf) format("truetype"), url(/static/media/foundation-icons.17cb1ed2.svg#fontcustom) format("svg");
  font-weight: normal;
  font-style: normal; }

/**
 * Foundation for Sites by ZURB
 * Version 6.4.2
 * foundation.zurb.com
 * Licensed under MIT Open Source
 */
/*! normalize-scss | MIT/GPLv2 License | bit.ly/normalize-scss */
/* Document
       ========================================================================== */
/**
     * 1. Change the default font family in all browsers (opinionated).
     * 2. Correct the line height in all browsers.
     * 3. Prevent adjustments of font size after orientation changes in
     *    IE on Windows Phone and in iOS.
     */
html {
  font-family: sans-serif;
  /* 1 */
  line-height: 1.15;
  /* 2 */
  -ms-text-size-adjust: 100%;
  /* 3 */
  -webkit-text-size-adjust: 100%;
  /* 3 */ }

/* Sections
       ========================================================================== */
/**
     * Remove the margin in all browsers (opinionated).
     */
body {
  margin: 0; }

/**
     * Add the correct display in IE 9-.
     */
article,
aside,
footer,
header,
nav,
section {
  display: block; }

/**
     * Correct the font size and margin on `h1` elements within `section` and
     * `article` contexts in Chrome, Firefox, and Safari.
     */
h1 {
  font-size: 2em;
  margin: 0.67em 0; }

/* Grouping content
       ========================================================================== */
/**
     * Add the correct display in IE 9-.
     */
figcaption,
figure {
  display: block; }

/**
     * Add the correct margin in IE 8.
     */
figure {
  margin: 1em 40px; }

/**
     * 1. Add the correct box sizing in Firefox.
     * 2. Show the overflow in Edge and IE.
     */
hr {
  box-sizing: content-box;
  /* 1 */
  height: 0;
  /* 1 */
  overflow: visible;
  /* 2 */ }

/**
     * Add the correct display in IE.
     */
main {
  display: block; }

/**
     * 1. Correct the inheritance and scaling of font size in all browsers.
     * 2. Correct the odd `em` font sizing in all browsers.
     */
pre {
  font-family: monospace, monospace;
  /* 1 */
  font-size: 1em;
  /* 2 */ }

/* Links
       ========================================================================== */
/**
     * 1. Remove the gray background on active links in IE 10.
     * 2. Remove gaps in links underline in iOS 8+ and Safari 8+.
     */
a {
  background-color: transparent;
  /* 1 */
  -webkit-text-decoration-skip: objects;
  /* 2 */ }

/**
     * Remove the outline on focused links when they are also active or hovered
     * in all browsers (opinionated).
     */
a:active,
a:hover {
  outline-width: 0; }

/* Text-level semantics
       ========================================================================== */
/**
     * 1. Remove the bottom border in Firefox 39-.
     * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
     */
abbr[title] {
  border-bottom: none;
  /* 1 */
  text-decoration: underline;
  /* 2 */
  -webkit-text-decoration: underline dotted;
          text-decoration: underline dotted;
  /* 2 */ }

/**
     * Prevent the duplicate application of `bolder` by the next rule in Safari 6.
     */
b,
strong {
  font-weight: inherit; }

/**
     * Add the correct font weight in Chrome, Edge, and Safari.
     */
b,
strong {
  font-weight: bolder; }

/**
     * 1. Correct the inheritance and scaling of font size in all browsers.
     * 2. Correct the odd `em` font sizing in all browsers.
     */
code,
kbd,
samp {
  font-family: monospace, monospace;
  /* 1 */
  font-size: 1em;
  /* 2 */ }

/**
     * Add the correct font style in Android 4.3-.
     */
dfn {
  font-style: italic; }

/**
     * Add the correct background and color in IE 9-.
     */
mark {
  background-color: #ff0;
  color: #000; }

/**
     * Add the correct font size in all browsers.
     */
small {
  font-size: 80%; }

/**
     * Prevent `sub` and `sup` elements from affecting the line height in
     * all browsers.
     */
sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline; }

sub {
  bottom: -0.25em; }

sup {
  top: -0.5em; }

/* Embedded content
       ========================================================================== */
/**
     * Add the correct display in IE 9-.
     */
audio,
video {
  display: inline-block; }

/**
     * Add the correct display in iOS 4-7.
     */
audio:not([controls]) {
  display: none;
  height: 0; }

/**
     * Remove the border on images inside links in IE 10-.
     */
img {
  border-style: none; }

/**
     * Hide the overflow in IE.
     */
svg:not(:root) {
  overflow: hidden; }

/* Forms
       ========================================================================== */
/**
     * 1. Change the font styles in all browsers (opinionated).
     * 2. Remove the margin in Firefox and Safari.
     */
button,
input,
optgroup,
select,
textarea {
  font-family: sans-serif;
  /* 1 */
  font-size: 100%;
  /* 1 */
  line-height: 1.15;
  /* 1 */
  margin: 0;
  /* 2 */ }

/**
     * Show the overflow in IE.
     */
button {
  overflow: visible; }

/**
     * Remove the inheritance of text transform in Edge, Firefox, and IE.
     * 1. Remove the inheritance of text transform in Firefox.
     */
button,
select {
  /* 1 */
  text-transform: none; }

/**
     * 1. Prevent a WebKit bug where (2) destroys native `audio` and `video`
     *    controls in Android 4.
     * 2. Correct the inability to style clickable types in iOS and Safari.
     */
button,
html [type="button"],
[type="reset"],
[type="submit"] {
  -webkit-appearance: button;
  /* 2 */ }

button,
[type="button"],
[type="reset"],
[type="submit"] {
  /**
       * Remove the inner border and padding in Firefox.
       */
  /**
       * Restore the focus styles unset by the previous rule.
       */ }

button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  border-style: none;
  padding: 0; }

button:-moz-focusring,
[type="button"]:-moz-focusring,
[type="reset"]:-moz-focusring,
[type="submit"]:-moz-focusring {
  outline: 1px dotted ButtonText; }

/**
     * Show the overflow in Edge.
     */
input {
  overflow: visible; }

/**
     * 1. Add the correct box sizing in IE 10-.
     * 2. Remove the padding in IE 10-.
     */
[type="checkbox"],
[type="radio"] {
  box-sizing: border-box;
  /* 1 */
  padding: 0;
  /* 2 */ }

/**
     * Correct the cursor style of increment and decrement buttons in Chrome.
     */
[type="number"]::-webkit-inner-spin-button,
[type="number"]::-webkit-outer-spin-button {
  height: auto; }

/**
     * 1. Correct the odd appearance in Chrome and Safari.
     * 2. Correct the outline style in Safari.
     */
[type="search"] {
  -webkit-appearance: textfield;
  /* 1 */
  outline-offset: -2px;
  /* 2 */
  /**
       * Remove the inner padding and cancel buttons in Chrome and Safari on macOS.
       */ }

[type="search"]::-webkit-search-cancel-button, [type="search"]::-webkit-search-decoration {
  -webkit-appearance: none; }

/**
     * 1. Correct the inability to style clickable types in iOS and Safari.
     * 2. Change font properties to `inherit` in Safari.
     */
::-webkit-file-upload-button {
  -webkit-appearance: button;
  /* 1 */
  font: inherit;
  /* 2 */ }

/**
     * Change the border, margin, and padding in all browsers (opinionated).
     */
fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em; }

/**
     * 1. Correct the text wrapping in Edge and IE.
     * 2. Correct the color inheritance from `fieldset` elements in IE.
     * 3. Remove the padding so developers are not caught out when they zero out
     *    `fieldset` elements in all browsers.
     */
legend {
  box-sizing: border-box;
  /* 1 */
  display: table;
  /* 1 */
  max-width: 100%;
  /* 1 */
  padding: 0;
  /* 3 */
  color: inherit;
  /* 2 */
  white-space: normal;
  /* 1 */ }

/**
     * 1. Add the correct display in IE 9-.
     * 2. Add the correct vertical alignment in Chrome, Firefox, and Opera.
     */
progress {
  display: inline-block;
  /* 1 */
  vertical-align: baseline;
  /* 2 */ }

/**
     * Remove the default vertical scrollbar in IE.
     */
textarea {
  overflow: auto; }

/* Interactive
       ========================================================================== */
/*
     * Add the correct display in Edge, IE, and Firefox.
     */
details {
  display: block; }

/*
     * Add the correct display in all browsers.
     */
summary {
  display: list-item; }

/*
     * Add the correct display in IE 9-.
     */
menu {
  display: block; }

/* Scripting
       ========================================================================== */
/**
     * Add the correct display in IE 9-.
     */
canvas {
  display: inline-block; }

/**
     * Add the correct display in IE.
     */
template {
  display: none; }

/* Hidden
       ========================================================================== */
/**
     * Add the correct display in IE 10-.
     */
[hidden] {
  display: none; }

.foundation-mq {
  font-family: "small=0em&medium=40em&large=64em&xlarge=75em&xxlarge=90em"; }

html {
  box-sizing: border-box;
  font-size: 100%; }

*,
*::before,
*::after {
  box-sizing: inherit; }

body {
  margin: 0;
  padding: 0;
  background: #fefefe;
  font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
  font-weight: normal;
  line-height: 1.5;
  color: #0a0a0a;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

img {
  display: inline-block;
  vertical-align: middle;
  max-width: 100%;
  height: auto;
  -ms-interpolation-mode: bicubic; }

textarea {
  height: auto;
  min-height: 50px;
  border-radius: 0px; }

select {
  box-sizing: border-box;
  width: 100%;
  border-radius: 0px; }

.map_canvas img,
.map_canvas embed,
.map_canvas object,
.mqa-display img,
.mqa-display embed,
.mqa-display object {
  max-width: none !important; }

button {
  padding: 0;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border: 0;
  border-radius: 0px;
  background: transparent;
  line-height: 1;
  cursor: auto; }

[data-whatinput='mouse'] button {
  outline: 0; }

pre {
  overflow: auto; }

button,
input,
optgroup,
select,
textarea {
  font-family: inherit; }

.is-visible {
  display: block !important; }

.is-hidden {
  display: none !important; }

[type='text'], [type='password'], [type='date'], [type='datetime'], [type='datetime-local'], [type='month'], [type='week'], [type='email'], [type='number'], [type='search'], [type='tel'], [type='time'], [type='url'], [type='color'],
textarea {
  display: block;
  box-sizing: border-box;
  width: 100%;
  height: 2.4375rem;
  margin: 0 0 1rem;
  padding: 0.5rem;
  border: 1px solid #cacaca;
  border-radius: 0px;
  background-color: #fefefe;
  box-shadow: inset 0 1px 2px rgba(10, 10, 10, 0.1);
  font-family: inherit;
  font-size: 1rem;
  font-weight: normal;
  line-height: 1.5;
  color: #0a0a0a;
  transition: box-shadow 0.5s, border-color 0.25s ease-in-out;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none; }

[type='text']:focus, [type='password']:focus, [type='date']:focus, [type='datetime']:focus, [type='datetime-local']:focus, [type='month']:focus, [type='week']:focus, [type='email']:focus, [type='number']:focus, [type='search']:focus, [type='tel']:focus, [type='time']:focus, [type='url']:focus, [type='color']:focus,
textarea:focus {
  outline: none;
  border: 1px solid #8a8a8a;
  background-color: #fefefe;
  box-shadow: 0 0 5px #cacaca;
  transition: box-shadow 0.5s, border-color 0.25s ease-in-out; }

textarea {
  max-width: 100%; }

textarea[rows] {
  height: auto; }

input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
  color: #cacaca; }

input::-ms-input-placeholder,
textarea::-ms-input-placeholder {
  color: #cacaca; }

input::placeholder,
textarea::placeholder {
  color: #cacaca; }

input:disabled, input[readonly],
textarea:disabled,
textarea[readonly] {
  background-color: #e6e6e6;
  cursor: not-allowed; }

[type='submit'],
[type='button'] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0px; }

input[type='search'] {
  box-sizing: border-box; }

[type='file'],
[type='checkbox'],
[type='radio'] {
  margin: 0 0 1rem; }

[type='checkbox'] + label,
[type='radio'] + label {
  display: inline-block;
  vertical-align: baseline;
  margin-left: 0.5rem;
  margin-right: 1rem;
  margin-bottom: 0; }

[type='checkbox'] + label[for],
[type='radio'] + label[for] {
  cursor: pointer; }

label > [type='checkbox'],
label > [type='radio'] {
  margin-right: 0.5rem; }

[type='file'] {
  width: 100%; }

label {
  display: block;
  margin: 0;
  font-size: 0.875rem;
  font-weight: normal;
  line-height: 1.8;
  color: #0a0a0a; }

label.middle {
  margin: 0 0 1rem;
  padding: 0.5625rem 0; }

.help-text {
  margin-top: -0.5rem;
  font-size: 0.8125rem;
  font-style: italic;
  color: #0a0a0a; }

.input-group {
  display: -webkit-flex;
  display: flex;
  width: 100%;
  margin-bottom: 1rem;
  -webkit-align-items: stretch;
          align-items: stretch; }

.input-group > :first-child {
  border-radius: 0px 0 0 0px; }

.input-group > :last-child > * {
  border-radius: 0 0px 0px 0; }

.input-group-label, .input-group-field, .input-group-button, .input-group-button a,
.input-group-button input,
.input-group-button button,
.input-group-button label {
  margin: 0;
  white-space: nowrap; }

.input-group-label {
  padding: 0 1rem;
  border: 1px solid #cacaca;
  background: #e6e6e6;
  color: #0a0a0a;
  text-align: center;
  white-space: nowrap;
  display: -webkit-flex;
  display: flex;
  -webkit-flex: 0 0 auto;
          flex: 0 0 auto;
  -webkit-align-items: center;
          align-items: center; }

.input-group-label:first-child {
  border-right: 0; }

.input-group-label:last-child {
  border-left: 0; }

.input-group-field {
  border-radius: 0;
  -webkit-flex: 1 1;
          flex: 1 1;
  height: auto;
  min-width: 0; }

.input-group-button {
  padding-top: 0;
  padding-bottom: 0;
  text-align: center;
  display: -webkit-flex;
  display: flex;
  -webkit-flex: 0 0 auto;
          flex: 0 0 auto; }

.input-group-button a,
.input-group-button input,
.input-group-button button,
.input-group-button label {
  height: auto;
  -webkit-align-self: stretch;
          align-self: stretch;
  padding-top: 0;
  padding-bottom: 0;
  font-size: 1rem; }

fieldset {
  margin: 0;
  padding: 0;
  border: 0; }

legend {
  max-width: 100%;
  margin-bottom: 0.5rem; }

.fieldset {
  margin: 1.125rem 0;
  padding: 1.25rem;
  border: 1px solid #cacaca; }

.fieldset legend {
  margin: 0;
  margin-left: -0.1875rem;
  padding: 0 0.1875rem; }

select {
  height: 2.4375rem;
  margin: 0 0 1rem;
  padding: 0.5rem;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border: 1px solid #cacaca;
  border-radius: 0px;
  background-color: #fefefe;
  font-family: inherit;
  font-size: 1rem;
  font-weight: normal;
  line-height: 1.5;
  color: #0a0a0a;
  background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' version='1.1' width='32' height='24' viewBox='0 0 32 24'><polygon points='0,0 32,0 16,24' style='fill: rgb%28138, 138, 138%29'></polygon></svg>");
  background-origin: content-box;
  background-position: right -1rem center;
  background-repeat: no-repeat;
  background-size: 9px 6px;
  padding-right: 1.5rem;
  transition: box-shadow 0.5s, border-color 0.25s ease-in-out; }

@media screen and (min-width: 0\0) {
  select {
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAYCAYAAACbU/80AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAIpJREFUeNrEkckNgDAMBBfRkEt0ObRBBdsGXUDgmQfK4XhH2m8czQAAy27R3tsw4Qfe2x8uOO6oYLb6GlOor3GF+swURAOmUJ+RwtEJs9WvTGEYxBXqI1MQAZhCfUQKRzDMVj+TwrAIV6jvSUEkYAr1LSkcyTBb/V+KYfX7xAeusq3sLDtGH3kEGACPWIflNZfhRQAAAABJRU5ErkJggg=="); } }

select:focus {
  outline: none;
  border: 1px solid #8a8a8a;
  background-color: #fefefe;
  box-shadow: 0 0 5px #cacaca;
  transition: box-shadow 0.5s, border-color 0.25s ease-in-out; }

select:disabled {
  background-color: #e6e6e6;
  cursor: not-allowed; }

select::-ms-expand {
  display: none; }

select[multiple] {
  height: auto;
  background-image: none; }

.is-invalid-input:not(:focus) {
  border-color: #c60f13;
  background-color: #f8e6e7; }

.is-invalid-input:not(:focus)::-webkit-input-placeholder {
  color: #c60f13; }

.is-invalid-input:not(:focus)::-ms-input-placeholder {
  color: #c60f13; }

.is-invalid-input:not(:focus)::placeholder {
  color: #c60f13; }

.is-invalid-label {
  color: #c60f13; }

.form-error {
  display: none;
  margin-top: -0.5rem;
  margin-bottom: 1rem;
  font-size: 0.75rem;
  font-weight: bold;
  color: #c60f13; }

.form-error.is-visible {
  display: block; }

.button {
  display: inline-block;
  vertical-align: middle;
  margin: 0 0 1rem 0;
  font-family: inherit;
  padding: 0.85em 1em;
  -webkit-appearance: none;
  border: 1px solid transparent;
  border-radius: 0px;
  transition: background-color 0.25s ease-out, color 0.25s ease-out;
  font-size: 0.9rem;
  line-height: 1;
  text-align: center;
  cursor: pointer;
  background-color: #2ba6cb;
  color: #fefefe; }

[data-whatinput='mouse'] .button {
  outline: 0; }

.button:hover, .button:focus {
  background-color: #258dad;
  color: #fefefe; }

.button.tiny {
  font-size: 0.6rem; }

.button.small {
  font-size: 0.75rem; }

.button.large {
  font-size: 1.25rem; }

.button.expanded {
  display: block;
  width: 100%;
  margin-right: 0;
  margin-left: 0; }

.button.primary {
  background-color: #2ba6cb;
  color: #0a0a0a; }

.button.primary:hover, .button.primary:focus {
  background-color: #2285a2;
  color: #0a0a0a; }

.button.secondary {
  background-color: #e9e9e9;
  color: #0a0a0a; }

.button.secondary:hover, .button.secondary:focus {
  background-color: #bababa;
  color: #0a0a0a; }

.button.alert {
  background-color: #c60f13;
  color: #fefefe; }

.button.alert:hover, .button.alert:focus {
  background-color: #9e0c0f;
  color: #fefefe; }

.button.success {
  background-color: #5da423;
  color: #0a0a0a; }

.button.success:hover, .button.success:focus {
  background-color: #4a831c;
  color: #0a0a0a; }

.button.warning {
  background-color: #ffae00;
  color: #0a0a0a; }

.button.warning:hover, .button.warning:focus {
  background-color: #cc8b00;
  color: #0a0a0a; }

.button.body-font {
  background-color: #222222;
  color: #fefefe; }

.button.body-font:hover, .button.body-font:focus {
  background-color: #1b1b1b;
  color: #fefefe; }

.button.header {
  background-color: #222222;
  color: #fefefe; }

.button.header:hover, .button.header:focus {
  background-color: #1b1b1b;
  color: #fefefe; }

.button.disabled, .button[disabled] {
  opacity: 0.25;
  cursor: not-allowed; }

.button.disabled, .button.disabled:hover, .button.disabled:focus, .button[disabled], .button[disabled]:hover, .button[disabled]:focus {
  background-color: #2ba6cb;
  color: #fefefe; }

.button.disabled.primary, .button[disabled].primary {
  opacity: 0.25;
  cursor: not-allowed; }

.button.disabled.primary, .button.disabled.primary:hover, .button.disabled.primary:focus, .button[disabled].primary, .button[disabled].primary:hover, .button[disabled].primary:focus {
  background-color: #2ba6cb;
  color: #0a0a0a; }

.button.disabled.secondary, .button[disabled].secondary {
  opacity: 0.25;
  cursor: not-allowed; }

.button.disabled.secondary, .button.disabled.secondary:hover, .button.disabled.secondary:focus, .button[disabled].secondary, .button[disabled].secondary:hover, .button[disabled].secondary:focus {
  background-color: #e9e9e9;
  color: #0a0a0a; }

.button.disabled.alert, .button[disabled].alert {
  opacity: 0.25;
  cursor: not-allowed; }

.button.disabled.alert, .button.disabled.alert:hover, .button.disabled.alert:focus, .button[disabled].alert, .button[disabled].alert:hover, .button[disabled].alert:focus {
  background-color: #c60f13;
  color: #fefefe; }

.button.disabled.success, .button[disabled].success {
  opacity: 0.25;
  cursor: not-allowed; }

.button.disabled.success, .button.disabled.success:hover, .button.disabled.success:focus, .button[disabled].success, .button[disabled].success:hover, .button[disabled].success:focus {
  background-color: #5da423;
  color: #0a0a0a; }

.button.disabled.warning, .button[disabled].warning {
  opacity: 0.25;
  cursor: not-allowed; }

.button.disabled.warning, .button.disabled.warning:hover, .button.disabled.warning:focus, .button[disabled].warning, .button[disabled].warning:hover, .button[disabled].warning:focus {
  background-color: #ffae00;
  color: #0a0a0a; }

.button.disabled.body-font, .button[disabled].body-font {
  opacity: 0.25;
  cursor: not-allowed; }

.button.disabled.body-font, .button.disabled.body-font:hover, .button.disabled.body-font:focus, .button[disabled].body-font, .button[disabled].body-font:hover, .button[disabled].body-font:focus {
  background-color: #222222;
  color: #fefefe; }

.button.disabled.header, .button[disabled].header {
  opacity: 0.25;
  cursor: not-allowed; }

.button.disabled.header, .button.disabled.header:hover, .button.disabled.header:focus, .button[disabled].header, .button[disabled].header:hover, .button[disabled].header:focus {
  background-color: #222222;
  color: #fefefe; }

.button.hollow {
  border: 1px solid #2ba6cb;
  color: #2ba6cb; }

.button.hollow, .button.hollow:hover, .button.hollow:focus {
  background-color: transparent; }

.button.hollow.disabled, .button.hollow.disabled:hover, .button.hollow.disabled:focus, .button.hollow[disabled], .button.hollow[disabled]:hover, .button.hollow[disabled]:focus {
  background-color: transparent; }

.button.hollow:hover, .button.hollow:focus {
  border-color: #165366;
  color: #165366; }

.button.hollow:hover.disabled, .button.hollow:hover[disabled], .button.hollow:focus.disabled, .button.hollow:focus[disabled] {
  border: 1px solid #2ba6cb;
  color: #2ba6cb; }

.button.hollow.primary {
  border: 1px solid #2ba6cb;
  color: #2ba6cb; }

.button.hollow.primary:hover, .button.hollow.primary:focus {
  border-color: #165366;
  color: #165366; }

.button.hollow.primary:hover.disabled, .button.hollow.primary:hover[disabled], .button.hollow.primary:focus.disabled, .button.hollow.primary:focus[disabled] {
  border: 1px solid #2ba6cb;
  color: #2ba6cb; }

.button.hollow.secondary {
  border: 1px solid #e9e9e9;
  color: #e9e9e9; }

.button.hollow.secondary:hover, .button.hollow.secondary:focus {
  border-color: #757575;
  color: #757575; }

.button.hollow.secondary:hover.disabled, .button.hollow.secondary:hover[disabled], .button.hollow.secondary:focus.disabled, .button.hollow.secondary:focus[disabled] {
  border: 1px solid #e9e9e9;
  color: #e9e9e9; }

.button.hollow.alert {
  border: 1px solid #c60f13;
  color: #c60f13; }

.button.hollow.alert:hover, .button.hollow.alert:focus {
  border-color: #63080a;
  color: #63080a; }

.button.hollow.alert:hover.disabled, .button.hollow.alert:hover[disabled], .button.hollow.alert:focus.disabled, .button.hollow.alert:focus[disabled] {
  border: 1px solid #c60f13;
  color: #c60f13; }

.button.hollow.success {
  border: 1px solid #5da423;
  color: #5da423; }

.button.hollow.success:hover, .button.hollow.success:focus {
  border-color: #2f5212;
  color: #2f5212; }

.button.hollow.success:hover.disabled, .button.hollow.success:hover[disabled], .button.hollow.success:focus.disabled, .button.hollow.success:focus[disabled] {
  border: 1px solid #5da423;
  color: #5da423; }

.button.hollow.warning {
  border: 1px solid #ffae00;
  color: #ffae00; }

.button.hollow.warning:hover, .button.hollow.warning:focus {
  border-color: #805700;
  color: #805700; }

.button.hollow.warning:hover.disabled, .button.hollow.warning:hover[disabled], .button.hollow.warning:focus.disabled, .button.hollow.warning:focus[disabled] {
  border: 1px solid #ffae00;
  color: #ffae00; }

.button.hollow.body-font {
  border: 1px solid #222222;
  color: #222222; }

.button.hollow.body-font:hover, .button.hollow.body-font:focus {
  border-color: #111111;
  color: #111111; }

.button.hollow.body-font:hover.disabled, .button.hollow.body-font:hover[disabled], .button.hollow.body-font:focus.disabled, .button.hollow.body-font:focus[disabled] {
  border: 1px solid #222222;
  color: #222222; }

.button.hollow.header {
  border: 1px solid #222222;
  color: #222222; }

.button.hollow.header:hover, .button.hollow.header:focus {
  border-color: #111111;
  color: #111111; }

.button.hollow.header:hover.disabled, .button.hollow.header:hover[disabled], .button.hollow.header:focus.disabled, .button.hollow.header:focus[disabled] {
  border: 1px solid #222222;
  color: #222222; }

.button.clear {
  border: 1px solid #2ba6cb;
  color: #2ba6cb; }

.button.clear, .button.clear:hover, .button.clear:focus {
  background-color: transparent; }

.button.clear.disabled, .button.clear.disabled:hover, .button.clear.disabled:focus, .button.clear[disabled], .button.clear[disabled]:hover, .button.clear[disabled]:focus {
  background-color: transparent; }

.button.clear:hover, .button.clear:focus {
  border-color: #165366;
  color: #165366; }

.button.clear:hover.disabled, .button.clear:hover[disabled], .button.clear:focus.disabled, .button.clear:focus[disabled] {
  border: 1px solid #2ba6cb;
  color: #2ba6cb; }

.button.clear, .button.clear.disabled, .button.clear[disabled], .button.clear:hover, .button.clear:hover.disabled, .button.clear:hover[disabled], .button.clear:focus, .button.clear:focus.disabled, .button.clear:focus[disabled] {
  border-color: transparent; }

.button.clear.primary {
  border: 1px solid #2ba6cb;
  color: #2ba6cb; }

.button.clear.primary:hover, .button.clear.primary:focus {
  border-color: #165366;
  color: #165366; }

.button.clear.primary:hover.disabled, .button.clear.primary:hover[disabled], .button.clear.primary:focus.disabled, .button.clear.primary:focus[disabled] {
  border: 1px solid #2ba6cb;
  color: #2ba6cb; }

.button.clear.primary, .button.clear.primary.disabled, .button.clear.primary[disabled], .button.clear.primary:hover, .button.clear.primary:hover.disabled, .button.clear.primary:hover[disabled], .button.clear.primary:focus, .button.clear.primary:focus.disabled, .button.clear.primary:focus[disabled] {
  border-color: transparent; }

.button.clear.secondary {
  border: 1px solid #e9e9e9;
  color: #e9e9e9; }

.button.clear.secondary:hover, .button.clear.secondary:focus {
  border-color: #757575;
  color: #757575; }

.button.clear.secondary:hover.disabled, .button.clear.secondary:hover[disabled], .button.clear.secondary:focus.disabled, .button.clear.secondary:focus[disabled] {
  border: 1px solid #e9e9e9;
  color: #e9e9e9; }

.button.clear.secondary, .button.clear.secondary.disabled, .button.clear.secondary[disabled], .button.clear.secondary:hover, .button.clear.secondary:hover.disabled, .button.clear.secondary:hover[disabled], .button.clear.secondary:focus, .button.clear.secondary:focus.disabled, .button.clear.secondary:focus[disabled] {
  border-color: transparent; }

.button.clear.alert {
  border: 1px solid #c60f13;
  color: #c60f13; }

.button.clear.alert:hover, .button.clear.alert:focus {
  border-color: #63080a;
  color: #63080a; }

.button.clear.alert:hover.disabled, .button.clear.alert:hover[disabled], .button.clear.alert:focus.disabled, .button.clear.alert:focus[disabled] {
  border: 1px solid #c60f13;
  color: #c60f13; }

.button.clear.alert, .button.clear.alert.disabled, .button.clear.alert[disabled], .button.clear.alert:hover, .button.clear.alert:hover.disabled, .button.clear.alert:hover[disabled], .button.clear.alert:focus, .button.clear.alert:focus.disabled, .button.clear.alert:focus[disabled] {
  border-color: transparent; }

.button.clear.success {
  border: 1px solid #5da423;
  color: #5da423; }

.button.clear.success:hover, .button.clear.success:focus {
  border-color: #2f5212;
  color: #2f5212; }

.button.clear.success:hover.disabled, .button.clear.success:hover[disabled], .button.clear.success:focus.disabled, .button.clear.success:focus[disabled] {
  border: 1px solid #5da423;
  color: #5da423; }

.button.clear.success, .button.clear.success.disabled, .button.clear.success[disabled], .button.clear.success:hover, .button.clear.success:hover.disabled, .button.clear.success:hover[disabled], .button.clear.success:focus, .button.clear.success:focus.disabled, .button.clear.success:focus[disabled] {
  border-color: transparent; }

.button.clear.warning {
  border: 1px solid #ffae00;
  color: #ffae00; }

.button.clear.warning:hover, .button.clear.warning:focus {
  border-color: #805700;
  color: #805700; }

.button.clear.warning:hover.disabled, .button.clear.warning:hover[disabled], .button.clear.warning:focus.disabled, .button.clear.warning:focus[disabled] {
  border: 1px solid #ffae00;
  color: #ffae00; }

.button.clear.warning, .button.clear.warning.disabled, .button.clear.warning[disabled], .button.clear.warning:hover, .button.clear.warning:hover.disabled, .button.clear.warning:hover[disabled], .button.clear.warning:focus, .button.clear.warning:focus.disabled, .button.clear.warning:focus[disabled] {
  border-color: transparent; }

.button.clear.body-font {
  border: 1px solid #222222;
  color: #222222; }

.button.clear.body-font:hover, .button.clear.body-font:focus {
  border-color: #111111;
  color: #111111; }

.button.clear.body-font:hover.disabled, .button.clear.body-font:hover[disabled], .button.clear.body-font:focus.disabled, .button.clear.body-font:focus[disabled] {
  border: 1px solid #222222;
  color: #222222; }

.button.clear.body-font, .button.clear.body-font.disabled, .button.clear.body-font[disabled], .button.clear.body-font:hover, .button.clear.body-font:hover.disabled, .button.clear.body-font:hover[disabled], .button.clear.body-font:focus, .button.clear.body-font:focus.disabled, .button.clear.body-font:focus[disabled] {
  border-color: transparent; }

.button.clear.header {
  border: 1px solid #222222;
  color: #222222; }

.button.clear.header:hover, .button.clear.header:focus {
  border-color: #111111;
  color: #111111; }

.button.clear.header:hover.disabled, .button.clear.header:hover[disabled], .button.clear.header:focus.disabled, .button.clear.header:focus[disabled] {
  border: 1px solid #222222;
  color: #222222; }

.button.clear.header, .button.clear.header.disabled, .button.clear.header[disabled], .button.clear.header:hover, .button.clear.header:hover.disabled, .button.clear.header:hover[disabled], .button.clear.header:focus, .button.clear.header:focus.disabled, .button.clear.header:focus[disabled] {
  border-color: transparent; }

.button.dropdown::after {
  display: block;
  width: 0;
  height: 0;
  border: inset 0.4em;
  content: '';
  border-bottom-width: 0;
  border-top-style: solid;
  border-color: #fefefe transparent transparent;
  position: relative;
  top: 0.4em;
  display: inline-block;
  float: right;
  margin-left: 1em; }

.button.dropdown.hollow::after {
  border-top-color: #2ba6cb; }

.button.dropdown.hollow.primary::after {
  border-top-color: #2ba6cb; }

.button.dropdown.hollow.secondary::after {
  border-top-color: #e9e9e9; }

.button.dropdown.hollow.alert::after {
  border-top-color: #c60f13; }

.button.dropdown.hollow.success::after {
  border-top-color: #5da423; }

.button.dropdown.hollow.warning::after {
  border-top-color: #ffae00; }

.button.dropdown.hollow.body-font::after {
  border-top-color: #222222; }

.button.dropdown.hollow.header::after {
  border-top-color: #222222; }

.button.arrow-only::after {
  top: -0.1em;
  float: none;
  margin-left: 0; }

a.button:hover, a.button:focus {
  text-decoration: none; }

.switch {
  height: 2rem;
  position: relative;
  margin-bottom: 1rem;
  outline: 0;
  font-size: 0.875rem;
  font-weight: bold;
  color: #fefefe;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }

.switch-input {
  position: absolute;
  margin-bottom: 0;
  opacity: 0; }

.switch-paddle {
  position: relative;
  display: block;
  width: 4rem;
  height: 2rem;
  border-radius: 0px;
  background: #cacaca;
  transition: all 0.25s ease-out;
  font-weight: inherit;
  color: inherit;
  cursor: pointer; }

input + .switch-paddle {
  margin: 0; }

.switch-paddle::after {
  position: absolute;
  top: 0.25rem;
  left: 0.25rem;
  display: block;
  width: 1.5rem;
  height: 1.5rem;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
  border-radius: 0px;
  background: #fefefe;
  transition: all 0.25s ease-out;
  content: ''; }

input:checked ~ .switch-paddle {
  background: #2ba6cb; }

input:checked ~ .switch-paddle::after {
  left: 2.25rem; }

[data-whatinput='mouse'] input:focus ~ .switch-paddle {
  outline: 0; }

.switch-active, .switch-inactive {
  position: absolute;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%); }

.switch-active {
  left: 8%;
  display: none; }

input:checked + label > .switch-active {
  display: block; }

.switch-inactive {
  right: 15%; }

input:checked + label > .switch-inactive {
  display: none; }

.switch.tiny {
  height: 1.5rem; }

.switch.tiny .switch-paddle {
  width: 3rem;
  height: 1.5rem;
  font-size: 0.625rem; }

.switch.tiny .switch-paddle::after {
  top: 0.25rem;
  left: 0.25rem;
  width: 1rem;
  height: 1rem; }

.switch.tiny input:checked ~ .switch-paddle::after {
  left: 1.75rem; }

.switch.small {
  height: 1.75rem; }

.switch.small .switch-paddle {
  width: 3.5rem;
  height: 1.75rem;
  font-size: 0.75rem; }

.switch.small .switch-paddle::after {
  top: 0.25rem;
  left: 0.25rem;
  width: 1.25rem;
  height: 1.25rem; }

.switch.small input:checked ~ .switch-paddle::after {
  left: 2rem; }

.switch.large {
  height: 2.5rem; }

.switch.large .switch-paddle {
  width: 5rem;
  height: 2.5rem;
  font-size: 1rem; }

.switch.large .switch-paddle::after {
  top: 0.25rem;
  left: 0.25rem;
  width: 2rem;
  height: 2rem; }

.switch.large input:checked ~ .switch-paddle::after {
  left: 2.75rem; }

.grid-container {
  padding-right: 0.9375rem;
  padding-left: 0.9375rem;
  max-width: 62.5rem;
  margin: 0 auto; }

.grid-container.fluid {
  padding-right: 0.9375rem;
  padding-left: 0.9375rem;
  max-width: 100%;
  margin: 0 auto; }

.grid-container.full {
  padding-right: 0;
  padding-left: 0;
  max-width: 100%;
  margin: 0 auto; }

.grid-x {
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: row wrap;
          flex-flow: row wrap; }

.cell {
  -webkit-flex: 0 0 auto;
          flex: 0 0 auto;
  min-height: 0px;
  min-width: 0px;
  width: 100%; }

.cell.auto {
  -webkit-flex: 1 1;
          flex: 1 1; }

.cell.shrink {
  -webkit-flex: 0 0 auto;
          flex: 0 0 auto; }

.grid-x > .auto {
  width: auto; }

.grid-x > .shrink {
  width: auto; }

.grid-x > .small-shrink, .grid-x > .small-full, .grid-x > .small-1, .grid-x > .small-2, .grid-x > .small-3, .grid-x > .small-4, .grid-x > .small-5, .grid-x > .small-6, .grid-x > .small-7, .grid-x > .small-8, .grid-x > .small-9, .grid-x > .small-10, .grid-x > .small-11, .grid-x > .small-12, .grid-x > .small-13, .grid-x > .small-14, .grid-x > .small-15, .grid-x > .small-16, .grid-x > .small-17, .grid-x > .small-18, .grid-x > .small-19, .grid-x > .small-20, .grid-x > .small-21, .grid-x > .small-22, .grid-x > .small-23, .grid-x > .small-24 {
  -webkit-flex-basis: auto;
          flex-basis: auto; }

@media print, screen and (min-width: 40em) {
  .grid-x > .medium-shrink, .grid-x > .medium-full, .grid-x > .medium-1, .grid-x > .medium-2, .grid-x > .medium-3, .grid-x > .medium-4, .grid-x > .medium-5, .grid-x > .medium-6, .grid-x > .medium-7, .grid-x > .medium-8, .grid-x > .medium-9, .grid-x > .medium-10, .grid-x > .medium-11, .grid-x > .medium-12, .grid-x > .medium-13, .grid-x > .medium-14, .grid-x > .medium-15, .grid-x > .medium-16, .grid-x > .medium-17, .grid-x > .medium-18, .grid-x > .medium-19, .grid-x > .medium-20, .grid-x > .medium-21, .grid-x > .medium-22, .grid-x > .medium-23, .grid-x > .medium-24 {
    -webkit-flex-basis: auto;
            flex-basis: auto; } }

@media print, screen and (min-width: 64em) {
  .grid-x > .large-shrink, .grid-x > .large-full, .grid-x > .large-1, .grid-x > .large-2, .grid-x > .large-3, .grid-x > .large-4, .grid-x > .large-5, .grid-x > .large-6, .grid-x > .large-7, .grid-x > .large-8, .grid-x > .large-9, .grid-x > .large-10, .grid-x > .large-11, .grid-x > .large-12, .grid-x > .large-13, .grid-x > .large-14, .grid-x > .large-15, .grid-x > .large-16, .grid-x > .large-17, .grid-x > .large-18, .grid-x > .large-19, .grid-x > .large-20, .grid-x > .large-21, .grid-x > .large-22, .grid-x > .large-23, .grid-x > .large-24 {
    -webkit-flex-basis: auto;
            flex-basis: auto; } }

.grid-x > .small-1 {
  width: 4.16667%; }

.grid-x > .small-2 {
  width: 8.33333%; }

.grid-x > .small-3 {
  width: 12.5%; }

.grid-x > .small-4 {
  width: 16.66667%; }

.grid-x > .small-5 {
  width: 20.83333%; }

.grid-x > .small-6 {
  width: 25%; }

.grid-x > .small-7 {
  width: 29.16667%; }

.grid-x > .small-8 {
  width: 33.33333%; }

.grid-x > .small-9 {
  width: 37.5%; }

.grid-x > .small-10 {
  width: 41.66667%; }

.grid-x > .small-11 {
  width: 45.83333%; }

.grid-x > .small-12 {
  width: 50%; }

.grid-x > .small-13 {
  width: 54.16667%; }

.grid-x > .small-14 {
  width: 58.33333%; }

.grid-x > .small-15 {
  width: 62.5%; }

.grid-x > .small-16 {
  width: 66.66667%; }

.grid-x > .small-17 {
  width: 70.83333%; }

.grid-x > .small-18 {
  width: 75%; }

.grid-x > .small-19 {
  width: 79.16667%; }

.grid-x > .small-20 {
  width: 83.33333%; }

.grid-x > .small-21 {
  width: 87.5%; }

.grid-x > .small-22 {
  width: 91.66667%; }

.grid-x > .small-23 {
  width: 95.83333%; }

.grid-x > .small-24 {
  width: 100%; }

@media print, screen and (min-width: 40em) {
  .grid-x > .medium-auto {
    -webkit-flex: 1 1;
            flex: 1 1;
    width: auto; }
  .grid-x > .medium-shrink {
    -webkit-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto; }
  .grid-x > .medium-1 {
    width: 4.16667%; }
  .grid-x > .medium-2 {
    width: 8.33333%; }
  .grid-x > .medium-3 {
    width: 12.5%; }
  .grid-x > .medium-4 {
    width: 16.66667%; }
  .grid-x > .medium-5 {
    width: 20.83333%; }
  .grid-x > .medium-6 {
    width: 25%; }
  .grid-x > .medium-7 {
    width: 29.16667%; }
  .grid-x > .medium-8 {
    width: 33.33333%; }
  .grid-x > .medium-9 {
    width: 37.5%; }
  .grid-x > .medium-10 {
    width: 41.66667%; }
  .grid-x > .medium-11 {
    width: 45.83333%; }
  .grid-x > .medium-12 {
    width: 50%; }
  .grid-x > .medium-13 {
    width: 54.16667%; }
  .grid-x > .medium-14 {
    width: 58.33333%; }
  .grid-x > .medium-15 {
    width: 62.5%; }
  .grid-x > .medium-16 {
    width: 66.66667%; }
  .grid-x > .medium-17 {
    width: 70.83333%; }
  .grid-x > .medium-18 {
    width: 75%; }
  .grid-x > .medium-19 {
    width: 79.16667%; }
  .grid-x > .medium-20 {
    width: 83.33333%; }
  .grid-x > .medium-21 {
    width: 87.5%; }
  .grid-x > .medium-22 {
    width: 91.66667%; }
  .grid-x > .medium-23 {
    width: 95.83333%; }
  .grid-x > .medium-24 {
    width: 100%; } }

@media print, screen and (min-width: 64em) {
  .grid-x > .large-auto {
    -webkit-flex: 1 1;
            flex: 1 1;
    width: auto; }
  .grid-x > .large-shrink {
    -webkit-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto; }
  .grid-x > .large-1 {
    width: 4.16667%; }
  .grid-x > .large-2 {
    width: 8.33333%; }
  .grid-x > .large-3 {
    width: 12.5%; }
  .grid-x > .large-4 {
    width: 16.66667%; }
  .grid-x > .large-5 {
    width: 20.83333%; }
  .grid-x > .large-6 {
    width: 25%; }
  .grid-x > .large-7 {
    width: 29.16667%; }
  .grid-x > .large-8 {
    width: 33.33333%; }
  .grid-x > .large-9 {
    width: 37.5%; }
  .grid-x > .large-10 {
    width: 41.66667%; }
  .grid-x > .large-11 {
    width: 45.83333%; }
  .grid-x > .large-12 {
    width: 50%; }
  .grid-x > .large-13 {
    width: 54.16667%; }
  .grid-x > .large-14 {
    width: 58.33333%; }
  .grid-x > .large-15 {
    width: 62.5%; }
  .grid-x > .large-16 {
    width: 66.66667%; }
  .grid-x > .large-17 {
    width: 70.83333%; }
  .grid-x > .large-18 {
    width: 75%; }
  .grid-x > .large-19 {
    width: 79.16667%; }
  .grid-x > .large-20 {
    width: 83.33333%; }
  .grid-x > .large-21 {
    width: 87.5%; }
  .grid-x > .large-22 {
    width: 91.66667%; }
  .grid-x > .large-23 {
    width: 95.83333%; }
  .grid-x > .large-24 {
    width: 100%; } }

.grid-margin-x:not(.grid-x) > .cell {
  width: auto; }

.grid-margin-y:not(.grid-y) > .cell {
  height: auto; }

.grid-margin-x {
  margin-left: -0.9375rem;
  margin-right: -0.9375rem; }

.grid-margin-x > .cell {
  width: calc(100% - 1.875rem);
  margin-left: 0.9375rem;
  margin-right: 0.9375rem; }

.grid-margin-x > .auto {
  width: auto; }

.grid-margin-x > .shrink {
  width: auto; }

.grid-margin-x > .small-1 {
  width: calc(4.16667% - 1.875rem); }

.grid-margin-x > .small-2 {
  width: calc(8.33333% - 1.875rem); }

.grid-margin-x > .small-3 {
  width: calc(12.5% - 1.875rem); }

.grid-margin-x > .small-4 {
  width: calc(16.66667% - 1.875rem); }

.grid-margin-x > .small-5 {
  width: calc(20.83333% - 1.875rem); }

.grid-margin-x > .small-6 {
  width: calc(25% - 1.875rem); }

.grid-margin-x > .small-7 {
  width: calc(29.16667% - 1.875rem); }

.grid-margin-x > .small-8 {
  width: calc(33.33333% - 1.875rem); }

.grid-margin-x > .small-9 {
  width: calc(37.5% - 1.875rem); }

.grid-margin-x > .small-10 {
  width: calc(41.66667% - 1.875rem); }

.grid-margin-x > .small-11 {
  width: calc(45.83333% - 1.875rem); }

.grid-margin-x > .small-12 {
  width: calc(50% - 1.875rem); }

.grid-margin-x > .small-13 {
  width: calc(54.16667% - 1.875rem); }

.grid-margin-x > .small-14 {
  width: calc(58.33333% - 1.875rem); }

.grid-margin-x > .small-15 {
  width: calc(62.5% - 1.875rem); }

.grid-margin-x > .small-16 {
  width: calc(66.66667% - 1.875rem); }

.grid-margin-x > .small-17 {
  width: calc(70.83333% - 1.875rem); }

.grid-margin-x > .small-18 {
  width: calc(75% - 1.875rem); }

.grid-margin-x > .small-19 {
  width: calc(79.16667% - 1.875rem); }

.grid-margin-x > .small-20 {
  width: calc(83.33333% - 1.875rem); }

.grid-margin-x > .small-21 {
  width: calc(87.5% - 1.875rem); }

.grid-margin-x > .small-22 {
  width: calc(91.66667% - 1.875rem); }

.grid-margin-x > .small-23 {
  width: calc(95.83333% - 1.875rem); }

.grid-margin-x > .small-24 {
  width: calc(100% - 1.875rem); }

@media print, screen and (min-width: 40em) {
  .grid-margin-x > .medium-auto {
    width: auto; }
  .grid-margin-x > .medium-shrink {
    width: auto; }
  .grid-margin-x > .medium-1 {
    width: calc(4.16667% - 1.875rem); }
  .grid-margin-x > .medium-2 {
    width: calc(8.33333% - 1.875rem); }
  .grid-margin-x > .medium-3 {
    width: calc(12.5% - 1.875rem); }
  .grid-margin-x > .medium-4 {
    width: calc(16.66667% - 1.875rem); }
  .grid-margin-x > .medium-5 {
    width: calc(20.83333% - 1.875rem); }
  .grid-margin-x > .medium-6 {
    width: calc(25% - 1.875rem); }
  .grid-margin-x > .medium-7 {
    width: calc(29.16667% - 1.875rem); }
  .grid-margin-x > .medium-8 {
    width: calc(33.33333% - 1.875rem); }
  .grid-margin-x > .medium-9 {
    width: calc(37.5% - 1.875rem); }
  .grid-margin-x > .medium-10 {
    width: calc(41.66667% - 1.875rem); }
  .grid-margin-x > .medium-11 {
    width: calc(45.83333% - 1.875rem); }
  .grid-margin-x > .medium-12 {
    width: calc(50% - 1.875rem); }
  .grid-margin-x > .medium-13 {
    width: calc(54.16667% - 1.875rem); }
  .grid-margin-x > .medium-14 {
    width: calc(58.33333% - 1.875rem); }
  .grid-margin-x > .medium-15 {
    width: calc(62.5% - 1.875rem); }
  .grid-margin-x > .medium-16 {
    width: calc(66.66667% - 1.875rem); }
  .grid-margin-x > .medium-17 {
    width: calc(70.83333% - 1.875rem); }
  .grid-margin-x > .medium-18 {
    width: calc(75% - 1.875rem); }
  .grid-margin-x > .medium-19 {
    width: calc(79.16667% - 1.875rem); }
  .grid-margin-x > .medium-20 {
    width: calc(83.33333% - 1.875rem); }
  .grid-margin-x > .medium-21 {
    width: calc(87.5% - 1.875rem); }
  .grid-margin-x > .medium-22 {
    width: calc(91.66667% - 1.875rem); }
  .grid-margin-x > .medium-23 {
    width: calc(95.83333% - 1.875rem); }
  .grid-margin-x > .medium-24 {
    width: calc(100% - 1.875rem); } }

@media print, screen and (min-width: 64em) {
  .grid-margin-x > .large-auto {
    width: auto; }
  .grid-margin-x > .large-shrink {
    width: auto; }
  .grid-margin-x > .large-1 {
    width: calc(4.16667% - 1.875rem); }
  .grid-margin-x > .large-2 {
    width: calc(8.33333% - 1.875rem); }
  .grid-margin-x > .large-3 {
    width: calc(12.5% - 1.875rem); }
  .grid-margin-x > .large-4 {
    width: calc(16.66667% - 1.875rem); }
  .grid-margin-x > .large-5 {
    width: calc(20.83333% - 1.875rem); }
  .grid-margin-x > .large-6 {
    width: calc(25% - 1.875rem); }
  .grid-margin-x > .large-7 {
    width: calc(29.16667% - 1.875rem); }
  .grid-margin-x > .large-8 {
    width: calc(33.33333% - 1.875rem); }
  .grid-margin-x > .large-9 {
    width: calc(37.5% - 1.875rem); }
  .grid-margin-x > .large-10 {
    width: calc(41.66667% - 1.875rem); }
  .grid-margin-x > .large-11 {
    width: calc(45.83333% - 1.875rem); }
  .grid-margin-x > .large-12 {
    width: calc(50% - 1.875rem); }
  .grid-margin-x > .large-13 {
    width: calc(54.16667% - 1.875rem); }
  .grid-margin-x > .large-14 {
    width: calc(58.33333% - 1.875rem); }
  .grid-margin-x > .large-15 {
    width: calc(62.5% - 1.875rem); }
  .grid-margin-x > .large-16 {
    width: calc(66.66667% - 1.875rem); }
  .grid-margin-x > .large-17 {
    width: calc(70.83333% - 1.875rem); }
  .grid-margin-x > .large-18 {
    width: calc(75% - 1.875rem); }
  .grid-margin-x > .large-19 {
    width: calc(79.16667% - 1.875rem); }
  .grid-margin-x > .large-20 {
    width: calc(83.33333% - 1.875rem); }
  .grid-margin-x > .large-21 {
    width: calc(87.5% - 1.875rem); }
  .grid-margin-x > .large-22 {
    width: calc(91.66667% - 1.875rem); }
  .grid-margin-x > .large-23 {
    width: calc(95.83333% - 1.875rem); }
  .grid-margin-x > .large-24 {
    width: calc(100% - 1.875rem); } }

.grid-padding-x .grid-padding-x {
  margin-right: -0.9375rem;
  margin-left: -0.9375rem; }

.grid-container:not(.full) > .grid-padding-x {
  margin-right: -0.9375rem;
  margin-left: -0.9375rem; }

.grid-padding-x > .cell {
  padding-right: 0.9375rem;
  padding-left: 0.9375rem; }

.small-up-1 > .cell {
  width: 100%; }

.small-up-2 > .cell {
  width: 50%; }

.small-up-3 > .cell {
  width: 33.33333%; }

.small-up-4 > .cell {
  width: 25%; }

.small-up-5 > .cell {
  width: 20%; }

.small-up-6 > .cell {
  width: 16.66667%; }

.small-up-7 > .cell {
  width: 14.28571%; }

.small-up-8 > .cell {
  width: 12.5%; }

@media print, screen and (min-width: 40em) {
  .medium-up-1 > .cell {
    width: 100%; }
  .medium-up-2 > .cell {
    width: 50%; }
  .medium-up-3 > .cell {
    width: 33.33333%; }
  .medium-up-4 > .cell {
    width: 25%; }
  .medium-up-5 > .cell {
    width: 20%; }
  .medium-up-6 > .cell {
    width: 16.66667%; }
  .medium-up-7 > .cell {
    width: 14.28571%; }
  .medium-up-8 > .cell {
    width: 12.5%; } }

@media print, screen and (min-width: 64em) {
  .large-up-1 > .cell {
    width: 100%; }
  .large-up-2 > .cell {
    width: 50%; }
  .large-up-3 > .cell {
    width: 33.33333%; }
  .large-up-4 > .cell {
    width: 25%; }
  .large-up-5 > .cell {
    width: 20%; }
  .large-up-6 > .cell {
    width: 16.66667%; }
  .large-up-7 > .cell {
    width: 14.28571%; }
  .large-up-8 > .cell {
    width: 12.5%; } }

.grid-margin-x.small-up-1 > .cell {
  width: calc(100% - 1.875rem); }

.grid-margin-x.small-up-2 > .cell {
  width: calc(50% - 1.875rem); }

.grid-margin-x.small-up-3 > .cell {
  width: calc(33.33333% - 1.875rem); }

.grid-margin-x.small-up-4 > .cell {
  width: calc(25% - 1.875rem); }

.grid-margin-x.small-up-5 > .cell {
  width: calc(20% - 1.875rem); }

.grid-margin-x.small-up-6 > .cell {
  width: calc(16.66667% - 1.875rem); }

.grid-margin-x.small-up-7 > .cell {
  width: calc(14.28571% - 1.875rem); }

.grid-margin-x.small-up-8 > .cell {
  width: calc(12.5% - 1.875rem); }

@media print, screen and (min-width: 40em) {
  .grid-margin-x.medium-up-1 > .cell {
    width: calc(100% - 1.875rem); }
  .grid-margin-x.medium-up-2 > .cell {
    width: calc(50% - 1.875rem); }
  .grid-margin-x.medium-up-3 > .cell {
    width: calc(33.33333% - 1.875rem); }
  .grid-margin-x.medium-up-4 > .cell {
    width: calc(25% - 1.875rem); }
  .grid-margin-x.medium-up-5 > .cell {
    width: calc(20% - 1.875rem); }
  .grid-margin-x.medium-up-6 > .cell {
    width: calc(16.66667% - 1.875rem); }
  .grid-margin-x.medium-up-7 > .cell {
    width: calc(14.28571% - 1.875rem); }
  .grid-margin-x.medium-up-8 > .cell {
    width: calc(12.5% - 1.875rem); } }

@media print, screen and (min-width: 64em) {
  .grid-margin-x.large-up-1 > .cell {
    width: calc(100% - 1.875rem); }
  .grid-margin-x.large-up-2 > .cell {
    width: calc(50% - 1.875rem); }
  .grid-margin-x.large-up-3 > .cell {
    width: calc(33.33333% - 1.875rem); }
  .grid-margin-x.large-up-4 > .cell {
    width: calc(25% - 1.875rem); }
  .grid-margin-x.large-up-5 > .cell {
    width: calc(20% - 1.875rem); }
  .grid-margin-x.large-up-6 > .cell {
    width: calc(16.66667% - 1.875rem); }
  .grid-margin-x.large-up-7 > .cell {
    width: calc(14.28571% - 1.875rem); }
  .grid-margin-x.large-up-8 > .cell {
    width: calc(12.5% - 1.875rem); } }

.small-margin-collapse {
  margin-right: 0;
  margin-left: 0; }

.small-margin-collapse > .cell {
  margin-right: 0;
  margin-left: 0; }

.small-margin-collapse > .small-1 {
  width: 4.16667%; }

.small-margin-collapse > .small-2 {
  width: 8.33333%; }

.small-margin-collapse > .small-3 {
  width: 12.5%; }

.small-margin-collapse > .small-4 {
  width: 16.66667%; }

.small-margin-collapse > .small-5 {
  width: 20.83333%; }

.small-margin-collapse > .small-6 {
  width: 25%; }

.small-margin-collapse > .small-7 {
  width: 29.16667%; }

.small-margin-collapse > .small-8 {
  width: 33.33333%; }

.small-margin-collapse > .small-9 {
  width: 37.5%; }

.small-margin-collapse > .small-10 {
  width: 41.66667%; }

.small-margin-collapse > .small-11 {
  width: 45.83333%; }

.small-margin-collapse > .small-12 {
  width: 50%; }

.small-margin-collapse > .small-13 {
  width: 54.16667%; }

.small-margin-collapse > .small-14 {
  width: 58.33333%; }

.small-margin-collapse > .small-15 {
  width: 62.5%; }

.small-margin-collapse > .small-16 {
  width: 66.66667%; }

.small-margin-collapse > .small-17 {
  width: 70.83333%; }

.small-margin-collapse > .small-18 {
  width: 75%; }

.small-margin-collapse > .small-19 {
  width: 79.16667%; }

.small-margin-collapse > .small-20 {
  width: 83.33333%; }

.small-margin-collapse > .small-21 {
  width: 87.5%; }

.small-margin-collapse > .small-22 {
  width: 91.66667%; }

.small-margin-collapse > .small-23 {
  width: 95.83333%; }

.small-margin-collapse > .small-24 {
  width: 100%; }

@media print, screen and (min-width: 40em) {
  .small-margin-collapse > .medium-1 {
    width: 4.16667%; }
  .small-margin-collapse > .medium-2 {
    width: 8.33333%; }
  .small-margin-collapse > .medium-3 {
    width: 12.5%; }
  .small-margin-collapse > .medium-4 {
    width: 16.66667%; }
  .small-margin-collapse > .medium-5 {
    width: 20.83333%; }
  .small-margin-collapse > .medium-6 {
    width: 25%; }
  .small-margin-collapse > .medium-7 {
    width: 29.16667%; }
  .small-margin-collapse > .medium-8 {
    width: 33.33333%; }
  .small-margin-collapse > .medium-9 {
    width: 37.5%; }
  .small-margin-collapse > .medium-10 {
    width: 41.66667%; }
  .small-margin-collapse > .medium-11 {
    width: 45.83333%; }
  .small-margin-collapse > .medium-12 {
    width: 50%; }
  .small-margin-collapse > .medium-13 {
    width: 54.16667%; }
  .small-margin-collapse > .medium-14 {
    width: 58.33333%; }
  .small-margin-collapse > .medium-15 {
    width: 62.5%; }
  .small-margin-collapse > .medium-16 {
    width: 66.66667%; }
  .small-margin-collapse > .medium-17 {
    width: 70.83333%; }
  .small-margin-collapse > .medium-18 {
    width: 75%; }
  .small-margin-collapse > .medium-19 {
    width: 79.16667%; }
  .small-margin-collapse > .medium-20 {
    width: 83.33333%; }
  .small-margin-collapse > .medium-21 {
    width: 87.5%; }
  .small-margin-collapse > .medium-22 {
    width: 91.66667%; }
  .small-margin-collapse > .medium-23 {
    width: 95.83333%; }
  .small-margin-collapse > .medium-24 {
    width: 100%; } }

@media print, screen and (min-width: 64em) {
  .small-margin-collapse > .large-1 {
    width: 4.16667%; }
  .small-margin-collapse > .large-2 {
    width: 8.33333%; }
  .small-margin-collapse > .large-3 {
    width: 12.5%; }
  .small-margin-collapse > .large-4 {
    width: 16.66667%; }
  .small-margin-collapse > .large-5 {
    width: 20.83333%; }
  .small-margin-collapse > .large-6 {
    width: 25%; }
  .small-margin-collapse > .large-7 {
    width: 29.16667%; }
  .small-margin-collapse > .large-8 {
    width: 33.33333%; }
  .small-margin-collapse > .large-9 {
    width: 37.5%; }
  .small-margin-collapse > .large-10 {
    width: 41.66667%; }
  .small-margin-collapse > .large-11 {
    width: 45.83333%; }
  .small-margin-collapse > .large-12 {
    width: 50%; }
  .small-margin-collapse > .large-13 {
    width: 54.16667%; }
  .small-margin-collapse > .large-14 {
    width: 58.33333%; }
  .small-margin-collapse > .large-15 {
    width: 62.5%; }
  .small-margin-collapse > .large-16 {
    width: 66.66667%; }
  .small-margin-collapse > .large-17 {
    width: 70.83333%; }
  .small-margin-collapse > .large-18 {
    width: 75%; }
  .small-margin-collapse > .large-19 {
    width: 79.16667%; }
  .small-margin-collapse > .large-20 {
    width: 83.33333%; }
  .small-margin-collapse > .large-21 {
    width: 87.5%; }
  .small-margin-collapse > .large-22 {
    width: 91.66667%; }
  .small-margin-collapse > .large-23 {
    width: 95.83333%; }
  .small-margin-collapse > .large-24 {
    width: 100%; } }

.small-padding-collapse {
  margin-right: 0;
  margin-left: 0; }

.small-padding-collapse > .cell {
  padding-right: 0;
  padding-left: 0; }

@media print, screen and (min-width: 40em) {
  .medium-margin-collapse {
    margin-right: 0;
    margin-left: 0; }
  .medium-margin-collapse > .cell {
    margin-right: 0;
    margin-left: 0; } }

@media print, screen and (min-width: 40em) {
  .medium-margin-collapse > .small-1 {
    width: 4.16667%; }
  .medium-margin-collapse > .small-2 {
    width: 8.33333%; }
  .medium-margin-collapse > .small-3 {
    width: 12.5%; }
  .medium-margin-collapse > .small-4 {
    width: 16.66667%; }
  .medium-margin-collapse > .small-5 {
    width: 20.83333%; }
  .medium-margin-collapse > .small-6 {
    width: 25%; }
  .medium-margin-collapse > .small-7 {
    width: 29.16667%; }
  .medium-margin-collapse > .small-8 {
    width: 33.33333%; }
  .medium-margin-collapse > .small-9 {
    width: 37.5%; }
  .medium-margin-collapse > .small-10 {
    width: 41.66667%; }
  .medium-margin-collapse > .small-11 {
    width: 45.83333%; }
  .medium-margin-collapse > .small-12 {
    width: 50%; }
  .medium-margin-collapse > .small-13 {
    width: 54.16667%; }
  .medium-margin-collapse > .small-14 {
    width: 58.33333%; }
  .medium-margin-collapse > .small-15 {
    width: 62.5%; }
  .medium-margin-collapse > .small-16 {
    width: 66.66667%; }
  .medium-margin-collapse > .small-17 {
    width: 70.83333%; }
  .medium-margin-collapse > .small-18 {
    width: 75%; }
  .medium-margin-collapse > .small-19 {
    width: 79.16667%; }
  .medium-margin-collapse > .small-20 {
    width: 83.33333%; }
  .medium-margin-collapse > .small-21 {
    width: 87.5%; }
  .medium-margin-collapse > .small-22 {
    width: 91.66667%; }
  .medium-margin-collapse > .small-23 {
    width: 95.83333%; }
  .medium-margin-collapse > .small-24 {
    width: 100%; } }

@media print, screen and (min-width: 40em) {
  .medium-margin-collapse > .medium-1 {
    width: 4.16667%; }
  .medium-margin-collapse > .medium-2 {
    width: 8.33333%; }
  .medium-margin-collapse > .medium-3 {
    width: 12.5%; }
  .medium-margin-collapse > .medium-4 {
    width: 16.66667%; }
  .medium-margin-collapse > .medium-5 {
    width: 20.83333%; }
  .medium-margin-collapse > .medium-6 {
    width: 25%; }
  .medium-margin-collapse > .medium-7 {
    width: 29.16667%; }
  .medium-margin-collapse > .medium-8 {
    width: 33.33333%; }
  .medium-margin-collapse > .medium-9 {
    width: 37.5%; }
  .medium-margin-collapse > .medium-10 {
    width: 41.66667%; }
  .medium-margin-collapse > .medium-11 {
    width: 45.83333%; }
  .medium-margin-collapse > .medium-12 {
    width: 50%; }
  .medium-margin-collapse > .medium-13 {
    width: 54.16667%; }
  .medium-margin-collapse > .medium-14 {
    width: 58.33333%; }
  .medium-margin-collapse > .medium-15 {
    width: 62.5%; }
  .medium-margin-collapse > .medium-16 {
    width: 66.66667%; }
  .medium-margin-collapse > .medium-17 {
    width: 70.83333%; }
  .medium-margin-collapse > .medium-18 {
    width: 75%; }
  .medium-margin-collapse > .medium-19 {
    width: 79.16667%; }
  .medium-margin-collapse > .medium-20 {
    width: 83.33333%; }
  .medium-margin-collapse > .medium-21 {
    width: 87.5%; }
  .medium-margin-collapse > .medium-22 {
    width: 91.66667%; }
  .medium-margin-collapse > .medium-23 {
    width: 95.83333%; }
  .medium-margin-collapse > .medium-24 {
    width: 100%; } }

@media print, screen and (min-width: 64em) {
  .medium-margin-collapse > .large-1 {
    width: 4.16667%; }
  .medium-margin-collapse > .large-2 {
    width: 8.33333%; }
  .medium-margin-collapse > .large-3 {
    width: 12.5%; }
  .medium-margin-collapse > .large-4 {
    width: 16.66667%; }
  .medium-margin-collapse > .large-5 {
    width: 20.83333%; }
  .medium-margin-collapse > .large-6 {
    width: 25%; }
  .medium-margin-collapse > .large-7 {
    width: 29.16667%; }
  .medium-margin-collapse > .large-8 {
    width: 33.33333%; }
  .medium-margin-collapse > .large-9 {
    width: 37.5%; }
  .medium-margin-collapse > .large-10 {
    width: 41.66667%; }
  .medium-margin-collapse > .large-11 {
    width: 45.83333%; }
  .medium-margin-collapse > .large-12 {
    width: 50%; }
  .medium-margin-collapse > .large-13 {
    width: 54.16667%; }
  .medium-margin-collapse > .large-14 {
    width: 58.33333%; }
  .medium-margin-collapse > .large-15 {
    width: 62.5%; }
  .medium-margin-collapse > .large-16 {
    width: 66.66667%; }
  .medium-margin-collapse > .large-17 {
    width: 70.83333%; }
  .medium-margin-collapse > .large-18 {
    width: 75%; }
  .medium-margin-collapse > .large-19 {
    width: 79.16667%; }
  .medium-margin-collapse > .large-20 {
    width: 83.33333%; }
  .medium-margin-collapse > .large-21 {
    width: 87.5%; }
  .medium-margin-collapse > .large-22 {
    width: 91.66667%; }
  .medium-margin-collapse > .large-23 {
    width: 95.83333%; }
  .medium-margin-collapse > .large-24 {
    width: 100%; } }

@media print, screen and (min-width: 40em) {
  .medium-padding-collapse {
    margin-right: 0;
    margin-left: 0; }
  .medium-padding-collapse > .cell {
    padding-right: 0;
    padding-left: 0; } }

@media print, screen and (min-width: 64em) {
  .large-margin-collapse {
    margin-right: 0;
    margin-left: 0; }
  .large-margin-collapse > .cell {
    margin-right: 0;
    margin-left: 0; } }

@media print, screen and (min-width: 64em) {
  .large-margin-collapse > .small-1 {
    width: 4.16667%; }
  .large-margin-collapse > .small-2 {
    width: 8.33333%; }
  .large-margin-collapse > .small-3 {
    width: 12.5%; }
  .large-margin-collapse > .small-4 {
    width: 16.66667%; }
  .large-margin-collapse > .small-5 {
    width: 20.83333%; }
  .large-margin-collapse > .small-6 {
    width: 25%; }
  .large-margin-collapse > .small-7 {
    width: 29.16667%; }
  .large-margin-collapse > .small-8 {
    width: 33.33333%; }
  .large-margin-collapse > .small-9 {
    width: 37.5%; }
  .large-margin-collapse > .small-10 {
    width: 41.66667%; }
  .large-margin-collapse > .small-11 {
    width: 45.83333%; }
  .large-margin-collapse > .small-12 {
    width: 50%; }
  .large-margin-collapse > .small-13 {
    width: 54.16667%; }
  .large-margin-collapse > .small-14 {
    width: 58.33333%; }
  .large-margin-collapse > .small-15 {
    width: 62.5%; }
  .large-margin-collapse > .small-16 {
    width: 66.66667%; }
  .large-margin-collapse > .small-17 {
    width: 70.83333%; }
  .large-margin-collapse > .small-18 {
    width: 75%; }
  .large-margin-collapse > .small-19 {
    width: 79.16667%; }
  .large-margin-collapse > .small-20 {
    width: 83.33333%; }
  .large-margin-collapse > .small-21 {
    width: 87.5%; }
  .large-margin-collapse > .small-22 {
    width: 91.66667%; }
  .large-margin-collapse > .small-23 {
    width: 95.83333%; }
  .large-margin-collapse > .small-24 {
    width: 100%; } }

@media print, screen and (min-width: 64em) {
  .large-margin-collapse > .medium-1 {
    width: 4.16667%; }
  .large-margin-collapse > .medium-2 {
    width: 8.33333%; }
  .large-margin-collapse > .medium-3 {
    width: 12.5%; }
  .large-margin-collapse > .medium-4 {
    width: 16.66667%; }
  .large-margin-collapse > .medium-5 {
    width: 20.83333%; }
  .large-margin-collapse > .medium-6 {
    width: 25%; }
  .large-margin-collapse > .medium-7 {
    width: 29.16667%; }
  .large-margin-collapse > .medium-8 {
    width: 33.33333%; }
  .large-margin-collapse > .medium-9 {
    width: 37.5%; }
  .large-margin-collapse > .medium-10 {
    width: 41.66667%; }
  .large-margin-collapse > .medium-11 {
    width: 45.83333%; }
  .large-margin-collapse > .medium-12 {
    width: 50%; }
  .large-margin-collapse > .medium-13 {
    width: 54.16667%; }
  .large-margin-collapse > .medium-14 {
    width: 58.33333%; }
  .large-margin-collapse > .medium-15 {
    width: 62.5%; }
  .large-margin-collapse > .medium-16 {
    width: 66.66667%; }
  .large-margin-collapse > .medium-17 {
    width: 70.83333%; }
  .large-margin-collapse > .medium-18 {
    width: 75%; }
  .large-margin-collapse > .medium-19 {
    width: 79.16667%; }
  .large-margin-collapse > .medium-20 {
    width: 83.33333%; }
  .large-margin-collapse > .medium-21 {
    width: 87.5%; }
  .large-margin-collapse > .medium-22 {
    width: 91.66667%; }
  .large-margin-collapse > .medium-23 {
    width: 95.83333%; }
  .large-margin-collapse > .medium-24 {
    width: 100%; } }

@media print, screen and (min-width: 64em) {
  .large-margin-collapse > .large-1 {
    width: 4.16667%; }
  .large-margin-collapse > .large-2 {
    width: 8.33333%; }
  .large-margin-collapse > .large-3 {
    width: 12.5%; }
  .large-margin-collapse > .large-4 {
    width: 16.66667%; }
  .large-margin-collapse > .large-5 {
    width: 20.83333%; }
  .large-margin-collapse > .large-6 {
    width: 25%; }
  .large-margin-collapse > .large-7 {
    width: 29.16667%; }
  .large-margin-collapse > .large-8 {
    width: 33.33333%; }
  .large-margin-collapse > .large-9 {
    width: 37.5%; }
  .large-margin-collapse > .large-10 {
    width: 41.66667%; }
  .large-margin-collapse > .large-11 {
    width: 45.83333%; }
  .large-margin-collapse > .large-12 {
    width: 50%; }
  .large-margin-collapse > .large-13 {
    width: 54.16667%; }
  .large-margin-collapse > .large-14 {
    width: 58.33333%; }
  .large-margin-collapse > .large-15 {
    width: 62.5%; }
  .large-margin-collapse > .large-16 {
    width: 66.66667%; }
  .large-margin-collapse > .large-17 {
    width: 70.83333%; }
  .large-margin-collapse > .large-18 {
    width: 75%; }
  .large-margin-collapse > .large-19 {
    width: 79.16667%; }
  .large-margin-collapse > .large-20 {
    width: 83.33333%; }
  .large-margin-collapse > .large-21 {
    width: 87.5%; }
  .large-margin-collapse > .large-22 {
    width: 91.66667%; }
  .large-margin-collapse > .large-23 {
    width: 95.83333%; }
  .large-margin-collapse > .large-24 {
    width: 100%; } }

@media print, screen and (min-width: 64em) {
  .large-padding-collapse {
    margin-right: 0;
    margin-left: 0; }
  .large-padding-collapse > .cell {
    padding-right: 0;
    padding-left: 0; } }

.small-offset-0 {
  margin-left: 0%; }

.grid-margin-x > .small-offset-0 {
  margin-left: calc(0% + 0.9375rem); }

.small-offset-1 {
  margin-left: 4.16667%; }

.grid-margin-x > .small-offset-1 {
  margin-left: calc(4.16667% + 0.9375rem); }

.small-offset-2 {
  margin-left: 8.33333%; }

.grid-margin-x > .small-offset-2 {
  margin-left: calc(8.33333% + 0.9375rem); }

.small-offset-3 {
  margin-left: 12.5%; }

.grid-margin-x > .small-offset-3 {
  margin-left: calc(12.5% + 0.9375rem); }

.small-offset-4 {
  margin-left: 16.66667%; }

.grid-margin-x > .small-offset-4 {
  margin-left: calc(16.66667% + 0.9375rem); }

.small-offset-5 {
  margin-left: 20.83333%; }

.grid-margin-x > .small-offset-5 {
  margin-left: calc(20.83333% + 0.9375rem); }

.small-offset-6 {
  margin-left: 25%; }

.grid-margin-x > .small-offset-6 {
  margin-left: calc(25% + 0.9375rem); }

.small-offset-7 {
  margin-left: 29.16667%; }

.grid-margin-x > .small-offset-7 {
  margin-left: calc(29.16667% + 0.9375rem); }

.small-offset-8 {
  margin-left: 33.33333%; }

.grid-margin-x > .small-offset-8 {
  margin-left: calc(33.33333% + 0.9375rem); }

.small-offset-9 {
  margin-left: 37.5%; }

.grid-margin-x > .small-offset-9 {
  margin-left: calc(37.5% + 0.9375rem); }

.small-offset-10 {
  margin-left: 41.66667%; }

.grid-margin-x > .small-offset-10 {
  margin-left: calc(41.66667% + 0.9375rem); }

.small-offset-11 {
  margin-left: 45.83333%; }

.grid-margin-x > .small-offset-11 {
  margin-left: calc(45.83333% + 0.9375rem); }

.small-offset-12 {
  margin-left: 50%; }

.grid-margin-x > .small-offset-12 {
  margin-left: calc(50% + 0.9375rem); }

.small-offset-13 {
  margin-left: 54.16667%; }

.grid-margin-x > .small-offset-13 {
  margin-left: calc(54.16667% + 0.9375rem); }

.small-offset-14 {
  margin-left: 58.33333%; }

.grid-margin-x > .small-offset-14 {
  margin-left: calc(58.33333% + 0.9375rem); }

.small-offset-15 {
  margin-left: 62.5%; }

.grid-margin-x > .small-offset-15 {
  margin-left: calc(62.5% + 0.9375rem); }

.small-offset-16 {
  margin-left: 66.66667%; }

.grid-margin-x > .small-offset-16 {
  margin-left: calc(66.66667% + 0.9375rem); }

.small-offset-17 {
  margin-left: 70.83333%; }

.grid-margin-x > .small-offset-17 {
  margin-left: calc(70.83333% + 0.9375rem); }

.small-offset-18 {
  margin-left: 75%; }

.grid-margin-x > .small-offset-18 {
  margin-left: calc(75% + 0.9375rem); }

.small-offset-19 {
  margin-left: 79.16667%; }

.grid-margin-x > .small-offset-19 {
  margin-left: calc(79.16667% + 0.9375rem); }

.small-offset-20 {
  margin-left: 83.33333%; }

.grid-margin-x > .small-offset-20 {
  margin-left: calc(83.33333% + 0.9375rem); }

.small-offset-21 {
  margin-left: 87.5%; }

.grid-margin-x > .small-offset-21 {
  margin-left: calc(87.5% + 0.9375rem); }

.small-offset-22 {
  margin-left: 91.66667%; }

.grid-margin-x > .small-offset-22 {
  margin-left: calc(91.66667% + 0.9375rem); }

.small-offset-23 {
  margin-left: 95.83333%; }

.grid-margin-x > .small-offset-23 {
  margin-left: calc(95.83333% + 0.9375rem); }

@media print, screen and (min-width: 40em) {
  .medium-offset-0 {
    margin-left: 0%; }
  .grid-margin-x > .medium-offset-0 {
    margin-left: calc(0% + 0.9375rem); }
  .medium-offset-1 {
    margin-left: 4.16667%; }
  .grid-margin-x > .medium-offset-1 {
    margin-left: calc(4.16667% + 0.9375rem); }
  .medium-offset-2 {
    margin-left: 8.33333%; }
  .grid-margin-x > .medium-offset-2 {
    margin-left: calc(8.33333% + 0.9375rem); }
  .medium-offset-3 {
    margin-left: 12.5%; }
  .grid-margin-x > .medium-offset-3 {
    margin-left: calc(12.5% + 0.9375rem); }
  .medium-offset-4 {
    margin-left: 16.66667%; }
  .grid-margin-x > .medium-offset-4 {
    margin-left: calc(16.66667% + 0.9375rem); }
  .medium-offset-5 {
    margin-left: 20.83333%; }
  .grid-margin-x > .medium-offset-5 {
    margin-left: calc(20.83333% + 0.9375rem); }
  .medium-offset-6 {
    margin-left: 25%; }
  .grid-margin-x > .medium-offset-6 {
    margin-left: calc(25% + 0.9375rem); }
  .medium-offset-7 {
    margin-left: 29.16667%; }
  .grid-margin-x > .medium-offset-7 {
    margin-left: calc(29.16667% + 0.9375rem); }
  .medium-offset-8 {
    margin-left: 33.33333%; }
  .grid-margin-x > .medium-offset-8 {
    margin-left: calc(33.33333% + 0.9375rem); }
  .medium-offset-9 {
    margin-left: 37.5%; }
  .grid-margin-x > .medium-offset-9 {
    margin-left: calc(37.5% + 0.9375rem); }
  .medium-offset-10 {
    margin-left: 41.66667%; }
  .grid-margin-x > .medium-offset-10 {
    margin-left: calc(41.66667% + 0.9375rem); }
  .medium-offset-11 {
    margin-left: 45.83333%; }
  .grid-margin-x > .medium-offset-11 {
    margin-left: calc(45.83333% + 0.9375rem); }
  .medium-offset-12 {
    margin-left: 50%; }
  .grid-margin-x > .medium-offset-12 {
    margin-left: calc(50% + 0.9375rem); }
  .medium-offset-13 {
    margin-left: 54.16667%; }
  .grid-margin-x > .medium-offset-13 {
    margin-left: calc(54.16667% + 0.9375rem); }
  .medium-offset-14 {
    margin-left: 58.33333%; }
  .grid-margin-x > .medium-offset-14 {
    margin-left: calc(58.33333% + 0.9375rem); }
  .medium-offset-15 {
    margin-left: 62.5%; }
  .grid-margin-x > .medium-offset-15 {
    margin-left: calc(62.5% + 0.9375rem); }
  .medium-offset-16 {
    margin-left: 66.66667%; }
  .grid-margin-x > .medium-offset-16 {
    margin-left: calc(66.66667% + 0.9375rem); }
  .medium-offset-17 {
    margin-left: 70.83333%; }
  .grid-margin-x > .medium-offset-17 {
    margin-left: calc(70.83333% + 0.9375rem); }
  .medium-offset-18 {
    margin-left: 75%; }
  .grid-margin-x > .medium-offset-18 {
    margin-left: calc(75% + 0.9375rem); }
  .medium-offset-19 {
    margin-left: 79.16667%; }
  .grid-margin-x > .medium-offset-19 {
    margin-left: calc(79.16667% + 0.9375rem); }
  .medium-offset-20 {
    margin-left: 83.33333%; }
  .grid-margin-x > .medium-offset-20 {
    margin-left: calc(83.33333% + 0.9375rem); }
  .medium-offset-21 {
    margin-left: 87.5%; }
  .grid-margin-x > .medium-offset-21 {
    margin-left: calc(87.5% + 0.9375rem); }
  .medium-offset-22 {
    margin-left: 91.66667%; }
  .grid-margin-x > .medium-offset-22 {
    margin-left: calc(91.66667% + 0.9375rem); }
  .medium-offset-23 {
    margin-left: 95.83333%; }
  .grid-margin-x > .medium-offset-23 {
    margin-left: calc(95.83333% + 0.9375rem); } }

@media print, screen and (min-width: 64em) {
  .large-offset-0 {
    margin-left: 0%; }
  .grid-margin-x > .large-offset-0 {
    margin-left: calc(0% + 0.9375rem); }
  .large-offset-1 {
    margin-left: 4.16667%; }
  .grid-margin-x > .large-offset-1 {
    margin-left: calc(4.16667% + 0.9375rem); }
  .large-offset-2 {
    margin-left: 8.33333%; }
  .grid-margin-x > .large-offset-2 {
    margin-left: calc(8.33333% + 0.9375rem); }
  .large-offset-3 {
    margin-left: 12.5%; }
  .grid-margin-x > .large-offset-3 {
    margin-left: calc(12.5% + 0.9375rem); }
  .large-offset-4 {
    margin-left: 16.66667%; }
  .grid-margin-x > .large-offset-4 {
    margin-left: calc(16.66667% + 0.9375rem); }
  .large-offset-5 {
    margin-left: 20.83333%; }
  .grid-margin-x > .large-offset-5 {
    margin-left: calc(20.83333% + 0.9375rem); }
  .large-offset-6 {
    margin-left: 25%; }
  .grid-margin-x > .large-offset-6 {
    margin-left: calc(25% + 0.9375rem); }
  .large-offset-7 {
    margin-left: 29.16667%; }
  .grid-margin-x > .large-offset-7 {
    margin-left: calc(29.16667% + 0.9375rem); }
  .large-offset-8 {
    margin-left: 33.33333%; }
  .grid-margin-x > .large-offset-8 {
    margin-left: calc(33.33333% + 0.9375rem); }
  .large-offset-9 {
    margin-left: 37.5%; }
  .grid-margin-x > .large-offset-9 {
    margin-left: calc(37.5% + 0.9375rem); }
  .large-offset-10 {
    margin-left: 41.66667%; }
  .grid-margin-x > .large-offset-10 {
    margin-left: calc(41.66667% + 0.9375rem); }
  .large-offset-11 {
    margin-left: 45.83333%; }
  .grid-margin-x > .large-offset-11 {
    margin-left: calc(45.83333% + 0.9375rem); }
  .large-offset-12 {
    margin-left: 50%; }
  .grid-margin-x > .large-offset-12 {
    margin-left: calc(50% + 0.9375rem); }
  .large-offset-13 {
    margin-left: 54.16667%; }
  .grid-margin-x > .large-offset-13 {
    margin-left: calc(54.16667% + 0.9375rem); }
  .large-offset-14 {
    margin-left: 58.33333%; }
  .grid-margin-x > .large-offset-14 {
    margin-left: calc(58.33333% + 0.9375rem); }
  .large-offset-15 {
    margin-left: 62.5%; }
  .grid-margin-x > .large-offset-15 {
    margin-left: calc(62.5% + 0.9375rem); }
  .large-offset-16 {
    margin-left: 66.66667%; }
  .grid-margin-x > .large-offset-16 {
    margin-left: calc(66.66667% + 0.9375rem); }
  .large-offset-17 {
    margin-left: 70.83333%; }
  .grid-margin-x > .large-offset-17 {
    margin-left: calc(70.83333% + 0.9375rem); }
  .large-offset-18 {
    margin-left: 75%; }
  .grid-margin-x > .large-offset-18 {
    margin-left: calc(75% + 0.9375rem); }
  .large-offset-19 {
    margin-left: 79.16667%; }
  .grid-margin-x > .large-offset-19 {
    margin-left: calc(79.16667% + 0.9375rem); }
  .large-offset-20 {
    margin-left: 83.33333%; }
  .grid-margin-x > .large-offset-20 {
    margin-left: calc(83.33333% + 0.9375rem); }
  .large-offset-21 {
    margin-left: 87.5%; }
  .grid-margin-x > .large-offset-21 {
    margin-left: calc(87.5% + 0.9375rem); }
  .large-offset-22 {
    margin-left: 91.66667%; }
  .grid-margin-x > .large-offset-22 {
    margin-left: calc(91.66667% + 0.9375rem); }
  .large-offset-23 {
    margin-left: 95.83333%; }
  .grid-margin-x > .large-offset-23 {
    margin-left: calc(95.83333% + 0.9375rem); } }

.grid-y {
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: column nowrap;
          flex-flow: column nowrap; }

.grid-y > .cell {
  width: auto; }

.grid-y > .auto {
  height: auto; }

.grid-y > .shrink {
  height: auto; }

.grid-y > .small-shrink, .grid-y > .small-full, .grid-y > .small-1, .grid-y > .small-2, .grid-y > .small-3, .grid-y > .small-4, .grid-y > .small-5, .grid-y > .small-6, .grid-y > .small-7, .grid-y > .small-8, .grid-y > .small-9, .grid-y > .small-10, .grid-y > .small-11, .grid-y > .small-12, .grid-y > .small-13, .grid-y > .small-14, .grid-y > .small-15, .grid-y > .small-16, .grid-y > .small-17, .grid-y > .small-18, .grid-y > .small-19, .grid-y > .small-20, .grid-y > .small-21, .grid-y > .small-22, .grid-y > .small-23, .grid-y > .small-24 {
  -webkit-flex-basis: auto;
          flex-basis: auto; }

@media print, screen and (min-width: 40em) {
  .grid-y > .medium-shrink, .grid-y > .medium-full, .grid-y > .medium-1, .grid-y > .medium-2, .grid-y > .medium-3, .grid-y > .medium-4, .grid-y > .medium-5, .grid-y > .medium-6, .grid-y > .medium-7, .grid-y > .medium-8, .grid-y > .medium-9, .grid-y > .medium-10, .grid-y > .medium-11, .grid-y > .medium-12, .grid-y > .medium-13, .grid-y > .medium-14, .grid-y > .medium-15, .grid-y > .medium-16, .grid-y > .medium-17, .grid-y > .medium-18, .grid-y > .medium-19, .grid-y > .medium-20, .grid-y > .medium-21, .grid-y > .medium-22, .grid-y > .medium-23, .grid-y > .medium-24 {
    -webkit-flex-basis: auto;
            flex-basis: auto; } }

@media print, screen and (min-width: 64em) {
  .grid-y > .large-shrink, .grid-y > .large-full, .grid-y > .large-1, .grid-y > .large-2, .grid-y > .large-3, .grid-y > .large-4, .grid-y > .large-5, .grid-y > .large-6, .grid-y > .large-7, .grid-y > .large-8, .grid-y > .large-9, .grid-y > .large-10, .grid-y > .large-11, .grid-y > .large-12, .grid-y > .large-13, .grid-y > .large-14, .grid-y > .large-15, .grid-y > .large-16, .grid-y > .large-17, .grid-y > .large-18, .grid-y > .large-19, .grid-y > .large-20, .grid-y > .large-21, .grid-y > .large-22, .grid-y > .large-23, .grid-y > .large-24 {
    -webkit-flex-basis: auto;
            flex-basis: auto; } }

.grid-y > .small-1 {
  height: 4.16667%; }

.grid-y > .small-2 {
  height: 8.33333%; }

.grid-y > .small-3 {
  height: 12.5%; }

.grid-y > .small-4 {
  height: 16.66667%; }

.grid-y > .small-5 {
  height: 20.83333%; }

.grid-y > .small-6 {
  height: 25%; }

.grid-y > .small-7 {
  height: 29.16667%; }

.grid-y > .small-8 {
  height: 33.33333%; }

.grid-y > .small-9 {
  height: 37.5%; }

.grid-y > .small-10 {
  height: 41.66667%; }

.grid-y > .small-11 {
  height: 45.83333%; }

.grid-y > .small-12 {
  height: 50%; }

.grid-y > .small-13 {
  height: 54.16667%; }

.grid-y > .small-14 {
  height: 58.33333%; }

.grid-y > .small-15 {
  height: 62.5%; }

.grid-y > .small-16 {
  height: 66.66667%; }

.grid-y > .small-17 {
  height: 70.83333%; }

.grid-y > .small-18 {
  height: 75%; }

.grid-y > .small-19 {
  height: 79.16667%; }

.grid-y > .small-20 {
  height: 83.33333%; }

.grid-y > .small-21 {
  height: 87.5%; }

.grid-y > .small-22 {
  height: 91.66667%; }

.grid-y > .small-23 {
  height: 95.83333%; }

.grid-y > .small-24 {
  height: 100%; }

@media print, screen and (min-width: 40em) {
  .grid-y > .medium-auto {
    -webkit-flex: 1 1;
            flex: 1 1;
    height: auto; }
  .grid-y > .medium-shrink {
    height: auto; }
  .grid-y > .medium-1 {
    height: 4.16667%; }
  .grid-y > .medium-2 {
    height: 8.33333%; }
  .grid-y > .medium-3 {
    height: 12.5%; }
  .grid-y > .medium-4 {
    height: 16.66667%; }
  .grid-y > .medium-5 {
    height: 20.83333%; }
  .grid-y > .medium-6 {
    height: 25%; }
  .grid-y > .medium-7 {
    height: 29.16667%; }
  .grid-y > .medium-8 {
    height: 33.33333%; }
  .grid-y > .medium-9 {
    height: 37.5%; }
  .grid-y > .medium-10 {
    height: 41.66667%; }
  .grid-y > .medium-11 {
    height: 45.83333%; }
  .grid-y > .medium-12 {
    height: 50%; }
  .grid-y > .medium-13 {
    height: 54.16667%; }
  .grid-y > .medium-14 {
    height: 58.33333%; }
  .grid-y > .medium-15 {
    height: 62.5%; }
  .grid-y > .medium-16 {
    height: 66.66667%; }
  .grid-y > .medium-17 {
    height: 70.83333%; }
  .grid-y > .medium-18 {
    height: 75%; }
  .grid-y > .medium-19 {
    height: 79.16667%; }
  .grid-y > .medium-20 {
    height: 83.33333%; }
  .grid-y > .medium-21 {
    height: 87.5%; }
  .grid-y > .medium-22 {
    height: 91.66667%; }
  .grid-y > .medium-23 {
    height: 95.83333%; }
  .grid-y > .medium-24 {
    height: 100%; } }

@media print, screen and (min-width: 64em) {
  .grid-y > .large-auto {
    -webkit-flex: 1 1;
            flex: 1 1;
    height: auto; }
  .grid-y > .large-shrink {
    height: auto; }
  .grid-y > .large-1 {
    height: 4.16667%; }
  .grid-y > .large-2 {
    height: 8.33333%; }
  .grid-y > .large-3 {
    height: 12.5%; }
  .grid-y > .large-4 {
    height: 16.66667%; }
  .grid-y > .large-5 {
    height: 20.83333%; }
  .grid-y > .large-6 {
    height: 25%; }
  .grid-y > .large-7 {
    height: 29.16667%; }
  .grid-y > .large-8 {
    height: 33.33333%; }
  .grid-y > .large-9 {
    height: 37.5%; }
  .grid-y > .large-10 {
    height: 41.66667%; }
  .grid-y > .large-11 {
    height: 45.83333%; }
  .grid-y > .large-12 {
    height: 50%; }
  .grid-y > .large-13 {
    height: 54.16667%; }
  .grid-y > .large-14 {
    height: 58.33333%; }
  .grid-y > .large-15 {
    height: 62.5%; }
  .grid-y > .large-16 {
    height: 66.66667%; }
  .grid-y > .large-17 {
    height: 70.83333%; }
  .grid-y > .large-18 {
    height: 75%; }
  .grid-y > .large-19 {
    height: 79.16667%; }
  .grid-y > .large-20 {
    height: 83.33333%; }
  .grid-y > .large-21 {
    height: 87.5%; }
  .grid-y > .large-22 {
    height: 91.66667%; }
  .grid-y > .large-23 {
    height: 95.83333%; }
  .grid-y > .large-24 {
    height: 100%; } }

.grid-padding-y .grid-padding-y {
  margin-top: -0.9375rem;
  margin-bottom: -0.9375rem; }

.grid-padding-y > .cell {
  padding-top: 0.9375rem;
  padding-bottom: 0.9375rem; }

.grid-margin-y {
  margin-top: -0.9375rem;
  margin-bottom: -0.9375rem; }

.grid-margin-y > .cell {
  height: calc(100% - 1.875rem);
  margin-top: 0.9375rem;
  margin-bottom: 0.9375rem; }

.grid-margin-y > .auto {
  height: auto; }

.grid-margin-y > .shrink {
  height: auto; }

.grid-margin-y > .small-1 {
  height: calc(4.16667% - 1.875rem); }

.grid-margin-y > .small-2 {
  height: calc(8.33333% - 1.875rem); }

.grid-margin-y > .small-3 {
  height: calc(12.5% - 1.875rem); }

.grid-margin-y > .small-4 {
  height: calc(16.66667% - 1.875rem); }

.grid-margin-y > .small-5 {
  height: calc(20.83333% - 1.875rem); }

.grid-margin-y > .small-6 {
  height: calc(25% - 1.875rem); }

.grid-margin-y > .small-7 {
  height: calc(29.16667% - 1.875rem); }

.grid-margin-y > .small-8 {
  height: calc(33.33333% - 1.875rem); }

.grid-margin-y > .small-9 {
  height: calc(37.5% - 1.875rem); }

.grid-margin-y > .small-10 {
  height: calc(41.66667% - 1.875rem); }

.grid-margin-y > .small-11 {
  height: calc(45.83333% - 1.875rem); }

.grid-margin-y > .small-12 {
  height: calc(50% - 1.875rem); }

.grid-margin-y > .small-13 {
  height: calc(54.16667% - 1.875rem); }

.grid-margin-y > .small-14 {
  height: calc(58.33333% - 1.875rem); }

.grid-margin-y > .small-15 {
  height: calc(62.5% - 1.875rem); }

.grid-margin-y > .small-16 {
  height: calc(66.66667% - 1.875rem); }

.grid-margin-y > .small-17 {
  height: calc(70.83333% - 1.875rem); }

.grid-margin-y > .small-18 {
  height: calc(75% - 1.875rem); }

.grid-margin-y > .small-19 {
  height: calc(79.16667% - 1.875rem); }

.grid-margin-y > .small-20 {
  height: calc(83.33333% - 1.875rem); }

.grid-margin-y > .small-21 {
  height: calc(87.5% - 1.875rem); }

.grid-margin-y > .small-22 {
  height: calc(91.66667% - 1.875rem); }

.grid-margin-y > .small-23 {
  height: calc(95.83333% - 1.875rem); }

.grid-margin-y > .small-24 {
  height: calc(100% - 1.875rem); }

@media print, screen and (min-width: 40em) {
  .grid-margin-y > .medium-auto {
    height: auto; }
  .grid-margin-y > .medium-shrink {
    height: auto; }
  .grid-margin-y > .medium-1 {
    height: calc(4.16667% - 1.875rem); }
  .grid-margin-y > .medium-2 {
    height: calc(8.33333% - 1.875rem); }
  .grid-margin-y > .medium-3 {
    height: calc(12.5% - 1.875rem); }
  .grid-margin-y > .medium-4 {
    height: calc(16.66667% - 1.875rem); }
  .grid-margin-y > .medium-5 {
    height: calc(20.83333% - 1.875rem); }
  .grid-margin-y > .medium-6 {
    height: calc(25% - 1.875rem); }
  .grid-margin-y > .medium-7 {
    height: calc(29.16667% - 1.875rem); }
  .grid-margin-y > .medium-8 {
    height: calc(33.33333% - 1.875rem); }
  .grid-margin-y > .medium-9 {
    height: calc(37.5% - 1.875rem); }
  .grid-margin-y > .medium-10 {
    height: calc(41.66667% - 1.875rem); }
  .grid-margin-y > .medium-11 {
    height: calc(45.83333% - 1.875rem); }
  .grid-margin-y > .medium-12 {
    height: calc(50% - 1.875rem); }
  .grid-margin-y > .medium-13 {
    height: calc(54.16667% - 1.875rem); }
  .grid-margin-y > .medium-14 {
    height: calc(58.33333% - 1.875rem); }
  .grid-margin-y > .medium-15 {
    height: calc(62.5% - 1.875rem); }
  .grid-margin-y > .medium-16 {
    height: calc(66.66667% - 1.875rem); }
  .grid-margin-y > .medium-17 {
    height: calc(70.83333% - 1.875rem); }
  .grid-margin-y > .medium-18 {
    height: calc(75% - 1.875rem); }
  .grid-margin-y > .medium-19 {
    height: calc(79.16667% - 1.875rem); }
  .grid-margin-y > .medium-20 {
    height: calc(83.33333% - 1.875rem); }
  .grid-margin-y > .medium-21 {
    height: calc(87.5% - 1.875rem); }
  .grid-margin-y > .medium-22 {
    height: calc(91.66667% - 1.875rem); }
  .grid-margin-y > .medium-23 {
    height: calc(95.83333% - 1.875rem); }
  .grid-margin-y > .medium-24 {
    height: calc(100% - 1.875rem); } }

@media print, screen and (min-width: 64em) {
  .grid-margin-y > .large-auto {
    height: auto; }
  .grid-margin-y > .large-shrink {
    height: auto; }
  .grid-margin-y > .large-1 {
    height: calc(4.16667% - 1.875rem); }
  .grid-margin-y > .large-2 {
    height: calc(8.33333% - 1.875rem); }
  .grid-margin-y > .large-3 {
    height: calc(12.5% - 1.875rem); }
  .grid-margin-y > .large-4 {
    height: calc(16.66667% - 1.875rem); }
  .grid-margin-y > .large-5 {
    height: calc(20.83333% - 1.875rem); }
  .grid-margin-y > .large-6 {
    height: calc(25% - 1.875rem); }
  .grid-margin-y > .large-7 {
    height: calc(29.16667% - 1.875rem); }
  .grid-margin-y > .large-8 {
    height: calc(33.33333% - 1.875rem); }
  .grid-margin-y > .large-9 {
    height: calc(37.5% - 1.875rem); }
  .grid-margin-y > .large-10 {
    height: calc(41.66667% - 1.875rem); }
  .grid-margin-y > .large-11 {
    height: calc(45.83333% - 1.875rem); }
  .grid-margin-y > .large-12 {
    height: calc(50% - 1.875rem); }
  .grid-margin-y > .large-13 {
    height: calc(54.16667% - 1.875rem); }
  .grid-margin-y > .large-14 {
    height: calc(58.33333% - 1.875rem); }
  .grid-margin-y > .large-15 {
    height: calc(62.5% - 1.875rem); }
  .grid-margin-y > .large-16 {
    height: calc(66.66667% - 1.875rem); }
  .grid-margin-y > .large-17 {
    height: calc(70.83333% - 1.875rem); }
  .grid-margin-y > .large-18 {
    height: calc(75% - 1.875rem); }
  .grid-margin-y > .large-19 {
    height: calc(79.16667% - 1.875rem); }
  .grid-margin-y > .large-20 {
    height: calc(83.33333% - 1.875rem); }
  .grid-margin-y > .large-21 {
    height: calc(87.5% - 1.875rem); }
  .grid-margin-y > .large-22 {
    height: calc(91.66667% - 1.875rem); }
  .grid-margin-y > .large-23 {
    height: calc(95.83333% - 1.875rem); }
  .grid-margin-y > .large-24 {
    height: calc(100% - 1.875rem); } }

.grid-frame {
  overflow: hidden;
  position: relative;
  -webkit-flex-wrap: nowrap;
          flex-wrap: nowrap;
  -webkit-align-items: stretch;
          align-items: stretch;
  width: 100vw; }

.cell .grid-frame {
  width: 100%; }

.cell-block {
  overflow-x: auto;
  max-width: 100%;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-stype: -ms-autohiding-scrollbar; }

.cell-block-y {
  overflow-y: auto;
  max-height: 100%;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-stype: -ms-autohiding-scrollbar; }

.cell-block-container {
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: column;
          flex-direction: column;
  max-height: 100%; }

.cell-block-container > .grid-x {
  max-height: 100%;
  -webkit-flex-wrap: nowrap;
          flex-wrap: nowrap; }

@media print, screen and (min-width: 40em) {
  .medium-grid-frame {
    overflow: hidden;
    position: relative;
    -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
    -webkit-align-items: stretch;
            align-items: stretch;
    width: 100vw; }
  .cell .medium-grid-frame {
    width: 100%; }
  .medium-cell-block {
    overflow-x: auto;
    max-width: 100%;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-stype: -ms-autohiding-scrollbar; }
  .medium-cell-block-container {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
            flex-direction: column;
    max-height: 100%; }
  .medium-cell-block-container > .grid-x {
    max-height: 100%;
    -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap; }
  .medium-cell-block-y {
    overflow-y: auto;
    max-height: 100%;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-stype: -ms-autohiding-scrollbar; } }

@media print, screen and (min-width: 64em) {
  .large-grid-frame {
    overflow: hidden;
    position: relative;
    -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
    -webkit-align-items: stretch;
            align-items: stretch;
    width: 100vw; }
  .cell .large-grid-frame {
    width: 100%; }
  .large-cell-block {
    overflow-x: auto;
    max-width: 100%;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-stype: -ms-autohiding-scrollbar; }
  .large-cell-block-container {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
            flex-direction: column;
    max-height: 100%; }
  .large-cell-block-container > .grid-x {
    max-height: 100%;
    -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap; }
  .large-cell-block-y {
    overflow-y: auto;
    max-height: 100%;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-stype: -ms-autohiding-scrollbar; } }

.grid-y.grid-frame {
  width: auto;
  overflow: hidden;
  position: relative;
  -webkit-flex-wrap: nowrap;
          flex-wrap: nowrap;
  -webkit-align-items: stretch;
          align-items: stretch;
  height: 100vh; }

@media print, screen and (min-width: 40em) {
  .grid-y.medium-grid-frame {
    width: auto;
    overflow: hidden;
    position: relative;
    -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
    -webkit-align-items: stretch;
            align-items: stretch;
    height: 100vh; } }

@media print, screen and (min-width: 64em) {
  .grid-y.large-grid-frame {
    width: auto;
    overflow: hidden;
    position: relative;
    -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
    -webkit-align-items: stretch;
            align-items: stretch;
    height: 100vh; } }

.cell .grid-y.grid-frame {
  height: 100%; }

@media print, screen and (min-width: 40em) {
  .cell .grid-y.medium-grid-frame {
    height: 100%; } }

@media print, screen and (min-width: 64em) {
  .cell .grid-y.large-grid-frame {
    height: 100%; } }

.grid-margin-y {
  margin-top: -0.9375rem;
  margin-bottom: -0.9375rem; }

.grid-margin-y > .cell {
  height: calc(100% - 1.875rem);
  margin-top: 0.9375rem;
  margin-bottom: 0.9375rem; }

.grid-margin-y > .auto {
  height: auto; }

.grid-margin-y > .shrink {
  height: auto; }

.grid-margin-y > .small-1 {
  height: calc(4.16667% - 1.875rem); }

.grid-margin-y > .small-2 {
  height: calc(8.33333% - 1.875rem); }

.grid-margin-y > .small-3 {
  height: calc(12.5% - 1.875rem); }

.grid-margin-y > .small-4 {
  height: calc(16.66667% - 1.875rem); }

.grid-margin-y > .small-5 {
  height: calc(20.83333% - 1.875rem); }

.grid-margin-y > .small-6 {
  height: calc(25% - 1.875rem); }

.grid-margin-y > .small-7 {
  height: calc(29.16667% - 1.875rem); }

.grid-margin-y > .small-8 {
  height: calc(33.33333% - 1.875rem); }

.grid-margin-y > .small-9 {
  height: calc(37.5% - 1.875rem); }

.grid-margin-y > .small-10 {
  height: calc(41.66667% - 1.875rem); }

.grid-margin-y > .small-11 {
  height: calc(45.83333% - 1.875rem); }

.grid-margin-y > .small-12 {
  height: calc(50% - 1.875rem); }

.grid-margin-y > .small-13 {
  height: calc(54.16667% - 1.875rem); }

.grid-margin-y > .small-14 {
  height: calc(58.33333% - 1.875rem); }

.grid-margin-y > .small-15 {
  height: calc(62.5% - 1.875rem); }

.grid-margin-y > .small-16 {
  height: calc(66.66667% - 1.875rem); }

.grid-margin-y > .small-17 {
  height: calc(70.83333% - 1.875rem); }

.grid-margin-y > .small-18 {
  height: calc(75% - 1.875rem); }

.grid-margin-y > .small-19 {
  height: calc(79.16667% - 1.875rem); }

.grid-margin-y > .small-20 {
  height: calc(83.33333% - 1.875rem); }

.grid-margin-y > .small-21 {
  height: calc(87.5% - 1.875rem); }

.grid-margin-y > .small-22 {
  height: calc(91.66667% - 1.875rem); }

.grid-margin-y > .small-23 {
  height: calc(95.83333% - 1.875rem); }

.grid-margin-y > .small-24 {
  height: calc(100% - 1.875rem); }

@media print, screen and (min-width: 40em) {
  .grid-margin-y > .medium-auto {
    height: auto; }
  .grid-margin-y > .medium-shrink {
    height: auto; }
  .grid-margin-y > .medium-1 {
    height: calc(4.16667% - 1.875rem); }
  .grid-margin-y > .medium-2 {
    height: calc(8.33333% - 1.875rem); }
  .grid-margin-y > .medium-3 {
    height: calc(12.5% - 1.875rem); }
  .grid-margin-y > .medium-4 {
    height: calc(16.66667% - 1.875rem); }
  .grid-margin-y > .medium-5 {
    height: calc(20.83333% - 1.875rem); }
  .grid-margin-y > .medium-6 {
    height: calc(25% - 1.875rem); }
  .grid-margin-y > .medium-7 {
    height: calc(29.16667% - 1.875rem); }
  .grid-margin-y > .medium-8 {
    height: calc(33.33333% - 1.875rem); }
  .grid-margin-y > .medium-9 {
    height: calc(37.5% - 1.875rem); }
  .grid-margin-y > .medium-10 {
    height: calc(41.66667% - 1.875rem); }
  .grid-margin-y > .medium-11 {
    height: calc(45.83333% - 1.875rem); }
  .grid-margin-y > .medium-12 {
    height: calc(50% - 1.875rem); }
  .grid-margin-y > .medium-13 {
    height: calc(54.16667% - 1.875rem); }
  .grid-margin-y > .medium-14 {
    height: calc(58.33333% - 1.875rem); }
  .grid-margin-y > .medium-15 {
    height: calc(62.5% - 1.875rem); }
  .grid-margin-y > .medium-16 {
    height: calc(66.66667% - 1.875rem); }
  .grid-margin-y > .medium-17 {
    height: calc(70.83333% - 1.875rem); }
  .grid-margin-y > .medium-18 {
    height: calc(75% - 1.875rem); }
  .grid-margin-y > .medium-19 {
    height: calc(79.16667% - 1.875rem); }
  .grid-margin-y > .medium-20 {
    height: calc(83.33333% - 1.875rem); }
  .grid-margin-y > .medium-21 {
    height: calc(87.5% - 1.875rem); }
  .grid-margin-y > .medium-22 {
    height: calc(91.66667% - 1.875rem); }
  .grid-margin-y > .medium-23 {
    height: calc(95.83333% - 1.875rem); }
  .grid-margin-y > .medium-24 {
    height: calc(100% - 1.875rem); } }

@media print, screen and (min-width: 64em) {
  .grid-margin-y > .large-auto {
    height: auto; }
  .grid-margin-y > .large-shrink {
    height: auto; }
  .grid-margin-y > .large-1 {
    height: calc(4.16667% - 1.875rem); }
  .grid-margin-y > .large-2 {
    height: calc(8.33333% - 1.875rem); }
  .grid-margin-y > .large-3 {
    height: calc(12.5% - 1.875rem); }
  .grid-margin-y > .large-4 {
    height: calc(16.66667% - 1.875rem); }
  .grid-margin-y > .large-5 {
    height: calc(20.83333% - 1.875rem); }
  .grid-margin-y > .large-6 {
    height: calc(25% - 1.875rem); }
  .grid-margin-y > .large-7 {
    height: calc(29.16667% - 1.875rem); }
  .grid-margin-y > .large-8 {
    height: calc(33.33333% - 1.875rem); }
  .grid-margin-y > .large-9 {
    height: calc(37.5% - 1.875rem); }
  .grid-margin-y > .large-10 {
    height: calc(41.66667% - 1.875rem); }
  .grid-margin-y > .large-11 {
    height: calc(45.83333% - 1.875rem); }
  .grid-margin-y > .large-12 {
    height: calc(50% - 1.875rem); }
  .grid-margin-y > .large-13 {
    height: calc(54.16667% - 1.875rem); }
  .grid-margin-y > .large-14 {
    height: calc(58.33333% - 1.875rem); }
  .grid-margin-y > .large-15 {
    height: calc(62.5% - 1.875rem); }
  .grid-margin-y > .large-16 {
    height: calc(66.66667% - 1.875rem); }
  .grid-margin-y > .large-17 {
    height: calc(70.83333% - 1.875rem); }
  .grid-margin-y > .large-18 {
    height: calc(75% - 1.875rem); }
  .grid-margin-y > .large-19 {
    height: calc(79.16667% - 1.875rem); }
  .grid-margin-y > .large-20 {
    height: calc(83.33333% - 1.875rem); }
  .grid-margin-y > .large-21 {
    height: calc(87.5% - 1.875rem); }
  .grid-margin-y > .large-22 {
    height: calc(91.66667% - 1.875rem); }
  .grid-margin-y > .large-23 {
    height: calc(95.83333% - 1.875rem); }
  .grid-margin-y > .large-24 {
    height: calc(100% - 1.875rem); } }

.grid-frame.grid-margin-y {
  height: calc(100vh + 1.875rem); }

@media print, screen and (min-width: 40em) {
  .grid-margin-y.medium-grid-frame {
    height: calc(100vh + 1.875rem); } }

@media print, screen and (min-width: 64em) {
  .grid-margin-y.large-grid-frame {
    height: calc(100vh + 1.875rem); } }

.align-right {
  -webkit-justify-content: flex-end;
          justify-content: flex-end; }

.align-center {
  -webkit-justify-content: center;
          justify-content: center; }

.align-justify {
  -webkit-justify-content: space-between;
          justify-content: space-between; }

.align-spaced {
  -webkit-justify-content: space-around;
          justify-content: space-around; }

.align-right.vertical.menu > li > a {
  -webkit-justify-content: flex-end;
          justify-content: flex-end; }

.align-center.vertical.menu > li > a {
  -webkit-justify-content: center;
          justify-content: center; }

.align-top {
  -webkit-align-items: flex-start;
          align-items: flex-start; }

.align-self-top {
  -webkit-align-self: flex-start;
          align-self: flex-start; }

.align-bottom {
  -webkit-align-items: flex-end;
          align-items: flex-end; }

.align-self-bottom {
  -webkit-align-self: flex-end;
          align-self: flex-end; }

.align-middle {
  -webkit-align-items: center;
          align-items: center; }

.align-self-middle {
  -webkit-align-self: center;
          align-self: center; }

.align-stretch {
  -webkit-align-items: stretch;
          align-items: stretch; }

.align-self-stretch {
  -webkit-align-self: stretch;
          align-self: stretch; }

.align-center-middle {
  -webkit-justify-content: center;
          justify-content: center;
  -webkit-align-items: center;
          align-items: center;
  -webkit-align-content: center;
          align-content: center; }

.small-order-1 {
  -webkit-order: 1;
          order: 1; }

.small-order-2 {
  -webkit-order: 2;
          order: 2; }

.small-order-3 {
  -webkit-order: 3;
          order: 3; }

.small-order-4 {
  -webkit-order: 4;
          order: 4; }

.small-order-5 {
  -webkit-order: 5;
          order: 5; }

.small-order-6 {
  -webkit-order: 6;
          order: 6; }

@media print, screen and (min-width: 40em) {
  .medium-order-1 {
    -webkit-order: 1;
            order: 1; }
  .medium-order-2 {
    -webkit-order: 2;
            order: 2; }
  .medium-order-3 {
    -webkit-order: 3;
            order: 3; }
  .medium-order-4 {
    -webkit-order: 4;
            order: 4; }
  .medium-order-5 {
    -webkit-order: 5;
            order: 5; }
  .medium-order-6 {
    -webkit-order: 6;
            order: 6; } }

@media print, screen and (min-width: 64em) {
  .large-order-1 {
    -webkit-order: 1;
            order: 1; }
  .large-order-2 {
    -webkit-order: 2;
            order: 2; }
  .large-order-3 {
    -webkit-order: 3;
            order: 3; }
  .large-order-4 {
    -webkit-order: 4;
            order: 4; }
  .large-order-5 {
    -webkit-order: 5;
            order: 5; }
  .large-order-6 {
    -webkit-order: 6;
            order: 6; } }

.flex-container {
  display: -webkit-flex;
  display: flex; }

.flex-child-auto {
  -webkit-flex: 1 1 auto;
          flex: 1 1 auto; }

.flex-child-grow {
  -webkit-flex: 1 0 auto;
          flex: 1 0 auto; }

.flex-child-shrink {
  -webkit-flex: 0 1 auto;
          flex: 0 1 auto; }

.flex-dir-row {
  -webkit-flex-direction: row;
          flex-direction: row; }

.flex-dir-row-reverse {
  -webkit-flex-direction: row-reverse;
          flex-direction: row-reverse; }

.flex-dir-column {
  -webkit-flex-direction: column;
          flex-direction: column; }

.flex-dir-column-reverse {
  -webkit-flex-direction: column-reverse;
          flex-direction: column-reverse; }

@media print, screen and (min-width: 40em) {
  .medium-flex-container {
    display: -webkit-flex;
    display: flex; }
  .medium-flex-child-auto {
    -webkit-flex: 1 1 auto;
            flex: 1 1 auto; }
  .medium-flex-child-grow {
    -webkit-flex: 1 0 auto;
            flex: 1 0 auto; }
  .medium-flex-child-shrink {
    -webkit-flex: 0 1 auto;
            flex: 0 1 auto; }
  .medium-flex-dir-row {
    -webkit-flex-direction: row;
            flex-direction: row; }
  .medium-flex-dir-row-reverse {
    -webkit-flex-direction: row-reverse;
            flex-direction: row-reverse; }
  .medium-flex-dir-column {
    -webkit-flex-direction: column;
            flex-direction: column; }
  .medium-flex-dir-column-reverse {
    -webkit-flex-direction: column-reverse;
            flex-direction: column-reverse; } }

@media print, screen and (min-width: 64em) {
  .large-flex-container {
    display: -webkit-flex;
    display: flex; }
  .large-flex-child-auto {
    -webkit-flex: 1 1 auto;
            flex: 1 1 auto; }
  .large-flex-child-grow {
    -webkit-flex: 1 0 auto;
            flex: 1 0 auto; }
  .large-flex-child-shrink {
    -webkit-flex: 0 1 auto;
            flex: 0 1 auto; }
  .large-flex-dir-row {
    -webkit-flex-direction: row;
            flex-direction: row; }
  .large-flex-dir-row-reverse {
    -webkit-flex-direction: row-reverse;
            flex-direction: row-reverse; }
  .large-flex-dir-column {
    -webkit-flex-direction: column;
            flex-direction: column; }
  .large-flex-dir-column-reverse {
    -webkit-flex-direction: column-reverse;
            flex-direction: column-reverse; } }

.slide-in-down.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: translateY(-100%);
          transform: translateY(-100%);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden; }

.slide-in-down.mui-enter.mui-enter-active {
  -webkit-transform: translateY(0);
          transform: translateY(0); }

.slide-in-left.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden; }

.slide-in-left.mui-enter.mui-enter-active {
  -webkit-transform: translateX(0);
          transform: translateX(0); }

.slide-in-up.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: translateY(100%);
          transform: translateY(100%);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden; }

.slide-in-up.mui-enter.mui-enter-active {
  -webkit-transform: translateY(0);
          transform: translateY(0); }

.slide-in-right.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden; }

.slide-in-right.mui-enter.mui-enter-active {
  -webkit-transform: translateX(0);
          transform: translateX(0); }

.slide-out-down.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: translateY(0);
          transform: translateY(0);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden; }

.slide-out-down.mui-leave.mui-leave-active {
  -webkit-transform: translateY(100%);
          transform: translateY(100%); }

.slide-out-right.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: translateX(0);
          transform: translateX(0);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden; }

.slide-out-right.mui-leave.mui-leave-active {
  -webkit-transform: translateX(100%);
          transform: translateX(100%); }

.slide-out-up.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: translateY(0);
          transform: translateY(0);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden; }

.slide-out-up.mui-leave.mui-leave-active {
  -webkit-transform: translateY(-100%);
          transform: translateY(-100%); }

.slide-out-left.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: translateX(0);
          transform: translateX(0);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden; }

.slide-out-left.mui-leave.mui-leave-active {
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%); }

.fade-in.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  opacity: 0;
  transition-property: opacity; }

.fade-in.mui-enter.mui-enter-active {
  opacity: 1; }

.fade-out.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  opacity: 1;
  transition-property: opacity; }

.fade-out.mui-leave.mui-leave-active {
  opacity: 0; }

.hinge-in-from-top.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotateX(-90deg);
          transform: perspective(2000px) rotateX(-90deg);
  -webkit-transform-origin: top;
          transform-origin: top;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.hinge-in-from-top.mui-enter.mui-enter-active {
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  opacity: 1; }

.hinge-in-from-right.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotateY(-90deg);
          transform: perspective(2000px) rotateY(-90deg);
  -webkit-transform-origin: right;
          transform-origin: right;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.hinge-in-from-right.mui-enter.mui-enter-active {
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  opacity: 1; }

.hinge-in-from-bottom.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotateX(90deg);
          transform: perspective(2000px) rotateX(90deg);
  -webkit-transform-origin: bottom;
          transform-origin: bottom;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.hinge-in-from-bottom.mui-enter.mui-enter-active {
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  opacity: 1; }

.hinge-in-from-left.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotateY(90deg);
          transform: perspective(2000px) rotateY(90deg);
  -webkit-transform-origin: left;
          transform-origin: left;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.hinge-in-from-left.mui-enter.mui-enter-active {
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  opacity: 1; }

.hinge-in-from-middle-x.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotateX(-90deg);
          transform: perspective(2000px) rotateX(-90deg);
  -webkit-transform-origin: center;
          transform-origin: center;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.hinge-in-from-middle-x.mui-enter.mui-enter-active {
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  opacity: 1; }

.hinge-in-from-middle-y.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotateY(-90deg);
          transform: perspective(2000px) rotateY(-90deg);
  -webkit-transform-origin: center;
          transform-origin: center;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.hinge-in-from-middle-y.mui-enter.mui-enter-active {
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  opacity: 1; }

.hinge-out-from-top.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  -webkit-transform-origin: top;
          transform-origin: top;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.hinge-out-from-top.mui-leave.mui-leave-active {
  -webkit-transform: perspective(2000px) rotateX(-90deg);
          transform: perspective(2000px) rotateX(-90deg);
  opacity: 0; }

.hinge-out-from-right.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  -webkit-transform-origin: right;
          transform-origin: right;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.hinge-out-from-right.mui-leave.mui-leave-active {
  -webkit-transform: perspective(2000px) rotateY(-90deg);
          transform: perspective(2000px) rotateY(-90deg);
  opacity: 0; }

.hinge-out-from-bottom.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  -webkit-transform-origin: bottom;
          transform-origin: bottom;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.hinge-out-from-bottom.mui-leave.mui-leave-active {
  -webkit-transform: perspective(2000px) rotateX(90deg);
          transform: perspective(2000px) rotateX(90deg);
  opacity: 0; }

.hinge-out-from-left.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  -webkit-transform-origin: left;
          transform-origin: left;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.hinge-out-from-left.mui-leave.mui-leave-active {
  -webkit-transform: perspective(2000px) rotateY(90deg);
          transform: perspective(2000px) rotateY(90deg);
  opacity: 0; }

.hinge-out-from-middle-x.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  -webkit-transform-origin: center;
          transform-origin: center;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.hinge-out-from-middle-x.mui-leave.mui-leave-active {
  -webkit-transform: perspective(2000px) rotateX(-90deg);
          transform: perspective(2000px) rotateX(-90deg);
  opacity: 0; }

.hinge-out-from-middle-y.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: perspective(2000px) rotate(0deg);
          transform: perspective(2000px) rotate(0deg);
  -webkit-transform-origin: center;
          transform-origin: center;
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.hinge-out-from-middle-y.mui-leave.mui-leave-active {
  -webkit-transform: perspective(2000px) rotateY(-90deg);
          transform: perspective(2000px) rotateY(-90deg);
  opacity: 0; }

.scale-in-up.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: scale(0.5);
          transform: scale(0.5);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.scale-in-up.mui-enter.mui-enter-active {
  -webkit-transform: scale(1);
          transform: scale(1);
  opacity: 1; }

.scale-in-down.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: scale(1.5);
          transform: scale(1.5);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.scale-in-down.mui-enter.mui-enter-active {
  -webkit-transform: scale(1);
          transform: scale(1);
  opacity: 1; }

.scale-out-up.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: scale(1);
          transform: scale(1);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.scale-out-up.mui-leave.mui-leave-active {
  -webkit-transform: scale(1.5);
          transform: scale(1.5);
  opacity: 0; }

.scale-out-down.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: scale(1);
          transform: scale(1);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.scale-out-down.mui-leave.mui-leave-active {
  -webkit-transform: scale(0.5);
          transform: scale(0.5);
  opacity: 0; }

.spin-in.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: rotate(-0.75turn);
          transform: rotate(-0.75turn);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.spin-in.mui-enter.mui-enter-active {
  -webkit-transform: rotate(0);
          transform: rotate(0);
  opacity: 1; }

.spin-out.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: rotate(0);
          transform: rotate(0);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.spin-out.mui-leave.mui-leave-active {
  -webkit-transform: rotate(0.75turn);
          transform: rotate(0.75turn);
  opacity: 0; }

.spin-in-ccw.mui-enter {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: rotate(0.75turn);
          transform: rotate(0.75turn);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 0; }

.spin-in-ccw.mui-enter.mui-enter-active {
  -webkit-transform: rotate(0);
          transform: rotate(0);
  opacity: 1; }

.spin-out-ccw.mui-leave {
  transition-duration: 500ms;
  transition-timing-function: linear;
  -webkit-transform: rotate(0);
          transform: rotate(0);
  transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
  opacity: 1; }

.spin-out-ccw.mui-leave.mui-leave-active {
  -webkit-transform: rotate(-0.75turn);
          transform: rotate(-0.75turn);
  opacity: 0; }

.slow {
  transition-duration: 750ms !important; }

.fast {
  transition-duration: 250ms !important; }

.linear {
  transition-timing-function: linear !important; }

.ease {
  transition-timing-function: ease !important; }

.ease-in {
  transition-timing-function: ease-in !important; }

.ease-out {
  transition-timing-function: ease-out !important; }

.ease-in-out {
  transition-timing-function: ease-in-out !important; }

.bounce-in {
  transition-timing-function: cubic-bezier(0.485, 0.155, 0.24, 1.245) !important; }

.bounce-out {
  transition-timing-function: cubic-bezier(0.485, 0.155, 0.515, 0.845) !important; }

.bounce-in-out {
  transition-timing-function: cubic-bezier(0.76, -0.245, 0.24, 1.245) !important; }

.short-delay {
  transition-delay: 300ms !important; }

.long-delay {
  transition-delay: 700ms !important; }

.shake {
  -webkit-animation-name: shake-7;
          animation-name: shake-7; }

@-webkit-keyframes shake-7 {
  0%, 10%, 20%, 30%, 40%, 50%, 60%, 70%, 80%, 90% {
    -webkit-transform: translateX(7%);
            transform: translateX(7%); }
  5%, 15%, 25%, 35%, 45%, 55%, 65%, 75%, 85%, 95% {
    -webkit-transform: translateX(-7%);
            transform: translateX(-7%); } }

@keyframes shake-7 {
  0%, 10%, 20%, 30%, 40%, 50%, 60%, 70%, 80%, 90% {
    -webkit-transform: translateX(7%);
            transform: translateX(7%); }
  5%, 15%, 25%, 35%, 45%, 55%, 65%, 75%, 85%, 95% {
    -webkit-transform: translateX(-7%);
            transform: translateX(-7%); } }

.spin-cw {
  -webkit-animation-name: spin-cw-1turn;
          animation-name: spin-cw-1turn; }

@-webkit-keyframes spin-cw-1turn {
  0% {
    -webkit-transform: rotate(-1turn);
            transform: rotate(-1turn); }
  100% {
    -webkit-transform: rotate(0);
            transform: rotate(0); } }

@keyframes spin-cw-1turn {
  0% {
    -webkit-transform: rotate(-1turn);
            transform: rotate(-1turn); }
  100% {
    -webkit-transform: rotate(0);
            transform: rotate(0); } }

.spin-ccw {
  -webkit-animation-name: spin-cw-1turn;
          animation-name: spin-cw-1turn; }

@keyframes spin-cw-1turn {
  0% {
    -webkit-transform: rotate(0);
            transform: rotate(0); }
  100% {
    -webkit-transform: rotate(1turn);
            transform: rotate(1turn); } }

.wiggle {
  -webkit-animation-name: wiggle-7deg;
          animation-name: wiggle-7deg; }

@-webkit-keyframes wiggle-7deg {
  40%, 50%, 60% {
    -webkit-transform: rotate(7deg);
            transform: rotate(7deg); }
  35%, 45%, 55%, 65% {
    -webkit-transform: rotate(-7deg);
            transform: rotate(-7deg); }
  0%, 30%, 70%, 100% {
    -webkit-transform: rotate(0);
            transform: rotate(0); } }

@keyframes wiggle-7deg {
  40%, 50%, 60% {
    -webkit-transform: rotate(7deg);
            transform: rotate(7deg); }
  35%, 45%, 55%, 65% {
    -webkit-transform: rotate(-7deg);
            transform: rotate(-7deg); }
  0%, 30%, 70%, 100% {
    -webkit-transform: rotate(0);
            transform: rotate(0); } }

.shake,
.spin-cw,
.spin-ccw,
.wiggle {
  -webkit-animation-duration: 500ms;
          animation-duration: 500ms; }

.infinite {
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite; }

.slow {
  -webkit-animation-duration: 750ms !important;
          animation-duration: 750ms !important; }

.fast {
  -webkit-animation-duration: 250ms !important;
          animation-duration: 250ms !important; }

.linear {
  -webkit-animation-timing-function: linear !important;
          animation-timing-function: linear !important; }

.ease {
  -webkit-animation-timing-function: ease !important;
          animation-timing-function: ease !important; }

.ease-in {
  -webkit-animation-timing-function: ease-in !important;
          animation-timing-function: ease-in !important; }

.ease-out {
  -webkit-animation-timing-function: ease-out !important;
          animation-timing-function: ease-out !important; }

.ease-in-out {
  -webkit-animation-timing-function: ease-in-out !important;
          animation-timing-function: ease-in-out !important; }

.bounce-in {
  -webkit-animation-timing-function: cubic-bezier(0.485, 0.155, 0.24, 1.245) !important;
          animation-timing-function: cubic-bezier(0.485, 0.155, 0.24, 1.245) !important; }

.bounce-out {
  -webkit-animation-timing-function: cubic-bezier(0.485, 0.155, 0.515, 0.845) !important;
          animation-timing-function: cubic-bezier(0.485, 0.155, 0.515, 0.845) !important; }

.bounce-in-out {
  -webkit-animation-timing-function: cubic-bezier(0.76, -0.245, 0.24, 1.245) !important;
          animation-timing-function: cubic-bezier(0.76, -0.245, 0.24, 1.245) !important; }

.short-delay {
  -webkit-animation-delay: 300ms !important;
          animation-delay: 300ms !important; }

.long-delay {
  -webkit-animation-delay: 700ms !important;
          animation-delay: 700ms !important; }

html {
  font-size: 16px !important; }

.layout {
  height: 100vh;
  font-family: "Aller", Helvetica, Arial, sans-serif;
  font-size: 16px; }
  @media screen and (max-width: 320px) {
    .layout {
      font-size: 12.8px; } }
  .layout input:checked ~ .switch-paddle {
    background: black; }
  .layout .button {
    background-color: #2997ab; }
  .layout .button:focus {
    background-color: #2997ab; }
  .layout .applicationbody__block-border {
    position: absolute;
    bottom: 0;
    width: 50%;
    height: 2px; }
  .layout .applicationbody__block-border--bottom-left {
    left: 0;
    background-image: linear-gradient(to left, #c2c2c2 0%, rgba(0, 0, 0, 0) 80%); }
  .layout .applicationbody__block-border--bottom-right {
    right: 0;
    background-image: linear-gradient(to right, #c2c2c2 0%, rgba(0, 0, 0, 0) 80%); }
  .layout h1,
  .layout h2,
  .layout h3,
  .layout h4,
  .layout h5,
  .layout h6,
  .layout .h1,
  .layout .h2,
  .layout .h3,
  .layout .h4,
  .layout .h5,
  .layout .h6,
  .layout p,
  .layout div,
  .layout span,
  .layout input,
  .layout label {
    font-family: "Aller", Helvetica, Arial, sans-serif; }
  .layout h1,
  .layout h2,
  .layout h3,
  .layout h4,
  .layout h5,
  .layout h6,
  .layout .h1,
  .layout .h2,
  .layout .h3,
  .layout .h4,
  .layout .h5,
  .layout .h6 {
    font-weight: 400; }
</style><style type="text/css">.applicationheader {
  position: absolute;
  top: 0;
  left: 0;
  height: 90px;
  width: 100%;
  color: #ffffff;
  z-index: 1000;
  background-color: #2997ab;
  background-size: cover;
  background-position: top left;
  background-repeat: no-repeat; }
  .applicationheader .applicationheader__title {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0 16px;
    color: #ffffff; }
    @media screen and (max-width: 800px) {
      .applicationheader .applicationheader__title {
        font-size: 20px;
        margin: 0; } }
    @media screen and (max-width: 320px) {
      .applicationheader .applicationheader__title {
        font-size: 20px; } }
  .applicationheader .applicationheader__settingsLink {
    height: 32px;
    cursor: pointer; }
    .applicationheader .applicationheader__settingsLink:hover {
      opacity: 0.8; }
  .applicationheader .applicationheader__li {
    display: inline-block;
    margin-right: 16px; }
    .applicationheader .applicationheader__li a {
      text-decoration: none; }
    .applicationheader .applicationheader__li:last-child {
      margin: 0; }

.applicationheader__progress-wrapper {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 8px;
  background: #ffffff;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #ffffff;
  margin-bottom: 1px; }

.applicationheader__progress-inner {
  height: 100%; }

.applicationheader__button {
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
          justify-content: center;
  -webkit-align-items: center;
          align-items: center;
  max-width: 150px;
  height: 32px;
  padding: 0 16px;
  background: #ffffff;
  cursor: pointer; }
  .applicationheader__button:hover {
    opacity: 0.8; }
  .applicationheader__button span {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; }

.applicationheader__wrapper {
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: row nowrap;
          flex-flow: row nowrap;
  -webkit-justify-content: space-between;
          justify-content: space-between;
  -webkit-align-items: center;
          align-items: center;
  height: 100%;
  padding-bottom: 8px;
  width: 100%;
  overflow: hidden; }
  @media screen and (max-width: 800px) {
    .applicationheader__wrapper {
      display: inline-block;
      text-align: center; } }

.applicationheader__nav {
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
          align-items: center;
  -webkit-flex-shrink: 0;
          flex-shrink: 0; }
  @media screen and (max-width: 800px) {
    .applicationheader__nav {
      display: none; } }

.applicationheader__logo {
  -webkit-flex-shrink: 0;
          flex-shrink: 0;
  height: auto;
  max-height: 72px;
  max-width: 180px; }
  @media screen and (max-width: 800px) {
    .applicationheader__logo {
      margin-top: 8px;
      max-height: 31.5px;
      width: auto;
      max-width: 180px; } }

.applicationheader__navtoggle {
  display: none;
  position: absolute;
  left: 100%;
  width: 30px;
  height: 30px;
  border-bottom-left-radius: 100%;
  top: 0;
  background: #9c9c9c;
  -webkit-transform: translate3d(-100%, 0, 0);
          transform: translate3d(-100%, 0, 0);
  cursor: pointer;
  z-index: 10; }
  @media screen and (max-width: 800px) {
    .applicationheader__navtoggle {
      display: block; } }
  .applicationheader__navtoggle .applicationheader__navtoggle-icon {
    position: absolute;
    top: 2px;
    left: 19px;
    -webkit-transform: translate3d(-50%, 0, 0);
            transform: translate3d(-50%, 0, 0);
    font-family: "foundation-icons";
    font-size: 14px; }

.applicationheader__mobile-nav-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  -webkit-transform: translate3d(0, -100%, 0);
          transform: translate3d(0, -100%, 0);
  transition: all .3s ease-in-out;
  z-index: 5; }
  @media screen and (max-width: 800px) {
    .applicationheader__mobile-nav-wrapper.applicationheader__mobile-nav-down {
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0); } }

.applicationheader__mobile-nav {
  width: 100%;
  text-align: center; }
  @media screen and (max-width: 800px) {
    .applicationheader__mobile-nav {
      display: inline-block; } }
  .applicationheader__mobile-nav ul {
    list-style: none;
    -webkit-padding-start: 0;
            padding-inline-start: 0; }
  .applicationheader__mobile-nav li {
    margin-bottom: 16px; }
</style><style type="text/css">.applicationbody {
  box-sizing: border-box;
  padding-top: 90px;
  height: 100vh; }
  .applicationbody .input-range__track--active {
    background: #2997ab; }
  .applicationbody .input-range__slider {
    background: #2997ab;
    border: 1px solid #2997ab; }
  .applicationbody .switch {
    height: auto;
    margin-bottom: 0; }
    .applicationbody .switch .switch.small {
      height: auto; }

.applicationbody__scrolldiv {
  height: 100%; }

.applicationbody__scrolldiv-inner {
  height: 100%;
  overflow-y: auto; }

.application__scroll-flex-wrapper {
  min-height: 100%;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: column nowrap;
          flex-flow: column nowrap;
  -webkit-justify-content: space-between;
          justify-content: space-between; }

.applicationbody__block {
  padding: 16px 0; }

.applicationbody__block-wrapper {
  position: relative; }

.applicationbody__form {
  width: 100%; }
  @media screen and (max-width: 320px) {
    .applicationbody__form.grid-container {
      padding-left: 0;
      padding-right: 0; } }

.applicationbody__block--inputrange {
  padding: 32px 0; }

.applicationbody__page-button-wrapper {
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
          justify-content: center; }

.applicationbody__page-button {
  margin: 16px; }

.layout .applicationbody__page-button--disabled {
  background-color: #c2c2c2;
  cursor: default; }

.layout .applicationbody__page-button--disabled:hover,
.layout .applicationbody__page-button--disabled:focus {
  background-color: #c2c2c2; }

.applicationbody__block-question {
  margin-bottom: 8px; }

.applicationbody__labels-answers {
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: row nowrap;
          flex-flow: row nowrap; }
  @media screen and (max-width: 320px) {
    .applicationbody__labels-answers {
      -webkit-flex-flow: column nowrap;
              flex-flow: column nowrap; } }

.applicationbody__label {
  display: inline-block;
  width: 80%;
  max-width: 500px;
  margin: 16px 0; }

.applicationbody__question-title {
  margin: 0;
  color: #2997ab; }

.applicationbody__multiselection {
  font-size: 0.75rem;
  font-style: italic;
  opacity: 0.7;
  color: #2997ab; }

.applicationbody__answer {
  margin: 16px 0 0 16px; }

.applicationbody__catheader {
  padding-right: 0.9375rem;
  padding-left: 0.9375rem; }
</style><style type="text/css">.input-range__slider {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background: #3f51b5;
  border: 1px solid #3f51b5;
  border-radius: 100%;
  cursor: pointer;
  display: block;
  height: 1rem;
  margin-left: -0.5rem;
  margin-top: -0.65rem;
  outline: none;
  position: absolute;
  top: 50%;
  transition: box-shadow 0.3s ease-out, -webkit-transform 0.3s ease-out;
  transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
  transition: transform 0.3s ease-out, box-shadow 0.3s ease-out, -webkit-transform 0.3s ease-out;
  width: 1rem; }
  .input-range__slider:active {
    -webkit-transform: scale(1.3);
            transform: scale(1.3); }
  .input-range__slider:focus {
    box-shadow: 0 0 0 5px rgba(63, 81, 181, 0.2); }
  .input-range--disabled .input-range__slider {
    background: #cccccc;
    border: 1px solid #cccccc;
    box-shadow: none;
    -webkit-transform: none;
            transform: none; }

.input-range__slider-container {
  transition: left 0.3s ease-out; }

.input-range__label {
  color: #aaaaaa;
  font-family: "Helvetica Neue", san-serif;
  font-size: 0.8rem;
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
  white-space: nowrap; }

.input-range__label--min,
.input-range__label--max {
  bottom: -1.4rem;
  position: absolute; }

.input-range__label--min {
  left: 0; }

.input-range__label--max {
  right: 0; }

.input-range__label--value {
  position: absolute;
  top: -1.8rem; }

.input-range__label-container {
  left: -50%;
  position: relative; }
  .input-range__label--max .input-range__label-container {
    left: 50%; }

.input-range__track {
  background: #eeeeee;
  border-radius: 0.3rem;
  cursor: pointer;
  display: block;
  height: 0.3rem;
  position: relative;
  transition: left 0.3s ease-out, width 0.3s ease-out; }
  .input-range--disabled .input-range__track {
    background: #eeeeee; }

.input-range__track--background {
  left: 0;
  margin-top: -0.15rem;
  position: absolute;
  right: 0;
  top: 50%; }

.input-range__track--active {
  background: #3f51b5; }

.input-range {
  height: 1rem;
  position: relative;
  width: 100%; }</style><style type="text/css">.react-datepicker-popper[data-placement^="bottom"] .react-datepicker__triangle, .react-datepicker-popper[data-placement^="top"] .react-datepicker__triangle, .react-datepicker__year-read-view--down-arrow,
.react-datepicker__month-read-view--down-arrow,
.react-datepicker__month-year-read-view--down-arrow {
  margin-left: -8px;
  position: absolute;
}

.react-datepicker-popper[data-placement^="bottom"] .react-datepicker__triangle, .react-datepicker-popper[data-placement^="top"] .react-datepicker__triangle, .react-datepicker__year-read-view--down-arrow,
.react-datepicker__month-read-view--down-arrow,
.react-datepicker__month-year-read-view--down-arrow, .react-datepicker-popper[data-placement^="bottom"] .react-datepicker__triangle::before, .react-datepicker-popper[data-placement^="top"] .react-datepicker__triangle::before, .react-datepicker__year-read-view--down-arrow::before,
.react-datepicker__month-read-view--down-arrow::before,
.react-datepicker__month-year-read-view--down-arrow::before {
  box-sizing: content-box;
  position: absolute;
  border: 8px solid transparent;
  height: 0;
  width: 1px;
}

.react-datepicker-popper[data-placement^="bottom"] .react-datepicker__triangle::before, .react-datepicker-popper[data-placement^="top"] .react-datepicker__triangle::before, .react-datepicker__year-read-view--down-arrow::before,
.react-datepicker__month-read-view--down-arrow::before,
.react-datepicker__month-year-read-view--down-arrow::before {
  content: "";
  z-index: -1;
  border-width: 8px;
  left: -8px;
  border-bottom-color: #aeaeae;
}

.react-datepicker-popper[data-placement^="bottom"] .react-datepicker__triangle {
  top: 0;
  margin-top: -8px;
}

.react-datepicker-popper[data-placement^="bottom"] .react-datepicker__triangle, .react-datepicker-popper[data-placement^="bottom"] .react-datepicker__triangle::before {
  border-top: none;
  border-bottom-color: #f0f0f0;
}

.react-datepicker-popper[data-placement^="bottom"] .react-datepicker__triangle::before {
  top: -1px;
  border-bottom-color: #aeaeae;
}

.react-datepicker-popper[data-placement^="top"] .react-datepicker__triangle, .react-datepicker__year-read-view--down-arrow,
.react-datepicker__month-read-view--down-arrow,
.react-datepicker__month-year-read-view--down-arrow {
  bottom: 0;
  margin-bottom: -8px;
}

.react-datepicker-popper[data-placement^="top"] .react-datepicker__triangle, .react-datepicker__year-read-view--down-arrow,
.react-datepicker__month-read-view--down-arrow,
.react-datepicker__month-year-read-view--down-arrow, .react-datepicker-popper[data-placement^="top"] .react-datepicker__triangle::before, .react-datepicker__year-read-view--down-arrow::before,
.react-datepicker__month-read-view--down-arrow::before,
.react-datepicker__month-year-read-view--down-arrow::before {
  border-bottom: none;
  border-top-color: #fff;
}

.react-datepicker-popper[data-placement^="top"] .react-datepicker__triangle::before, .react-datepicker__year-read-view--down-arrow::before,
.react-datepicker__month-read-view--down-arrow::before,
.react-datepicker__month-year-read-view--down-arrow::before {
  bottom: -1px;
  border-top-color: #aeaeae;
}

.react-datepicker-wrapper {
  display: inline-block;
}

.react-datepicker {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 0.8rem;
  background-color: #fff;
  color: #000;
  border: 1px solid #aeaeae;
  border-radius: 0.3rem;
  display: inline-block;
  position: relative;
}

.react-datepicker--time-only .react-datepicker__triangle {
  left: 35px;
}

.react-datepicker--time-only .react-datepicker__time-container {
  border-left: 0;
}

.react-datepicker--time-only .react-datepicker__time {
  border-radius: 0.3rem;
}

.react-datepicker--time-only .react-datepicker__time-box {
  border-radius: 0.3rem;
}

.react-datepicker__triangle {
  position: absolute;
  left: 50px;
}

.react-datepicker-popper {
  z-index: 1;
}

.react-datepicker-popper[data-placement^="bottom"] {
  margin-top: 10px;
}

.react-datepicker-popper[data-placement^="top"] {
  margin-bottom: 10px;
}

.react-datepicker-popper[data-placement^="right"] {
  margin-left: 8px;
}

.react-datepicker-popper[data-placement^="right"] .react-datepicker__triangle {
  left: auto;
  right: 42px;
}

.react-datepicker-popper[data-placement^="left"] {
  margin-right: 8px;
}

.react-datepicker-popper[data-placement^="left"] .react-datepicker__triangle {
  left: 42px;
  right: auto;
}

.react-datepicker__header {
  text-align: center;
  background-color: #f0f0f0;
  border-bottom: 1px solid #aeaeae;
  border-top-left-radius: 0.3rem;
  border-top-right-radius: 0.3rem;
  padding-top: 8px;
  position: relative;
}

.react-datepicker__header--time {
  padding-bottom: 8px;
  padding-left: 5px;
  padding-right: 5px;
}

.react-datepicker__year-dropdown-container--select,
.react-datepicker__month-dropdown-container--select,
.react-datepicker__month-year-dropdown-container--select,
.react-datepicker__year-dropdown-container--scroll,
.react-datepicker__month-dropdown-container--scroll,
.react-datepicker__month-year-dropdown-container--scroll {
  display: inline-block;
  margin: 0 2px;
}

.react-datepicker__current-month,
.react-datepicker-time__header {
  margin-top: 0;
  color: #000;
  font-weight: bold;
  font-size: 0.944rem;
}

.react-datepicker-time__header {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}

.react-datepicker__navigation {
  background: none;
  line-height: 1.7rem;
  text-align: center;
  cursor: pointer;
  position: absolute;
  top: 10px;
  width: 0;
  padding: 0;
  border: 0.45rem solid transparent;
  z-index: 1;
  height: 10px;
  width: 10px;
  text-indent: -999em;
  overflow: hidden;
}

.react-datepicker__navigation--previous {
  left: 10px;
  border-right-color: #ccc;
}

.react-datepicker__navigation--previous:hover {
  border-right-color: #b3b3b3;
}

.react-datepicker__navigation--previous--disabled, .react-datepicker__navigation--previous--disabled:hover {
  border-right-color: #e6e6e6;
  cursor: default;
}

.react-datepicker__navigation--next {
  right: 10px;
  border-left-color: #ccc;
}

.react-datepicker__navigation--next--with-time:not(.react-datepicker__navigation--next--with-today-button) {
  right: 80px;
}

.react-datepicker__navigation--next:hover {
  border-left-color: #b3b3b3;
}

.react-datepicker__navigation--next--disabled, .react-datepicker__navigation--next--disabled:hover {
  border-left-color: #e6e6e6;
  cursor: default;
}

.react-datepicker__navigation--years {
  position: relative;
  top: 0;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.react-datepicker__navigation--years-previous {
  top: 4px;
  border-top-color: #ccc;
}

.react-datepicker__navigation--years-previous:hover {
  border-top-color: #b3b3b3;
}

.react-datepicker__navigation--years-upcoming {
  top: -4px;
  border-bottom-color: #ccc;
}

.react-datepicker__navigation--years-upcoming:hover {
  border-bottom-color: #b3b3b3;
}

.react-datepicker__month-container {
  float: left;
}

.react-datepicker__month {
  margin: 0.4rem;
  text-align: center;
}

.react-datepicker__time-container {
  float: right;
  border-left: 1px solid #aeaeae;
  width: 70px;
}

.react-datepicker__time-container--with-today-button {
  display: inline;
  border: 1px solid #aeaeae;
  border-radius: 0.3rem;
  position: absolute;
  right: -72px;
  top: 0;
}

.react-datepicker__time-container .react-datepicker__time {
  position: relative;
  background: white;
}

.react-datepicker__time-container .react-datepicker__time .react-datepicker__time-box {
  width: 70px;
  overflow-x: hidden;
  margin: 0 auto;
  text-align: center;
}

.react-datepicker__time-container .react-datepicker__time .react-datepicker__time-box ul.react-datepicker__time-list {
  list-style: none;
  margin: 0;
  height: calc(195px + (1.7rem / 2));
  overflow-y: scroll;
  padding-right: 0px;
  padding-left: 0px;
  width: 100%;
  box-sizing: content-box;
}

.react-datepicker__time-container .react-datepicker__time .react-datepicker__time-box ul.react-datepicker__time-list li.react-datepicker__time-list-item {
  height: 30px;
  padding: 5px 10px;
}

.react-datepicker__time-container .react-datepicker__time .react-datepicker__time-box ul.react-datepicker__time-list li.react-datepicker__time-list-item:hover {
  cursor: pointer;
  background-color: #f0f0f0;
}

.react-datepicker__time-container .react-datepicker__time .react-datepicker__time-box ul.react-datepicker__time-list li.react-datepicker__time-list-item--selected {
  background-color: #216ba5;
  color: white;
  font-weight: bold;
}

.react-datepicker__time-container .react-datepicker__time .react-datepicker__time-box ul.react-datepicker__time-list li.react-datepicker__time-list-item--selected:hover {
  background-color: #216ba5;
}

.react-datepicker__time-container .react-datepicker__time .react-datepicker__time-box ul.react-datepicker__time-list li.react-datepicker__time-list-item--disabled {
  color: #ccc;
}

.react-datepicker__time-container .react-datepicker__time .react-datepicker__time-box ul.react-datepicker__time-list li.react-datepicker__time-list-item--disabled:hover {
  cursor: default;
  background-color: transparent;
}

.react-datepicker__week-number {
  color: #ccc;
  display: inline-block;
  width: 1.7rem;
  line-height: 1.7rem;
  text-align: center;
  margin: 0.166rem;
}

.react-datepicker__week-number.react-datepicker__week-number--clickable {
  cursor: pointer;
}

.react-datepicker__week-number.react-datepicker__week-number--clickable:hover {
  border-radius: 0.3rem;
  background-color: #f0f0f0;
}

.react-datepicker__day-names,
.react-datepicker__week {
  white-space: nowrap;
}

.react-datepicker__day-name,
.react-datepicker__day,
.react-datepicker__time-name {
  color: #000;
  display: inline-block;
  width: 1.7rem;
  line-height: 1.7rem;
  text-align: center;
  margin: 0.166rem;
}

.react-datepicker__day {
  cursor: pointer;
}

.react-datepicker__day:hover {
  border-radius: 0.3rem;
  background-color: #f0f0f0;
}

.react-datepicker__day--today {
  font-weight: bold;
}

.react-datepicker__day--highlighted {
  border-radius: 0.3rem;
  background-color: #3dcc4a;
  color: #fff;
}

.react-datepicker__day--highlighted:hover {
  background-color: #32be3f;
}

.react-datepicker__day--highlighted-custom-1 {
  color: magenta;
}

.react-datepicker__day--highlighted-custom-2 {
  color: green;
}

.react-datepicker__day--selected, .react-datepicker__day--in-selecting-range, .react-datepicker__day--in-range {
  border-radius: 0.3rem;
  background-color: #216ba5;
  color: #fff;
}

.react-datepicker__day--selected:hover, .react-datepicker__day--in-selecting-range:hover, .react-datepicker__day--in-range:hover {
  background-color: #1d5d90;
}

.react-datepicker__day--keyboard-selected {
  border-radius: 0.3rem;
  background-color: #2a87d0;
  color: #fff;
}

.react-datepicker__day--keyboard-selected:hover {
  background-color: #1d5d90;
}

.react-datepicker__day--in-selecting-range:not(.react-datepicker__day--in-range) {
  background-color: rgba(33, 107, 165, 0.5);
}

.react-datepicker__month--selecting-range .react-datepicker__day--in-range:not(.react-datepicker__day--in-selecting-range) {
  background-color: #f0f0f0;
  color: #000;
}

.react-datepicker__day--disabled {
  cursor: default;
  color: #ccc;
}

.react-datepicker__day--disabled:hover {
  background-color: transparent;
}

.react-datepicker__input-container {
  position: relative;
  display: inline-block;
}

.react-datepicker__year-read-view,
.react-datepicker__month-read-view,
.react-datepicker__month-year-read-view {
  border: 1px solid transparent;
  border-radius: 0.3rem;
}

.react-datepicker__year-read-view:hover,
.react-datepicker__month-read-view:hover,
.react-datepicker__month-year-read-view:hover {
  cursor: pointer;
}

.react-datepicker__year-read-view:hover .react-datepicker__year-read-view--down-arrow,
.react-datepicker__year-read-view:hover .react-datepicker__month-read-view--down-arrow,
.react-datepicker__month-read-view:hover .react-datepicker__year-read-view--down-arrow,
.react-datepicker__month-read-view:hover .react-datepicker__month-read-view--down-arrow,
.react-datepicker__month-year-read-view:hover .react-datepicker__year-read-view--down-arrow,
.react-datepicker__month-year-read-view:hover .react-datepicker__month-read-view--down-arrow {
  border-top-color: #b3b3b3;
}

.react-datepicker__year-read-view--down-arrow,
.react-datepicker__month-read-view--down-arrow,
.react-datepicker__month-year-read-view--down-arrow {
  border-top-color: #ccc;
  float: right;
  margin-left: 20px;
  top: 8px;
  position: relative;
  border-width: 0.45rem;
}

.react-datepicker__year-dropdown,
.react-datepicker__month-dropdown,
.react-datepicker__month-year-dropdown {
  background-color: #f0f0f0;
  position: absolute;
  width: 50%;
  left: 25%;
  top: 30px;
  z-index: 1;
  text-align: center;
  border-radius: 0.3rem;
  border: 1px solid #aeaeae;
}

.react-datepicker__year-dropdown:hover,
.react-datepicker__month-dropdown:hover,
.react-datepicker__month-year-dropdown:hover {
  cursor: pointer;
}

.react-datepicker__year-dropdown--scrollable,
.react-datepicker__month-dropdown--scrollable,
.react-datepicker__month-year-dropdown--scrollable {
  height: 150px;
  overflow-y: scroll;
}

.react-datepicker__year-option,
.react-datepicker__month-option,
.react-datepicker__month-year-option {
  line-height: 20px;
  width: 100%;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.react-datepicker__year-option:first-of-type,
.react-datepicker__month-option:first-of-type,
.react-datepicker__month-year-option:first-of-type {
  border-top-left-radius: 0.3rem;
  border-top-right-radius: 0.3rem;
}

.react-datepicker__year-option:last-of-type,
.react-datepicker__month-option:last-of-type,
.react-datepicker__month-year-option:last-of-type {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border-bottom-left-radius: 0.3rem;
  border-bottom-right-radius: 0.3rem;
}

.react-datepicker__year-option:hover,
.react-datepicker__month-option:hover,
.react-datepicker__month-year-option:hover {
  background-color: #ccc;
}

.react-datepicker__year-option:hover .react-datepicker__navigation--years-upcoming,
.react-datepicker__month-option:hover .react-datepicker__navigation--years-upcoming,
.react-datepicker__month-year-option:hover .react-datepicker__navigation--years-upcoming {
  border-bottom-color: #b3b3b3;
}

.react-datepicker__year-option:hover .react-datepicker__navigation--years-previous,
.react-datepicker__month-option:hover .react-datepicker__navigation--years-previous,
.react-datepicker__month-year-option:hover .react-datepicker__navigation--years-previous {
  border-top-color: #b3b3b3;
}

.react-datepicker__year-option--selected,
.react-datepicker__month-option--selected,
.react-datepicker__month-year-option--selected {
  position: absolute;
  left: 15px;
}

.react-datepicker__close-icon {
  background-color: transparent;
  border: 0;
  cursor: pointer;
  outline: 0;
  padding: 0;
  vertical-align: middle;
  position: absolute;
  height: 16px;
  width: 16px;
  top: 25%;
  right: 7px;
}

.react-datepicker__close-icon::after {
  background-color: #216ba5;
  border-radius: 50%;
  bottom: 0;
  box-sizing: border-box;
  color: #fff;
  content: "\D7";
  cursor: pointer;
  font-size: 12px;
  height: 16px;
  width: 16px;
  line-height: 1;
  margin: -8px auto 0;
  padding: 2px;
  position: absolute;
  right: 0px;
  text-align: center;
}

.react-datepicker__today-button {
  background: #f0f0f0;
  border-top: 1px solid #aeaeae;
  cursor: pointer;
  text-align: center;
  font-weight: bold;
  padding: 5px 0;
  clear: left;
}

.react-datepicker__portal {
  position: fixed;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.8);
  left: 0;
  top: 0;
  -webkit-justify-content: center;
          justify-content: center;
  -webkit-align-items: center;
          align-items: center;
  display: -webkit-flex;
  display: flex;
  z-index: 2147483647;
}

.react-datepicker__portal .react-datepicker__day-name,
.react-datepicker__portal .react-datepicker__day,
.react-datepicker__portal .react-datepicker__time-name {
  width: 3rem;
  line-height: 3rem;
}

@media (max-width: 400px), (max-height: 550px) {
  .react-datepicker__portal .react-datepicker__day-name,
  .react-datepicker__portal .react-datepicker__day,
  .react-datepicker__portal .react-datepicker__time-name {
    width: 2rem;
    line-height: 2rem;
  }
}

.react-datepicker__portal .react-datepicker__current-month,
.react-datepicker__portal .react-datepicker-time__header {
  font-size: 1.44rem;
}

.react-datepicker__portal .react-datepicker__navigation {
  border: 0.81rem solid transparent;
}

.react-datepicker__portal .react-datepicker__navigation--previous {
  border-right-color: #ccc;
}

.react-datepicker__portal .react-datepicker__navigation--previous:hover {
  border-right-color: #b3b3b3;
}

.react-datepicker__portal .react-datepicker__navigation--previous--disabled, .react-datepicker__portal .react-datepicker__navigation--previous--disabled:hover {
  border-right-color: #e6e6e6;
  cursor: default;
}

.react-datepicker__portal .react-datepicker__navigation--next {
  border-left-color: #ccc;
}

.react-datepicker__portal .react-datepicker__navigation--next:hover {
  border-left-color: #b3b3b3;
}

.react-datepicker__portal .react-datepicker__navigation--next--disabled, .react-datepicker__portal .react-datepicker__navigation--next--disabled:hover {
  border-left-color: #e6e6e6;
  cursor: default;
}
</style><style type="text/css">.applicationfooter--wrapper {
  min-height: 90px;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: row nowrap;
          flex-flow: row nowrap;
  -webkit-justify-content: flex-start;
          justify-content: flex-start;
  -webkit-align-items: center;
          align-items: center;
  font-size: 0.75rem; }
  @media screen and (max-width: 320px) {
    .applicationfooter--wrapper {
      -webkit-flex-flow: column nowrap;
              flex-flow: column nowrap; } }
  .applicationfooter--wrapper .applicationfooter__right {
    width: 25%;
    margin-left: auto; }
    @media screen and (max-width: 320px) {
      .applicationfooter--wrapper .applicationfooter__right {
        margin-left: 0; } }

.applicationfooter__logo {
  -webkit-flex-shrink: 0;
          flex-shrink: 0; }

.applicationfooter__logo-image {
  height: 90px;
  width: auto; }

.applicationfooter__text {
  width: 50%; }

.applicationfooter-flex-item {
  margin: 16px;
  height: auto; }
  @media screen and (max-width: 320px) {
    .applicationfooter-flex-item {
      width: auto; } }
</style><style data-emotion=""></style><style type="text/css">.result .result__bullet {
  position: absolute;
  font-family: 'foundation-icons';
  font-size: 1.555rem; }

.result h2 {
  color: #2997ab; }

.result__image {
  display: block;
  width: 100%;
  height: auto;
  margin: 0 auto; }

.result__wrapper-toprint {
  position: fixed;
  left: 0px;
  width: 210mm;
  height: 297mm; }

.result__image-container {
  position: relative; }

.result__category {
  position: absolute; }

.result__category--a {
  top: 0;
  left: 0;
  width: 100%;
  height: 50%; }

.result__category--b {
  top: 0;
  right: 0;
  width: 50%;
  height: 100%; }

.result__category--c {
  bottom: 0;
  left: 0;
  width: 100%;
  height: 50%; }

.result__category--d {
  bottom: 0;
  left: 0;
  width: 50%;
  height: 100%; }

.result__bullet--cat-a {
  left: 50%;
  color: #ffbf00;
  -webkit-transform: translate3d(-50%, 50%, 0);
          transform: translate3d(-50%, 50%, 0); }

.result__bullet--cat-b {
  top: 50%;
  color: #7495ba;
  -webkit-transform: translate3d(-50%, -50%, 0);
          transform: translate3d(-50%, -50%, 0); }

.result__bullet--cat-c {
  left: 50%;
  color: #95768c;
  -webkit-transform: translate3d(-50%, -50%, 0);
          transform: translate3d(-50%, -50%, 0); }

.result__bullet--cat-d {
  top: 50%;
  color: #974848;
  -webkit-transform: translate3d(50%, -50%, 0);
          transform: translate3d(50%, -50%, 0); }

.result__bullet--cat-e {
  left: 50%;
  color: #2997ab;
  -webkit-transform: translate3d(-50%, 50%, 0);
          transform: translate3d(-50%, 50%, 0); }

.result__wrapper {
  position: relative;
  padding: 16px;
  margin-bottom: 16px; }

.result__wrapper--literature p {
  font-style: italic; }

.result__wrapper-image {
  position: relative;
  float: right;
  max-width: 350px;
  height: auto;
  margin: 32px; }

.result__image-categories {
  position: absolute;
  font-weight: 500;
  text-align: center;
  z-index: 100;
  color: #2997ab; }

.result__image-categories--top {
  top: -30px;
  left: 50%;
  -webkit-transform: translate3d(-50%, 0, 0);
          transform: translate3d(-50%, 0, 0);
  color: #ffbf00; }

.result__image-categories--right {
  top: 50%;
  left: 50%;
  -webkit-transform: translate3d(15px, 15px, 0);
          transform: translate3d(15px, 15px, 0);
  letter-spacing: -1px;
  color: #7495ba; }

.result__image-categories--bottom {
  bottom: -30px;
  left: 50%;
  -webkit-transform: translate3d(-50%, 0, 0);
          transform: translate3d(-50%, 0, 0);
  color: #95768c; }

.result__image-categories--left {
  top: 50%;
  right: 50%;
  -webkit-transform: translate3d(-15px, 15px, 0);
          transform: translate3d(-15px, 15px, 0);
  color: #974848; }

.result__image-categories--top-right {
  top: 25%;
  left: 50%;
  -webkit-transform: translate3d(-50%, -50%, 0);
          transform: translate3d(-50%, -50%, 0); }

.result__image-categories--bottom-right {
  top: 75%;
  left: 50%;
  -webkit-transform: translate3d(-50%, -50%, 0);
          transform: translate3d(-50%, -50%, 0); }

.result__image-categories--bottom-left {
  top: 75%;
  left: 50%;
  -webkit-transform: translate3d(-50%, -50%, 0);
          transform: translate3d(-50%, -50%, 0); }

.result__image-categories--top-left {
  top: 25%;
  left: 50%;
  -webkit-transform: translate3d(-50%, -50%, 0);
          transform: translate3d(-50%, -50%, 0); }

.applicationbody-result--for-pdf-wrapper {
  position: relative;
  overflow: hidden;
  height: 0;
  width: 0; }

.applicationbody-result--for-pdf {
  width: 297mm; }

.result__diagram {
  position: relative;
  text-align: center; }

.graph-selectbox-wrapper {
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
          justify-content: center;
  padding: 16px 0; }
  .graph-selectbox-wrapper .graph-selectbox {
    width: 100%;
    max-width: 400px; }

.result__chart-container {
  height: 500px; }
  @media screen and (max-width: 100px) {
    .result__chart-container {
      height: 120px; } }
  @media screen and (max-width: 200px) {
    .result__chart-container {
      height: 220px; } }
  @media screen and (max-width: 400px) {
    .result__chart-container {
      height: 300px; } }
  @media screen and (max-width: 600px) {
    .result__chart-container {
      height: 330px; } }
  @media screen and (min-width: 601px) {
    .result__chart-container {
      height: 400px; } }

.result__bar-wrapper {
  max-height: 300px; }

.applicationbody__spacer {
  margin-top: 80px; }

.applicationbody__chartDummyContainer--wrapper {
  width: 0;
  height: 0;
  overflow: hidden; }

.applicationbody__chartDummyContainer {
  width: 297mm;
  height: 400px; }
</style><style type="text/css">.diagram {
  display: inline-block; }

.diagram__graph-container {
  display: inline-block;
  margin: 16px; }

.diagram__graph-flex-container {
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: column nowrap;
          flex-flow: column nowrap;
  -webkit-align-items: center;
          align-items: center;
  -webkit-justify-content: space-between;
          justify-content: space-between; }

.diagram__graph-wrapper {
  position: relative;
  height: 120px;
  width: 30px;
  background-color: #2997ab;
  box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.22); }

.diagram__graph-inner {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #ffffff; }

.diagram__explanation {
  width: 120px;
  text-align: center; }

.diagram__points {
  width: 30px;
  height: 30px;
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
          justify-content: center;
  -webkit-align-items: center;
          align-items: center;
  border-radius: 500px;
  color: #ffffff;
  font-weight: 600;
  margin-bottom: 8px;
  box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.22); }

.diagram__title {
  text-align: center; }

.diagram__points--twenty {
  background: #54acbc; }

.diagram__points--fourty {
  background: #7fc1cd; }

.diagram__points--sixty {
  background: #a9d5dd; }

.diagram__points--eighty {
  background: #d4eaee; }

.diagram__points--hundred {
  background: #2997ab; }

.applicationbody-result--for-pdf .diagram__graph-wrapper {
  height: 108px; }

.applicationbody-result--for-pdf .diagram-more-margin {
  margin-top: 100px; }
</style><style type="text/css">.Application {
  position: relative;
  height: 100vh; }
</style><style type="text/css">.settings {
  box-sizing: border-box;
  padding-top: 90px;
  height: 100vh; }

.settings__scrolldiv {
  height: 100%; }

.settings__scrolldiv-inner {
  height: 100%;
  overflow-y: auto;
  padding: 16px; }

.settings__options-wrapper {
  max-width: 800px;
  margin: 0 auto; }

.settings__goback-wrapper {
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
          align-items: center;
  -webkit-justify-content: center;
          justify-content: center;
  border-radius: 500px;
  border: 2px solid #2997ab;
  height: 48px;
  width: 48px;
  cursor: pointer;
  margin-bottom: 16px;
  color: #2997ab; }
  .settings__goback-wrapper:hover {
    opacity: 0.7; }
  .settings__goback-wrapper .settings__backbutton {
    font-family: "foundation-icons";
    font-size: 1.777rem;
    text-decoration: none; }

.settings__goback-link {
  text-decoration: none; }

.settings__section {
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: column wrap;
          flex-flow: column wrap;
  -webkit-align-items: center;
          align-items: center; }

.settings__section--select {
  width: 100%; }
</style><style type="text/css">/*
 * contextMenu.js v 1.4.0
 * Author: Sudhanshu Yadav
 * s-yadav.github.com
 * Copyright (c) 2013 Sudhanshu Yadav.
 * Dual licensed under the MIT and GPL licenses
**/

.iw-contextMenu {
    box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.10) !important;
    border: 1px solid #c8c7cc !important;
    border-radius: 11px !important;
    display: none;
    z-index: 1000000132;
    max-width: 300px !important;
    width: auto !important;
}

.dark-mode .iw-contextMenu,
.TnITTtw-dark-mode.iw-contextMenu,
.TnITTtw-dark-mode .iw-contextMenu {
    border-color: #747473 !important;
}

.iw-cm-menu {
    background: #fff !important;
    color: #000 !important;
    margin: 0px !important;
    padding: 0px !important;
    overflow: visible !important;
}

.dark-mode .iw-cm-menu,
.TnITTtw-dark-mode.iw-cm-menu,
.TnITTtw-dark-mode .iw-cm-menu {
    background: #525251 !important;
    color: #FFF !important;
}

.iw-curMenu {
}

.iw-cm-menu li {
    font-family: -apple-system, BlinkMacSystemFont, "Helvetica Neue", Helvetica, Arial, Ubuntu, sans-serif !important;
    list-style: none !important;
    padding: 10px !important;
    padding-right: 20px !important;
    border-bottom: 1px solid #c8c7cc !important;
    font-weight: 400 !important;
    cursor: pointer !important;
    position: relative !important;
    font-size: 14px !important;
    margin: 0 !important;
    line-height: inherit !important;
    border-radius: 0 !important;
    display: block !important;
}

.dark-mode .iw-cm-menu li, .TnITTtw-dark-mode .iw-cm-menu li {
    border-bottom-color: #747473 !important;
}

.iw-cm-menu li:first-child {
    border-top-left-radius: 11px !important;
    border-top-right-radius: 11px !important;
}

.iw-cm-menu li:last-child {
    border-bottom-left-radius: 11px !important;
    border-bottom-right-radius: 11px !important;
    border-bottom: none !important;
}

.iw-mOverlay {
    position: absolute !important;
    width: 100% !important;
    height: 100% !important;
    top: 0px !important;
    left: 0px !important;
    background: #FFF !important;
    opacity: .5 !important;
}

.iw-contextMenu li.iw-mDisable {
    opacity: 0.3 !important;
    cursor: default !important;
}

.iw-mSelected {
    background-color: #F6F6F6 !important;
}

.dark-mode .iw-mSelected, .TnITTtw-dark-mode .iw-mSelected {
    background-color: #676766 !important;
}

.iw-cm-arrow-right {
    width: 0 !important;
    height: 0 !important;
    border-top: 5px solid transparent !important;
    border-bottom: 5px solid transparent !important;
    border-left: 5px solid #000 !important;
    position: absolute !important;
    right: 5px !important;
    top: 50% !important;
    margin-top: -5px !important;
}

.dark-mode .iw-cm-arrow-right, .TnITTtw-dark-mode .iw-cm-arrow-right {
    border-left-color: #FFF !important;
}

.iw-mSelected > .iw-cm-arrow-right {
}

/*context menu css end */</style><style type="text/css">@-webkit-keyframes load4 {
    0%,
    100% {
        box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
    }
    12.5% {
        box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    25% {
        box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    37.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    50% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    62.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
    }
    75% {
        box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
    }
    87.5% {
        box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
    }
}

@keyframes load4 {
    0%,
    100% {
        box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
    }
    12.5% {
        box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    25% {
        box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    37.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    50% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    62.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
    }
    75% {
        box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
    }
    87.5% {
        box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
    }
}</style><style type="text/css">/* This is not a zero-length file! */</style><style data-emotion="">.css-10nd86i{position:relative;box-sizing:border-box;}</style><style data-emotion="">.css-vj8t7z{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:hsl(0,0%,100%);border-color:hsl(0,0%,80%);border-radius:4px;border-style:solid;border-width:1px;cursor:default;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;min-height:38px;outline:0 !important;position:relative;-webkit-transition:all 100ms;transition:all 100ms;box-sizing:border-box;}</style><style data-emotion="">.css-vj8t7z:hover{border-color:hsl(0,0%,70%);}</style><style data-emotion="">.css-1hwfws3{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex:1;-ms-flex:1;flex:1;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;padding:2px 8px;-webkit-overflow-scrolling:touch;position:relative;overflow:hidden;box-sizing:border-box;}</style><style data-emotion="">.css-1492t68{color:hsl(0,0%,50%);margin-left:2px;margin-right:2px;position:absolute;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);box-sizing:border-box;}</style><style data-emotion="">.css-1g6gooi{margin:2px;padding-bottom:2px;padding-top:2px;visibility:visible;color:hsl(0,0%,20%);box-sizing:border-box;}</style><style data-emotion="">.css-1wy0on6{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-align-self:stretch;-ms-flex-item-align:stretch;align-self:stretch;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;box-sizing:border-box;}</style><style data-emotion="">.css-d8oujb{-webkit-align-self:stretch;-ms-flex-item-align:stretch;align-self:stretch;background-color:hsl(0,0%,80%);margin-bottom:8px;margin-top:8px;width:1px;box-sizing:border-box;}</style><style data-emotion="">.css-1ep9fjw{color:hsl(0,0%,80%);display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;padding:8px;-webkit-transition:color 150ms;transition:color 150ms;box-sizing:border-box;}</style><style data-emotion="">.css-1ep9fjw:hover{color:hsl(0,0%,60%);}</style><style data-emotion="">.css-19bqh2r{display:inline-block;fill:currentColor;line-height:1;stroke:currentColor;stroke-width:0;}</style><style type="text/css">/* Chart.js */
/*
 * DOM element rendering detection
 * https://davidwalsh.name/detect-node-insertion
 */
@keyframes chartjs-render-animation {
	from { opacity: 0.99; }
	to { opacity: 1; }
}

.chartjs-render-monitor {
	animation: chartjs-render-animation 0.001s;
}

/*
 * DOM element resizing detection
 * https://github.com/marcj/css-element-queries
 */
.chartjs-size-monitor,
.chartjs-size-monitor-expand,
.chartjs-size-monitor-shrink {
	position: absolute;
	direction: ltr;
	left: 0;
	top: 0;
	right: 0;
	bottom: 0;
	overflow: hidden;
	pointer-events: none;
	visibility: hidden;
	z-index: -1;
}

.chartjs-size-monitor-expand > div {
	position: absolute;
	width: 1000000px;
	height: 1000000px;
	left: 0;
	top: 0;
}

.chartjs-size-monitor-shrink > div {
	position: absolute;
	width: 200%;
	height: 200%;
	left: 0;
	top: 0;
}
</style><style data-emotion="">.css-bl6clz{z-index:9999;border:0;-webkit-clip:rect(1px,1px,1px,1px);clip:rect(1px,1px,1px,1px);height:1px;width:1px;position:absolute;overflow:hidden;padding:0;white-space:nowrap;background-color:red;color:blue;}</style><style data-emotion="">.css-2o5izw{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:hsl(0,0%,100%);border-color:#2684FF;border-radius:4px;border-style:solid;border-width:1px;box-shadow:0 0 0 1px #2684FF;cursor:default;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;min-height:38px;outline:0 !important;position:relative;-webkit-transition:all 100ms;transition:all 100ms;box-sizing:border-box;}</style><style data-emotion="">.css-2o5izw:hover{border-color:#2684FF;}</style><style data-emotion="">.css-1uq0kb5{color:hsl(0,0%,40%);display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;padding:8px;-webkit-transition:color 150ms;transition:color 150ms;box-sizing:border-box;}</style><style data-emotion="">.css-1uq0kb5:hover{color:hsl(0,0%,20%);}</style><style data-emotion="">.css-15k3avv{top:100%;background-color:hsl(0,0%,100%);border-radius:4px;box-shadow:0 0 0 1px hsla(0,0%,0%,0.1),0 4px 11px hsla(0,0%,0%,0.1);margin-bottom:8px;margin-top:8px;position:absolute;width:100%;z-index:1;box-sizing:border-box;}</style><style data-emotion="">.css-11unzgr{max-height:300px;overflow-y:auto;padding-bottom:4px;padding-top:4px;position:relative;-webkit-overflow-scrolling:touch;box-sizing:border-box;}</style><style data-emotion="">.css-wqgs6e{background-color:#DEEBFF;color:inherit;cursor:default;display:block;font-size:inherit;padding:8px 12px;width:100%;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-tap-highlight-color:rgba(0,0,0,0);box-sizing:border-box;}</style><style data-emotion="">.css-wqgs6e:active{background-color:#B2D4FF;}</style><style data-emotion="">.css-v73v8k{background-color:transparent;color:inherit;cursor:default;display:block;font-size:inherit;padding:8px 12px;width:100%;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-tap-highlight-color:rgba(0,0,0,0);box-sizing:border-box;}</style><style data-emotion="">.css-v73v8k:active{background-color:#B2D4FF;}</style></head>

    <body>
         <div id="divToPrint" class="applicationbody-result grid-container applicationbody-result--for-pdf"><div class="grid-x grid-padding-x align-center result__wrapper"><div class="cell small-24"><h2 style="color: rgb(150, 56, 56);">sdrgsdrg</h2></div><div class="cell small-24"><p><p>sdrgsdrgsdrg</p></p></div></div><img id="chartBaseImage" alt="chart" src="data:image/png;base64,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"><div class="applicationbody__spacer"></div><div class="applicationfooter applicationfooter--wrapper" style="background-color: rgb(118, 118, 118); color: rgb(199, 116, 116);"><div class="applicationfooter__text applicationfooter-flex-item">englisch bla</div><div class="applicationfooter__right applicationfooter-flex-item">englisch right</div></div></div>
    </body>
</html>

EOF;
