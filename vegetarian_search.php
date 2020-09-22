<?php 
    include "topbit.php";

// if find button pushed
if(isset ($_POST['find_vegetarian']))
    
{

    // Retrieves vegetarian and snitises it.
$vegetarian=test_input(mysqli_real_escape_string($dbconnect, $_POST['vegetarian']));
    
$find_sql="SELECT *
FROM `L1_DBassess_LydWri`
WHERE `vegetarian` LIKE '%$vegetarian%' ORDER BY `vegetarian` ASC ";
    $find_query= mysqli_query($dbconnect, $find_sql);
    $find_rs= mysqli_fetch_assoc($find_query);
    $count= mysqli_num_rows($find_query);
?>
        
        <div class="box main">
            
            <h2>vegetarian search</h2>
            
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
                
                <p> Meal: <span class="sub_heading"><?php echo $find_rs['Meal']; ?></span></p> 
                    <?php
                    
                    // check if location is vegetarian
                    if ($find_rs['Vegetarian'] == 'yes')
                    // only print 'vegetarian' if location is vegetarian
                    {
                        
                    ?>
                    
                    <div>
                        <i>Vegetarian</i>
                    </div>
                    
                    <?php
                        
                    }
                    ?>
                
                
                <p> Course: <span class="sub_heading"><?php echo $find_rs['Course']; ?></span>
                </p>
                
                <p> Location: <span class="sub_heading"><?php echo $find_rs['Location']; ?></span>
                </p>
                
                
                   
                
                    
                <p> Rating: <span class="sub_heading">
                    
                    <?php 
                    for ($x=0; $x < $find_rs['Rating']; $x++)
                    
                    {
                        echo "&#9733;";
                    }
                    
                    ?>
                    
                    </span></p>
                
                <p><span class="sub_heading">Review</span></p>
                
                <p>
                    <?php echo $find_rs['Review']; ?>
                </p>
                
                </div> <!--/ end results -->

                <br />
            
                <?php
                    
                } // end of 'do'
                
                while($find_rs=mysqli_fetch_assoc($find_query));
            } // end else
            //if there are results, display them
    
            }//end isset

            ?>


</div>    <!-- / main -->
        
    
<?php 
    include "bottombit.php";
?>
