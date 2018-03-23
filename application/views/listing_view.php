<!-- views/listing_view.php -->
<html>
    <head>
        <title>Paging Example-User Listing</title>
        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 0 15px 0 15px;
            }

            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }
            /* li {
                float: left;
            } */
            table, th, td {
                border: 1px solid black;
            }
            td {
                padding: 10px;
            }
            .mydiv {    
                top: 0%;
                left: 32%;
                background-color: #f3f3f3;
            }
        </style>
    </head>
     
    <body>
        <div class="container">
            <h2><a href="<?php echo base_url().'home/do_logout';?>">Logout</a></h2>
            <h2><a href="<?php echo base_url();?>">home</a></h2>
            <h1 id='form_head'>User Listing</h1>
            
            <?php if (isset($results)) { ?>
                <table border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>Surname</th>                        
                    </tr>
                     
                    <?php foreach ($results as $data) { ?>
                        <tr>
                            <td><?php echo $data->id ?></td>                            
                            <td><?php echo $data->name ?></td>
                            <td><?php echo $data->uploaded_on ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <div>No user(s) found.</div>
            <?php } ?>
 
            <?php if (isset($links)) { ?>
                <h1>
                    <?php echo $links ?>
                </h1>                
            <?php } ?>
        </div>
    </body>
</html>