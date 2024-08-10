<!DOCTYPE htmlPUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>ItsolutionStuff.com</title>
    <style type="text/css">
        body {
            margin: 0;
            background-color: #f2f2f2
        }
        table {
            border-spacing: 0;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
        }
        .border-bottom {
            border-bottom: 1px solid #ddd;
        }
        .wrapper {
            width: 100%;
            height: 100vh;
            table-layout: fixed;
            /* background-color: #f2f2f2; */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main {
            position: relative;
            background-color: #fff;
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #171a1b;
            z-index: 1;
        }
        .main::after{
            position: absolute;
            content: '';
            width: 100%;
            height: 100%;
            background-color: rgb(255 255 255 / 80%);
            top: 0;
            left: 0;
            z-index: -1;
        }
        .head td,
        .foot td {
            height: 4px;
            background: linear-gradient(to right, rgb(225, 157, 38) , rgb(63, 177, 28));
        }
        .foot td {
            background: linear-gradient(to left, rgb(225, 157, 38) , rgb(63, 177, 28));
        }
        .two-columns {
            text-align: center;
            /* font-size: 0; */
        }
        .two-columns .column {
            width: 100%;
            max-width: 300px;
            display: inline-block;
            vertical-align: top;
            text-align: center;
            float: left;
            padding: 12px 8px;
        }
        .two-columns .column .logo {
            font-size: 24px;
            text-decoration: none;
            color: #171a1b;
            font-weight: 600;
            text-transform: uppercase;
        }
        .two-columns .column.right {
            text-align: right;
            display: table;
        }
        .two-columns .column.right td {
            display: flex;
            justify-content: end;
            column-gap: 6px;
        }
        .two-columns .column.right a {
            background-color: #171a1b;
            color: #fff;
            width: 24px;
            height: 24px;
            line-height: 24px;
            border-radius: 50%;
            display: block;
            text-align: center;
            text-decoration: none;
        }
        .body-content {
            padding: 8px 12px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <table class="main" width="100%">
            <!-- Header Start -->
            <tr class="head">
                <td></td>
            </tr>
            <!-- Header End -->


            <!-- Body Start -->
            <tr class="body">
                <td>
                    <table width="100%">
                        <tr>
                            <td class="two-columns border-bottom">
                                <table class="column">
                                    <tr>
                                        <td>
                                            <a class="logo" href="#">Logo</a>
                                        </td>
                                    </tr>
                                </table>
                                <table class="column right">
                                    <tr>
                                        <td>
                                            <a href="#">f</a>
                                            <a href="#">t</a>
                                            <a href="#">y</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table width="100%" class="body-content">
                        <tr>
                            <td>
                                <h1>Hi EveryOne!</h1>
                            
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                
                                <p>Thank you</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- Body End -->


            <!-- Footer Start -->
            <tr class="foot">
                <td></td>
            </tr>
            <!-- Footer End -->
        </table>
    </div>
</body>
</html>