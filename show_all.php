<?php 
    include "topbit.php";

    $showall_sql="SELECT *
FROM `L1_DBassess_LydWri`
ORDER BY `L1_DBassess_LydWri`.`Meal` ASC";
    $showall_query= mysqli_query($dbconnect, $showall_sql);
    $showall_rs= mysqli_fetch_assoc($showall_query);
    $count= mysqli_num_rows($showall_query);
?>
        
        <div class="box main">
            
            <h2>All Items</h2>
            
            <?php
            // check if there are any results
            if($count<1)
            {
                
            ?>
            <div class="error">
                Sorry! There are no results that match your search. Please use the search box in the sidebar to try again.
            </div>
            
            <?php
                
            } // end count 'if'
            // if there are no results, output error
            else {
                
                do{
                
                ?>
                <!-- Results go here -->
                <div class="results">
                
                <p> Meal: <span class="sub_heading"><?php echo $showall_rs['Meal']; ?></span>
                </p>
                
                <p> Course: <span class="sub_heading"><?php echo $showall_rs['Course']; ?></span>
                </p>
                
                <p> Location: <span class="sub_heading"><?php echo $showall_rs['Location']; ?></span>
                </p>
                
                
                    <?php
                    
                    // check if meal is vegetarian
                    if ($showall_rs['Vegetarian'] == 'yes')
                    // only print 'vegetarian' if meal is vegetarian
                    {
                        
                    ?>
                    
                    <div>
                        <i>Vegetarian</i>
                    </div>
                    
                    <?php
                        
                    }
                    ?>
                
                    
                <p> Rating: <span class="sub_heading">
                    
                    <?php 
                    for ($x=0; $x < $showall_rs['Rating']; $x++)
                    
                    {
                        echo "&#9733;";
                    }
                    
                    ?>
                    
                    </span></p>
                
                <p><span class="sub_heading">Review</span></p>
                
                <p>
                    <?php echo $showall_rs['Review']; ?>
                </p>
                
                </div> <!--/ end results -->

                <br />
            
                <?php
                    
                } // end of 'do'
                
                while($showall_rs=mysqli_fetch_assoc($showall_query));
            } // end else
            //if there are results, display them
            ?>


</div>    <!-- / main -->
        
    
<?php 
    include "bottombit.php";
?>
