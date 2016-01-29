<form action="#" method="get">
    <fieldset>
        <?php
         
        
        $dropsel2 = "";


        if (isGetRequest()) {
            $dropsel2 = filter_input(INPUT_GET, 'groupby');
            $search = filter_input(INPUT_GET, 'search');
        }
        ?>
        <legend>Or Search</legend>
        
        <label>Search by</label>
        
        <select name="groupby">
            <option value="corp"       <?php if ($dropsel2 == "corp"): ?>selected="selected"<?php endif ?>      >Corporations</option>
            <option value="incorp_dt"   <?php if ($dropsel2 == "incorp_dt"): ?>selected="selected"<?php endif ?>  >Incorp Date</option>
            <option value="zipcode"     <?php if ($dropsel2 == "zipcode"): ?>selected="selected"<?php endif ?>    >Zip code</option>
            <option value="owner"       <?php if ($dropsel2 == "owner"): ?>selected="selected"<?php endif ?>      >Owner</option>
        </select>
        <br><br>
        <input type="text" name="search" placeholder="<?php if($search != ""){ echo $search;}?>"/>
        <input type="hidden" name="action" value="search" />
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
    </fieldset>    
</form>