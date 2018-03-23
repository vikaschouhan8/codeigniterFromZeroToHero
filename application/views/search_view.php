<div>
    <h2><a href="<?php echo base_url().'home/do_logout';?>">Logout</a></h2>
    <h2><a href="home_view.php">home</a></h2>
    <style>
    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }
    </style>
    <table>
        <thead>
            <tr>
                <td>No.</td>
                <td>Name</td>
                <td>Mail</td>																	
            </tr>
        </thead>
        <tbody>
            <?php 
            if(!empty($record)){
                foreach($record as $row):?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->uploaded_on; ?></td>

                </tr>
                <?php endforeach;
            }else{
                echo "<p>no results<p/>";
            }    
            ?>					
        </tbody>
    </table>
</div>



